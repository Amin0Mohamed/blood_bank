@extends('front.layout.app')
@section('title')
    تسجيل الدخول
@endsection
@section('content')

    <!--************breadcrumb************-->
    <div class="container my-3 ">
        <nav aria-label="breadcrumb" >
            <ol class="breadcrumb bg-white rounded border">
                <li class="breadcrumb-item"><a href="index.html">الرئيسيه</a></li>
                <li class="breadcrumb-item active" aria-current="page">تسجيل دخول</li>
            </ol>
        </nav>
    </div>
    <!--************breadcrumb************-->
    <section class="signin my-5 py-3 ">
        <div class="container bg-white p-4">
            <div class="text-center my-3">
                <img src="{{asset('front/images/logo.png')}}" alt="">
            </div>
            <div class="row">
                <div class="col-sm-12 col-md-12">
                    <form class="py-3 my-3 w-50 m-auto" method="POST" action="{{ route('client.login.submit') }}" >
                        @csrf
                        <div class="form-group">
                            <input id="phone" type="text" class="form-control @error('phone') is-invalid @enderror" placeholder="phone"  name="phone" value="{{ old('phone') }}"  autocomplete="phone" autofocus>
                            @error('phone')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"  name="password"  autocomplete="current-password" placeholder="password">
                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                        <div class="form-check mb-3">
                            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                            <label class="form-check-label ml-5" for="remember">
                                {{ __('ذكرني') }}
                            </label>
                        </div>
                        <div class="d-flex justify-content-around align-items-center">
                            <button type="submit" class="btn btn-success">الدخول</button>
                            <a href="{{url(route('client.register'))}}" class="btn btn-dark_blue" style="width: 40%">إنشاء حساب جديد</a>
                        </div>

                        <div class="my-3 p-3">
                            @if (Route::has('password.request'))
                                <a class="btn btn-link" href="{{ route('client.password.request') }}">
                                    نسيت كلمه المرور
                                </a>
                            @endif
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>


@endsection
