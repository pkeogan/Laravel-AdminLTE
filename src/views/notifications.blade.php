<li class="dropdown messages-menu" id="notifications-menu">
	<a href="" class="dropdown-toggle" data-toggle="dropdown">
		<i class="fal fa-bell"></i>
    @php 
    $unreadCount = auth()->user()->unreadNotifications->count(); 
    $notifications = auth()->user()->unreadNotificationsCompacted;
    @endphp
    @if($unreadCount >= 1)
    	<span id="notifications-count" class="label label-warning">{{$unreadCount}}</span>
    @else
    	<span id="notifications-count" class="hidden label label-warning"></span>
    @endif
	</a>
	<ul class="dropdown-menu">
    @if($unreadCount > 1)
	  <li class="header" id="notifications-header"><span id="notification-unread-amount">You have {{$unreadCount}} unread notifications.</span></li>
    @elseif($unreadCount == 1)
    <li class="header" id="notifications-header"><span id="notification-unread-amount">You have 1 unread notification.</span></li>
    @else
    <li class="header" id="notifications-header"><span id="notification-unread-amount">You have no unread notifications.</span></li>
    @endif
	  <li>
		<!-- inner menu: contains the actual data -->
		<ul class="menu" id="notifications-body">
      @if($unreadCount >= 1)
        @foreach($notifications as $notification)
                <li>
                    <a href="{{ $notification['url'] }}" id="{{ $notification['id'] }}">
                      <div class="pull-left align-middle"> 
                        <i style="vertical-align: -50%;" class="{{ $notification['icon'] }} {{ $notification['color'] }}"></i>  
                      </div>
                      <h4 style="margin: 0px 0px 0px 25px;width: 225px;white-space:nowrap;overflow:hidden;text-overflow: ellipsis;">
                        {{ $notification['message'] }} asd asd asd asd a
                      </h4>
                  <p style="margin: 0px 0px 0px 25px;"><i class="fal fa-clock-o"></i> 5 mins ago </p>
                    </a>
                  </li>
      
        @endforeach
      @endif
		</ul>
	  </li>
	  <li class="footer" id="notifications-footer"><a>View all</a></li>
	</ul>
</li>
