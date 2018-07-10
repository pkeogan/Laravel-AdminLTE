@extends('adminlte::layouts.frontend') 

@section('page-title', 'Callout Examples')
@section('page-subtitle', 'Callout Blade Directives')

@section('content')

    @row
      @col(4)
      @include('adminlte::examples.components.callout')
      @endcol
      @col(8)
        @markdownboxed(src/views/examples/components/callout.blade.php)
      @endcol
      @endrow
      @row
        @col(3)
          @component('adminlte::callout') @slot('type', 'danger') @slot('title', 'This is a danger callout') @slot('message', 'This is the message') @endcomponent
        @endcol
        @col(3)
          @component('adminlte::callout') @slot('type', 'warning') @slot('title', 'This is a warning callout') @slot('message', 'This is the message') @endcomponent
        @endcol
        @col(3)
          @component('adminlte::callout') @slot('type', 'info') @slot('title', 'This is a info callout') @slot('message', 'This is the message') @endcomponent
        @endcol
        @col(3)
          @component('adminlte::callout') @slot('type', 'success') @slot('title', 'This is a success callout') @slot('message', 'This is the message') @endcomponent
        @endcol
      @endrow
  
@endsection


