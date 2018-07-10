<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <meta name="description" content="@yield('meta_description', config('adminlte.meta.description'))">
  <meta name="author" content="@yield('meta_author', config('adminlte.meta.author'))">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  @includeIf(config('adminlte.favicons'))

  
  @yield('meta')
  <title>@yield('title', config('adminlte.title'))</title>
  
  @stack('before-styles')
  @stack('styles')
  <!-- Import CSS Styles (From Webpack.mix.js) -->
  {{ style('css/style.css') }}

<style>
	/*
 * Start Bootstrap - Landing Page (http://startbootstrap.com/)
 * Copyright 2013-2016 Start Bootstrap
 * Licensed under MIT (https://github.com/BlackrockDigital/startbootstrap/blob/gh-pages/LICENSE)
 */
	
 .row-full{
 width: 100vw;
 position: relative;
 margin-left: -50vw;
 height: 100px;
 margin-top: 100px;
 left: 50%;
}
	
body,
html {
    width: 100%;
    height: 100%;
}

.topnav {
    font-size: 14px; 
}

.lead {
    font-size: 18px;
    font-weight: 400;
}

.intro-header {
    padding-top: 50px; /* If you're making other pages, make sure there is 50px of padding to make sure the navbar doesn't overlap content! */
    padding-bottom: 50px;
    text-align: center;
    color: #f8f8f8;
    background: url(../img/front-image.jpg) no-repeat center center;
    background-size: cover;
}

.intro-message {
    position: relative;
    padding-top: 20%;
    padding-bottom: 20%;
}

.intro-message > h1 {
    margin: 0;
    text-shadow: 2px 2px 3px rgba(0,0,0,0.6);
    font-size: 5em;
}

.intro-divider {
    width: 400px;
    border-top: 1px solid #f8f8f8;
    border-bottom: 1px solid rgba(0,0,0,0.2);
}

.intro-message > h3 {
    text-shadow: 2px 2px 3px rgba(0,0,0,0.6);
}

@media(max-width:767px) {
    .intro-message {
        padding-bottom: 15%;
    }

    .intro-message > h1 {
        font-size: 3em;
    }

    ul.intro-social-buttons > li {
        display: block;
        margin-bottom: 20px;
        padding: 0;
    }

    ul.intro-social-buttons > li:last-child {
        margin-bottom: 0;
    }

    .intro-divider {
        width: 100%;
    }
}

.network-name {
    text-transform: uppercase;
    font-size: 14px;
    font-weight: 400;
    letter-spacing: 2px;
}

.content-section-a {
    padding: 50px 0;
    background-color: #f8f8f8;
}

.content-section-b {
    padding: 50px 0;
    border-top: 1px solid #e7e7e7;
    border-bottom: 1px solid #e7e7e7;
}

.section-heading {
    margin-bottom: 30px;
}

.section-heading-spacer {
    float: left;
    width: 200px;
    border-top: 3px solid #e7e7e7;
}

.banner {
    padding: 100px 0;
    color: #f8f8f8;
    background: url(../img/banner.jpg) no-repeat center center;
    background-size: cover;
}

.banner h2 {
    margin: 0;
    text-shadow: 2px 2px 3px rgba(0,0,0,0.6);
    font-size: 3em;
}

.banner ul {
    margin-bottom: 0;
}

.banner-social-buttons {
    float: right;
    margin-top: 0;
}

@media(max-width:1199px) {
    ul.banner-social-buttons {
        float: left;
        margin-top: 15px;
    }
}

@media(max-width:767px) {
    .banner h2 {
        margin: 0;
        text-shadow: 2px 2px 3px rgba(0,0,0,0.6);
        font-size: 3em;
    }

    ul.banner-social-buttons > li {
        display: block;
        margin-bottom: 20px;
        padding: 0;
    }

    ul.banner-social-buttons > li:last-child {
        margin-bottom: 0;
    }
}

footer {
    padding: 50px 0;
    background-color: #f8f8f8;
}

p.copyright {
    margin: 15px 0 0;
}
	
	.nopadding {
   padding: 0 !important;
   margin: 0 !important;
}
	</style>
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic"> 
  @stack('after-styles')
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">


</head>
<!-- ADD THE CLASS layout-top-nav TO REMOVE THE SIDEBAR. -->

<body class="hold-transition skin-hems layout-top-nav">
  <div class="wrapper">

    @includeIf(config('adminlte.frontend.nav'))
    <div class="content-wrapper">
   @if(isset($removeHeader) && !$removeHeader)
        <!-- Content Header (Page header) -->
      <section class="content-header">
        <h1>
          @yield('page-title')
          <small>@yield('page-subtitle')</small>
        </h1>
          @yield('breadcrumbs', view('adminlte::breadcrumbs'))
      </section>
		@endif
        <!-- Main content -->
        <section class="content nopadding">
            @include('adminlte::messages')
    
              @yield('content')
        </section>
        <!-- /.content -->
  
      <!-- /.container -->
    </div>
    <!-- /.content-wrapper -->
    @includeIf(config('adminlte.footer'))
  </div>
  <!-- ./wrapper -->
    
  <script src="https://code.jquery.com/jquery-3.3.0.min.js" integrity="sha256-RTQy8VOmNlT6b2PIRur37p6JEBZUE7o8wPgMvu18MC4=" crossorigin="anonymous"></script>

    @stack('before-scripts')
    
    @stack('scripts')
  

    {{ script('js/scripts.js') }}

    @stack('after-scripts')
  
</body>

</html>