@if(Auth::user()->unreadNotifications->pluck('title', $group)->count() != 0)
        <small class="label pull-right bg-yellow">{{ Auth::user()->unreadNotifications->pluck('title', $group)->count() }}</small>
@endif