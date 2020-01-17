
@extends('front.layout.app')
@section('title')
    المقالات
@endsection
@section('content')

    <!--************breadcrumb************-->
    <div class="container my-3 ">
        <nav aria-label="breadcrumb" >
            <ol class="breadcrumb bg-white rounded border">
                <li class="breadcrumb-item"><a href="{{url('/')}}">الرئيسيه</a></li>
                <li class="breadcrumb-item" aria-current="page"> المقالات</li>
                <li class="breadcrumb-item active" aria-current="page"> {{$post->title}}</li>
            </ol>
        </nav>
    </div>
    <!--************breadcrumb************-->
    <!--************breadcrumb************-->
    <section class="artical my-5 py-3 ">
        <div class="container bg-white p-4">
            <div class="text-center my-3 wow bounceInDown">
                <img src="{{url('/')}}/productimages/{{$post->image}}" class="img-thumbnail img-fluid rounded" alt="">
            </div>
            <div class=" w-100 rounded p-2 d-flex justify-content-between align-items-center text-white" style="background-color: #191f4a;">
                <h2 class="wow fadeInRight"> {{$post->title}}</h2>
                <i class="fa fa-heart-o wow fadeInLeft"></i>
            </div>
            <div class="text p-5 ">
                <p class="wow fadeInLeft">{{$post->content}}</p>
                <br>
                <p class="wow fadeInRight">{{$post->des}}</p>

            </div>
        </div>
    </section>
    <!--************breadcrumb************-->

    <!--*********articals**********-->
    <section id="articals">
        <div class="container">
            <h2 class="text-danger heder_line">مقالات ذات صلة</h2>
            <div class="">
                <div class="all_articals">
                    <div class="single">
                        @foreach(\App\Models\Post::all() as $artical)
                            <div class="card">
                                <img src="{{url('/')}}/productimages/{{$artical->image}}" class="card-img-top img-thumbnail" alt="img">
                                <i class="fa fa-heart-o fas"></i>
                                <div class="card-body">
                                    <h5 class="card-title text-danger">{{$artical->title}}</h5>
                                    <p class="card-text">{{$artical->content}}</p>
                                    <a href="{{url('/artical-details/'.$artical->id)}}" class="btn btn-dark_blue m-auto w-50 d-block">التفاصيل</a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="text-center arrows" style="direction: ltr">
                        <i class="fa fa-angle-left fa-2x p-2 pre"></i>
                        <i class="fa fa-angle-right fa-2x p-2 nex"></i>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--*********articals**********-->


@endsection
