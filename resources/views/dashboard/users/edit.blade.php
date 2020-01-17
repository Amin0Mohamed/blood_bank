@extends('layouts.dashbord.app')

@section('content')

            <div class="box w-75 m-auto table-responsive card p-5">

                <div class="box-body">

{{--                    @include('partials._errors')--}}

                    <form action="{{ route('dashboard.users.update', [$user->id])}}" method="post" enctype="multipart/form-data">
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
                            <input type="password" name="password" class="form-control" value="">
                        </div>
                        <div class="form-group">
                            <label>@lang('site.image')</label>
                            <input type="file" name="image" class="form-control" value="{{ $user->image }}">
                            <img style="display: inline" width="50px" height="50px"  src="{{ url('/') }}/productimages/{{$user->image}}" alt="error">
                        </div>
                        <h5><b>@lang('site.assign-permissions')</b></h5>
                        <div class="d-flex">
                            <input id="select-all" type="checkbox" style="width: 1.5rem;height: 1.5rem">
                            <label for='selectAll'>@lang('site.select-all')</label>
                        </div>
                        <div class='form-group d-flex justify-content-between'>
                            @foreach ($roles as $role)
                                <div class="font-weight-bolder d-flex">
                                    <label>{{ $role->name }}</label>
                                    <input style="width: 1.5rem;height: 1.5rem" type="checkbox" name="roles[]" value="{{$role->id}}"
                                           @if($user->hasRole($role->name))
                                           checked
                                        @endif
                                    >
                                </div>
                            @endforeach
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary"><i class="fa fa-edit"></i> @lang('site.edit')</button>
                        </div>

                    </form><!-- end of form -->

                </div><!-- end of box body -->

            </div><!-- end of box -->

@endsection
