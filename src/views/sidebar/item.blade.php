<li {{ active_class(Active::checkUriPattern($uriPattern), 'class=active') }}><a href="@if(isset($link)){{ $link }}@endif"><i class="@if(isset($icon)){{ $icon }}@endif"></i> <span>  @if(isset($text)){{ $text }}@endif </span><span class="pull-right-container">@if(isset($label)){{ $label }}@endif</span></a></li>

