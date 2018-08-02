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

<div class="hidden-xs">
  <div class="btn-group">
    @foreach($buttons as $button)
        @can($button['permission'] )
	      <a data-toggle="tooltip" title="{{$button['label']}}" class="btn {{$button['style']}}" href="{{$button['link']}}"> <i class="{{$button['icon']}}"></i> </a>
        @endcan
    @endforeach
  </div>
</div>
<div class="visible-xs-block">
  <div class="btn-group">
    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
  @if(isset($submenuTitle)){{ $submenuTitle }}@else Tools @endif  <span class="caret"></span>
  <span class="sr-only">Toggle Dropdown</span>
  </button>
    <ul class="dropdown-menu" role="menu">
      @foreach($buttons as $button)
        @haspermission($button['permission'] )
              <li>
                <a href="{{$button['link']}}">{{$button['label']}}</a></li>
        @endhaspermission
      @endforeach
    </ul>
  </div>
</div>