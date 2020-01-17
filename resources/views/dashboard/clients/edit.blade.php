@extends('layouts.dashbord.app')

@section('content')

    <div class="box w-75 m-auto table-responsive card p-5">
        <form action="{{ route('dashboard.clients.update',[$client->id])}}" method="post" enctype="multipart/form-data">
                        {{method_field('PUT')}}
                        {{csrf_field()}}
                        <div class="form-group">
                            <label>@lang('site.name')</label>
                            <input type="text" name="name" class="form-control" value="{{ $client->name}}">
                        </div>

                        <div class="form-group">
                            <label>@lang('site.email')</label>
                            <input type="email" name="email" class="form-control" value="{{ $client->email }}">
                        </div>

                        <div class="form-group">
                            <label>@lang('site.password')</label>
                            <input type="password" name="password" class="form-control" value="{{ $client->password }}">
                        </div>
                        <div class="form-group">
                            <label>@lang('site.phone')</label>
                            <input type="text" name="phone" class="form-control" value="{{ $client->phone }}">
                        </div>
                        <div class="form-group">
                            <label>@lang('site.status')</label>
                            <input type="checkbox" data-id="{{ $client->id }}" name="status" class="js-switch" value="{{ $client->status }}" {{ $client->status == 1 ? 'checked' : '' }}>
                        </div>
                        <div class="form-group">
                            <label>@lang('site.date_of_birth')</label>
                            <input type="date" name="date_of_birth" class="form-control" value="{{ $client->date_of_birth }}">
                        </div>
                        <div class="form-group">
                            <label>@lang('site.last_donation_date')</label>
                            <input type="date" name="last_donation_date" class="form-control" value="{{ $client->last_donation_date }}">
                        </div>
                        <div class="location">
                            <h3 class="text-capitalize text-center font-italic">location</h3>
                            <div class="form-group">
                                <label>@lang('site.governorates')</label>
                                <select name="governorates" id="gov" class="form-control" value="{{ $client->governorates }}">
                                    <option value="">governorates select</option>
                                    @foreach($governorates as $governorate)
                                        <option value="{{$governorate->id}}">{{$governorate->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group" id="city">
                                <label>@lang('site.cities')</label>
                                <select name="city_id" id="cities" class="form-control" value="{{ $client->city_id }}">
                                    <option>Select cities</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label>@lang('site.blood_types')</label>
                            <select name="blood_types" class="form-control" value="{{ $client->blood_types }}">
                                <option value="">blood_types</option>
                                @foreach($blood_types as $blood_type)
                                    <option value="{{$blood_type->id}}">{{$blood_type->name}}</option>
                                @endforeach
                            </select>
                        </div>


                        <div class="form-group">
                            <label>@lang('site.pin_code')</label>
                            <input type="number" name="pin_code" class="form-control" value="{{ $client->pin_code }}">
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary"><i class="fa fa-plus"></i> @lang('site.add')</button>
                        </div>
                    </form>
    </div><!-- end of box body -->




@endsection
