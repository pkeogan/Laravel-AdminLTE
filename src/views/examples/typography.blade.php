@extends('adminlte::layouts.frontend') 

@section('page-title', 'Typography Example')
@section('page-subtitle', 'Typography Blade Directives')

@section('content')

  @component('adminlte::box')
    @slot('style', 'primary')
    @slot('title', 'Header Directives')
    @slot('body')
      @col(4)
      @include('adminlte::examples.components.typography.header')
      @endcol
      @col(8)
        @markdownboxed(src/views/examples/components/typography/header.blade.php)
      @endcol
    @endslot
  @endcomponent

  @component('adminlte::box')
    @slot('style', 'danger')
    @slot('title', 'Text Color Directives')
    @slot('body')
      @col(5)
      @include('adminlte::examples.components.typography.color')
      @endcol
      @col(7)
        @markdownboxed(src/views/examples/components/typography/color.blade.php)
      @endcol
    @endslot
  @endcomponent
  
    @component('adminlte::box')
    @slot('style', 'danger')
    @slot('title', 'Blockquote Directives')
    @slot('body')
      @col(5)
      @include('adminlte::examples.components.typography.blockquote')
      @endcol
      @col(7)
        @markdownboxed(src/views/examples/components/typography/blockquote.blade.php)
      @endcol
    @endslot
  @endcomponent

    @component('adminlte::box')
    @slot('style', 'warning')
    @slot('title', 'Unordered List Directives')
    @slot('body')
      @col(5)
      @include('adminlte::examples.components.typography.list.unordered')
      @endcol
      @col(7)
        @markdownboxed(src/views/examples/components/typography/list/unordered.blade.php)
      @endcol
    @endslot
  @endcomponent

@component('adminlte::box')
    @slot('style', 'warning')
    @slot('title', 'Unordered List Directives')
    @slot('body')
      @col(5)
      @include('adminlte::examples.components.typography.list.ordered')
      @endcol
      @col(7)
        @markdownboxed(src/views/examples/components/typography/list/ordered.blade.php)
      @endcol
    @endslot
  @endcomponent

@component('adminlte::box')
    @slot('style', 'warning')
    @slot('title', 'Unstyled List Directives')
    @slot('body')
      @col(5)
      @include('adminlte::examples.components.typography.list.unstyled')
      @endcol
      @col(7)
        @markdownboxed(src/views/examples/components/typography/list/unstyled.blade.php)
      @endcol
    @endslot
  @endcomponent

@component('adminlte::box')
    @slot('style', 'warning')
    @slot('title', 'Description List Directives')
    @slot('body')
      @row
        @col(5)
        @include('adminlte::examples.components.typography.list.description')
        @endcol
        @col(7)
          @markdownboxed(src/views/examples/components/typography/list/description.blade.php)
        @endcol
      @endrow
      @row
        @col(5)
        @include('adminlte::examples.components.typography.list.description-horizontal')
        @endcol
        @col(7)
          @markdownboxed(src/views/examples/components/typography/list/description-horizontal.blade.php)
        @endcol
      @endrow
    @endslot
  @endcomponent


@endsection