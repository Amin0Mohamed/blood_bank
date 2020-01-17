@extends('layouts.dashbord.app')
@section('content')
    <div class="container">
        <div class="row">
            {{--       new         --}}
            <div class="card w-100 mt-3 rounded-lg" style="border: 2px solid #3bb7e1;">
                <div class="card-header d-flex justify-content-between">
                    <h3 class="card-title"> @lang('site.settings')</h3>
                    <a href="{{route('dashboard.settings.create')}}" class="btn btn-primary add_btn ml-auto">
                        <i class="fa fa-plus"></i> @lang('site.add')
                    </a>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="example1" class="table table-responsive table-bordered table-striped text-center">
                        <thead class="text-capitalize ">
                        <tr>
                            <th>id</th>
                            <th>@lang('site.header_logo')</th>
                            <th>@lang('site.footer_logo')</th>
                            <th>@lang('site.slogan')</th>
                            <th>@lang('site.intro_image')</th>
                            <th>@lang('site.address')</th>
                            <th>@lang('site.fb_link')</th>
                            <th>@lang('site.tw_link')</th>
                            <th>@lang('site.github_link')</th>
                            <th>@lang('site.whatsupp_number')</th>
                            <th>@lang('site.youtube_link')</th>
                            <th>@lang('site.insta_link')</th>
                            <th>@lang('site.app_logo')</th>
                            <th>@lang('site.play_store_link')</th>
                            <th>@lang('site.app_store_link')</th>
                            <th>@lang('site.email')</th>
                            <th>@lang('site.phone')</th>
                            <th>@lang('site.about_app')</th>
                            <th>@lang('site.edit')</th>
                            <th>@lang('site.delete')</th>

                        </tr>
                        </thead>
                        <tbody>
                        @foreach($settings as $setting)

                            <tr>
                                <td>{{$setting->id}}</td>
                                <td>
                                    <img style="display: inline" width="50px" height="50px"  src="{{ url('/') }}/productimages/{{$setting->header_logo}}" alt="error">
                                </td>
                                <td>
                                    <img style="display: inline" width="50px" height="50px"  src="{{ url('/') }}/productimages/{{$setting->footer_logo}}" alt="error">
                                </td>
                                <td>{{$setting->slogan}}</td>
                                <td>
                                    <img style="display: inline" width="50px" height="50px"  src="{{ url('/') }}/productimages/{{$setting->intro_image}}" alt="error">

                                </td>
                                <td>{{$setting->address}}</td>
                                <td>{{$setting->fb_link}}</td>
                                <td>{{$setting->tw_link}}</td>
                                <td>{{$setting->github_link}}</td>
                                <td>{{$setting->whatsupp_number}}</td>
                                <td>{{$setting->youtube_link}}</td>
                                <td>{{$setting->insta_link}}</td>
                                <td>
                                    <img style="display: inline" width="50px" height="50px"  src="{{ url('/') }}/productimages/{{$setting->app_logo}}" alt="error">

                                </td>
                                <td>{{$setting->play_store_link}}</td>
                                <td>{{$setting->app_store_link}}</td>
                                <td>{{$setting->email}}</td>
                                <td>{{$setting->phone}}</td>
                                <td>{{$setting->about_app}}</td>
                                <td>
                                    <a class="btn btn-success" href="{{route('dashboard.settings.edit',['id'=> $setting->id])}}"><i class="fa fa-edit fa-1x"></i></a>
                                </td>
                                <td>
                                    <form action="{{route('dashboard.settings.destroy',[$setting->id])}}" method="post" style="display: inline-block">
                                        {{csrf_field()}}
                                        {{method_field('delete')}}
                                        <button type="submit" class="delete btn btn-danger"><i class="fa fa-trash fa-1x"></i></button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>

        </div><!-- end of row -->
    </div>
@endsection
