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
    |   Title : Sub Menu System
    |   Desc  : This file creates sub-menu buttons for desktop and moblie screens with 1 single input
    |   Useage: Please Refer to readme.md 
    | 
    |
    */




@endphp

<div class="hidden action-buttons-large" data-buttons-count="{{ collect($buttons)->whereNotIn('seperator', 'seperator')->count() }}">
  <div class="btn-group">
    @foreach($buttons as $button)
	  @if(!isset($button['seperator']))
        @can($button['permission'] )
	  	      	<a data-toggle="tooltip" data-do-not-animate title="{{$button['label']}}" class="btn {{$button['style']}}" @if(isset($button['data-confirmation']))data-confirm-link="{{$button['link']}}"@else href="{{$button['link']}}" @endif> <i class="{{$button['icon']}}"></i> </a>
        @endcan
	   @endif
    @endforeach
  </div>
</div>
<div class="action-buttons-small">
  <div class="btn-group btn-block">
    <button type="button" class="btn btn-default btn-block dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
  @if(isset($submenuTitle)){{ $submenuTitle }}@else Tools @endif  <span class="caret"></span>
  <span class="sr-only">Toggle Dropdown</span>
  </button>
    <ul class="dropdown-menu" role="menu">
      @foreach($buttons as $button)
		@if(isset($button['seperator']))
			  			<li role="separator" class="divider"></li>
	  		@else
        @can($button['permission'] )
              <li><a data-do-not-animate  @if(isset($button['data-confirmation']))data-confirm-link="{{$button['link']}}"@else href="{{$button['link']}}" @endif >{{$button['label']}}</a></li>
        @endcan
		@endif
      @endforeach
    </ul>
  </div>
</div>