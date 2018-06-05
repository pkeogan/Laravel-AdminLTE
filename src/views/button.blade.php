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
    |   Title : Button System
    |   Desc  : This File contains the blade template for Buttons
    |   Useage: Please Refer to readme.md 
    | 
    |
    */

@endphp

@if(isset($link))<a 
@else
<button type="button"
@endif
@if(isset($tooltip)) data-toggle="tooltip" title="{{$tooltip}}" @endif
class="btn @if(isset($uriPattern)){{ active_class(Active::checkUriPattern($uriPattern)) }}@endif 
@if(isset($block)) btn-block @endif 
							 @if(isset($style)) btn-{{$style}} @endif
							 @if(isset($disabled)) disabled @endif
							 @if(isset($size)) btn-{{ $size }} @endif" 
	@if(isset($link)) href="{!! $link !!}" @endif>
@if(isset($icon)) <i class="{!! $icon !!}"></i> @endif
@if(isset($label)) {!! $label !!} @endif
@if(isset($link))
</a>
@else
</button>
@endif
