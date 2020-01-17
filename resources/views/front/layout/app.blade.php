
<!doctype html>
<html lang="en" dir="rtl">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <!-- CSRF Token -->
      <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Bootstrap CSS -->
      <link rel="stylesheet" href="{{asset('front/css/animation.css')}}">
      <link rel="stylesheet" href="{{asset('front/css/rtl/bootstrap.min.css')}}">
      <link href="https://fonts.googleapis.com/css?family=Cairo&display=swap" rel="stylesheet">
      <link href="{{asset('front/css/font-awesome.min.css')}}" rel="stylesheet">
      <link rel="stylesheet" type="text/css" href="{{asset('front/css/slick.css')}}"/>
      <link rel="stylesheet" type="text/css" href="{{asset('front/css/slick-theme.css')}}"/>
      <link rel="stylesheet" href="{{asset('front/css/all-pages.css')}}">
      <link rel="stylesheet" href="{{asset('front/css/style.css')}}">
      <link rel="stylesheet" href="{{asset('front/css/responsive.css')}}">
      <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
    <title>@yield('title')</title>
  </head>
  <body onload="load()">
  <!-- ************************ small nav****************-->
  <div class="small_nav">
      <div class="container">
          <div class="row">
              <div class="col-sm-6 col-md-6 col-lg-4 wow fadeInRight">
                  <p>
                      <span class="text-danger">عربي</span>
                      <span class="vertical_line"></span>
                      <span>en</span>
                  </p>
              </div>
              <div class="col-sm-6 col-md-6 col-lg-4 wow flip" >
                    <span class="social_media">
                        <a class="text-white" target="_blank" href="{{$settings->whatsupp_number}}"> <i class="fa fa-whatsapp" aria-hidden="true"></i></a>
                        <a class="text-white" target="_blank" href="{{$settings->fb_link}}"><i class="fa fa-facebook-f" aria-hidden="true"></i></a>
                        <a class="text-white" target="_blank"  href="{{$settings->tw_link}}"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                        <a class="text-white" target="_blank"  href="{{$settings->insta_link}}"> <i class="fa fa-instagram" aria-hidden="true"></i></a>
                    </span>
              </div>
              <div class="col-sm-12 col-md-12 col-lg-4 wow fadeInLeft">
                  <p>
                      <span>  {{$settings->phone}} <i class="fa fa-phone m-1" aria-hidden="true"></i></span>
                      <span class="vertical_line"></span>
                      <span> {{$settings->email}} <i class="fa fa-envelope-o m-1" aria-hidden="true"></i></span>
                  </p>
              </div>
          </div>
      </div>
  </div>
  <!-- ******************** small nav ********************** -->

  <!--*********big nav**********-->
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <div class="container">
          <a class="navbar-brand" href="#">
              <img src="{{url('/')}}/productimages/{{$settings->header_logo}}" width="150" height="90" alt="">
          </a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-nav mr-auto">
                  <li class="nav-item active">
                      <a class="nav-link" href="{{url('/')}}">الرئيسيه <span class="sr-only">(current)</span></a>
                  </li>
                  <span class="vertical_line"></span>
                  <li class="nav-item">
                      <a class="nav-link" href="#">عن بنك الدم</a>
                  </li>
                  <span class="vertical_line"></span>
                  <li class="nav-item">
                      <a class="nav-link" href="{{url('/articals')}}">المقالات</a>
                  </li>
                  <span class="vertical_line"></span>
                  <li class="nav-item">
                      <a class="nav-link" href="{{url('/donation')}}">طلبات التبرع</a>
                  </li>
                  <span class="vertical_line"></span>
                  <li class="nav-item">
                      <a class="nav-link" href="{{url('/about-us')}}"> من نحن</a>
                  </li>
                  <span class="vertical_line"></span>
                  <li class="nav-item">
                      <a class="nav-link" href="{{url('/contact')}}">أتصال بنا</a>
                  </li>
              </ul>
              <div class="form-inline my-2 my-lg-0">
                  @if(!auth()->guard('client')->check())
                      @if (Route::has('register'))
                          <a href="{{url()->route('client.register')}}" class="create-acount-link">انشاء حساب جديد</a>
                      @endif
                      <a href="{{url()->route('client.login')}}" class="btn btn-dark_blue">الدخول</a>
                   @else
                      <a href="{{url('/sign-new-donation')}}" class="btn btn-dark_blue">طلب التبرع</a>
                      <span class="pr-3" style="color: #D58A12;">مرحبا بك </span>
                      <div class="btn-group">
                          <button class="auth-btn dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                              {{Auth::user()->name}}
                          </button>
                          <div class="dropdown-menu">
                              <a class="dropdown-item" href="#">
                                  <i class="fa fa-home"> </i>
                                  الرئيسيه
                              </a>
                              <div class="dropdown-divider"></div>
                              <a class="dropdown-item" href="#">
                                  <i class="fa fa-user-o" aria-hidden="true"></i>
                                  معلوماتي
                              </a>
                              <div class="dropdown-divider"></div>
                              <a class="dropdown-item" href="#">
                                  <i class="fa fa-bell" aria-hidden="true"></i>
                                  إعداد الاشعارات
                              </a>
                              <div class="dropdown-divider"></div>
                              <a class="dropdown-item" href="#">
                                  <i class="fa fa-heart-o" aria-hidden="true"></i>
                                  المفضله
                              </a>
                              <div class="dropdown-divider"></div>
                              <a class="dropdown-item" href="#">
                                  <i class="fa fa-comment-o" aria-hidden="true"></i>
                                  إبلاغ
                              </a>
                              <div class="dropdown-divider"></div>
                              <a class="dropdown-item" href="#">
                                  <i class="fa fa-phone" aria-hidden="true"></i>
                                  تواصل معنا
                              </a>
                              <div class="dropdown-divider"></div>
                              <a class="dropdown-item" href="{{ route('client.logout') }}"
                                 onclick="event.preventDefault();
                                 document.getElementById('logout-form').submit()"
                              >
                                  <i class="fa fa-sign-out" aria-hidden="true"></i>
                                  تسجيل خروج
                              </a>
                              <form id="logout-form" action="{{ route('client.logout') }}" method="POST" style="display: block;width: 100px;height: 50px">
                                  @csrf
                              </form>
                          </div>
                      </div>
                  @endguest
              </div>
          </div>
      </div>
  </nav>
  <!--*********big nav**********-->

  @if(session()->has('success'))
      <div class="alert alert-success alert-dismissible fade show" role="alert">
          {{ session()->get('success') }}
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
          </button>
      </div>
  @endif
  <div class="w-50 m-auto my-5">
      @include('partials.required_error')
  </div>

  @yield('content')

<!--/* ************* footer******************/-->
<footer class="bg-dark p-5">
     <div class="container">
         <div class="row">
             <div class="col-sm-6 col-md-4">
                 <div class="img_contain p-2 mb-3">
                     <img src="{{ url('/')}}/productimages/{{$settings->footer_logo}}" alt="">
                 </div>
                 <h3 class="text-white mb-3">بنك الدم</h3>
                 <p class="lead text-white">{{$settings->about_app}}</p>
             </div>
             <div class="col-sm-6 col-md-4">
                 <div class="text-center">
                     <h5 class="text-danger mb-3">الرئيسيه</h5>
                     <ul class="" style="list-style: none">
                         <li class="mb-3"><a href="#">عن بنك الدم</a></li>
                         <li class="mb-3"><a href="#">المقالات</a></li>
                         <li class="mb-3"><a href="#">طلب التبرع</a></li>
                         <li class="mb-3"><a href="#">من نحن</a></li>
                         <li><a href="#">اتصل بنا</a></li>
                     </ul>
                 </div>
             </div>
             <div class="col-sm-12 col-md-4">
                 <div class="text-center">
                     <h5 class="text-danger mb-5">متوفر علي</h5>
                     <div class="app m-auto w-75">
                         <a href="{{$settings->play_store_link}}" target="_blank" > <img src="{{asset('front/images/google1.png')}}" class="w-50" alt=""></a>
                         <a href="{{$settings->app_store_link}}" target="_blank" > <img class="w-50 m-auto" src="{{asset('front/images/ios1.png')}}" alt=""></a>
                     </div>
                 </div>
             </div>
         </div>
     </div>
</footer>
//<!--************* footer******************-->


<!--**********scroll up***********-->
<i class="fa fa-chevron-up scroll" onclick="topFunction()" id="myBtn"></i>
<!--***********scroll up*************-->
<!--**********loading page***********-->
<div class="loading d-flex justify-content align-items" id="load">
    <div class="loader"></div>
</div>
<!--***********loading page*************-->
<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="{{asset('front/js/jquery.min.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script type="text/javascript" src="//code.jquery.com/jquery-1.11.0.min.js"></script>
<script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/wow/1.1.2/wow.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.24.1/feather.min.js"></script>
<script type="text/javascript" src="{{asset('front/js/slick.js')}}"></script>
<script src="{{asset('front/js/bootstrap.min.js')}}"></script>
<script src="{{asset('front/js/wow.js')}}"></script>
<script src="{{asset('front/js/style.js')}}"></script>
  @stack('scripts')

  @include('sweet::alert')

@stack('map')
@stack('donation_filtter')
@stack('toggle')
  </body>
</html>
