<li class="treeview {{ active_class(Active::checkUriPattern($uriPattern), 'menu-open') }} {{ active_class(Active::checkUriPattern($uriPattern), 'active') }}">
  <a href="@if(isset($link)){{ $link }}@endif"><i class="{{ $icon }}"></i><span>@if(isset($text)){{ $text }}@endif</span><span class="pull-right-container">@if(isset($label)){{ $label }}@else  <i class="fa fa-angle-left pull-right"></i>@endif</span></a>
  <ul class="treeview-menu">
           @if(isset($children)){{ $children }}@endif
  </ul>
</li>