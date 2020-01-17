<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoriesController extends Controller
{

    public function index()
    {
        $categories=Category::all();
        return view('dashboard.categories.index',compact('categories'));
    }

    public function create()
    {
        return view('dashboard.categories.create');
    }

    public function store(Request $request)
    {
        $this->validate($request,
            [
                'name'=>'required',
            ]
        );

        $category = Category::create($request->all());
        session()->flash('success',__('site.added '.$category->name.' successfully'));
        return redirect()->route('dashboard.categories.index');
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        $category=Category::findOrFail($id);
        return view('dashboard.categories.edit',compact('category'));
    }


    public function update(Request $request, $id)
    {
        $this->validate($request,
            [
                'name'=>'required',
            ]
        );
        $category = Category::findOrFail($id);
        $category->name = $request->name;
        $category->update();
        session()->flash('success',__('site.updated '.$category->name.' successfully'));
        return redirect()->route('dashboard.categories.index');
    }


    public function destroy($id)
    {
        $category = Category::findOrFail($id)->delete();
        session()->flash('success',__('site.deleted '.$category->name.' successfully'));
        return redirect()->route('dashboard.categories.index');
    }
}
