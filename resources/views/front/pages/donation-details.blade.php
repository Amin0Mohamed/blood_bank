
@extends('front.layout.app')

@section('content')
    <!--************breadcrumb************-->
    <div class="container my-3 ">
        <nav aria-label="breadcrumb" >
            <ol class="breadcrumb bg-white rounded border">
                <li class="breadcrumb-item"><a href="index.html">الرئيسيه</a></li>
                <li class="breadcrumb-item" aria-current="page"> طلبات التبرع</li>
                <li class="breadcrumb-item active" aria-current="page">طلب التبرع: {{$donation->patient_name}}</li>
            </ol>
        </nav>
    </div>
    <!--************breadcrumb************-->
    <section class="status-details">
        <div class="container">
            <div class="status-info p-3 my-4 bg-white">
                <div class="row">
                    <div class="col-md-6 wow fadeInRight">
                        <table class="table">
                            <tr>
                                <td>الاسم</td>
                                <td>{{$donation->patient_name}}</td>
                            </tr>
                            <tr>
                                <td>فصيلة الدم</td>
                                <td>{{\App\Models\BloodType::where('id',$donation->blood_type_id)->get()->pluck('name')->first()}}</td>
                            </tr>
                            <tr>
                                <td>العمر</td>
                                <td>{{$donation->patient_age}}</td>
                            </tr>
                        </table>
                    </div>
                    <div class="col-md-6 wow fadeInLeft">
                        <table class="table">
                            <tr>
                                <td>عدد الأكياس المطلوبة</td>
                                <td>{{$donation->bags_num}}</td>
                            </tr>
                            <tr>
                                <td> رقم الجوال</td>
                                <td>{{$donation->phone}}</td>
                            </tr>
                            <tr>
                                <td>المستشفي</td>
                                <td> {{$donation->hospital_name}}</td>
                            </tr>
                        </table>
                    </div>
                    <div class="col-md-12 wow fadeIn">
                        <table class="table w-75 m-auto">
                            <tr>
                                <td>عنوان المستشفي</td>
                                <td> {{$donation->hospital_address}}  </td>
                            </tr>
                        </table>
                    </div>
                </div><!--End row-->
                {{--  <div class="text-center my-4 ">
                    <a href="donation-details.html" type="button" class="btn btn-dark_blue" >التفاصيل</a>
                </div>  --}}
                <div class="border p-3 my-3">
                    <p class="my-md-2 wow fadeInRight">{{ $donation->notes }}  </p>
                    {{--  <p class="my-md-2 wow fadeInLeft"> بنك الدم هذا النص هو مثال لنص ممكن أن يستبدل فى نفس المساحه, لقد تم توليد
                        هذا النص من مولد النص العرب حيث يمكنك ان تولد هذا النص أو
                        العديد من النصوص الأخرى وإضافة الى زيادة عدد الحروف التى يولدها التطبيق لموقع
                        بنك الدم هذا النص هو مثال لنص ممكن أن يستبدل فى نفس المساحه, لقد تم توليد
                        هذا النص من مولد النص العرب حيث يمكنك ان تولد هذا النص أو
                        العديد من النصوص الأخرى
                        بنك الدم هذا النص هو مثال لنص ممكن أن يستبدل فى نفس المساحه, لقد تم توليد
                        هذا النص من مولد النص العرب حيث يمكنك ان تولد هذا النص أو
                        العديد من النصوص الأخرى وإضافة الى زيادة عدد الحروف التى يولدها التطبيق لموقع
                        بنك الدم هذا النص هو مثال لنص ممكن أن يستبدل فى نفس المساحه, لقد تم توليد
                        هذا النص من مولد النص العرب حيث يمكنك ان تولد هذا النص أو
                        العديد من النصوص الأخرى
                    </p>  --}}
                </div>
                <!--Location on Google-->
                <div id="map" style="border:1px solid #ddd;width: 100%;height: 330px">
                    {{--  <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3454.244327965891!2d31.23191431511476!3d30.02984758188777!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x145847340c2eaedf%3A0xec8a9d758ecabbf1!2z2YXYs9iq2LTZgdmJINin2KjZiCDYp9mE2LHZiti0INmE2YTYp9i32YHYp9mE!5e0!3m2!1sen!2seg!4v1573594740665!5m2!1sen!2seg" width="100%" height="330" frameborder="0" style="border:1px solid #ddd;" allowfullscreen=""></iframe>  --}}
                </div>
            </div>
        </div><!--End Container-->
    </section>
@endsection

@push('map')
<script>


    function initMap() {
        var options = {
            center: { lat:{{ $donation->longitude }}, lng:{{ $donation->latitude }} },
            zoom: 12,
        }
        var map = new google.maps.Map(document.getElementById('map'),options);
        // add marker
        var marker = new google.maps.marker({
            position:{lat:29.952654, lng:30.921919},
            map:map
        });

    }
  </script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAXTs24gTxnRKXxDit6tMm6dpfm9tiNZwE&callback=initMap"
  async defer></script>
@endpush
