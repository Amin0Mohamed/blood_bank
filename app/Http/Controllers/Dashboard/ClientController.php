<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\BloodType;
use App\Models\City;
use App\Models\Client;
use App\Models\Clientable;
use App\Models\Governorate;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ClientController extends Controller
{

    public function index()
    {
        $clients=Client::all();
        return view('dashboard.clients.index',compact('clients'));
    }

    public function create()
    {
        $users = User::all();
        $governorates=Governorate::all();
        $blood_types=BloodType::all();
        return view('dashboard.clients.create',compact('users','governorates','blood_types'));
    }


    public function store(Request $request)
    {
        $request->validate(
            [
                'name'=>'required',
                'phone'=>'required',
                'email'=>'required | email | unique:clients',
                'password'=>'required',
                'date_of_birth'=>'required',
                'last_donation_date'=>'required',
                'pin_code'=>'required',
                'blood_type'=>'required',
                'city'=>'required',
//                'image'=>'required|image|mimes:jpeg,jpg,png,gif',
            ]
        );

        $client = Client::create($request->all());
        $request->merge(['password'=>bcrypt($request->password)]);
        $client->api_token=str_random(60);

        session()->flash('success',__('site.added_successfully'));
        return redirect()->route('dashboard.clients.index');
    }

    public function edit($id)
    {
        $client=Client::findOrFail($id);
        $governorates=Governorate::all();
        $blood_types=BloodType::all();
        return view('dashboard.clients.edit',compact('client','governorates','blood_types'));
    }


    public function update(Request $request, $id)
    {
        $request->validate(
            [
                'name'=>'required',
                'phone'=>'required',
                'email'=>'required | email | unique:clients',
                'password'=>'required',
                'date_of_birth'=>'required',
                'last_donation_date'=>'required',
                'pin_code'=>'required',
                'blood_types'=>'required',
                'city_id'=>'required',
            ]
        );

        $client = Client::findOrFail($id);
//        $client->password=bcrypt($request->password);
//        $client->api_token=str_random(60);
        $client->update($request->all());
        session()->flash('success',__('site.update_successfully'));
        return redirect()->route('dashboard.clients.index');
    }


    public function destroy($id)
    {
        $clients=Client::findOrFail($id);
        $clients->delete();
        session()->flash('success',__('site.deleted_successfully'));
        return redirect()->route('dashboard.clients.index');
    }

}
