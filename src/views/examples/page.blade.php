{{-- To create a page, first extended the page layout, 'layouts.frontend' or 'layouts.backend', or 'layouts.login'--}}
@extends('adminlte::layouts.frontend') 


@section('title', 'Page Example Title') {{-- Overides Default Title --}}
@section('meta_description', 'Page Description') {{-- Overides Default Meta Desciption --}}
@section('meta_author', 'A Different Author') {{-- Overides Default Meta Author --}}
@section('meta')  {{-- Adds Extra Meta Info (RAW HTML ONLY) --}}
<meta name="keywords" content="H TML,CSS,XML,JavaScript">
@endsection



{{-- Then Add the title or sub title, (these are not needed) --}}
@section('page-title', 'Page Example')
@section('page-subtitle', 'How to create a page, and change some features of it.')

{{-- Declare you section content --}}
@section('content')
  @component('adminlte::box')
    @slot('style', 'primary')
    @slot('title', 'Page Example')
    @slot('body')
      <p>This is an example of a page and how to setup a bassic page.</p>
        @component('adminlte::callout')
          @slot('type', 'info')
          @slot('title', 'Code')
          @slot('message')
            @markdown(src/views/examples/page.blade.php)
          @endslot
        @endcomponent
    @endslot
  @endcomponent
@endsection