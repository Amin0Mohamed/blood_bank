@extends('layouts.dashbord.app')
@section('content')
    <div class="container">
        <div class="row">
            {{--       new         --}}
            <div class="card w-100 mt-3 rounded-lg" style="border: 2px solid #3bb7e1;">
                <div class="card-header d-flex justify-content-between">
                    <h3 class="card-title"> @lang('site.clients')</h3>
                    {{--  <a href="{{route('dashboard.clients.create')}}" class="btn btn-primary add_btn ml-auto">
                        <i class="fa fa-plus"></i> @lang('site.add')
                    </a>  --}}
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="example1" class="table table-responsive table-bordered table-striped text-center">
                        <thead class="text-capitalize ">
                        <tr>
                            <th>id</th>
                            <th>@lang('site.name')</th>
                            <th>@lang('site.email')</th>
                            <th>@lang('site.phone')</th>
                            <th>@lang('site.status')</th>
                            <th>@lang('site.date_of_birth')</th>
                            <th>@lang('site.last_donation_date')</th>
                            <th>@lang('site.pin_code')</th>
{{--                            <th>@lang('site.edit')</th>--}}
                            <th>@lang('site.delete')</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($clients as $client)
                            <tr>
                                <td>{{$client->id}}</td>
                                <td>{{$client->name}} </td>
                                <td>{{$client->email}}</td>
                                <td>{{$client->phone}}</td>
                                <td>
                                    <input type="checkbox" data-id="{{ $client->id }}" name="status" class="js-switch" {{ $client->status == 1 ? 'checked' : '' }}>
                                </td>
                                <td>{{$client->date_of_birth}}</td>
                                <td>{{$client->last_donation_date}}</td>
                                <td>{{$client->pin_code}}</td>
{{--                                <td>--}}
{{--                                    <a class="btn btn-success" href="{{route('dashboard.clients.edit',['id'=> $client->id])}}"><i class="fa fa-edit fa-1x"></i></a>--}}
{{--                                </td>--}}
                                <td>
                                    <form action="{{route('dashboard.clients.destroy',[$client->id])}}" method="post" style="display: inline-block">
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
