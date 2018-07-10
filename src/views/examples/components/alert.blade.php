@component('adminlte::alert')
  @slot('type', 'danger') {{-- Danger, Warning, Info, and Success --}}
  @slot('title', 'This is a Random Alert')
  @slot('message', 'This is the message')
@endcomponent