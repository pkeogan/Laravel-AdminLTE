@if($color != null)<div class="info-box @if($color != null) bg-{{$color}} @endif">@endif
  <span class="info-box-icon bg-{{ $iconColor }}"><i class="{{ $icon }}"></i></span>
  <div class="info-box-content">
    <span class="info-box-text">{{ $title }}</span>
    <span class="info-box-number">{{ $number }}</span>
    @if( $percentage != null)<div class="progress"><div class="progress-bar" style="width: {{ $percentage }}%"></div></div>@endif
    @if($text != null)<span class="progress-description">{{ $text }}</span>@endif
  </div>
@if($color != null)</div>@endif
