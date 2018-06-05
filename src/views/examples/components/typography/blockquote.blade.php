@component('adminlte::blockquote.left')
  @slot('quote', 'This is a cool quote, a really cool one')
  @slot('name', 'Bob denver at')
  @slot('title', 'GitHub.com')
@endcomponent

@component('adminlte::blockquote.right')
  @slot('quote', 'This is a bad quote, a really bad one')
  @slot('name', 'John Beaver at')
  @slot('title', 'Laravel.com') 
@endcomponent
