@extends('adminlte::layouts.frontend') 

@section('page-title', 'Alert Examples')
@section('page-subtitle', 'Alert Blade Directives')

@section('content')

    @row
      @col(4)
      @include('adminlte::examples.components.alert')
      @endcol
      @col(8)
        @markdownboxed(src/views/examples/components/alert.blade.php)
      @endcol
      @endrow
      @row
        @col(3)
          @component('adminlte::alert') @slot('type', 'danger') @slot('title', 'This is a danger alert') @slot('message', 'This is the message') @endcomponent
        @endcol
        @col(3)
          @component('adminlte::alert') @slot('type', 'warning') @slot('title', 'This is a warning alert') @slot('message', 'This is the message') @endcomponent
        @endcol
        @col(3)
          @component('adminlte::alert') @slot('type', 'info') @slot('title', 'This is a info alert') @slot('message', 'This is the message') @endcomponent
        @endcol
        @col(3)
          @component('adminlte::alert') @slot('type', 'success') @slot('title', 'This is a success alert') @slot('message', 'This is the message') @endcomponent
        @endcol
      @endrow
  
@endsection

