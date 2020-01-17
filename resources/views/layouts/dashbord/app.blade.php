<!DOCTYPE html>
<html dir="{{ LaravelLocalization::getCurrentLocale() }}">
   <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
       <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>Admin</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
       @if(app()->getLocale() == 'ar')
           <!-- Font Awesome -->
               <link rel="stylesheet" href=" {{asset('dashboard/en/plugins/fontawesome-free/css/all.min.css')}}">
               <!-- Ionicons -->
               <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
               <!-- Theme style -->
               <link rel="stylesheet" href="{{ asset('dashboard/ar/dist/css/adminlte.min.css') }}">
               <!-- DataTables -->
               <link rel="stylesheet" href="{{ asset('dashboard/ar/plugins/datatables/dataTables.bootstrap4.css') }}">
               <link rel="stylesheet" href="{{ asset('dashboard/ar/plugins/datatables/jquery.dataTables.min.css') }}">
               <!-- iCheck -->
               <link rel="stylesheet" href="{{ asset('dashboard/ar/plugins/iCheck/flat/blue.css') }}">
               <!-- Morris chart -->
               <link rel="stylesheet" href="{{asset('dashboard/ar/plugins/morris/morris.css')}}">
               <!-- jvectormap -->
               <link rel="stylesheet" href="{{asset('dashboard/ar/plugins/jvectormap/jquery-jvectormap-1.2.2.css')}}">
               <!-- Date Picker -->
               <link rel="stylesheet" href="{{ asset('dashboard/ar/plugins/datepicker/datepicker3.css') }}">
               <!-- Daterange picker -->
               <link rel="stylesheet" href="{{ asset('dashboard/ar/plugins/daterangepicker/daterangepicker-bs3.css') }}">
               <!-- bootstrap wysihtml5 - text editor -->
               <link rel="stylesheet" href="{{ asset('dashboard/ar/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css') }}">
               <!-- Google Font: Source Sans Pro -->
               <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
               <!-- bootstrap rtl -->
               <link rel="stylesheet" href="{{ asset('dashboard/ar/dist/css/bootstrap-rtl.min.css') }}">
               <!-- template rtl version -->
               <link rel="stylesheet" href="{{ asset('dashboard/ar/dist/css/custom-style.css') }}">
               <link rel="stylesheet" href="{{asset('dashboard/en/plugins/overlayScrollbars/css/OverlayScrollbars.min.css')}}">

               <style>
               body , p,h1,h2,h3,h4,h5,h6{
                   font-family:'Cairo',sans-serif !important;
               }
               nav{direction: rtl;}
               .dropdown-menu-right {
                   right: auto;
                   left: 15px;
               }
                   .box-body{
                       position: relative;
                       right: 0%;
                   }
              .form-group [type='submit']{
                   margin-top: 15px;
               }
              .box-body [type=submit]{margin-top: 15px;}
               .box{position: relative;
                   left: 0%;}
                   .img-nav{direction: rtl;}
           </style>
       @else
           <!-- DataTables -->
               <link rel="stylesheet" href="{{ asset('dashboard/ar/plugins/datatables/dataTables.bootstrap4.css') }}">
               <link rel="stylesheet" href="{{ asset('dashboard/ar/plugins/datatables/jquery.dataTables.min.css') }}">
       <!-- Font Awesome -->
            <link rel="stylesheet" href=" {{asset('dashboard/en/plugins/fontawesome-free/css/all.min.css')}}">
            <!-- Ionicons -->
            <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
            <!-- Tempusdominus Bbootstrap 4 -->
            <link rel="stylesheet" href="{{asset('dashboard/en/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">
            <!-- iCheck -->
            <link rel="stylesheet" href="{{asset('dashboard/en/plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
            <!-- JQVMap -->
            <link rel="stylesheet" href="{{asset('dashboard/en/plugins/jqvmap/jqvmap.min.css')}}">
            <!-- Theme style -->
            <link rel="stylesheet" href="{{ asset('dashboard/en/dist/css/adminlte.min.css') }}">
            <!-- overlayScrollbars -->
            <link rel="stylesheet" href="{{asset('dashboard/en/plugins/overlayScrollbars/css/OverlayScrollbars.min.css')}}">
            <!-- Daterange picker -->
            <link rel="stylesheet" href="{{ asset('dashboard/en/plugins/daterangepicker/daterangepicker.css') }}">
            <!-- summernote -->
            <link rel="stylesheet" href="{{ asset('dashboard/en/plugins/summernote/summernote-bs4.css') }}">
            <!-- Google Font: Source Sans Pro -->
            <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
<style>
    .box-body{
        position: relative;
        left: 0%;
    }
    .form-group [type='submit']{
        margin-top: 15px;
    }
    .box{position: relative;
        right: 0%;}
</style>
               @endif
               <style>
                   .my{
                       width: 75%;
                       display: flex;
                       justify-content: flex-end;
                   }

                   .content{
                       padding: 28px;
                       margin-left: 5px;
                   }

               </style>

   {{--noty--}}
       <style>
           .location{
               border-radius: 5px;
               width: 84%;
               margin: auto;
               padding: 2rem;
               box-shadow: 2px 2px 3px 4px #ddd;
               background-color: #eee;
           }
       </style>
       {{--      noty confirm         --}}
   <link rel="stylesheet" href="{{ asset('dashboard/noty/noty.css') }}">
   <script src="{{ asset('dashboard/noty/noty.min.js') }}"></script>
{{--      switch toggle          --}}
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/switchery/0.8.2/switchery.min.css">

   <style>
       .activ{
           background-color: #f146ff;
           color:#fff;
           border-radius: 13px;
       }
   </style>
   </head>
   <body class="hold-transition sidebar-mini layout-fixed">
      <div class="wrapper">

        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
            </li>
        </ul>

        <!-- SEARCH FORM -->
        <form class="form-inline ml-3">
            <div class="input-group input-group-sm">
                <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-navbar" type="submit">
                        <i class="fas fa-search"></i>
                    </button>
                </div>
            </div>
        </form>

        <!-- Right navbar links -->

        <ul class="navbar-nav ml-auto my">
            <!-- Messages Dropdown Menu -->
            <li class="nav-item dropdown">
                <a class="nav-link" data-toggle="dropdown" href="#">
                    <i class="fa fa-language"></i>
                    <span class="badge badge-danger navbar-badge">3</span>
                </a>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                    <a href="#" class="dropdown-item">
                        <!-- Message Start -->
                        <div class="media">
                            <div class="media-body">
                                    @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                                            <a class="nav-link" rel="alternate" hreflang="{{ $localeCode }}" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                                                {{ $properties['native'] }}
                                            </a>
                                    @endforeach
                            </div>
                        </div>
                    </a>
                </div>
            </li>
            <!-- Notifications Dropdown Menu -->
            <li class="nav-item dropdown">
                <a class="nav-link" data-toggle="dropdown" href="#">
                    <i class="far fa-bell"></i>
                    <span class="badge badge-warning navbar-badge">15</span>
                </a>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                    <span class="dropdown-item dropdown-header">15 Notifications</span>
                    <div class="dropdown-divider"></div>
                    <a href="#" class="dropdown-item">
                        <i class="fas fa-envelope mr-2"></i> 4 new messages
                        <span class="float-right text-muted text-sm">3 mins</span>
                    </a>
                    <div class="dropdown-divider"></div>
                    <a href="#" class="dropdown-item">
                        <i class="fas fa-users mr-2"></i> 8 friend requests
                        <span class="float-right text-muted text-sm">12 hours</span>
                    </a>
                    <div class="dropdown-divider"></div>
                    <a href="#" class="dropdown-item">
                        <i class="fas fa-file mr-2"></i> 3 new reports
                        <span class="float-right text-muted text-sm">2 days</span>
                    </a>
                    <div class="dropdown-divider"></div>
                    <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
                </div>
            </li>
        </ul>
{{--            <div class="navbar-custom-menu">--}}

{{--            </div>--}}
         <ul class="navbar-nav ml-auto" style="width: 21%">
                <!-- Authentication Links -->
                @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
                @else
                     <li class="dropdown dropdown-user nav-item">
                         <a class="img-nav dropdown-toggle nav-link dropdown-user-link" href="#" data-toggle="dropdown" aria-expanded="false">
                             <span class="avatar avatar-online">
                                 <img class="img-circle elevation-2 h-100" src="{{ url('/') }}/productimages/{{ Auth::user()->image}}" alt="avatar">
                             </span>
                             <span class="user-name">{{ Auth::user()->name }}</span>
                         </a>
                         <div class="dropdown-menu dropdown-menu-right">
                             <a class="dropdown-item" href="{{route('dashboard.edit-profile',['id'=>Auth::user()->id])}}">
                                 <i class="fa fa-user-edit"></i> Edit Profile
                             </a>
                             <a class="dropdown-item" href="#">
                                 <i class="fa fa-envelope"></i> My Inbox
                             </a>
                             <div class="dropdown-divider"></div>
                             <a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                               document.getElementById('logout-form').submit();">
                                 <i class="fa fa-power-off"></i>
                                 {{ __('Logout') }}
                             </a>
                             <form id="logout-form" action="{{ route('user.logout') }}" method="POST" style="display: none;">
                                 @csrf
                             </form>
                         </div>
                     </li>
                @endguest
            </ul>
    </nav>

       @include('layouts.dashbord._aside')
        <div class="content-wrapper" style="background-color: #343a40;">
            @if(session()->has('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session()->get('success') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
              @include('partials.required_error')
               @yield('content')
        </div>


</div>
<!-- ./wrapper -->
@if(app()->getLocale() == 'ar' || app()->getLocale() == 'en' )

    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <!-- Bootstrap 4 -->
    <script src="{{asset('dashboard/ar/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <!-- Morris.js charts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
    <script src="{{ asset('dashboard/ar/plugins/morris/morris.min.js') }}"></script>
    <!-- Sparkline -->
    <script src="{{asset('dashboard/ar/plugins/sparkline/jquery.sparkline.min.js')}}"></script>
    <!-- jvectormap -->
    <script src="{{ asset('dashboard/ar/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js') }}"></script>
    <script src="{{ asset('dashboard/ar/plugins/jvectormap/jquery-jvectormap-world-mill-en.js') }}"></script>
    <!-- jQuery Knob Chart -->
    <script src="{{ asset('dashboard/ar/plugins/knob/jquery.knob.js') }}"></script>
    <!-- daterangepicker -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.2/moment.min.js"></script>
    <script src="{{ asset('dashboard/ar/plugins/daterangepicker/daterangepicker.js') }}"></script>
    <!-- datepicker -->
    <script src="{{ asset('dashboard/ar/plugins/datepicker/bootstrap-datepicker.js') }}"></script>
    <!-- Bootstrap WYSIHTML5 -->
    <script src="{{ asset('dashboard/ar/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js') }}"></script>
    <!-- Slimscroll -->
    <script src="{{ asset('dashboard/ar/plugins/slimScroll/jquery.slimscroll.min.js') }}"></script>
    <!-- FastClick -->
    <script src="{{ asset('dashboard/ar/plugins/fastclick/fastclick.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('dashboard/ar/dist/js/adminlte.js') }}"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="{{ asset('dashboard/ar/dist/js/pages/dashboard.js') }}"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="{{ asset('dashboard/ar/dist/js/demo.js') }}"></script>
    <script src="{{asset('dashboard/en/plugins/jquery/jquery.min.js')}}"></script>
{{--    <!-- jQuery UI 1.11.4 -->--}}

    <!-- Bootstrap 4 -->
    <script src="{{asset('dashboard/en/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <!-- ChartJS -->
    <script src="{{ asset('dashboard/en/plugins/chart.js/Chart.min.js') }}"></script>
    <!-- Sparkline -->
    <script src="{{ asset('dashboard/en/plugins/sparklines/sparkline.js') }}"></script>
    <!-- JQVMap -->
    <script src="{{ asset('dashboard/en/plugins/jqvmap/jquery.vmap.min.js') }}"></script>
    <script src="{{ asset('dashboard/en/plugins/jqvmap/maps/jquery.vmap.usa.js') }}"></script>
    <!-- jQuery Knob Chart -->
    <script src="{{asset('dashboard/en/plugins/moment/moment.min.js') }}"></script>
    <script src="{{ asset('dashboard/en/plugins/daterangepicker/daterangepicker.js') }}"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="{{ asset('dashboard/en/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>
{{--    <!-- Summernote -->--}}
    <script src="{{ asset('dashboard/en/plugins/summernote/summernote-bs4.min.js') }}"></script>
{{--    <!-- overlayScrollbars -->--}}
    <script src="{{ asset('dashboard/en/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
{{--    <!-- AdminLTE App -->--}}
    <script src="{{ asset('dashboard/en/dist/js/adminlte.js') }}"></script>
{{--    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->--}}
    <script src="{{ asset('dashboard/en/dist/js/pages/dashboard.js') }}"></script>
{{--    <!-- AdminLTE for demo purposes -->--}}
    <script src="{{ asset('dashboard/en/dist/js/demo.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.24.1/feather.min.js"></script>
    <script src="{{ asset('dashboard/en/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('dashboard/en/plugins/datatables/jquery.dataTables.js') }}"></script>

@endif
{{--  *************DATATABLES********    --}}
      <script>
          $(function () {
              $("#example1").DataTable({
                  "language": {
                      "paginate": {
                          "next": "@lang('site.next')",
                          "previous" : "@lang('site.prev')"
                      }
                  },
                  "info" : true,
                  "paging": true,
                  "lengthChange": true,
                  "searching": true,
                  "ordering": true,
                  "autoWidth": true
              });
          });
      </script>
<!-- NOTY jQuery -->
      <script>
          $(document).ready(function () {
//delete
              $('.delete').click(function (e) {
                  var that = $(this)
                  e.preventDefault();
                  var n = new Noty({
                      text: "@lang('site.confirm_delete')",
                      type: "warning",
                      killer: true,
                      buttons: [
                          Noty.button("@lang('site.yes')", 'btn btn-success mr-2', function () {
                              that.closest('form').submit();
                          }),
                          Noty.button("@lang('site.no')", 'btn btn-primary mr-2', function () {
                              n.close();
                          })
                      ]
                  });
                  n.show();
              });//end of delete
              CKEDITOR.config.language =  "{{ app()->getLocale() }}";
          });//end of ready
      </script>

      <script>
          $('#gov').change(function(){
              document.getElementById("city").classList.remove('d-none');
              var gid = $(this).val();
              if(gid){
                  $.ajax({
                      type:"post",
                      url:"{{url('dashboard/city')}}/"+gid,
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
{{--select all checkbox--}}
      <script>
          $("#select-all").click(function(){
              $("input[type=checkbox]").prop('checked', $(this).prop('checked'));
          });
      </script>

{{--   switch toggle--}}
      <script src="https://cdnjs.cloudflare.com/ajax/libs/switchery/0.8.2/switchery.min.js"></script>
      <script>
          let elems = Array.prototype.slice.call(document.querySelectorAll('.js-switch'));

          elems.forEach(function(html) {
              let switchery = new Switchery(html,  { size: 'small' });
          });

          $(document).ready(function(){
              $('.js-switch').change(function () {
                  let status = $(this).prop('checked') === true ? 1 : 0;
                  let userId = $(this).data('id');
                  $.ajax({
                      type: "GET",
                      dataType: "json",
                      url: '{{ route('dashboard.status') }}',
                      data: {'status': status, 'user_id': userId},
                      success: function (data) {
                          console.log(data.message);
                      }
                  });
              });
          });
      </script>

   </body>
</html>

