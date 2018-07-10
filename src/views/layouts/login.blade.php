<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <meta name="description" content="@yield('meta_description', 'Applcation Made By Peter Keogan')">
  <meta name="author" content="@yield('meta_author', 'Peter Keogan')">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
   @includeIf(config('adminlte.favicons'))
  
  @yield('meta')
    <title>@yield('title', config('adminlte.title'))</title>
  @stack('before-styles')
  @stack('styles')
  <!-- Import Styles -->
  {{ style('css/style.css') }}

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic"> 
   @stack('after-styles')
     @stack('afterstyles')
</head>
<!-- ADD THE CLASS layout-top-nav TO REMOVE THE SIDEBAR. -->

<body class="hold-transition login-page">
  <div class="login-box">
  <div class="login-logo">
    <a href="{{ route('frontend.index')}}"><b>Hennepin</b> EMS</a>
  </div>
  <!-- /.login-logo -->
    @include('adminlte::messages')
    @yield('content')
      </div>
  <!-- /.login-box-body -->
  </br>
      <p class="login-box-msg"> PLASMA <a href="{{ config('plasma.link') }}">Verison {{ config('plasma.verison')}} </a></p>
</div>
<!-- /.login-box -->
    
 @stack('before-scripts')
    @stack('beforescripts')
 <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>

    @stack('scripts')
<!-- Import Scripts (build in webpack.min.js -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/pdfmake.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/vfs_fonts.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/v/bs/jszip-2.5.0/dt-1.10.16/b-1.5.1/b-colvis-1.5.1/b-flash-1.5.1/b-html5-1.5.1/b-print-1.5.1/r-2.2.1/datatables.min.js"></script>
  {{ script('js/scripts.js') }}
<script>
  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });
</script>
    @stack('after-scripts')
     @stack('afterscripts')
  <script>
     $(document).ready(function() {
        @stack('scriptsdocumentready')
       });
  </script>
  
</body>

</html>