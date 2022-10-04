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

    @livewireStyles
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
       <ol class="breadcrumb">
         <li class="active"  id="page-status"><span id="page-status-reason">Page was loaded at:</span> <span id="page-status-time" data-datetime="{{\Carbon\Carbon::now()->toIso8601String()}}"> {{ \Carbon\Carbon::now()->format('H:i') }}</span></li>
      </ol>
    </section>
      
      
      
  <!-- Main content -->
<section class="content">
  
  @if( isset($_SERVER['HTTP_USER_AGENT']) &&  (strpos($_SERVER['HTTP_USER_AGENT'], 'MSIE') !== false) || (strpos($_SERVER['HTTP_USER_AGENT'], 'Trident')))
  <div class="callout callout-danger">
                <h4>Internet Explorer Detected</h4>

                <p>Internet Explorer is not a supported web browser. If you are using internet explorer on this website, you will have issues. Please use a modern web browser such as Microsoft Edge, Google Chrome, Firefox and Safari. Internet Explorer is an unsafe web browser that is no longer supported by Microsoft. If you continue to use Internet Explorer you will be unable to use features on this website. </p>
              </div>
  @endif
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
	  		  
	 @include('adminlte::chat')
</div>
<!-- ./wrapper -->
@livewireScripts
  @stack('before-scripts')
    @stack('beforescripts')
 <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
		
    @stack('scripts')
<!-- Import Scripts (build in webpack.min.js -->
         <script type="text/javascript" src="https://cdn.datatables.net/v/bs/jszip-2.5.0/dt-1.10.18/af-2.3.0/b-1.5.2/b-colvis-1.5.2/b-flash-1.5.2/b-html5-1.5.2/b-print-1.5.2/cr-1.5.0/fc-3.2.5/fh-3.1.4/kt-2.4.0/r-2.2.2/rg-1.0.3/rr-1.2.4/sc-1.5.0/sl-1.2.6/datatables.min.js"></script>
	    {{ script(mix('js/scripts.js')) }}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.min.js" integrity="sha256-oSgtFCCmHWRPQ/JmR4OoZ3Xke1Pw4v50uh6pLcu+fIc=" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/bootbox.js/4.4.0/bootbox.min.js" integrity="sha256-4F7e4JsAJyLUdpP7Q8Sah866jCOhv72zU5E8lIRER4w=" crossorigin="anonymous"></script>

    @stack('after-scripts')
     @stack('afterscripts')
	
  <script>
    
   $(document).ready(function() {
     
   window.pageUUID = "{{ Webpatser\Uuid\Uuid::generate()->string }}";
    window.authUserUUID = "{{ auth()->user()->uuid }}";
   
	      
		$.ajaxSetup({
			headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
        'PAGE-UUID':window.pageUUID
			}
		});
     
     alertify.set('notifier','position', 'top-right');

		   
		$(document).on("click", "[data-confirm-link]", function(event) {
      
			var link = $(this).attr('data-confirm-link');
      
             if( $(this).attr('data-confirm-button-text') != null){
         var confirmButtonText = $(this).attr('data-confirm-button-text');
      } else {
         var confirmButtonText = 'Yes I am sure';
      }
      
      
       if( $(this).attr('data-confirm-title') != null){
         var confirmTitle = $(this).attr('data-confirm-title');
      } else {
         var confirmTitle = 'Are you sure?';
      }
      
     
     if( $(this).attr('data-confirm-text') != null){
         var confirmText = $(this).attr('data-confirm-text');
      } else {
         var confirmText = 'You will not be able to revert this!';
      }
      
      if( $(this).attr('data-confirm-type') != null){
         var confirmType = $(this).attr('data-confirm-type');
      } else {
         var confirmType = 'warning';
      }
      
      Swal({
            title: confirmTitle,
            text: confirmText,
            type: confirmType,
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: confirmButtonText
          }).then((result) => {
            if (result.value) {
              window.location.href=link;
            }
          })
      
      
      

});
     
     
     
     
     
     //page status checker
window.setInterval(function(){
            if(!$().pageStatusUpdateTime()){
              clearInterval()
            }
}, 10000);
       });
    

    
	  
     $(document).ready(function() {
       
		 window.Echo.channel('user.'+window.authUserUUID)
        .listen('.NotificationAdded', (e) => {
              $().refreshNotifications();
              $().playTheSounds();

              favicon.badge(3);
            
        });

       
        @stack('scriptsdocumentready')
       
       
	 
       });
  </script>

</body>

</html>