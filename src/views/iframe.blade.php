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
<style>
	.scroll-wrapper {
		-webkit-overflow-scrolling: touch;
		overflow: scroll;
		 border: 1px solid #cccccc;
		/* important:  dimensions or positioning here! */
	}

</style>
<div class="scroll-wrapper">
	
	<iframe  src="{{ $url }}" scrolling="yes" width="@if(isset($width)){{$width}}@else 100% @endif" height="@if(isset($height)){{$height}}@else 100% @endif" frameborder="0" searchonce="False" >
		Your browser does not support inline frames
	</iframe>
	
	</div>
