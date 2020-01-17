
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
                <li class="breadcrumb-item active" aria-current="page">  المقالات</li>
            </ol>
        </nav>
    </div>
    <!--************breadcrumb************-->

    <!--*********المقالات**********-->
  <section id="articals">
        <div class="container">
            <h2 class="text-danger heder_line">المقالات</h2>
            <div class="">
                <div class="all_articals w-50 m-auto">
                        @foreach($posts as $artical)
                        <div class="card my-3">
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
            </div>
        </div>
    </section>
    <!--*********المقالات**********-->
@endsection
