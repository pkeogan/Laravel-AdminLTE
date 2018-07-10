@extends('adminlte::layouts.frontend') 

@section('page-title', 'Box Examples')
@section('page-subtitle', 'Box Blade Directives')

@section('content')

  @component('adminlte::box')
    @slot('style', 'primary')
    @slot('title', 'Normal Box Directives')
    @slot('body')
    @row
      @col(4)
      @include('adminlte::examples.components.box.normal')
      @h3(Parameters)
      @dlh
          @dt(style)
          @dd(Defines the color of the box, you can use 'random', 'success', 'primary', 'default', 'warning', 'danger', and 'info'.)
          @dt(solid)
          @dd(true or false, changes box visuals)
          @dt(title)
          @dd(The title the box)
          @dt(body)
          @dd(The body of the box)
          @dt(footer)
          @dd(the footer of the box)
        @enddl
      @endcol
      @col(8)
        @markdownboxed(src/views/examples/components/box/normal.blade.php)
      @endcol
      @endrow
      @row
        @col(2)
          @component('adminlte::box')@slot('style', 'primary')@slot('title', 'Title of this box')@slot('body', 'This is the body of the box')@slot('footer', 'This is the footer')@endcomponent
        @endcol
        @col(2)
          @component('adminlte::box')@slot('style', 'default')@slot('title', 'Title of this box')@slot('body', 'This is the body of the box')@slot('footer', 'This is the footer')@endcomponent
        @endcol
        @col(2)
          @component('adminlte::box')@slot('style', 'warning')@slot('title', 'Title of this box')@slot('body', 'This is the body of the box')@slot('footer', 'This is the footer')@endcomponent
        @endcol
        @col(2)
          @component('adminlte::box')@slot('style', 'danger')@slot('title', 'Title of this box')@slot('body', 'This is the body of the box')@slot('footer', 'This is the footer')@endcomponent
        @endcol
        @col(2)
          @component('adminlte::box')@slot('style', 'info')@slot('title', 'Title of this box')@slot('body', 'This is the body of the box')@slot('footer', 'This is the footer')@endcomponent
        @endcol
        @col(2)
          @component('adminlte::box')@slot('style', 'success')@slot('title', 'Title of this box')@slot('body', 'This is the body of the box')@slot('footer', 'This is the footer')@endcomponent
        @endcol
      @endrow
    @endslot
  @endcomponent



    @component('adminlte::box')
    @slot('style', 'random')
    @slot('solid', 'solid')
    @slot('title', 'Solid Box Directives')
    @slot('body')
      @row
        @col(4)
        @include('adminlte::examples.components.box.solid')
        @endcol
        @col(8)
          @markdownboxed(src/views/examples/components/box/solid.blade.php)
        @endcol
      @endrow
      @row
        @col(2)
          @component('adminlte::box')@slot('style', 'primary')@slot('solid', 'solid')@slot('title', 'Title of this box')@slot('body', 'This is the body of the box')@slot('footer', 'This is the footer')@endcomponent
        @endcol
        @col(2)
          @component('adminlte::box')@slot('style', 'default')@slot('solid', 'solid')@slot('title', 'Title of this box')@slot('body', 'This is the body of the box')@slot('footer', 'This is the footer')@endcomponent
        @endcol
        @col(2)
          @component('adminlte::box')@slot('style', 'warning')@slot('solid', 'solid')@slot('title', 'Title of this box')@slot('body', 'This is the body of the box')@slot('footer', 'This is the footer')@endcomponent
        @endcol
        @col(2)
          @component('adminlte::box')@slot('style', 'danger')@slot('solid', 'solid')@slot('title', 'Title of this box')@slot('body', 'This is the body of the box')@slot('footer', 'This is the footer')@endcomponent
        @endcol
        @col(2)
          @component('adminlte::box')@slot('style', 'info')@slot('solid', 'solid')@slot('title', 'Title of this box')@slot('body', 'This is the body of the box')@slot('footer', 'This is the footer')@endcomponent
        @endcol
        @col(2)
          @component('adminlte::box')@slot('style', 'success')@slot('solid', 'solid')@slot('title', 'Title of this box')@slot('body', 'This is the body of the box')@slot('footer', 'This is the footer')@endcomponent
        @endcol
      @endrow
    @endslot
  @endcomponent

@component('adminlte::box')
    @slot('style', 'random')
    @slot('solid', 'solid')
    @slot('tools') @collapseButton @removeButton @endslot
    @slot('title', 'Box Tools')
    @slot('body')
      @row
        @col(4)
        @p(Useage: place inside the 'tools' slot of the component. This box currently has the below added to it.)
        @dl
          @dt(@removeButton)
          @dd(Adds a 'X' icon to the box, which will remove it from view)
          @dt(@collsapseButton)
          @dd(Adds a Tool so Collapse or Expand the box.)
        @enddl
        @endcol
        @col(8)
          @markdownboxed(src/views/examples/components/box/tools.blade.php)
        @endcol
      @endrow
    @endslot
  @endcomponent

@endsection