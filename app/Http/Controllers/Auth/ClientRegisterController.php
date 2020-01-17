<?php

namespace App\Http\Controllers\Auth;

use App\Models\Client;
use App\Http\Controllers\Controller;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class ClientRegisterController extends Controller
{
    protected $redirectTo = '/';


    public function __construct()
    {
        $this->middleware('guest:client');
    }

    public function redirectPath()
    {
        if (method_exists($this, 'redirectTo')) {
            return $this->redirectTo();
        }

        return property_exists($this, 'redirectTo') ? $this->redirectTo : '/';
    }
//    ****************************************************************************
    public function showRegistrationForm()
    {
        return view('auth.client-register');
    }


    public function register(Request $request)
    {
        $this->validator($request->all())->validate();

        event(new Registered($user = $this->create($request->all())));

        $this->guard()->login($user);

        return $this->registered($request, $user)
            ?: redirect($this->redirectPath());
    }


    protected function guard()
    {
        return Auth::guard('client');
    }


    protected function registered(Request $request, $user)
    {
        //
    }
//    *************************************************



    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:clients'],
            'password' => ['required', 'string','confirmed'],
            'phone' => ['required', 'unique:clients'],
            'dob' => ['required','Date'],
            'blood_types' => ['required'],
            'city' => ['required'],
            'dod' => ['required','Date'],
            'pincode' => ['required'],

        ]);
    }

    protected function create(array $data)
    {
        return Client::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'phone' => $data['phone'],
            'date_of_birth' => $data['dob'],
            'last_donation_date' => $data['dod'],
            'blood_type_id' => $data['blood_types'],
            'city_id' => $data['city'],
            'pin_code' =>$data['pincode'],
            'api_token' =>str_random(60)
        ]);
    }
}
