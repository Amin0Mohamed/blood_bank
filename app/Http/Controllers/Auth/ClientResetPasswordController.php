<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Password;

class ClientResetPasswordController extends Controller
{

    use ResetsPasswords;


    protected $redirectTo = '/client';


    public  function guard()
    {
        return Auth::guard('client');
    }

    public function __construct()
    {
        $this->middleware('guest:client');
    }

    public function broker()
    {
          return Password::broker('client');
    }

    public function showResetForm(Request $request, $token = null)
    {
        return view('auth.passwords.reset-client')->with(
            ['token' => $token, 'email' => $request->email]
        );
    }

    protected function rules()
    {
        return [
            'token' => 'required',
            'email' => 'required|email',
            'password' => 'required|confirmed',
        ];
    }

    protected function credentials(Request $request)
    {
        return $request->only(
            'email', 'password', 'password_confirmation', 'token'
        );
    }



}
