@if(isset($errors))
@if($errors->any())

  @component('adminlte::alert', ['type' => 'alert', 'title' => 'Error'])
        @slot('message')
            @foreach ($errors->all() as $error)
                {!! $error !!}<br/>
            @endforeach
        @endslot
  @endcomponent
@endif
@endif

@if (session()->get('flash_success'))

  @component('adminlte::alert', ['type' => 'success', 'title' => 'Success'])
        @slot('message')
           @if(is_array(json_decode(session()->get('flash_success'), true)))
                {!! implode('', session()->get('flash_success')->all(':message<br/>')) !!}
            @else
                {!! session()->get('flash_success') !!}
            @endif
        @endslot
  @endcomponent

 
@elseif (session()->get('flash_warning'))

  @component('adminlte::alert', ['type' => 'warning', 'title' => 'Warning'])
        @slot('message')
           @if(is_array(json_decode(session()->get('flash_warning'), true)))
                {!! implode('', session()->get('flash_warning')->all(':message<br/>')) !!}
            @else
                {!! session()->get('flash_warning') !!}
            @endif
        @endslot
  @endcomponent

@elseif (session()->get('flash_info'))

    @component('adminlte::alert', ['type' => 'info', 'title' => 'Information'])
        @slot('message')
             @if(is_array(json_decode(session()->get('flash_info'), true)))
                {!! implode('', session()->get('flash_info')->all(':message<br/>')) !!}
            @else
                {!! session()->get('flash_info') !!}
            @endif
        @endslot
  @endcomponent

@elseif (session()->get('flash_danger'))

    @component('adminlte::alert', ['type' => 'danger', 'title' => 'Danger'])
        @slot('message')
             @if(is_array(json_decode(session()->get('flash_danger'), true)))
                    {!! implode('', session()->get('flash_danger')->all(':message<br/>')) !!}
                @else
                    {!! session()->get('flash_danger') !!}
                @endif
        @endslot
  @endcomponent

@elseif (session()->get('flash_message'))

 @component('adminlte::alert', ['type' => 'info', 'title' => 'S'])
        @slot('message')
             @if(is_array(json_decode(session()->get('flash_message'), true)))
                    {!! implode('', session()->get('flash_message')->all(':message<br/>')) !!}
                @else
                    {!! session()->get('flash_message') !!}
                @endif
        @endslot
  @endcomponent

@elseif (session()->get('status'))

 @component('adminlte::alert', ['type' => 'success', 'title' => 'Success'])
        @slot('message')
             @if(is_array(json_decode(session()->get('status'), true)))
                    {!! implode('', session()->get('status')->all(':message<br/>')) !!}
                @else
                    {!! session()->get('status') !!}
                @endif
        @endslot
  @endcomponent

@endif
