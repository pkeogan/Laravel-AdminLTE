  <li {{ active_class(Active::checkUriPattern($uriPattern), 'class=active') }}><a href="@if(isset($link)){{ $link }}@endif"> @if(isset($text)){{ $text }}@endif</a></li>
