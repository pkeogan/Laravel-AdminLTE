<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <meta name="description" content="@yield('meta_description', 'Applcation Made By Peter Keogan')">
  <meta name="author" content="@yield('meta_author', 'Peter Keogan')">
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  @includeif('vendor.laravel-favicon.favicon')
  @yield('meta')
  
  <title>@yield('title', config('adminlte.title'))</title>
  
  @stack('before-styles')
  <!-- Import Styles -->
  @stack('styles')
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
<body class="hold-transition skin-hems layout-top-nav">
<!-- Site wrapper -->
<div class="wrapper">

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
		<div class="row">
			<center><h1>
				Hennepin EMS
				</h1>
				<h3>Account Setup</h3>
			</center>
		</div>
      <h1>
        @yield('page-title')
		  
        <small>@yield('page-subtitle')</small>
      </h1>
    </section>
  <!-- Main content -->
<section class="container">
   @include('adminlte::messages')
  @yield('content')

   </section>
  <!-- /.content -->
</div>
  <!-- /.content-wrapper -->

</div>
<!-- ./wrapper -->
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