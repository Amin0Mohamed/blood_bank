@extends('layouts.dashbord.app')
@section('content')
        <div class="container">
                <div class="row">
                {{--       new         --}}
                 <div class="card w-100 mt-3 rounded-lg" style="border: 2px solid #3bb7e1;">
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <div id="example1_wrapper" class="dataTables_wrapper no-footer overflow-auto">
                                        <table id="example1" class="table-bordered table-striped text-center">
                                            <thead class="text-capitalize ">
                                            <tr>
                                                <th>id</th>
                                                <th>@lang('site.patient_name')</th>
                                                <th>@lang('site.patient_age')</th>
                                                <th>@lang('site.bags_num')</th>
                                                <th>@lang('site.hospital_name')</th>
                                                <th>@lang('site.hospital_address')</th>
                                                <th>@lang('site.phone')</th>
                                                <th>@lang('site.notes')</th>
                                                <th>@lang('site.longitude')</th>
                                                <th>@lang('site.latitude')</th>
                                                <th>@lang('site.blood_type_id')</th>
                                                <th>@lang('site.city_id')</th>
                                                <th>@lang('site.client_id')</th>
                                                {{--                                            <th>@lang('site.edit')</th>--}}
                                                {{--                                            <th>@lang('site.delete')</th>--}}
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($d_requestes as $d_requeste)
                                                <tr>
                                                    <td>{{$d_requeste->id}}</td>
                                                    <td>{{$d_requeste->patient_name}} </td>
                                                    <td>{{$d_requeste->patient_age}}</td>
                                                    <td>{{$d_requeste->bags_num}}</td>
                                                    <td>{{$d_requeste->hospital_name}}</td>
                                                    <td>{{$d_requeste->hospital_address}}</td>
                                                    <td>{{$d_requeste->phone}}</td>
                                                    <td>{{$d_requeste->notes}}</td>
                                                    <td>{{$d_requeste->longitude}}</td>
                                                    <td>{{$d_requeste->latitude}}</td>
                                                    <td>
                                                        {{\App\Models\BloodType::where('id',$d_requeste->blood_type_id)->pluck('name')->first()}}
                                                    </td>
                                                    <td>
                                                        {{\App\Models\City::where('id',$d_requeste->city_id)->pluck('name')->first()}}
                                                    </td>
                                                    <td>
                                                        {{\App\Models\Client::where('id',$d_requeste->client_id)->pluck('name')->first()}}
                                                    </td>

                                                    {{--                                                    <td>--}}
                                                    {{--                                                        <a class="btn btn-success" href="{{route('dashboard.users.edit',['id'=> $user->id])}}"><i class="fa fa-edit fa-1x"></i></a>--}}
                                                    {{--                                                    </td>--}}
                                                    {{--                                                    <td>--}}
                                                    {{--                                                        <form action="{{route('dashboard.users.destroy',[$user->id])}}" method="post" style="display: inline-block">--}}
                                                    {{--                                                            {{csrf_field()}}--}}
                                                    {{--                                                            {{method_field('delete')}}--}}
                                                    {{--                                                            <button type="submit" class="delete btn btn-danger"><i class="fa fa-trash fa-1x"></i></button>--}}
                                                    {{--                                                        </form>--}}
                                                    {{--                                                    </td>--}}

                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <!-- /.card-body -->
                            </div>

                </div><!-- end of row -->
        </div>
@endsection

