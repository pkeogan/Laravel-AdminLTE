<li class="dropdown {{ active_class(Active::checkUriPattern($uriPattern), 'active') }}">
  <a href="@if(isset($link)){{ $link }}@endif" class="dropdown-toggle" data-toggle="dropdown">@if(isset($text)){{ $text }}@endif <span class="caret"></span></a>
   <ul class="dropdown-menu" role="menu">
           @if(isset($children)){{ $children }}@endif
  </ul>
</li>
