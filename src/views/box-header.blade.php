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
    |   Title : Box Header System
    |   Desc  : This File contains the blade template for Boxes
    |   Useage: Please Refer to readme.md 
    | 
    |
    */

@endphp

<div class="box @if(isset($solid)) box-solid @endif @if(isset($style)) @if($style == 'random') box-{{ AdminLTE::randomStyle() }} @else box-{{ $style }} @endif @endif">
  @if(isset($title))<div class="box-header with-border">
    <h3 class="box-title">{{ $title }}</h3>
    <div class="box-tools pull-right">
      <!-- Buttons, labels, and many other things can be placed here! -->
      <!-- Here is a label for example -->
      @if(isset($label))<span class="label label-primary">{{ $label }}</span>@endif
	  @if(isset($tools)){{ $tools }}@endif
    </div>
    <!-- /.box-tools -->
  </div>@endif
  <!-- /.box-header -->
</div>