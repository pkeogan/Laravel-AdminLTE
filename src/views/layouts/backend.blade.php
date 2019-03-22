@include('alpacajs::imports')
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
	@stack('styles')

	{{ style(mix('css/style.css')) }}
	{{ script(mix('js/scripts-header.js')) }}

  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs/jszip-2.5.0/dt-1.10.18/af-2.3.0/b-1.5.2/b-colvis-1.5.2/b-flash-1.5.2/b-html5-1.5.2/b-print-1.5.2/cr-1.5.0/fc-3.2.5/fh-3.1.4/kt-2.4.0/r-2.2.2/rg-1.0.3/rr-1.2.4/sc-1.5.0/sl-1.2.6/datatables.min.css"/>
     @stack('afterstyles')
@include('adminlte::ga', ['code' => config('analytics.backend')])
	</head>
<body class="hold-transition skin-hems sidebar-mini">
<script>if(Cookies.get('sidebar-collapsed')==="true"){document.body.classList.add("sidebar-collapse");}</script>
	
<!-- Site wrapper -->
<div class="wrapper">

  @include('backend.includes.header')
  @include('backend.includes.sidebar')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
	  <div class="animsition">
	
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        @yield('page-title')
		  
        <small>@yield('page-subtitle')</small>
      </h1>
       {{-- @yield('breadcrumbs', view('adminlte::breadcrumbs')) --}}
    </section>
  <!-- Main content -->
<section class="content">
   @include('adminlte::messages')
		@if(env('GLOBAL_MESSAGE', 'false') != 'false')
	  <div class="alert alert-warning ">
		<h4><i class="icon fa fa-warning"></i> {{env('GLOBAL_MESSAGE_TITLE', 'Site Wide Message')}} </h4>
		{{env('GLOBAL_MESSAGE', 'Message')}}
	  </div>
	@endif
  @yield('content')

   </section>
		  </div>
	  </div>
  <!-- /.content-wrapper -->
  @include('backend.includes.footer')
  @include('backend.includes.aside')
	  		  
	 
</div>
<!-- ./wrapper -->
  @stack('before-scripts')
    @stack('beforescripts')
 <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
		
    @stack('scripts')
<!-- Import Scripts (build in webpack.min.js -->
         <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
         <script type="text/javascript" src="https://cdn.datatables.net/v/bs/jszip-2.5.0/dt-1.10.18/af-2.3.0/b-1.5.2/b-colvis-1.5.2/b-flash-1.5.2/b-html5-1.5.2/b-print-1.5.2/cr-1.5.0/fc-3.2.5/fh-3.1.4/kt-2.4.0/r-2.2.2/rg-1.0.3/rr-1.2.4/sc-1.5.0/sl-1.2.6/datatables.min.js"></script>
	    {{ script(mix('js/scripts.js')) }}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.min.js" integrity="sha256-oSgtFCCmHWRPQ/JmR4OoZ3Xke1Pw4v50uh6pLcu+fIc=" crossorigin="anonymous"></script>
		<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/bootbox.js/4.4.0/bootbox.min.js" integrity="sha256-4F7e4JsAJyLUdpP7Q8Sah866jCOhv72zU5E8lIRER4w=" crossorigin="anonymous"></script>

    @stack('after-scripts')
     @stack('afterscripts')
	
  <script>
   $(document).ready(function() {

     
   window.pageUUID = "{{ Webpatser\Uuid\Uuid::generate()->string }}";
	      
		$.ajaxSetup({
			headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
        'PAGE-UUID':window.pageUUID
			}
		});
     
     alertify.set('notifier','position', 'top-right');

		   
		$(document).on("click", "[data-confirm-link]", function(event) {
			var link = $(this).attr('data-confirm-link');
			var title = $(this).attr('title');
			bootbox.confirm({
    			message: title + " - Are you sure you want to do this?",
				backdrop: true,
				buttons: {
					confirm: {
						label: '<i class="fal fa-check"></i> Yes',
						className: 'pull-right btn-danger'
					},
					cancel: {
						label: '<i class="fal fa-times"></i> Cancel',
						className: 'pull-left btn-default'
					}
				},
    			callback: function (result) {
        			if(result){window.location.href=link;}
    }
	});
});
       });
	  
     $(document).ready(function() {
		 $(document).pullNotifcations();
        @stack('scriptsdocumentready')
		 
       });
  </script>

</body>

</html>