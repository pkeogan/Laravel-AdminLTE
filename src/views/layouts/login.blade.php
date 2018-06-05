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
   
    <!-- Import Scripts (build in webpack.min.js -->
    <script src="https://code.jquery.com/jquery-3.3.0.min.js" integrity="sha256-RTQy8VOmNlT6b2PIRur37p6JEBZUE7o8wPgMvu18MC4=" crossorigin="anonymous"></script>
    @stack('scripts')
     {{ script('js/scripts.js') }}

<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' // optional
    });
  });
</script>
    @stack('after-scripts')
  
</body>

</html>