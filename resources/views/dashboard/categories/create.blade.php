@extends('layouts.dashbord.app')
@section('content')



        <div class="box w-75 m-auto table-responsive card p-5">
            <form action="{{ route('dashboard.categories.store') }}" method="post" enctype="multipart/form-data">
                {{csrf_field()}}
                <div class="form-group">
                    <label>@lang('site.name')</label>
                    <input type="text" name="name" class="form-control" value="{{ old('name') }}">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary text-capitalize font-size-4"><i class="fa fa-plus"></i> @lang('site.add')</button>
                </div>
            </form><!-- end of form -->
        </div><!-- end of box body -->



@endsection
