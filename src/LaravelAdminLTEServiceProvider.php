<?php

    /*
    |--------------------------------------------------------------------------
    |     __                          __  ___     __      _      __ __________
    |    / /  ___ ________ __  _____ / / / _ |___/ /_ _  (_)__  / //_  __/ __/
    |   / /__/ _ `/ __/ _ `/ |/ / -_) / / __ / _  /  ' \/ / _ \/ /__/ / / _/  
    |  /____/\_,_/_/  \_,_/|___/\__/_/ /_/ |_\_,_/_/_/_/_/_//_/____/_/ /___/ 
    |--------------------------------------------------------------------------
    | Laravel AdminLTE Blade Intergration - By Peter Keogan
    |--------------------------------------------------------------------------
    |   Title : Blade Service Provider
    |   Desc  : This service provider injects the blade directives for views ot be able to render the views.
    |   Useage: Please Refer to readme.md 
    | 
    |
    */

namespace Pkeogan\LaravelAdminLTE;

use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class LaravelAdminLTEServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services and add all the directives. 
     * 
     *
     * @return void
     */
    public function boot()
    {
      // adds our custom views to laravel can call them with adminlte::example.page
      view()->addNamespace('adminlte', base_path('/vendor/pkeogan/laravel-adminlte/src/views'));

      // Add Markdown directive, goes to config to get the repo we are pulling fom
        Blade::directive('markdown', function ($file) {
            return "<script src=\"https://gist-it.appspot.com/github/".config('adminlte.markdownrepo')."/blob/master/".$file."\"></script>";
        });
        Blade::directive('markdownboxed', function ($file) {
            return  "<div class=\"callout callout-success\"><h4>Code</h4><script src=\"https://gist-it.appspot.com/github/".config('adminlte.markdownrepo')."/blob/master/".$file."\"></script></div>";
        });
            
      // Header Directives
        Blade::directive('h1', function ($text) { return "<h1>".$text."</h1>"; });
        Blade::directive('h2', function ($text) { return "<h2>".$text."</h2>"; });
        Blade::directive('h3', function ($text) { return "<h3>".$text."</h3>"; });
        Blade::directive('h4', function ($text) { return "<h4>".$text."</h4>"; });
        Blade::directive('h5', function ($text) { return "<h5>".$text."</h5>"; });
        Blade::directive('h6', function ($text) { return "<h6>".$text."</h6>"; });
        Blade::directive('p', function ($text) { return "<p>".$text."</p>"; });
        Blade::directive('i', function ($text) { return "<i>".$text."</i>"; });
        Blade::directive('b', function ($text) { return "<b>".$text."</b>"; });
      
      //layout Directives
        Blade::directive('row', function () { return "<div class=\"row\">"; });
        Blade::directive('endrow', function () { return "</div>"; });
        Blade::directive('col', function ($number) { return "<div class=\"col-".config('adminlte.coldefault')."-".$number."\">"; });
        Blade::directive('colsm', function ($number) { return "<div class=\"col-sm-".$number."\">"; });
        Blade::directive('colxs', function ($number) { return "<div class=\"col-xs-".$number."\">"; });
        Blade::directive('colmd', function ($number) { return "<div class=\"col-md-".$number."\">"; });
        Blade::directive('collg', function ($number) { return "<div class=\"col-lg-".$number."\">"; });
        Blade::directive('colcustom', function ($custom) { return "<div class=\"".$custom."\">"; });
        Blade::directive('endcol', function () { return "</div>"; });
        Blade::directive('clearfix', function () { return "<div class=\"clearfix\"></div>"; });
    
        //Text Emphasis Directives
        Blade::directive('textlead', function ($text) { return "<p class=\"lead\">".$text."</p>"; });
        Blade::directive('textgreen', function ($text) { return "<p class=\"text-green\">".$text."</p>"; });
        Blade::directive('textaqua', function ($text) { return "<p class=\"text-aqua\">".$text."</p>"; });
        Blade::directive('textlightblue', function ($text) { return "<p class=\"text-light-blue\">".$text."</p>"; });
        Blade::directive('textred', function ($text) { return "<p class=\"text-red\">".$text."</p>"; });
        Blade::directive('textyellow', function ($text) { return "<p class=\"text-yellow\">".$text."</p>"; });
        Blade::directive('textmuted', function ($text) { return "<p class=\"text-muted\">".$text."</p>"; });

        //List Directives
        Blade::directive('ul', function () { return "<ul>"; });
        Blade::directive('ulns', function () { return "<ul class=\"list-unstyled\">"; });
        Blade::directive('endul', function () { return "</ul>"; });
        Blade::directive('ol', function () { return "<ol>"; });
        Blade::directive('endol', function () { return "</ol>"; });
        Blade::directive('endli', function () { return "</li>"; });
        Blade::directive('li', function ($text) { if($text == null){ return "<li>"; }else{ return "<li>".$text."</li>"; } });
        Blade::directive('dl', function () { return "<dl>"; });
        Blade::directive('dlh', function () { return "<dl class=\"dl-horizontal\">"; });
        Blade::directive('dlhorizontal', function () { return "<dl class=\"dl-horizontal\">"; });
        Blade::directive('enddl', function () { return "</dl>"; });
        Blade::directive('dt', function ($text) { return "<dt>".$text."</dt>"; });
        Blade::directive('dd', function ($text) { return "<dd>".$text."</dd>"; });
      
        //Box Directives / tools
        Blade::directive('removeButton', function ($text) { return "<button type=\"button\" class=\"btn btn-box-tool\" data-widget=\"remove\"><i class=\"fa fa-times\"></i></button>"; });
        Blade::directive('expandButton', function ($text) { return "<button type=\"button\" class=\"btn btn-box-tool\" data-widget=\"collapse\"><i class=\"fa fa-plus\"></i></button>"; });
        Blade::directive('collapseButton', function ($text) { return "<button type=\"button\" class=\"btn btn-box-tool\" data-widget=\"collapse\"><i class=\"fa fa-minus\"></i></button>"; });
        //Widget Directives
      
    /**
     * Check if current User has the Permission ID Supplied, If user does, return true, if not, return false.
     *
     * @param Int $permissionID
     *
     * @return boolean
     */
     Blade::directive('permission', function ($permissionID) { return "<?php  if(Auth::user()->hasPermissionTo(App\Models\Auth\Permission::find(" . $permissionID . ")->name)): ?>"; });
      
    /**
     * Return the endif for a @permission Blade Directive
     *
     * @return void
     */
     Blade::directive('endpermission', function () { return '<?php endif; ?>'; });
      
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
