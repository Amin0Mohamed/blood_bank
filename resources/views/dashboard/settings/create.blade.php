@extends('layouts.dashbord.app')
@section('content')



    <div class="box w-75 m-auto table-responsive card p-5">
        <form action="{{ route('dashboard.settings.store') }}" method="post" enctype="multipart/form-data">
            {{csrf_field()}}
            <div class="form-group">
                <label>@lang('site.header_logo')</label>
                <input type="file" name="header_logo" class="form-control" value="{{ old('header_logo') }}" autocomplete="on">
            </div>

            <div class="form-group">
                <label>@lang('site.footer_logo')</label>
                <input type="file" name="footer_logo" class="form-control" value="{{ old('footer_logo') }}" autocomplete="on">
            </div>
            <div class="form-group">
                <label>@lang('site.slogan')</label>
                <input type="text" name="slogan" class="form-control" value="{{ old('slogan') }}" autocomplete="on">
            </div>
            <div class="form-group">
                <label>@lang('site.intro_image')</label>
                <input type="file" name="intro_image" class="form-control" value="{{ old('intro_image') }}" autocomplete="on">
            </div>
            <div class="form-group">
                <label>@lang('site.address')</label>
                <input type="text" name="address" class="form-control" value="{{ old('address') }}" autocomplete="on">
            </div>
            <div class="form-group">
                <label>@lang('site.fb_link')</label>
                <input type="text" name="fb_link" class="form-control" value="{{ old('fb_link') }}" autocomplete="on">
            </div>
            <div class="form-group">
                <label>@lang('site.insta_link')</label>
                <input type="text" name="insta_link" class="form-control" value="{{ old('insta_link') }}" autocomplete="on">
            </div>
            <div class="form-group">
                <label>@lang('site.youtube_link')</label>
                <input type="text" name="youtube_link" class="form-control" value="{{ old('youtube_link') }}" autocomplete="on">
            </div>
            <div class="form-group">
                <label>@lang('site.github_link')</label>
                <input type="text" name="github_link" class="form-control" value="{{ old('github_link') }}" autocomplete="on">
            </div>
            <div class="form-group">
                <label>@lang('site.play_store_link')</label>
                <input type="text" name="play_store_link" class="form-control" value="{{ old('play_store_link') }}" autocomplete="on">
            </div>
            <div class="form-group">
                <label>@lang('site.app_store_link')</label>
                <input type="text" name="app_store_link" class="form-control" value="{{ old('app_store_link') }}" autocomplete="on">
            </div>
            <div class="form-group">
                <label>@lang('site.app_logo')</label>
                <input type="file" name="app_logo" class="form-control" value="{{ old('app_logo') }}" autocomplete="on">
            </div>
            <div class="form-group">
                <label>@lang('site.about_app')</label>
                <input type="text" name="about_app" class="form-control" value="{{ old('about_app') }}" autocomplete="on">
            </div>
            <div class="form-group">
                <label>@lang('site.email')</label>
                <input type="email" name="email" class="form-control" value="{{ old('email') }}" autocomplete="on">
            </div>
            <div class="form-group">
                <label>@lang('site.phone')</label>
                <input type="text" name="phone" class="form-control" value="{{ old('phone') }}" autocomplete="on">
            </div>
            <div class="form-group">
                <label>@lang('site.tw_link')</label>
                <input type="text" name="tw_link" class="form-control" value="{{ old('tw_link') }}" autocomplete="on">
            </div>
            <div class="form-group">
                <label>@lang('site.whatsupp_number')</label>
                <input type="text" name="whatsupp_number" class="form-control" value="{{ old('whatsupp_number') }}" autocomplete="on">
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-primary"><i class="fa fa-plus"></i> @lang('site.add')</button>
            </div>
        </form><!-- end of form -->
    </div><!-- end of box body -->



@endsection
