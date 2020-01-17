@extends('layouts.dashbord.app')
@section('content')
        <div class="container">
                <div class="row">
                {{--       new         --}}
                 <div class="card w-100 mt-3 rounded-lg" style="border: 2px solid #3bb7e1;">
                                <div class="card-header d-flex justify-content-between">
                                    <h3 class="card-title"> @lang('site.users')</h3>
                                    <a href="{{route('dashboard.users.create')}}" class="btn btn-primary add_btn ml-auto">
                                        <i class="fa fa-plus"></i> @lang('site.add')
                                    </a>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <table id="example1" class="table table-bordered table-striped text-center">
                                        <thead class="text-capitalize ">
                                        <tr>
                                            <th>id</th>
                                            <th>@lang('site.name')</th>
                                            <th>@lang('site.email')</th>
                                            <th>@lang('site.image')</th>
                                            <th>@lang('site.user_roles')</th>
                                            <th>@lang('site.edit')</th>
                                            <th>@lang('site.delete')</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($users as $user)

                                            <tr>
                                                <td>{{$user->id}}</td>
                                                <td>{{$user->name}} </td>
                                                <td>{{$user->email}}</td>
                                                <td>{{$user->image}}</td>
                                                <td>{{  $user->roles()->pluck('name')->implode(' , ') }}</td>
                                                @role('super_admin')
                                                    <td>
                                                        <a class="btn btn-success" href="{{route('dashboard.users.edit',['id'=> $user->id])}}"><i class="fa fa-edit fa-1x"></i></a>
                                                    </td>
                                                    <td>
                                                        <form action="{{route('dashboard.users.destroy',[$user->id])}}" method="post" style="display: inline-block">
                                                            {{csrf_field()}}
                                                            {{method_field('delete')}}
                                                            <button type="submit" class="delete btn btn-danger"><i class="fa fa-trash fa-1x"></i></button>
                                                        </form>
                                                    </td>
                                                @endrole

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

