@extends('layouts.dashbord.app')
@section('content')
    <section>
        <div class="container p-5 w-50">
            <div class="row w-100">
                <div class="col-sm-12">
                   <h1 class="text-capitalize mb-5 text-center">@lang('site.admin_hello')</h1>
                    <img src="{{asset('img/admins.jpeg')}}" class="img-fluid img-bordered-sm d-block m-auto" alt="admin image error">
                </div>
            </div>
        </div>
    </section>

    <footer class="main-footer w-50 position-fixed " style="bottom: 0px;">
        <strong>Copyright © 2019-2020 <a href="#">{{\Illuminate\Support\Facades\Auth::User()->name}}</a>.</strong>
        All rights reserved.
        <div class="float-right d-none d-sm-inline-block">
            <b>Version</b> 3.0.0
        </div>
    </footer>
@endsection
