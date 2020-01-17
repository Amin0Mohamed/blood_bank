@extends('layouts.dashbord.app')
@section('content')
        <div class="container">
                <div class="row">
                {{--       new         --}}
                 <div class="card w-100 mt-3 rounded-lg" style="border: 2px solid #3bb7e1;">
                                <div class="card-header d-flex justify-content-between">
                                    <h3 class="card-title"> @lang('site.roles')</h3>
                                    <a href="{{route('dashboard.roles.create')}}" class="btn btn-primary add_btn ml-auto">
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
                                            <th>@lang('site.permissions')</th>
                                            <th>@lang('site.edit')</th>
                                            <th>@lang('site.delete')</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($roles as $role)
                                            <tr class="text-danger text-capitalize text-bold">
                                                <td>{{$role->id}}</td>
                                                <td>{{$role->name}} </td>
                                                <td>{{ str_replace(array('[',']','"'),'', $role->permissions()->pluck('name')) }}</td>
                                                <td>
                                                    <a class="btn btn-success" href="{{route('dashboard.roles.edit',['id'=> $role->id])}}"><i class="fa fa-edit fa-1x"></i></a>
                                                </td>
                                                <td>
                                                    <form action="{{route('dashboard.roles.destroy',[$role->id])}}" method="post" style="display: inline-block">
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

