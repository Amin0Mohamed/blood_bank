<?php
namespace App\Http\Controllers\Dashboard;
use \App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $users=User::all();
        return view('dashboard.users.index',compact('users'));
    }
    public function create()
    {
        $roles = Role::get();
        return view('dashboard.users.create',compact('roles'));
    }
    public function store(Request $request)
    {
        $request->validate(
            [
                'name'=>'required',
                'email'=>'required',
                'password'=>'required',
                'image'=>'required|image|mimes:jpeg,jpg,png,gif',
            ]
        );
        $change = new User($request->all());
        if($request->hasFile('image')) {
            $image = $request->file('image')->getClientOriginalName();
            $request->file('image')->move(public_path('productimages'), $image);
            $change->image = $image;
        }
        $change->name = $request->input('name');
        $change->email = $request->input('email');
        $change->password =$request->input('password');
        $change->save();
        $roles = $request['roles']; //Retrieving the roles field
        //Checking if a role was selected
        if (isset($roles)) {
            foreach ($roles as $role) {
                $role_r = Role::where('id', '=', $role)->firstOrFail();
                $change->assignRole($role_r); //Assigning role to user
            }
        }
        session()->flash('success',__('site.added_successfully'));
        return redirect()->route('dashboard.users.index');
    }
    public function edit($id)
    {
        $user=User::findOrFail($id);
        $roles = Role::get(); //Get all roles
        return view('dashboard.users.edit',compact('user','roles'));
    }
    public function update(Request $request, $id)
    {
        $request->validate(
            [
                'name'=>'required',
                'email'=>'required|email|unique:users,email,'.$id,
                'image'=>'required|image|mimes:jpeg,jpg,png,gif',
            ]
        );
        $change =User::findOrFail($id);
        if($request->hasFile('image')) {
            $image = $request->file('image')->getClientOriginalName();
            $request->file('image')->move(public_path('productimages'), $image);
            $change->image = $image;
        }
        $change->name = $request->input('name');
        $change->email = $request->input('email');
        if(request()->has('password') && request()->get('password')){
            $change->password =$request->input('password');
        }
        $change->update();
        $roles = $request['roles']; //Retreive all roles

        //Looping thru selected permissions
        foreach ($roles as $role) {
            $r = Role::where('id', '=', $role)->firstOrFail();
            //Fetch the newly created role and assign permission
            $change = User::where('name', '=', $change->name)->first();
            $change->assignRole($r);
        }
        session()->flash('success',__('site.updated_successfully'));
        return redirect()->route('dashboard.users.index');
    }
    public function destroy($id)
    {
        $user=User::findOrFail($id);
        $user->delete();
        session()->flash('success',__('site.deleted_successfully'));
        return redirect()->route('dashboard.users.index');
    }
}
