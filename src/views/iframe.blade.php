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
    |   Title : iFrame Module
    |   Desc  : This File contains the blade template for iFrames
    |   Useage: Please Refer to readme.md 
    | 
    |
    */

@endphp

<div class="embed-responsive embed-responsive-16by9">			
	<iframe  class="embed-responsive-item" src="{{ $url }}" scrolling="yes" width="100%" height="100%" frameborder="0" searchonce="False" >
		Your browser does not support inline frames
	</iframe>
</div>
