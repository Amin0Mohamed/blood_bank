

<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class=" mt-2 pb-3 mb-1" style="max-width: 100%;">
            <div class="image" style="width: 50%;margin: auto;margin-bottom: 10px;">
                <img src="{{ url('/') }}/productimages/{{ Auth::user()->image}}" class="img-circle elevation-2 w-100 h-100" alt="User Image">
            </div>
            <div class="info font-weight-bold font-size-4 text-capitalize text-center" style="width:90%;margin: auto">
                @guest
                    <a class="d-block">no login</a>
                @else
                    <a href="{{ route('dashboard.index') }}" class="d-block">{{auth()->user()->name}}</a>
                @endguest

            </div>
        </div>
        <hr style="width: 50%;display: block;margin: auto;height: 3px;background-color: #09c"/>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

            @if(auth()->user()->hasRole('super_admin'))
                    <li class="nav-item"><a  class="nav-link activ text-center text-uppercase font-weight-bold"><p>Admin</p></a></li>
            @elseif(auth()->user()->hasRole('sub_admin'))
                    <li class="nav-item"><a  class="nav-link activ text-center text-uppercase font-weight-bold"><p>Sub Admin</p></a></li>
            @endif

{{--*****************************body of aside********************************************************--}}
        @auth
{{--            @if(auth()->user()->hasRole('super_admin'))--}}
                        {{--*************users***********************--}}
                            <li class="nav-item">
                                <a href="{{ route('dashboard.users.index')}}" class="nav-link">
                                    <i class="fa fa-user"></i>
                                    <p>@lang('site.users')</p>
                                </a>
                            </li>
                    {{--*************settings***********************--}}
                            <li class="nav-item has-treeview">
                                <a href="#" class="nav-link {{ is_active('settings') }}">
                                    <i class="fa fa-align-justify "></i>
                                    <p>
                                        @lang('site.settings')
                                        <i class="fas fa-angle-right right"></i>
                                        <span class="badge badge-info right">1</span>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item ">
                                        <a href="{{ route('dashboard.settings.index')}}" class="nav-link">
                                            <i class="fa fa-cogs fa-spin "></i>
                                            <p>@lang('site.settings')</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                    {{--*************Powers ***********************--}}
                            <li class="nav-item has-treeview">
                                <a href="#" class="nav-link {{ is_active('roles') }} {{ is_active('permissions') }}">
                                    <i class="fa fa-align-justify"></i>
                                    <p>
                                        @lang('site.user_power')
                                        <i class="fas fa-angle-right right"></i>
                                        <span class="badge badge-info right">2</span>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="{{ route('dashboard.roles.index')}}" class="nav-link">
                                            <i class="fa fa-circle nav-icon fa-spin"></i>
                                            <p>@lang('site.roles')</p>
                                        </a>
                                    </li>

                                    <li class="nav-item">
                                        <a href="{{ route('dashboard.permissions.index')}}" class="nav-link">
                                            <i class="fa fa-circle nav-icon fa-spin"></i>
                                            <p>@lang('site.permissions')</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>
{{--            @endif--}}
         {{--*************pages***********************--}}
                    <li class="nav-item has-treeview">
                        <a href="#" class="nav-link">
                            <i class="fa fa-align-justify"></i>
                            <p>
                                @lang('site.pages')
                                <i class="fas fa-angle-right right"></i>
                                <span class="badge badge-info right">7</span>
                            </p>
                        </a>
                  {{--  ******************clients**************   --}}
                        <ul class="nav nav-treeview">
                            <li class="nav-item {{ is_active('clients') }}">
                                <a href="{{ route('dashboard.clients.index')}}" class="nav-link">
                                    <i class="fa fa-users "></i>
                                    <p>@lang('site.clients')</p>
                                </a>
                            </li>
                        </ul>
                        {{--   ***posts****   --}}
                        <ul class="nav nav-treeview">
                            <li class="nav-item {{ is_active('categories') }}">
                                <a href="{{ route('dashboard.categories.index')}}" class="nav-link">
                                    <i class="fa fa-plane-departure"></i>
                                    <p>@lang('site.categories')</p>
                                </a>
                            </li>
                        </ul>
               {{--   ***posts****   --}}
                        <ul class="nav nav-treeview">
                            <li class="nav-item {{ is_active('posts') }}">
                                <a href="{{ route('dashboard.posts.index')}}" class="nav-link">
                                    <i class="fa fa-poo-storm "></i>
                                    <p>@lang('site.posts')</p>
                                </a>
                            </li>
                        </ul>
               {{--   ***governorates****   --}}
                        <ul class="nav nav-treeview">
                            <li class="nav-item {{ is_active('governorates') }}">
                                <a href="{{ route('dashboard.governorates.index')}}" class="nav-link">
                                    <i class="fa fa-elementor"></i>
                                    <p>@lang('site.governorates')</p>
                                </a>
                            </li>
                        </ul>
                        {{--   ***cities****   --}}
                        <ul class="nav nav-treeview">
                            <li class="nav-item {{ is_active('cities') }}">
                                <a href="{{ route('dashboard.cities.index')}}" class="nav-link">
                                    <i class="fa fa-city"></i>
                                    <p>@lang('site.cities')</p>
                                </a>
                            </li>
                        </ul>
                        {{--   ***donation request****   --}}
                        <ul class="nav nav-treeview">
                            <li class="nav-item {{ is_active('donation-requests') }}">
                                <a href="{{ route('dashboard.donation-requests.index')}}" class="nav-link">
                                    <i class="fa fa-city"></i>
                                    <p>@lang('site.donation-requests')</p>
                                </a>
                            </li>
                        </ul>
                        {{--   ***contacts****   --}}
                        <ul class="nav nav-treeview">
                            <li class="nav-item {{ is_active('contacts') }}">
                                <a href="{{ route('dashboard.contacts.index')}}" class="nav-link">
                                    <i class="fa fa-phone"></i>
                                    <p>@lang('site.contacts')</p>
                                </a>
                            </li>
                        </ul>
                        {{--   ***notifications****   --}}
                        <ul class="nav nav-treeview">
                            <li class="nav-item {{ is_active('notifications') }}">
                                <a href="{{ route('dashboard.notifications.index')}}" class="nav-link">
                                    <i class="fa fa-bell"></i>
                                    <p>@lang('site.notifications')</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
        @endauth
        </nav>
    </div>
</aside>
