@extends('layouts.dashbord.app')

@section('content')

            <div class="box w-75 m-auto table-responsive card p-5">

                <div class="box-body">

{{--                    @include('partials._errors')--}}

                    <form action="{{ route('dashboard.posts.update', [$post->id])}}" method="post" enctype="multipart/form-data">
                        {{method_field('PUT')}}
                        {{csrf_field()}}
                        <div class="form-group">
                            <label>@lang('site.title')</label>
                            <input type="text" name="title" class="form-control" value="{{ $post->title }}">
                        </div>
                        <div class="form-group">
                            <label>@lang('site.content')</label>
                            <input type="text" name="content" class="form-control" value="{{ $post->content }}">
                        </div>
                        <div class="form-group">
                            <label>@lang('site.des')</label>
                            <input type="text" name="des" class="form-control" value="{{ $post->des }}">
                        </div>
                        <div class="form-group">
                            <label>@lang('site.image')</label>
                            <input type="file" name="image" class="form-control" value="{{ $post->image }}">
                            <img style="display: inline" width="50px" height="50px"  src="{{ url('/') }}/productimages/{{$post->image}}" alt="error">
                        </div>
                        <div class="form-group">
                            <label>@lang('site.categories')</label>
                            <select name="category_id" class="form-control">
                                <option value=""> select category</option>
                                @foreach($categories as $categorie)
                                    <option value="{{$categorie->id}}"
                                        @if($categorie->name == $post->category->name)
                                         selected
                                        @endif
                                    >
                                        {{$categorie->name}}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary"><i class="fa fa-edit"></i> @lang('site.edit')</button>
                        </div>

                    </form><!-- end of form -->

                </div><!-- end of box body -->

            </div><!-- end of box -->

@endsection
