@php 

    /*
    |--------------------------------------------------------------------------
    |     __                          __  ___     __      _      __ __________
    |    / /  ___ ________ __  _____ / / / _ |___/ /_ _  (_)__  / //_  __/ __/
    |   / /__/ _ `/ __/ _ `/ |/ / -_) / / __ / _  /  ' \/ / _ \/ /__/ / / _/  
    |  /____/\_,_/_/  \_,_/|___/\__/_/ /_/ |_\_,_/_/_/_/_/_//_/____/_/ /___/ 
    |--------------------------------------------------------------------------
    | Laravel AdminLTE Blade Intergration - By Peter Keogan
    |--------------------------------------------------------------------------
    |   Title : Callout Box System
    |   Desc  : This File contains the blade template for Callouts
    |   Useage: Please Refer to readme.md 
    | 
    |
    */

@endphp

@if($type == 'danger')
<div class="callout callout-danger">
  <h4>{{ $title }}</h4>
  
  <p>{{ $message }}</p>
</div>
@elseif($type == 'alert')
<div class="callout callout-danger">
  <h4>{{ $title }}</h4>
  
  <p>{{ $message }}</p>
</div>
@elseif($type == 'info')
<div class="callout callout-info">
  <h4>{{ $title }}</h4>
  
  <p>{{ $message }}</p>
</div>
@elseif($type == 'warning')
<div class="callout callout-warning">
  <h4>{{ $title }}</h4>
  
  <p>{{ $message }}</p>
</div>
@elseif($type == 'success')
<div class="callout callout-success">
  <h4>{{ $title }}</h4>
  
  <p>{{ $message }}</p>
</div>
@elseif($type == 'random')
<div class="callout callout-{{ AdminLTE::randomType() }}">
  <h4>{{ $title }}</h4>
  
  <p>{{ $message }}</p>
</div>
@else
<div class="callout callout-danger">
  <h4>Error</h4>
  
  <p>There was an interal system reporting error. Please contact you system admin if you see this. </p>
</div>
@endif
