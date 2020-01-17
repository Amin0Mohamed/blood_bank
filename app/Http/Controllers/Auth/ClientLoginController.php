<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ClientLoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest:client')->except('logout');
    }
    public function showLoginForm()
    {
        return view('auth.client-login');
    }
    public function login(Request $request)
    {
   //  validate the form data
        $this->validate($request,[
            'phone'=>'required',
            'password'=>'required',
        ]);
     //  attempt to log the user in
        if (Auth::guard('client')->attempt(['phone'=>$request->phone,'password'=>$request->password],$request->remember)){
            return redirect(url('/'));
        }
        return redirect()->back()->withInput($request->only('phone','remember'));
    }

    public function logout(Request $request)
    {
        Auth::guard('client')->logout();
        return redirect(url('/'));
    }
}
