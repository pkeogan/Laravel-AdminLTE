  <li id="{{ str_slug(str_replace('/', '-', $uriPattern) ,'-') }}" {{ active_class(Active::checkUriPattern($uriPattern), 'class=active') }}><a href="@if(isset($link)){{ $link }}@endif" @if(isset($target))target="{{ $target }}"@endif><i class="fal fa-circle fa-sm"></i>  @if(isset($text)){{ $text }}@endif</a></li>
