<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Illuminate\Support\Facades\Password;

class ClientForgotPasswordController extends Controller
{

    public function __construct()
    {
        $this->middleware('guest:client');
    }

    public function broker()
    {
        return Password::broker('client');
    }
    public function sendResetLinkEmail()
    {
        return view('auth.passwords.email-client');
    }
    public function showLinkRequestForm()
    {
        return view('auth.passwords.email-client');
    }
}
