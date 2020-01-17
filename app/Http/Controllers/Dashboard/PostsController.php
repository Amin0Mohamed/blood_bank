<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Category;
use App\Models\Post;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PostsController extends Controller
{

    public function index()
    {
        $posts=Post::all();
        return view('dashboard.posts.index',compact('posts'));
    }


    public function create()
    {
        $categories=Category::all();
        return view('dashboard.posts.create',compact('categories'));
    }

    public function store(Request $request)
    {
        $this->validate($request,
            [
                'title'=>'required',
                'content'=>'required',
                'des'=>'required',
                'category_id'=>'required|exists:categories,id',
                'image'=>'required|image|mimes:jpeg,jpg,png,gif',
            ]
        );


        $post = Post::create($request->all());
        if($request->hasFile('image')) {
            $image = $request->file('image')->getClientOriginalName();
            $request->file('image')->move(public_path('productimages'), $image);
            $post->image = $image;
            $post->save();
        }

        session()->flash('success',__('site.added '.$post->title.' successfully'));
        return redirect()->route('dashboard.posts.index');

    }


    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $post=Post::find($id);
        $categories=Category::all();
        return view('dashboard.posts.edit',compact('post','categories'));
    }


    public function update(Request $request, $id)
    {
        $request->validate(
            [
                'title'=>'required',
                'content'=>'required',
                'image'=>'required|image|mimes:jpeg,jpg,png,gif',
                'category_id'=>'required|exists:categories,id',
            ]
        );

        $posts =Post::find($id);
        if($request->hasFile('image')) {
            $image = $request->file('image')->getClientOriginalName();
            $request->file('image')->move(public_path('productimages'), $image);
            $posts->image = $image;
        }
        $posts->save($request->all());
        session()->flash('success',__('site.deleted '.$posts->title.'_successfully'));
        return redirect()->route('dashboard.posts.index');
    }

    public function destroy($id)
    {
        $post=Post::find($id);
        $post->delete();
        session()->flash('success',__('site.deleted '.$post->title.'_successfully'));
        return redirect()->route('dashboard.posts.index');
    }
}
