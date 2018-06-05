@extends('adminlte::layouts.frontend') 

@section('page-title', 'Favicon Setup Example')
@section('page-subtitle', 'How to setup perfect favicons.')

{{-- Declare you section content --}}
@section('content')
  @component('adminlte::box')
    @slot('style', 'primary')
    @slot('title', 'Create your Favicons')
    @slot('body')
      <p>First you will need to head over to <a title="favicon-generator.org" href="https://www.favicon-generator.org/">favicon-generator.org</a></p>
      <p>Follow the image and design instructions to create the files needed</p>
      <p>After they are created, add the following line to your webpack.mix.js</p>
      <p><i>// Favicons</i> </p>
      <p><i>.copy('resources/assets/favicons/*', 'public/')</i> </p>
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