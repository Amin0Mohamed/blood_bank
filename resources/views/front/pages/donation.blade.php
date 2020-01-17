
@extends('front.layout.app')
@section('title')
    طلبات التبرع
@endsection
@section('content')

    <!--************breadcrumb************-->
    <div class="container my-3 ">
        <nav aria-label="breadcrumb" >
            <ol class="breadcrumb bg-white rounded border">
                <li class="breadcrumb-item"><a href="{{ url('/') }}">الرئيسيه</a></li>
                <li class="breadcrumb-item active" aria-current="page"> طلبات التبرع</li>
            </ol>
        </nav>
    </div>
    <!--************breadcrumb************-->
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
            <div class="pag d-flex justify-content-center align-items-center">
               {{ $donations->links() }}
            </div>
        </div>
    </section>
    <!--*********donation**********-->
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
