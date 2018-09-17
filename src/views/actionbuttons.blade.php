<div data-actionbuttons data-model-id="{{ config('datatables.needle') }}">
  <div class="hidden action-buttons-large" data-buttons-count="{{ collect($buttons)->whereNotIn("seperator", "seperator")->count() }}">
    <div class="btn-group">
      @foreach($buttons as $button)
      @if(!isset($button["seperator"]))
          @can($button["permission"] )
              @if(isset($button["onclick"]))
            <button data-toggle="tooltip" data-do-not-animate onclick="{{$button["onclick"]}}" title="{{$button["label"]}}" class="btn {{$button["style"]}}"> <i class="{{$button["icon"]}}"></i> </a>
              @else
                  <a data-toggle="tooltip" data-do-not-animate title="{{$button["label"]}}" class="btn {{$button["style"]}}" @if(isset($button["data-confirmation"]))data-confirm-link="{{$button["link"]}}"@else href="{{$button["link"]}}" @endif> <i class="{{$button["icon"]}}"></i> </a>
              @endif
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
      @if(isset($button["seperator"]))
                <li role="separator" class="divider"></li>
          @else
          @can($button["permission"] )
                      @if(isset($button["onclick"]))
                                    <li><a data-do-not-animate   onclick="{{$button["onclick"]}}" >{{$button["label"]}}</a></li>
              @else
                      <li><a data-do-not-animate  @if(isset($button["data-confirmation"]))data-confirm-link="{{$button["link"]}}"@else href="{{$button["link"]}}" @endif >{{$button["label"]}}</a></li>
              @endif
          @endcan
      @endif
        @endforeach
      </ul>
    </div>
  </div>
</div>