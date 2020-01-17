@extends('layouts.dashbord.app')
@section('content')



        <div class="box w-75 m-auto table-responsive card p-5">
            <form action="{{ route('dashboard.posts.store') }}" method="post" enctype="multipart/form-data">
                {{csrf_field()}}
                <div class="form-group">
                    <label>@lang('site.title')</label>
                    <input type="text" name="title" class="form-control" value="{{ old('title') }}">
                </div>
                <div class="form-group">
                    <label>@lang('site.content')</label>
                    <input type="text" name="content" class="form-control" value="{{ old('content') }}">
                </div>
                <div class="form-group">
                    <label>@lang('site.des')</label>
                    <input type="text" name="des" class="form-control" value="{{ old('des') }}">
                </div>
                <div class="form-group">
                    <label>@lang('site.image')</label>
                    <input type="file" name="image" class="form-control" value="{{ old('image') }}">
                </div>

                <div class="form-group">
                    <label>@lang('site.categories')</label>
                    <select name="category_id" class="form-control">
                        <option value=""> select category</option>
                        @foreach($categories as $categorie)
                            <option value="{{$categorie->id}}">{{$categorie->name}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-primary text-capitalize font-size-4"><i class="fa fa-plus"></i> @lang('site.add')</button>
                </div>
            </form><!-- end of form -->
        </div><!-- end of box body -->



@endsection
