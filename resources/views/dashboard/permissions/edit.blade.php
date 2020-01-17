@extends('layouts.dashbord.app')

@section('content')

            <div class="box w-75 m-auto table-responsive card p-5">
                <h1><i class='fa fa-key'></i> @lang('site.edit') {{$permission->name}}</h1>
                <div class="box-body">

{{--                    @include('partials._errors')--}}

                    <form action="{{ route('dashboard.permissions.update', [$permission->id])}}" method="post" enctype="multipart/form-data">
                        {{method_field('PUT')}}
                        {{csrf_field()}}
                        <div class="form-group">
                            <label>@lang('site.name')</label>
                            <input type="text" name="name" class="form-control" value="{{ $permission->name }}">
                        </div>
                        @if(!$roles->isEmpty())  {{--  If no roles exist yet--}}
                            <h4>Assign Permission to Roles</h4>
                            <div class='form-group d-flex justify-content-between'>
                                @foreach ($roles as $role)
                                    <div class="font-weight-bolder d-flex">
                                        <label>{{ $role->name }}</label>
                                        <input type="checkbox" name="roles[]" value="{{$role->id}}" style="width: 1.5rem;height: 1.5rem"
                                            @if($role->hasPermissionTo($permission->name))
                                               checked
                                            @endif
                                        >
                                    </div>
                                @endforeach
                            </div>
                        @endif
                        <div class="form-group">
                            <button  type="submit" class="btn btn-primary"><i class="fa fa-edit"></i> @lang('site.edit')</button>
                        </div>

                    </form><!-- end of form -->

                </div><!-- end of box body -->

            </div><!-- end of box -->

@endsection
