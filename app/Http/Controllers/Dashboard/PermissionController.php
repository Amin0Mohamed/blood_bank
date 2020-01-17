<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionController extends Controller
{

    public function index()
    {
        $permissions = Permission::all(); //Get all permissions

        return view('dashboard.permissions.index')->with('permissions', $permissions);
    }

    public function create()
    {
        $roles = Role::get(); //Get all roles

        return view('dashboard.permissions.create')->with('roles', $roles);
    }


    public function store(Request $request)
    {
        $this->validate($request, [
            'name'=>'required|max:40',
        ]);

        $name = $request['name'];
        $permission = new Permission();
        $permission->name = $name;

        $roles = $request['roles'];

        $permission->save();

        if (!empty($request['roles'])) { //If one or more role is selected
            foreach ($roles as $role) {
                $r = Role::where('id', '=', $role)->firstOrFail(); //Match input role to db record

                $permission = Permission::where('name', '=', $name)->first(); //Match input //permission to db record
                $r->givePermissionTo($permission);
            }
        }

        session()->flash('success',__('Role'. $permission->name.' added!'));
        return redirect()->route('dashboard.permissions.index');

    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $permission = Permission::findOrFail($id);
        $roles=Role::all();
        return view('dashboard.permissions.edit', compact('permission','roles'));
    }

    public function update(Request $request, $id)
    {
        $permission = Permission::findOrFail($id);
        $this->validate($request, [
            'name'=>'required|max:40',
        ]);
        $input = $request->except(['roles']);
        $permission->fill($input)->save();
        $roles = $request['roles'];
        $permission->roles()->sync($roles);
        //Looping thru selected permissions
        // if (!empty($roles)){
        //     foreach (Role::all() as $role) {
        //         if ($permission->hasRole($role))
        //         {
        //             $permission->removeRole($role);//delete all role of this permission
        //         }
        //     }
        //     foreach ($roles as $role) {
        //         $r= Role::where('id','=',$role)->firstOrFail();
        //         //Fetch the newly created role and assign permission
        //         $per = Permission::where('name', '=', $permission->name)->first();
        //         $r->givePermissionTo($per);
        //     }
        // }else{
        //     foreach (Role::all() as $role) {
        //         $role->revokePermissionTo($permission->name);
        //     }
        // }


        session()->flash('success',__( 'Role '. $permission->name.' updated!'));
        return redirect()->route('dashboard.permissions.index');
    }

    public function destroy($id)
    {
        $permission = Permission::findOrFail($id);
        $permission->delete();
        session()->flash('success',__('site.deleted '. $permission->name.' successfully'));
        return redirect()->route('dashboard.permissions.index');
    }

}
