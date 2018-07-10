@extends('adminlte::layouts.frontend') 

@section('page-title', 'Markdown Example')
@section('page-subtitle', 'How to use the markdown directive.')

{{-- Declare you section content --}}
@section('content')
  @component('adminlte::box')
    @slot('style', 'primary')
    @slot('title', 'Markdown Code')
    @slot('body')
      <p>This is an example of how to use the markdown blade directive</p>
      <p> The file that adds the ability is located in <b>LaravelAdminLTEServiceProvider.php</b> </p>
        @component('adminlte::callout')
          @slot('type', 'info')
          @slot('title', 'Code')
          @slot('message')
            @markdown(src/views/examples/components/markdown.blade.php)
          @endslot
        @endcomponent
    @endslot
  @endcomponent
@endsection