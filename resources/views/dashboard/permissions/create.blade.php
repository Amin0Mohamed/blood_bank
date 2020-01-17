@extends('layouts.dashbord.app')
@section('content')



        <div class="box w-75 m-auto table-responsive card p-5">
            <form action="{{ route('dashboard.permissions.store') }}" method="post" enctype="multipart/form-data">
                {{csrf_field()}}
                <div class="form-group">
                    <label>@lang('site.name')</label>
                    <input type="text" name="name" class="form-control" value="{{ old('name') }}">
                </div>
               @if(!$roles->isEmpty())  {{--  If no roles exist yet--}}
                    <h4>Assign Permission to Roles</h4>
                    <div class='form-group d-flex justify-content-between'>
                        @foreach ($roles as $role)
                            <div class="font-weight-bolder d-flex">
                                <label>{{ $role->name }}</label>
                                <input type="checkbox" name="roles[]" value="{{$role->id}}" style="width: 1.5rem;height: 1.5rem">
                            </div>
                        @endforeach
                @endif


                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary text-capitalize font-size-4"><i class="fa fa-plus"></i> @lang('site.add')</button>
                </div>
            </form><!-- end of form -->
        </div><!-- end of box body -->



@endsection
