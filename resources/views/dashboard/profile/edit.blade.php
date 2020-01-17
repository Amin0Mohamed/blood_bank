@extends('layouts.dashbord.app')

@section('content')

    <div class="content-wrapper">


        <section class="content">

            <div class="box box-primary">

                <div class="box-header">
                    <h3  class="box-title" style="position: relative;top: 20px; width: 50%;text-align: center; margin: 20px auto;">
                        @lang('site.edit')
                    </h3>
                </div><!-- end of box header -->

                <div class="box-body">

                    <form action="{{ route('dashboard.clients.update',[$client->id])}}" method="post" enctype="multipart/form-data">
                        {{method_field('PUT')}}
                        {{csrf_field()}}
                        <div class="form-group">
                            <label>@lang('site.name')</label>
                            <input type="text" name="name" class="form-control" value="{{ $client->name }}">
                        </div>

                        <div class="form-group">
                            <label>@lang('site.image')</label>
                            <input type="file" name="image" class="form-control" value="{{ $client->image }}">
                            <img style="display: inline" width="50px" height="50px"  src="{{ url('/') }}/productimages/{{$client->image}}" alt="error">

                        </div>
{{--                        <select name="user_id" class="form-control">--}}
{{--                            <option value="">@lang('site.select_admin')</option>--}}
{{--                            @foreach($users as $user)--}}
{{--                                <option value="{{$user->id}}">{{ $user->name }}</option>--}}
{{--                            @endforeach--}}
{{--                        </select>--}}
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary"><i class="fa fa-plus"></i> @lang('site.add')</button>
                        </div>

                </div><!-- end of box body -->

            </div><!-- end of box -->

        </section><!-- end of content -->

    </div><!-- end of content wrapper -->

@endsection
