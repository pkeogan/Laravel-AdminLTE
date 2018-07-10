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

namespace Pkeogan\LaravelAdminLTE\classes;

class ProgressBar
{    

    private static $_instance = null;
    
    public static $style = 'info';
    public static $view = null;
    public static $number = null;
    public static $solid = false;
    public static $stripped = false;
    public static $active = false;
    public static $vertical = false;
    public static $size = null;
  
    public function __construct () { }
  
    public static function widget()
    {
        if (self::$_instance === null) {
            self::$_instance = new self;
        }

        self::$style = 'info';
        self::$view = null;
        self::$number = null;
        self::$solid = false;
        self::$stripped = false;
        self::$active = false;
        self:: $size = null;
        self:: $vertical = false;

        return  self::$_instance;
    }
    
    /**
     * Return a random style
     *
     * @param $htmls
     *
     * @return \Illuminate\Support\HtmlString
     */
    public static function randomStyle()
    { 
        $styles=['default','primary','info','warning','success','danger'];
        return $styles[mt_rand(0, 5)]; 
    }
  
    public static function randomType()
    { 
        $styles=['info','warning','success','danger'];
        return $styles[mt_rand(0, 3)]; 
    }
  
    public function style($input)
    {
        self::$style=$input;
        return $this;
    }
  
    public function view($input)
    {
        self::$view=$input;
        return $this;
    }
  
    public function solid()
    {
        self::$solid=true;
        return $this;
    }
  
    public function stripped()
    {
        static::$stripped=true;
        return $this;
    }
  
    public function active()
    {
        self::$active=true;
        return $this;
    }
  
    public function vertical()
    {
        self::$vertical=true;
        return $this;
    }
  
    public function number($input)
    {
        self::$number=$input;
        return $this;
    }
  
    public function size($input)
    {
        self::$size=$input;
        return $this;
    }
    /**
     * Return a random style
     *
     * @param $number
     *
     * @return \Illuminate\Support\HtmlString
     */
    public function progressBar()
    {
      
        self::$view='adminlte::progress.bar';
        return $this;
    
    }
    
    public function render()
    {
         return view(self::$view, ['number' => self::$number, 'style' => self::$style, 'stripped' => self::$stripped, 'active' => self::$active, 'size' => self::$size, 'vertical' => self::$vertical ])->render();
    }
  
      
}