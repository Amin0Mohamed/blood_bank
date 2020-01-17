@extends('layouts.dashbord.app')
@section('content')



        <div class="box w-75 m-auto table-responsive card p-5">
            <form action="{{ route('dashboard.users.store') }}" method="post" enctype="multipart/form-data">
                {{csrf_field()}}
                <div class="form-group">
                    <label>@lang('site.name')</label>
                    <input type="text" name="name" class="form-control" value="{{ old('name') }}">
                </div>

                <div class="form-group">
                    <label>@lang('site.email')</label>
                    <input type="email" name="email" class="form-control" value="{{ old('email') }}">
                </div>
                <div class="form-group">
                    <label>@lang('site.email_verfied_At')</label>
                    <input type="email" name="email_verfied_At" class="form-control" value="{{ old('email_verfied_At') }}">
                </div>
                <div class="form-group">
                    <label>@lang('site.password')</label>
                    <input type="password" name="password" class="form-control" value="{{ old('password') }}">
                </div>
                <div class="form-group">
                    <label>@lang('site.image')</label>
                    <input type="file" name="image" class="form-control" value="{{ old('image') }}">
                </div>
                <h5><b>@lang('site.user_roles')</b></h5>
                <div class="d-flex">
                    <input id="select-all" type="checkbox" style="width: 1.5rem;height: 1.5rem">
                    <label for='selectAll'>@lang('site.select-all')</label>
                </div>
                <br>
                <div class='form-group d-flex justify-content-between'>
                    @foreach ($roles as $role)
                        <div class="font-weight-bolder d-flex">
                            <label>{{ $role->name }}</label>
                            <input type="checkbox" name="roles[]" value="{{$role->id}}" style="width: 1.5rem;height: 1.5rem">
                        </div>
                    @endforeach
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-primary text-capitalize font-size-4"><i class="fa fa-plus"></i> @lang('site.add')</button>
                </div>
            </form><!-- end of form -->
        </div><!-- end of box body -->



@endsection
