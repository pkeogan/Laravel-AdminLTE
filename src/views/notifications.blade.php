<li class="dropdown messages-menu" id="notifcations-menu">
	<a href="" class="dropdown-toggle" data-toggle="dropdown">
		<i class="fal fa-bell"></i>
		<span id="notifications-count" class="hidden label label-warning"></span>
	</a>
	<ul class="dropdown-menu">
	  <li class="header" id="notifcations-header"><span id="notification-unread-amount"></span></li>
	  <li>
		<!-- inner menu: contains the actual data -->
		<ul class="menu" id="notifcations-body">
		  <li id='notification-loading-overlay'><a><h4 class="text-center" style="margin: 0px 0px 0px 0px;"><i class="far fa-sync fa-spin"></i></h4>
			</a>
		  </li>
		</ul>
	  </li>
	  <li class="footer" id="notifcations-footer"><a>View all</a></li>
	</ul>
</li>




			   @if(false)
            <ul class="dropdown-menu">
              <li class="header">You have {{ Auth::user()->unreadNotifications->count() }} notifications</li>
              <li>
                <!-- inner menu: contains the actual data -->
                <ul class="menu">
					
					
	
                  @foreach(Auth::user()->unreadNotifications->groupBy('type') as $note)
                 
                  
                  @if($note->count() == 1)
                  <li><!-- start message -->
                    <a href="{{ $note[0]->data['link'] }}" id="{{ $note[0]->id }}">
                      <div class="pull-left align-middle"> 
                        <i style="vertical-align: -50%;" class="{{ $note[0]->data['icon'] }} fa-lg text-{{ $note[0]->data['icon_color'] }}"></i>  
                      </div>
                      <h4 style="margin: 0px 0px 0px 25px;">
                        {{ $note[0]->data['title'] }}
                        <small><i class="fa fa-clock-o"></i> {{  \Carbon\Carbon::parse($note[0]->created_at)->diffForHumans() }}</small>
                          

                      </h4>
                      <p style="margin: 0px 0px 0px 25px;"> {{ $note[0]->data['text'] }}</p>
                    </a>
                  </li>
                  @push('after-scripts')
                  <script>
                    $('#{{ $note[0]->id }}').click(function() {
                      $.ajax({
                          type: "POST",
                          url: "{{ route('backend.notifications.viewed', $note[0]->id) }}",
                          data: "{{ $note[0]->id }}"
                        });
                    });
                    </script>
                  @endpush
                  @else
                  <li><!-- start message -->
                    <a href="{{ $note[0]->data['groupLink'] }}" id="{{ $note[0]->id }}">
                      <div class="pull-left align-middle"> 
                        <i style="vertical-align: -50%;" class="{{ $note[0]->data['icon'] }} fa-lg text-{{ $note[0]->data['icon_color'] }}"></i>  
                      </div>
                      <h4 style="margin: 0px 0px 0px 25px;">
                        {{ $note[0]->data['title'] }}
                        <small><i class="fa fa-clock-o"></i> {{  \Carbon\Carbon::parse($note[0]->created_at)->diffForHumans() }}</small>
                      </h4>
                      <p style="margin: 0px 0px 0px 25px;"> {{$note->count()}} {{ $note[0]->data['groupText'] }}</p>
                    </a>
                  </li>
                @push('after-scripts')
                  <script>
                    $('#{{ $note[0]->id }}').click(function() {
                      $.ajax({
                          type: "POST",
                          url: "{{ route('backend.notifications.group.viewed', $note[0]->data['text']) }}",
                          data: "{{ $note[0]->id }}"
                        });
                    });
                    </script>
                  @endpush
                  @endif

                    
                  @endforeach
                  
                @if(Auth::user()->unreadNotifications->count() == 0)
                  <li><!-- start message -->
                    <a href="#">
                      <div class="pull-left align-middle"> 
                      </div>
                      <h4 style="margin: 0px 0px 0px 0px;">
                        You Have No Notifications
                      </h4>
                      <p style="margin: 0px 0px 0px 0px;"> </p>
                    </a>
                  </li>
                  @endif
                  
                  
                </ul>
              </li>
              <li class="footer"><a href="{{ route('backend.profile.notifications') }}">View all</a></li>
            </ul>
			  		@endif
