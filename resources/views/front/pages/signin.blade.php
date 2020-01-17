
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
                <img src="{{url('/')}}/productimages/{{$settings->header_logo}}" alt="">
            </div>
            <div class="row">
                <div class="col-sm-12 col-md-12">
                    <form class="py-3 my-3 w-50 m-auto">
                        <div class="form-group">
                            <input type="text" class="form-control"  placeholder="phone">
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control"  placeholder="Password">
                        </div>
                        <div class="form-group form-check">
                            <input type="checkbox" class="form-check-input" >
                            <span class="d-inline-block ml-4">تذكر</span>
                        </div>
                        <div class="d-flex justify-content-around align-items-center">
                            <a href="" type="submit" class="btn btn-success" style="width: 40%">الدخول</a>
                            <a href="signup.html" class="btn btn-dark_blue" style="width: 40%">إنشاء حساب جديد</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

@endsection
