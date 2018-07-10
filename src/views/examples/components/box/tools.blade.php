@component('adminlte::box')
  @slot('style', 'primary')
  @slot('title', 'Title of this box')
  @slot('label', 'label in this box')
  @slot('tools') @removeButton @collapseButton @endslot
  @slot('body', 'This is the body of the box')
  @slot('footer', 'This is the footer')
@endcomponent