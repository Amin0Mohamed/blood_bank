
@extends('front.layout.app')
@section('title')
    تواصل معنا
@endsection
@section('content')

    <!--************breadcrumb************-->
    <div class="container my-3 ">
        <nav aria-label="breadcrumb" >
            <ol class="breadcrumb bg-white rounded border">
                <li class="breadcrumb-item"><a href="{{url('/')}}">الرئيسيه</a></li>
                <li class="breadcrumb-item active" aria-current="page">تواصل معنا</li>
            </ol>
        </nav>
    </div>
    <!--************breadcrumb************-->

    <section class="contact">
        <div class="container">
            <div class="row">
                <div class="col-sm-6 my-1 wow fadeInRight">
                    <div class="con1 bg-white rounded">
                        <div class="head text-center py-2">
                            <p class="lead">اتصل بنا</p>
                        </div>
                        <div class="img-area text-center m-auto w-50 py-3">
                            <img src="{{asset('front/images/logo.png')}}" alt="">
                        </div>
                        <hr>
                        <div style="direction: ltr; margin:0px 6% 3px 0px">
                            <p class="lead">رقم الجوال: 01002932471</p>
                            <p class="lead">فاكس : 2465675</p>
                            <p class="lead"> البريد الالكتروني: ipda3@gmail.com</p>
                        </div>
                        <p class="lead t text-danger w-25 font-weight-bolder">تواصل معنا</p>
                        <div class="social-media w-75  d-flex my-3 justify-content-around align-items-center">
                            <a class="facebook" href=""><i class="fa fa-facebook-square"></i></a>
                            <a class="twitter" href=""><i class="fa fa-twitter-square"></i></a>
                            <a class="youtube" href=""><i class="fa fa-youtube-square"></i></a>
                            <a class="insta" href=""><i class="fa fa-instagram"></i></a>
                            <a class="whatsapp" href=""><i class="fa fa-whatsapp"></i></a>
                            <a class="google" href=""><i class="fa fa-google-plus-square"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 my-1 wow fadeInLeft">
                    <div class="con2 bg-white rounded">
                        <div class="head text-center py-2">
                            <p class="lead"> تواصل معنا</p>
                        </div>
                        <div class="p-3 ">
                            <form action="{{url('/contact')}}" method="post">
                                @csrf
                                <input type="text" name="name" class="form-control my-3" placeholder="الاسم">
                                <input type="mail" name="email" class="form-control my-3" placeholder="البريد الاليكترونى">
                                <input type="text" name="phone" class="form-control my-3" placeholder="الجوال">
                                <input type="text" name="subject" class="form-control my-3" placeholder="عنوان الرسالة">
                                <textarea name="message" class="form-control my-4" rows="5" placeholder="نص الرسالة"></textarea>
                                <button type="submit" class="btn py-3 bg w-100 head ">ارسال</button>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
