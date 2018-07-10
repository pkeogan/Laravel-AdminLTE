@php 

    /*
    |--------------------------------------------------------------------------
    |     __                          __  ___     __      _      __ __________
    |    / /  ___ ________ __  _____ / / / _ |___/ /_ _  (_)__  / //_  __/ __/
    |   / /__/ _ `/ __/ _ `/ |/ / -_) / / __ / _  /  ' \/ / _ \/ /__/ / / _/  
    |  /____/\_,_/_/  \_,_/|___/\__/_/ /_/ |_\_,_/_/_/_/_/_//_/____/_/ /___/ 
    |--------------------------------------------------------------------------
    | Laravel AdminLTE Blade Intergration - By Peter Keogan
    |--------------------------------------------------------------------------
    |   Title : Example Page
    |   Desc  : This File contains the blade template for the example page
    |   Useage: Please Refer to readme.md 
    | 
    |
    */

@endphp

    
    @component('adminlte::callout', ['type' => 'danger', 'title' => 'This is a Danger Callout'])
        @slot('message')
            You cannot close this message.
        @endslot
    @endcomponent
	
	@component('adminlte::alert', ['type' => 'danger', 'title' => 'This is a Danger Alert'])
        @slot('message')
            You CAN close this message.
        @endslot
    @endcomponent

    @component('adminlte::box', ['style' => 'info', 'solid' => 'true'])
        @slot('title')
            This is a title
        @endslot
        @slot('tools')
            this is in the tool area
        @endslot
        @slot('body')
            This is a body
        @endslot
        @slot('footer')
            This is a footer
        @endslot
    @endcomponent

 @component('adminlte::box', ['style' => 'info', 'title' => 'Button Examples'])
        @slot('body')
               @component('adminlte::button', ['size' => 'lg', 'style' => 'info', 'icon' => 'fa fa-handshake-o'])
                    @slot('label')
                         label
                    @endslot
                    @slot('link')
                        {{ route('frontend.index') }}
                    @endslot
               @endcomponent

                 @component('adminlte::button', ['size' => 'sm', 'style' => 'danger'])
                    @slot('label')
                         danger
                    @endslot
               @endcomponent


        @endslot
    @endcomponent
