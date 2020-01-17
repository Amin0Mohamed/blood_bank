@extends('layouts.dashbord.app')

@section('content')

            <div class="box w-75 m-auto table-responsive card p-5">

                <div class="box-body">

{{--                    @include('partials._errors')--}}

                    <form action="{{ route('dashboard.governorates.update', [$governorate->id])}}" method="post" enctype="multipart/form-data">
                        {{method_field('PUT')}}
                        {{csrf_field()}}
                        <div class="form-group">
                            <label>@lang('site.name')</label>
                            <input type="text" name="name" class="form-control" value="{{ $governorate->name }}">
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary"><i class="fa fa-edit"></i> @lang('site.edit')</button>
                        </div>

                    </form><!-- end of form -->

                </div><!-- end of box body -->

            </div><!-- end of box -->

@endsection
