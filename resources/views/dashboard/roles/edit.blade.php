@extends('layouts.dashbord.app')

@section('content')

            <div class="box w-75 m-auto table-responsive card p-5">

                <div class="box-body">

{{--                    @include('partials._errors')--}}

                    <form action="{{ route('dashboard.roles.update', [$role->id])}}" method="post" enctype="multipart/form-data">
                        {{method_field('PUT')}}
                        {{csrf_field()}}
                        <div class="form-group">
                            <label>@lang('site.name')</label>
                            <input type="text" name="name" class="form-control" value="{{ $role->name }}">
                        </div>
                        <h5><b>@lang('site.assign-permissions')</b></h5>
                        <div class="d-flex">
                            <input id="select-all" type="checkbox" style="width: 1.5rem;height: 1.5rem">
                            <label for='selectAll'>@lang('site.select-all')</label>
                        </div>
                        <div class='form-group d-flex justify-content-between'>
                            @foreach ($permissions as $permission)
                                <div class="font-weight-bolder d-flex">
                                    <label>{{ $permission->name }}</label>
                                    <input style="width: 1.5rem;height: 1.5rem" type="checkbox" name="permissions[]" value="{{$permission->id}}"
                                     @if($role->hasPermissionTo($permission->name))
                                         checked
                                     @endif
                                    >
                                </div>
                            @endforeach
                        </div>
                        <div class="form-group">
                            <button  type="submit" class="btn btn-primary"><i class="fa fa-edit"></i> @lang('site.edit')</button>
                        </div>

                    </form><!-- end of form -->

                </div><!-- end of box body -->

            </div><!-- end of box -->

@endsection
