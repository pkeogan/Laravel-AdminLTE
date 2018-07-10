@if($text != null || $showNumber)
<div class="progress-group">
                    @if($text != null)<span class="progress-text">{{ $text }}</span>@endif
                    @if($showNumber)<span class="progress-number"><b>{{ $number }} / </b>{{ $maxNumber }}</span>@endif
 @endif

<div class="progress @if($active)active @endif @if($vertical)vertical @endif @if(isset($size))progress-{{ $size }}@endif">
<div class="progress-bar progress-bar-{{ $style }} @if($stripped)progress-bar-striped @endif" 
     role="progressbar" 
     aria-valuenow="{{ $number }}" 
     aria-valuemin="{{ $minNumber }}" 
     aria-valuemax="{{ $maxNumber }}"
     @if($vertical) style="height: {{ (($number/$maxNumber)*100) }}%"> @else style="width: {{ (($number/$maxNumber)*100) }}%"> @endif
 <span class="sr-only">{{ $number }}% Complete</span>
 </div> </div>
  
@if($text != null || $showNumber)
</div>
@endif