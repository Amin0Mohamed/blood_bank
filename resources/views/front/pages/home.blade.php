
@extends('front.layout.app')
@section('title')
    بنك الدم
@endsection
 @section('content')
    <!--*********slider**********-->
    <div id="carouselExampleIndicators" class=" carousel slide fadeInRight wow" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img class="d-block w-100" src="{{asset('front/images/header.jpg')}}" alt="First slide">
                <div class="carousel-caption">
                    <h3>بنك الدم نمضي قدما لصحه افضل</h3>
                    <p class="lead"> هذا النص هو مثال يمكن ان يستبدل بنص اخر فيما بعد. هذا النص هو مثال يمكن ان يستبدل بنص اخر فيما بعد. هذا النص هو مثال يمكن ان يستبدل بنص اخر فيما بعد. هذا النص هو </p>
                    <a href="" class="btn btn-dark_blue">المزيد</a>
                </div>
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="{{asset('front/images/call.jpg')}}" alt="Second slide">
                <div class="carousel-caption">
                    <h3>بنك الدم نمضي قدما لصحه افضل</h3>
                    <p class="lead"> هذا النص هو مثال يمكن ان يستبدل بنص اخر فيما بعد. هذا النص هو مثال يمكن ان يستبدل </p>
                    <a href="" class="btn btn-dark_blue">المزيد</a>
                </div>
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="{{asset('front/images/BG.jpg')}}" alt="Third slide">
                <div class="carousel-caption">
                    <h3>بنك الدم نمضي قدما لصحه افضل</h3>
                    <p class="lead"> هذا النص هو مثال يمكن ان يستبدل بنص اخر فيما بعد. هذا النص هو مثال يمكن ان يستبدل بنص اخر فيما بعد. هذا النص هو مثال يمكن ان يستبدل بنص اخر فيما بعد. هذا النص </p>
                    <a href="" class="btn btn-dark_blue">المزيد</a>
                </div>
            </div>
        </div>
    </div>
    <!--*********slider**********-->


    <!--*********about**********-->
    <section id="about" class="py-5 ">
        <div class="container">
            <div class="about-cont py-3 fadeInLeft wow">
                <p class="pl-4">
                    <span class="text-danger"> بنك الدم</span>
                    هذا النص هو مثال لنص ممكن أن يستبدل فى نفس المساحه, لقد تم توليد
                    هذا النص من مولد النص العرب حيث يمكنك ان تولد هذا النص أو
                    العديد من النصوص الأخرى وإضافة الى زيادة عدد الحروف التى يولدها التطبيق يطلع على صورة حقيقة لتطبيق
                    الموقع
                </p>
            </div>
        </div>
    </section>
    <!--*********about**********-->

    <!--*********articals**********-->
    <section id="articals">
        <div class="container">
            <h2 class="text-danger heder_line">المقالات</h2>
            <div class="">
                <div class="all_articals">
                    <div class="single">
                        @foreach($articals as $artical)
                        <div class="card">
                            <img src="{{url('/')}}/productimages/{{$artical->image}}" class="card-img-top img-thumbnail" alt="img">
                            <i id="{{$artical->id}}" onclick="toggleFavourite(this)" class="fa fa-heart-o fas
                              {{$artical->is_favourite ? 'second-heart':'first-heart'}}
                               "></i>
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

    <!--*********donation**********-->
    <section id="donation">
        <div class="container">
            <h4 class="heder_line text-danger">طلبات التبرع</h4>
            <div class="filter">
                {{--                <form action="{{url('/donation-filter')}}" method="get" class="w-50 m-auto">--}}
                <select class="custom-select wow fadeInRight" name="blood_type" id="blood_type">
                    @foreach(\App\Models\BloodType::all() as  $blood_type)
                        <option value="{{$blood_type->id}}">{{$blood_type->name}}</option>
                    @endforeach
                </select>

                <select class="custom-select wow fadeInLeft" name="city" id="city">
                    @foreach(\App\Models\City::all() as $city)
                        <option value="{{$city->id}}">{{$city->name}}</option>
                    @endforeach
                </select>
                {{--                    <button type="submit" style="background-color: transparent;border: none;">--}}
                <i class="fa fa-search fa-1x search" id="search" style="cursor: pointer"></i>
                {{--                    </button>--}}
                {{--                </form>--}}

            </div>
            <div class="all_donation wow rollIn" id="contain">
                @foreach($donations as $donation)
                    <div class="don w-75">
                        <div class="blood_type">{{$donation->blood_type->name}}</div>
                        <div class="data">
                            <ul class="list-unstyled">
                                <li>
                                    الاسم:
                                    <span class=" text-uppercase p-2" style="color: #09c;font-size: 20px;font-weight: 800">{{$donation->patient_name}} </span>
                                </li>
                                <li>
                                    مستشفي:
                                    <span class="text-uppercase p-2" style="color: #09c;font-size: 20px;font-weight: 800"> {{$donation->hospital_name}}</span>
                                </li>
                                <li>
                                    مدينه:
                                    <span class="text-uppercase p-2" style="color: #09c;font-size: 20px;font-weight: 800">{{$donation->city->name}}</span>

                                </li>
                            </ul>
                        </div>
                        <a href="{{url('/donation-details/'.$donation->id)}}" class="btn btn-light">التفاصيل</a>
                    </div>
                @endforeach

            </div>
        </div>
    </section>
    <!--*********donation**********-->

    <!--*********contact**********-->
    <section id="contact-us" class="py-5 mt-5">
        <div class="container">
            <div class="row">
                <div class="contact-info py-3 col-md-6 col-sm-12 text-center wow fadeInRight">
                    <h4 class="text-center"><span class="heder_line text-danger">اتصل بنا </span> </h4>
                    <p class="my-5">يمكنك الأتصال بنا للاستفسار عن معلومة وسيتم الرد عليكم</p>
                    <div class="phone-nm mx-auto">
                        <p href=""><span class="">+002</span> {{$settings->phone}} </p>
                        <img src="{{asset('front/images/whats.png')}}" alt="whats-phone">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--*********contact**********-->

    <!--***************blood-app************-->
    <section id="blood-app" class="py-4">
        <div class="container">
            <div class="row">
                <div class="col-md-6 wow fadeInRight">
                    <h4 class="mt-5 mb-4">تطبيق بنك الدم</h4>
                    <p class="appText">هذا النص هو مثال لنص ممكن أن يستبدل فى نفس المساحه, لقد تم توليد هذا النص من مولد
                        النص
                        العرب</p>
                    <div class="text-center avilb">
                        <h5 class="my-4">متوفر على</h5>
                        <img src="{{asset('front/images/google.png')}}"  alt="">
                        <img src="{{asset('front/images/ios.png')}}"  alt="">
                    </div>
                </div>
                <div class="col-md-6 my-3 wow fadeInLeft">
                    <img src="{{asset('front/images/App.png')}}" class="img-fluid" alt="">
                </div>
            </div>
            <!--End row-->
        </div>
        <!--End container-->
    </section>
    <!--**********jhjkhku*End blood-app************-->

@endsection

@push('donation_filtter')
    <script>
        $('#search').click(function (e) {
            e.preventDefault();
            var city=$('#city').val();
            var blood_type=$('#blood_type').val();
            $.ajax({
                url:"{{url('/donation-filter')}}",
                type:"get",
                data: { city: city, blood_type: blood_type },
                dataType: "html",
                success:function (date) {
                    // $('#contain').empty();
                    if(date){   //state
                        $('#contain').html(date);
                    }else {
                        $('#contain').html('<div class="no-result">no resulte</div>');
                    }
                },

            });
        });
    </script>
@endpush
@push('toggle')
    <script>
       function toggleFavourite(heart) {
           var post_id=heart.id;
           $.ajax({
               url:"{{url('/toggle')}}",
               type:"get",
               data: { _token:'{{csrf_token()}}', post_id: post_id },
               success:function (date) {
                  console.log(date);
                  var currentClass = heart.attr('class');
                  if (currentClass.includes('first')){
                    $(heart).removeClass('first-heart').addClass('second-heart');
                  }else {
                      $(heart).removeClass('second-heart').addClass('first-heart');
                  }
               }
           });

       }
    </script>

@endpush

