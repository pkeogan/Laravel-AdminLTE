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

/**
 * Class AdminLTEHelper.
 */
class AdminLTE
{    

    private static $_instance = null;
    
    public static $style = 'info'; //default style of all widgets
    public static $view = null; //the widget view we are working with 
    public static $number = null; //number vvar for the widget
    public static $minNumber = '0'; // miniunum number for the widget
    public static $maxNumber = '100'; // max number fornthe widget
    public static $solid = false; //solid boolean for the widget
    public static $stripped = false; //stripped boolean for the widget
    public static $active = false; //active boolean for the widget
    public static $vertical = false; //vertical boolean for the widget
    public static $size = null; //size var for the widget
    public static $showNumber = false;
    public static $text = null;
    public static $icon = 'fa fa-star-o';
    public static $color = null;
    public static $title = null;
    public static $percentage = null;
    public static $iconColor = null;
    public static $link = null;
    public static $items = [];
    public static $linkText = 'More Info';
  
    private function __construct () { }
  
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
        self:: $minNumber = '0'; // miniunum number for the widget
        self:: $maxNumber = '100'; // max number fornthe widget
        self:: $showNumber = false;
        self:: $text = null;
        self:: $icon = 'fa fa-star-o';
        self:: $color = null;
        self:: $title = null;
        self::$percentage = null;
        self::$iconColor = null;
        self::$link = null;
        self::$linkText = 'More Info';
        self::$items = [];

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
    
    public function percentage($input)
    {
        self::$percentage=$input;
        return $this;
    }
  
    public function showNumber()
    {
        self::$showNumber=true;
        return $this;
    }

    public function title($input)
    {
        self::$title=$input;
        return $this;
    }
  
    public function link($input)
    {
        self::$link=$input;
        return $this;
    }
  
    public function linkText($input)
    {
        self::$linkText=$input;
        return $this;
    }

    public function icon($input)
    {
        self::$icon=$input;
        return $this;
    }
  
    public function color($input)
    {
        self::$color=$input;
        return $this;
    }
  
    public function text($input)
    {
        self::$text=$input;
        return $this;
    }
  
    public function addItem($input)
    {
        array_push(self::$items, $input);
        return $this;
    }
  
    public function number($input)
    {
        self::$number=$input;
        return $this;
    }
  
    public function minNumber($input)
    {
        self::$minNumber=$input;
        return $this;
    }
  
    public function iconColor($input)
    {
        self::$iconColor=$input;
        return $this;
    }
  
    public function maxNumber($input)
    {
        self::$maxNumber=$input;
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
  
    public function infoBox()
    {
        self::$view='adminlte::infobox';
        return $this;
    
    }
  
    public function smallBox()
    {
        self::$view='adminlte::smallbox';
        return $this;
    
    }
  
    public function chart()
    {
        self::$view='adminlte::chart';
        return $this;
    
    }
  
    public function carousel()
    {
        self::$view='adminlte::carousel';
        return $this;
    
    }
    
    public function render()
    {
         return view(self::$view, ['number' => self::$number,
                                   'style' => self::$style,
                                   'stripped' => self::$stripped,
                                   'active' => self::$active,
                                   'size' => self::$size,
                                   'vertical' => self::$vertical,
                                   'showNumber' => self::$showNumber,
                                   'text' => self::$text,
                                   'minNumber' => self::$minNumber,
                                   'maxNumber' => self::$maxNumber,
                                   'icon' => self::$icon,
                                   'color' => self::$color,
                                   'title' => self::$title,
                                    'percentage' => self::$percentage,
                                    'iconColor' => self::$iconColor,
                                   'link' => self::$link,
                                   'linkText' => self::$linkText,
                                   'items' => self::$items
                                   //'' => self::$,
                                    ])->render();
    }
  
}