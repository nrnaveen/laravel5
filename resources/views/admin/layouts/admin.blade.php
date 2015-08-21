<!DOCTYPE html>
<html class="no-js">
  <head>
    <meta charset="UTF-8">
    <title>Admin Admin</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <link href="{{ asset('admin_files/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('admin_files/css/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('admin_files/css/ionicons.min.css') }}" rel="stylesheet">
    <link href="{{ asset('admin_files/css/datepicker/datepicker3.css') }}" rel="stylesheet">
    <link href="{{ asset('admin_files/css/daterangepicker/daterangepicker-bs3.css') }}" rel="stylesheet">
    <link href="{{ asset('admin_files/css/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css') }}" rel="stylesheet">
    <link href="{{ asset('admin_files/css/AdminLTE.css') }}" rel="stylesheet">
    <script src="{{ asset('admin_files/js/jquery.min.js') }}"></script>
    @yield('header_scripts')
  </head>
  <body class="skin-blue">
    @include('admin.partials.header')
    <div class="wrapper row-offcanvas row-offcanvas-left">
      @include('admin.partials.sidebar')
      <aside class="right-side">
        @section('title')
          <section class="content-header">
            <h1>Dashboard<small>Control panel</small></h1>
            <ol class="breadcrumb">
              <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
              <li class="active">Dashboard</li>
            </ol>
          </section>
        @show
        <section class="content">
          @if(Session::has('message'))
            <div class="alert alert-success alert-dismissable">
              <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
              <b>Success</b> {{ Session::get('message') }}
            </div>
          @endif
          @if(Session::has('error'))
            <div class="alert alert-danger alert-dismissable">
              <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
              <b>Error</b> {{ Session::get('error') }}
            </div>
          @endif
          @yield('content')
        </section>
      </aside>
    </div> 
    @yield('script')
  </body>
</html>