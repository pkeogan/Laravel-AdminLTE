<div class="small-box bg-{{ $color }}">
  <div class="inner">
    <h3>{{ $title }}</h3>

    <p>{{ $text }}</p>
  </div>
  <div class="icon">
    <i class="{{ $icon }}"></i>
  </div>
  @if($link != null)<a href="{{ $link }}" class="small-box-footer">
    {{ $linkText }} <i class="fa fa-arrow-circle-right"></i>
  </a>@endif
</div>