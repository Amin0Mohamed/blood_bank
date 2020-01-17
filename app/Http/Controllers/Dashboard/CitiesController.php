<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\City;
use App\Models\Governorate;
use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CitiesController extends Controller
{

    public function index()
    {
        $cities=City::all();
        return view('dashboard.cities.index',compact('cities'));
    }


    public function create()
    {
        $governorates=Governorate::all();
        return view('dashboard.cities.create',compact('governorates'));
    }

    public function store(Request $request)
    {
        $this->validate($request,
            [
                'name'=>'required',
                'governorate_id'=>'required|exists:governorates,id',
            ]
        );


        $city = City::create($request->all());
        session()->flash('success',__('site.added '.$city->name.' successfully'));
        return redirect()->route('dashboard.cities.index');

    }


    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $city=City::findOrFail($id);
        $governorates=Governorate::all();
        return view('dashboard.cities.edit',compact('city','governorates'));
    }


    public function update(Request $request, $id)
    {
        $request->validate(
            [
                'name'=>'required',
                'governorate_id'=>'required|exists:governorates,id',
            ]
        );
        $cities =City::findOrFail($id);
        $cities->name=$request->input('name');
        $cities->governorate_id=$request->input('governorate_id');
        $cities->update();
        session()->flash('success',__('site.updated '.$cities->name.'_successfully'));
        return redirect()->route('dashboard.cities.index');
    }

    public function destroy($id)
    {
        $city=City::findOrFail($id);
        $city->delete();
        session()->flash('success',__('site.deleted '.$city->title.'_successfully'));
        return redirect()->route('dashboard.cities.index');
    }
}
