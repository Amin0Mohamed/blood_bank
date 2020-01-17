@extends('layouts.dashbord.app')

@section('content')

    <div class="box w-75 m-auto table-responsive card p-5">
        <form action="{{ route('dashboard.settings.update', [$setting->id])}}" method="post" enctype="multipart/form-data">
            {{method_field('PUT')}}
            {{csrf_field()}}
            <div class="form-group">
                <label>@lang('site.header_logo')</label>
                <input type="file" name="header_logo" class="form-control" value="{{ $setting->header_logo }}" autocomplete="on">
                <img style="display: inline" width="50px" height="50px"  src="{{ url('/') }}/productimages/{{$setting->header_logo}}" alt="error">

            </div>

            <div class="form-group">
                <label>@lang('site.footer_logo')</label>
                <input type="file" name="footer_logo" class="form-control" value="{{ $setting->footer_logo }}" autocomplete="on">
                <img style="display: inline" width="50px" height="50px"  src="{{ url('/') }}/productimages/{{$setting->footer_logo}}" alt="error">
            </div>
            <div class="form-group">
                <label>@lang('site.slogan')</label>
                <input type="text" name="slogan" class="form-control" value="{{ $setting->slogan }}" autocomplete="on">
            </div>
            <div class="form-group">
                <label>@lang('site.intro_image')</label>
                <input type="file" name="intro_image" class="form-control" value="{{ $setting->intro_image }}" autocomplete="on">
                <img style="display: inline" width="50px" height="50px"  src="{{ url('/') }}/productimages/{{$setting->intro_image}}" alt="error">

            </div>
            <div class="form-group">
                <label>@lang('site.address')</label>
                <input type="text" name="address" class="form-control" value="{{ $setting->address }}" autocomplete="on">
            </div>
            <div class="form-group">
                <label>@lang('site.fb_link')</label>
                <input type="text" name="fb_link" class="form-control" value="{{ $setting->fb_link }}" autocomplete="on">
            </div>
            <div class="form-group">
                <label>@lang('site.insta_link')</label>
                <input type="text" name="insta_link" class="form-control" value="{{ old('insta_link') }}" autocomplete="on">
            </div>
            <div class="form-group">
                <label>@lang('site.youtube_link')</label>
                <input type="text" name="youtube_link" class="form-control" value="{{ $setting->youtube_link}}" autocomplete="on">
            </div>
            <div class="form-group">
                <label>@lang('site.github_link')</label>
                <input type="text" name="github_link" class="form-control" value="{{ $setting->github_link }}" autocomplete="on">
            </div>
            <div class="form-group">
                <label>@lang('site.play_store_link')</label>
                <input type="text" name="play_store_link" class="form-control" value="{{ $setting->play_store_link }}" autocomplete="on">
            </div>
            <div class="form-group">
                <label>@lang('site.app_store_link')</label>
                <input type="text" name="app_store_link" class="form-control" value="{{ $setting->app_store_link }}" autocomplete="on">
            </div>
            <div class="form-group">
                <label>@lang('site.app_logo')</label>
                <input type="file" name="app_logo" class="form-control" value="{{ $setting->app_logo }}" autocomplete="on">
            </div>
            <div class="form-group">
                <label>@lang('site.about_app')</label>
                <input type="text" name="about_app" class="form-control" value="{{ $setting->about_app }}" autocomplete="on">
            </div>
            <div class="form-group">
                <label>@lang('site.email')</label>
                <input type="email" name="email" class="form-control" value="{{ $setting->email }}" autocomplete="on">
            </div>
            <div class="form-group">
                <label>@lang('site.phone')</label>
                <input type="text" name="phone" class="form-control" value="{{ $setting->phone }}" autocomplete="on">
            </div>
            <div class="form-group">
                <label>@lang('site.tw_link')</label>
                <input type="text" name="tw_link" class="form-control" value="{{ $setting->tw_link }}" autocomplete="on">
            </div>
            <div class="form-group">
                <label>@lang('site.github_link')</label>
                <input type="text" name="github_link" class="form-control" value="{{ $setting->github_link }}" autocomplete="on">
            </div>
            <div class="form-group">
                <label>@lang('site.whatsupp_number')</label>
                <input type="text" name="whatsupp_number" class="form-control" value="{{ $setting->whatsupp_number }}" autocomplete="on">
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-primary"><i class="fa fa-edit"></i> @lang('site.edit')</button>
            </div>

        </form><!-- end of form -->
    </div><!-- end of box body -->




@endsection
