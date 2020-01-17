<?php

namespace App\Http\Controllers\Api;

use App\Models\Client;
use App\Models\Token;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AuthController extends Controller
{

    public function register(Request $request)
    {
        $validation = validator()->make($request->all(),[
            'name'=>'required',
            'phone'=>'required',
            'email'=>'required | email | unique:clients',
            'password'=>'required | confirmed',
            'date_of_birth'=>'required',
            'last_donation_date'=>'required',
            'pin_code'=>'required',
            'blood_type_id'=>'required',
            'city_id'=>'required',
        ]);

        if ($validation->fails())
        {
            return ResponseJson(0,$validation->errors()->first(),$validation->errors());
        }

        $request->merge(['password'=>bcrypt($request->password)]);
        $client=Client::create($request->all());
        $client->api_token=str_random(60);
        $client->save();

        return ResponseJson(1,'تمه الاضافه بنجاح',[
            'api_token'=>$client->api_token,
            'client'=>$client
        ]);
    }

    public function update_profile(Request $request)
    {
        $validation = validator()->make($request->all(),[
            'name'=>'required',
            'phone'=>'required|unique:clients,phone,'.$request->user()->id,
            'email'=>'required | unique:clients,email,'.$request->user()->id,
            'password'=>'sometimes|nullable',
            'date_of_birth'=>'required',
            'last_donation_date'=>'required',
            'pin_code'=>'required',
            'blood_type_id'=>'required',
            'city_id'=>'required',
        ]);

        if ($validation->fails())
        {
            return ResponseJson(0,$validation->errors()->first(),$validation->errors());
        }

        if ($request->has('api_token')){
            if ($request->has('password')){
                $request->merge(['password'=>bcrypt($request->password)]);
            }
            $client=Client::where('api_token',$request->api_token);
            $client->update($request->all());
        }

        return ResponseJson(1,'تمه التعديل بنجاح',$client);
    }

    public function login(Request $request)
    {
        $validation = validator()->make($request->all(),[
            'phone'=>'required',
            'password'=>'required',
        ]);

        if ($validation->fails())
        {
            return ResponseJson(0,$validation->errors()->first(),$validation->errors());
        }
        $auth = auth()->guard('client-api')->validate($request->all());
        return ResponseJson(1,'تمت المطابقه بنجاح',$auth);
    }

    public function registerToken(Request $request)
    {
        $valdator = validator()->make($request->all(),[
//           'token'=>'required',
           'type'=>'required'
        ]);

        if ($valdator->fails()){
            return ResponseJson(0,$valdator->errors()->first(),$valdator->errors());
        }

         Token::where('token',$request->token)->delete();
        $request->user()->tokens()->create($request->all());
        return ResponseJson(1,'تم التسجيل بنجاح');
    }

    public function removeToken(Request $request)
    {
        $valdator = validator()->make($request->all(),[
            'token'=>'required'
        ]);

        if ($valdator->fails()){
            return ResponseJson(0,$valdator->errors()->first(),$valdator->errors());
        }

         Token::where('token',$request->token)->delete();

        return ResponseJson(1,'تم الحذف بنجاح');
    }

    public function setNotificationSetting(Request $request)
    {
        $validation = validator()->make($request->all(),[
            'blood_types_list'=>'required|array',
            'governorate_list'=>'required|array',
        ]);

        if ($validation->fails())
        {
            return ResponseJson(0,$validation->errors()->first(),$validation->errors());
        }

        $blood_types = $request->user()->blood_types()->sync($request->blood_types_list);
        $governorates = $request->user()->governorates()->sync($request->governorate_list);
        return ResponseJson(1,'success data',[
            'bloodtype'=>$blood_types,
            'governorates'=>$governorates
        ]);
    }

    public function getNotificationSetting(Request $request)
    {
        $blood_types = $request->user()->blood_type()->get();
        $governorates = $request->user()->governorates()->get();
        return ResponseJson(1,'success data',[
            'bloodtype'=>$blood_types,
            'governorates'=>$governorates
        ]);
    }

}
