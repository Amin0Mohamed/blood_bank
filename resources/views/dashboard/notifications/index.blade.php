@extends('layouts.dashbord.app')
@section('content')
        <div class="container">
                <div class="row">
                {{--       new         --}}
                 <div class="card w-100 mt-3 rounded-lg" style="border: 2px solid #3bb7e1;">
                                <div class="card-header d-flex justify-content-between">
                                    <h3 class="card-title"> @lang('site.notifications')</h3>
{{--                                    <a href="{{route('dashboard.notifications.create')}}" class="btn btn-primary add_btn ml-auto">--}}
{{--                                        <i class="fa fa-plus"></i> @lang('site.add')--}}
{{--                                    </a>--}}
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <table id="example1" class="table table-bordered table-striped text-center">
                                        <thead class="text-capitalize ">
                                        <tr>
                                            <th>id</th>
                                            <th>@lang('site.title')</th>
                                            <th>@lang('site.content')</th>
                                            <th>@lang('site.donation_request_id')</th>
                                            <th>@lang('site.delete')</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($notifications as $notification)

                                            <tr>
                                                <td>{{$loop->iteration}}</td>
                                                <td>{{$notification->title}} </td>
                                                <td>{{$notification->content}}</td>
                                                <td>
                                                    {{\App\Models\DonationRequest::where('id',$notification->donation_request_id)->pluck('patient_name')->first()}}
                                                </td>
                                                <td>
                                                    <form action="{{route('dashboard.notifications.destroy',[$notification->id])}}" method="post" style="display: inline-block">
                                                        {{csrf_field()}}
                                                        {{method_field('delete')}}
                                                        <button type="submit" class="delete btn btn-danger"><i class="fa fa-trash fa-1x"></i></button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                            </tbody>
                                    </table>
                                </div>
                                <!-- /.card-body -->
                            </div>

                </div><!-- end of row -->
        </div>
@endsection

