
@extends('layouts.dashbord.app')
@section('content')
    <section>
        <div class="container p-5 w-50">
            <div class="row w-100">
                <div class="col-sm-12">
                    <h3 class="text-capitalize mb-5 text-center">@lang('site.editProfile')</h3>
                    <form action="{{ route('dashboard.update-profile', [$user->id])}}" method="POST" enctype="multipart/form-data">
                        {{method_field('PUT')}}
                        {{csrf_field()}}
                        <div class="form-group">
                            <label>@lang('site.name')</label>
                            <input type="text" name="name" class="form-control" value="{{ $user->name }}">
                        </div>
                        <div class="form-group">
                            <label>@lang('site.email')</label>
                            <input type="email" name="email" class="form-control" value="{{ $user->email }}">
                        </div>
                        <div class="form-group">
                            <label>@lang('site.password')</label>
                            <input type="password" name="password" class="form-control"
                                   value="{{ $user->password}}">
                        </div>
                        <div class="form-group">
                            <label>@lang('site.image')</label>
                            <input type="file" name="image" class="form-control" value="{{ $user->image }}">
                            <img style="display: inline" width="50px" height="50px"  src="{{ url('/') }}/productimages/{{$user->image}}" alt="error">
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary"><i class="fa fa-edit"></i> @lang('site.edit')</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection


