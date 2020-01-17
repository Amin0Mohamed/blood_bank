<?php

namespace App\Http\Controllers\Dashboard;


use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index(){
        return view('dashboard.index');
    }

    public function editProfile($id)
    {
        $user=User::findOrFail($id);
        return view('dashboard.profile.index',compact('user'));
    }

    public function updateProfile(Request $request, $id)
    {
        $request->validate(
            [
                'name'=>'required',
                'email'=>'required',
                'password'=>'required',
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
        $change->password =bcrypt($request->input('password'));
        $change->update();
        session()->flash('success',__('site.updated_successfully'));
        return redirect()->route('dashboard.index');
    }
}//end class
