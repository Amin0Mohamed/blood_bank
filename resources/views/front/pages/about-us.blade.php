
@extends('front.layout.app')
@section('title')
    من نحن
@endsection
@section('content')

    <!--************breadcrumb************-->
    <div class="container my-3 ">
        <nav aria-label="breadcrumb" >
            <ol class="breadcrumb bg-white rounded border">
                <li class="breadcrumb-item"><a href="{{url('/')}}">الرئيسيه</a></li>
                <li class="breadcrumb-item active" aria-current="page">من نحن</li>
            </ol>
        </nav>
    </div>
    <!--************breadcrumb************-->

    <section class="about-us my-4 py-5 bg-white rounded">
        <div class="container">
            <div class="img-area text-center m-auto w-25 py-3 wow zoomIn">
                <img src="{{asset('front/images/logo.png')}}" alt="">
            </div>
            <div class="about-US-content px-4 mb-5">
                <p class="my-md-4 lead wow fadeInLeft"> بنك الدم هذا النص هو مثال لنص ممكن أن يستبدل فى نفس المساحه, لقد تم توليد
                    هذا النص من مولد النص العرب حيث يمكنك ان تولد هذا النص أو
                    العديد من النصوص الأخرى وإضافة الى زيادة عدد الحروف التى يولدها التطبيق
                    بنك الدم هذا النص هو مثال لنص ممكن أن يستبدل فى نفس المساحه, لقد تم توليد
                    هذا النص من مولد النص العرب حيث يمكنك ان تولد هذا النص أو
                    العديد من النصوص الأخرى
                </p>
                <p class="my-md-4 lead wow bounceInDown"> بنك الدم هذا النص هو مثال لنص ممكن أن يستبدل فى نفس المساحه, لقد تم توليد
                    هذا النص من مولد النص العرب حيث يمكنك ان تولد هذا النص أو
                    العديد من النصوص الأخرى وإضافة الى زيادة عدد الحروف التى يولدها التطبيق لموقع
                    بنك الدم هذا النص هو مثال لنص ممكن أن يستبدل فى نفس المساحه, لقد تم توليد
                    هذا النص من مولد النص العرب حيث يمكنك ان تولد هذا النص أو
                    العديد من النصوص الأخرى
                </p>
                <p class="my-md-4 lead wow fadeInRight"> بنك الدم هذا النص هو مثال لنص ممكن أن يستبدل فى نفس المساحه, لقد تم توليد
                    هذا النص من مولد النص العرب حيث يمكنك ان تولد هذا النص أو
                    العديد من النصوص الأخرى وإضافة الى زيادة عدد الحروف التى يولدها التطبيق
                    بنك الدمهذا النص هو مثال لنص ممكن أن يستبدل فى نفس المساحه, لقد تم توليد
                    هذا النص من مولد النص العرب حيث يمكنك ان تولد هذا النص أو
                    العديد من النصوص الأخرى
                </p>
            </div>
        </div>
    </section>

@endsection
