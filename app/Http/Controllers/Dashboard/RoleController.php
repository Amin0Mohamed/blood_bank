<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
//Importing laravel-permission models
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleController extends Controller
{

    public function index()
    {
        $roles = Role::all();//Get all roles
        return view('dashboard.roles.index',compact('roles'));
    }

    public function create()
    {
        $permissions = Permission::all();//Get all permissions
        return view('dashboard.roles.create',compact('permissions'));
    }
    public function store(Request $request)
    {
        //Validate name and permissions field
        $this->validate($request, [
                'name'=>'required|unique:roles|max:20',
                'permissions' =>'required',
            ]
        );

        $name = $request['name'];
        $role = new Role();
        $role->name = $name;
        $permissions = $request['permissions'];
        $role->save();
        //Looping thru selected permissions
        foreach ($permissions as $permission) {
            $p = Permission::where('id', '=', $permission)->firstOrFail();
            //Fetch the newly created role and assign permission
            $role = Role::where('name', '=', $name)->first();
            $role->givePermissionTo($p);
        }
        session()->flash('success',__('Role'. $role->name.' added!'));
        return redirect()->route('dashboard.roles.index');
    }


    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $role = Role::findOrFail($id);
        $permissions = Permission::all();

        return view('dashboard.roles.edit', compact('role', 'permissions'));
    }

    public function update(Request $request, $id)
    {
        $role = Role::findOrFail($id);//Get role with the given id
        //Validate name and permission fields
        $this->validate($request, [
            'name'=>'required|max:20|unique:roles,name,'.$id,
        ]);

        $input = $request->except(['permissions']);
        $permissions = $request['permissions'];
        $role->fill($input)->save();
        $role->permissions()->sync($permissions);
//Looping thru selected permissions
//        if (!empty($permissions)){
//            foreach (Permission::all() as $per) {
//                if ($role->hasPermissionTo($per->name)){
//                    $role->revokePermissionTo($per->name);//delete all role permission
//                }
//            }
//            foreach ($permissions as $per) {
//                $r= Role::where('id','=',$role->id)->firstOrFail();
//                //Fetch the newly created role and assign permission
//                $perr = Permission::where('id', '=', $per)->first();
//                $r->givePermissionTo($perr);
//            }
//        }else{
//            foreach (Permission::all() as $per) {
//                if ($role->hasPermissionTo($per->name)){
//                    $role->revokePermissionTo($per->name);//delete all role permission
//                }
//            }
//        }

        session()->flash('success',__( 'Role '. $role->name.' updated!'));
        return redirect()->route('dashboard.roles.index');
    }


    public function destroy($id)
    {
        $role = Role::findOrFail($id);
        $role->delete();

        session()->flash('success',__('site.deleted '. $role->name.' successfully'));
        return redirect()->route('dashboard.roles.index');
    }
}
