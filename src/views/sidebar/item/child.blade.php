  <li {{ active_class(Active::checkUriPattern($uriPattern), 'class=active') }}><a href="@if(isset($link)){{ $link }}@endif"><i class="fa fa-circle-o"></i> @if(isset($text)){{ $text }}@endif</a></li>
