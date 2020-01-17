
@extends('front.layout.app')
@section('title')
    تسجيل حاله جديده
@endsection
@section('content')

    <!--************breadcrumb************-->
    <div class="container my-3 ">
        <nav aria-label="breadcrumb" >
            <ol class="breadcrumb bg-white rounded border">
                <li class="breadcrumb-item"><a href="{{url('/')}}">الرئيسيه</a></li>
                <li class="breadcrumb-item active" aria-current="page">تسجيل حاله جديده</li>
            </ol>
        </nav>
    </div>
    <!--************breadcrumb************-->
    <section class="signup my-5 py-3 ">
        <div class="container bg-white p-4">
            <div class="row">
                <div class="col-sm-12 col-md-12">
                    <form class="py-3 my-3 w-75 m-auto" action="{{url('/store-donation')}}" method="post">
                       @csrf
                        <div class="form-group">
                            <input class="form-control" name="patient_name" type="text" placeholder="اسم الحاله">
                        </div>
                        <div class="form-group">
                            <input type="number" class="form-control" name="patient_age"   placeholder="السن ">
                        </div>
                        <div class="form-group">
                            <input type="number" name="bags_num" class="form-control"   placeholder="عدد أكياس الدم">
                        </div>
                        <div class="form-group">
                            <input type="text" name="hospital_name" class="form-control"   placeholder="أسم المستشفي">
                        </div>
                        <div class="form-group">
                            <input type="text" name="hospital_address" class="form-control"   placeholder="عنوان المستشفي">
                        </div>
                        <div class="form-group">
                            <input type="text" name="phone" class="form-control"   placeholder="تليفون المستشفي">
                        </div>
                        <div class="form-group">
                            <input type="text" name="notes" class="form-control"   placeholder="الملاحظات">
                        </div>
                        <div class="form-group">
                            <input type="text" name="longitude" class="form-control"   placeholder="خطوط الطول">
                        </div>
                        <div class="form-group">
                            <input type="text" name="latitude" class="form-control"   placeholder="دوائر العرض">
                        </div>
                        <div class="form-group">
                            <label>نوع فصيله الدم</label>
                            <select class="custom-select" name="blood type id" required>
                                 @foreach(\App\Models\BloodType::all() as  $blood_type)
                                    <option value="{{$blood_type->id}}">{{$blood_type->name}}</option>
                                 @endforeach
                            </select>
                        </div>

                        <div class="location">
                            <h3 class="text-capitalize text-center font-italic">location</h3>
                            <div class="form-group">
                                <label>@lang('site.governorates')</label>
                                <select name="governorates" id="gov" class="form-control">
                                    <option value="">select your governorates</option>
                                    @foreach(\App\Models\Governorate::all() as $governorate)
                                        <option value="{{$governorate->id}}">{{$governorate->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group  d-none" id="city">
                                <label>@lang('site.cities')</label>
                                <select name="city_id" id="cities" class="form-control">
                                    <option value="">select your city</option>
                                </select>
                            </div>
                        </div>


                        <button type="submit" class="btn btn-success w-50 m-auto d-block">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection


@push('scripts')
    <script>
        $('#gov').change(function(){
            document.getElementById("city").classList.remove('d-none');
            var gid = $(this).val();
            var url = "{{url('city')}}/"+gid;
            if(gid){

                $.ajax({
                    type:"get",
                    url:url,
                    // dataType:json,
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success:function(data)
                    {
                        if(data)
                        {
                            $("#cities").html(data);
                        }
                    }
                });
            }
        });
    </script>
    @endpush
