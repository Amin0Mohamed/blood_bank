<?php
namespace App\Http\Controllers\Dashboard;


use App\Models\Governorate;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class governoratesController extends Controller
{

    public function index()
    {
        $governorates=Governorate::all();
        return view('dashboard.governorates.index',compact('governorates'));
    }

    public function create()
    {
        return view('dashboard.governorates.create');
    }

    public function store(Request $request)
    {
        $this->validate($request,
            [
                'name'=>'required',
            ]
        );

        $governorate = Governorate::create($request->all());
        session()->flash('success',__('site.added '.$governorate->name.' successfully'));
        return redirect()->route('dashboard.governorates.index');
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        $governorate=Governorate::findOrFail($id);
        return view('dashboard.governorates.edit',compact('governorate'));
    }


    public function update(Request $request, $id)
    {
        $this->validate($request,
            [
                'name'=>'required',
            ]
        );
        $governorate = Governorate::findOrFail($id);
        $governorate->name = $request->name;
        $governorate->update();
        session()->flash('success',__('site.updated '.$governorate->name.' successfully'));
        return redirect()->route('dashboard.governorates.index');
    }


    public function destroy($id)
    {
        $governorate = Governorate::findOrFail($id);
        $governorate->delete();
        session()->flash('success',__('site.deleted '.$governorate->name.' successfully'));
        return redirect()->route('dashboard.governorates.index');
    }
}
