{{--  First, you need to declare in your config what repo you are using  --}}
{{-- Change pkeogan/laravel-adminlte in adminlte.config to "yourusername/reponame" --}}
... 
'markdownrepo' => 'pkeogan/laravel-adminlte',
...

{{-- Then make sure the file have been pushed, and is public, then call it using the markdown below --}}
@markdown(src/views/examples/markdown.blade.php)

{{-- if you want it to be in a callbox, use this --}}
@markdownboxed(src/views/examples/markdown.blade.php)