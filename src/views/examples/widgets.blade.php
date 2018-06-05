@extends('adminlte::layouts.frontend') 

@section('page-title', 'Widgets Example')
@section('page-subtitle', 'Widgets Blade Directivess')

{{-- Declare you section content --}}
@section('content')
  
  @component('adminlte::box')
    @slot('style', 'primary')
    @slot('title', 'Progress Bars')
    @slot('body')
      @col(4)
      @include('adminlte::examples.components.progressbars')
      @endcol
      @col(8)
        @markdownboxed(src/views/examples/components/progressbars.blade.php)
      @endcol
    @endslot
@endcomponent

@component('adminlte::box')
    @slot('style', 'danger')
    @slot('title', 'Vertical Progress Bars')
    @slot('body')
      @col(3)
      @include('adminlte::examples.components.progressbarsv')
      @endcol
      @col(9)
        @markdownboxed(src/views/examples/components/progressbarsv.blade.php)
      @endcol
    @endslot
@endcomponent

@component('adminlte::box')
    @slot('style', 'info')
    @slot('title', 'Info Boxes')
    @slot('body')
      @row
   @col(12)
        @include('adminlte::examples.components.infobox')
  @endcol
      @endrow
      @row
      @col(12)
        @markdownboxed(src/views/examples/components/infobox.blade.php)
      @endcol
      @endrow
    @endslot
@endcomponent

@component('adminlte::box')
    @slot('style', 'warning')
    @slot('title', 'Small Boxes')
    @slot('body')
      @row
   @col(12)
        @include('adminlte::examples.components.smallbox')
  @endcol
      @endrow
      @row
      @col(12)
        @markdownboxed(src/views/examples/components/smallbox.blade.php)
      @endcol
      @endrow
    @endslot
@endcomponent

@component('adminlte::box')
    @slot('style', 'warning')
    @slot('title', 'Carousel')
    @slot('body')
      @row
   @col(12)
        @include('adminlte::examples.components.carousel')
  @endcol
      @endrow
      @row
      @col(12)
        @markdownboxed(src/views/examples/components/carousel.blade.php)
      @endcol
      @endrow
    @endslot
@endcomponent


@endsection