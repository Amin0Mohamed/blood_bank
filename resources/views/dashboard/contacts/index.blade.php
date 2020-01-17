@extends('layouts.dashbord.app')
@section('content')
        <div class="container">
                <div class="row">
                {{--       new         --}}
                 <div class="card w-100 mt-3 rounded-lg" style="border: 2px solid #3bb7e1;">
                                <div class="card-header d-flex justify-content-between">
                                    <h3 class="card-title"> @lang('site.contacts')</h3>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <table id="example1" class="table table-bordered table-striped text-center">
                                        <thead class="text-capitalize ">
                                        <tr>
                                            <th>id</th>
                                            <th>@lang('site.name')</th>
                                            <th>@lang('site.email')</th>
                                            <th>@lang('site.phone')</th>
                                            <th>@lang('site.subject')</th>
                                            <th>@lang('site.message')</th>
                                            <th>@lang('site.edit')</th>
                                            <th>@lang('site.delete')</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($contacts as $contact)

                                            <tr>
                                                <td>{{$loop->iteration}}</td>
                                                <td>{{$contact->name}} </td>
                                                <td>{{$contact->email}}</td>
                                                <td>{{$contact->phone}}</td>
                                                <td>{{$contact->subject}}</td>
                                                <td>{{$contact->message}}</td>
                                                <td>
                                                    <a class="btn btn-success" href="{{route('dashboard.contacts.edit',['id'=> $contact->id])}}"><i class="fa fa-edit fa-1x"></i></a>
                                                </td>
                                                <td>
                                                    <form action="{{route('dashboard.contacts.destroy',[$contact->id])}}" method="post" style="display: inline-block">
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

