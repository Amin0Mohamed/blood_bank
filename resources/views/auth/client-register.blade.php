@extends('front.layout.app')
@section('title')
    تسجيل حساب جديد
@endsection
@section('content')
    <!--************breadcrumb************-->
    <div class="container my-3 ">
        <nav aria-label="breadcrumb" >
            <ol class="breadcrumb bg-white rounded border">
                <li class="breadcrumb-item"><a href="{{ url('/') }}">الرئيسيه</a></li>
                <li class="breadcrumb-item active" aria-current="page">إنشاء حساب جديد</li>
            </ol>
        </nav>
    </div>
    <!--************breadcrumb************-->
    <section class="signup my-5 py-3 ">
        <div class="container bg-white p-4">
            <div class="row">
                <div class="col-sm-12 col-md-12">
                    <form class="py-3 my-3 w-75 m-auto" method="POST" action="{{ route('client.register') }}">
                        @csrf
                        <div class="form-group">
                            <input id="name" type="text" value="{{old('name')}}" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="الاسم">

                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <input id="email" type="email" placeholder="البريد الالكتروني" value="{{old('email')}}" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                            @error('email')
                                 <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <input id="phone" type="text" placeholder="رقم الفون" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{old('phone')}}" required autocomplete="phone">
                            @error('phone')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                 </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>تاريخ الميلاد</label>
                            <input type="date" id="datepicker" name="dob" class="form-control @error('dob') is-invalid @enderror" placeholder="تاريخ الميلاد">
                            @error('dob')
                                <span class="invalid-feedback" role="alert">
                                   <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label> pin code</label>
                            <input type="number"  name="pincode" class="form-control @error('pincode') is-invalid @enderror" placeholder="pin code">
                            @error('pincode')
                                <span class="invalid-feedback" role="alert">
                                   <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>


                        <div class="form-group">
                            <label>نوع فصيله الدم</label>
                            <select class="custom-select form-control @error('blood_types') is-invalid @enderror" name="blood_types" required>
                                 @foreach(\App\Models\BloodType::all() as  $blood_type)
                                    <option value="{{$blood_type->id}}">{{$blood_type->name}}</option>
                                 @endforeach
                            </select>
                            @error('blood_types')
                                <span class="invalid-feedback" role="alert">
                                   <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="location">
                            <h3 class="text-capitalize text-center font-italic">location</h3>
                            <div class="form-group">
                                <label>@lang('site.governorates')</label>
                                <select name="governorates" id="gov" class="form-control">
                                    <option value=""> select your governorates</option>
                                    @foreach(\App\Models\Governorate::all() as $governorate)
                                        <option value="{{$governorate->id}}">{{$governorate->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group  d-none" id="city">
                                <label>@lang('site.cities')</label>
                                <select name="city" id="cities" class="form-control">
                                    <option value=""> select  your city</option>
                                </select>
                            </div>
                        </div>




                        <div class="form-group">
                            <label>تاريخ اخر تبرع</label>
                            <input type="date" name="dod" class="form-control @error('dod') is-invalid @enderror"   placeholder="تاريخ اخر تبرع" required />
                            @error('dod')
                            <span class="invalid-feedback" role="alert">
                                   <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <input id="password" value="{{old('password')}}" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="الرقم السري" />
                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <input id="password-confirm" value="{{old('password_confirmation')}}" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="تاكيد الرقم السري ">
                        </div>
                        <button type="submit" class="btn btn-success w-50 m-auto d-block">تسجيل</button>
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


