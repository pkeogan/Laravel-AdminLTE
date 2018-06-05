<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Laravel-AdminLTE Config File
    |--------------------------------------------------------------------------
    | 
    |  This file contains all the configtation settings for AdminLTE, point where to look for certain stuff
    | 
    | 
    |
    */

    'favicons' => 'includes.favicons',
    'nav' => 'frontend.includes.nav',
    'footer' => 'frontend.includes.footer',
    'link' => 'https://plasma.pkeogan.com',
    'flash-messages' => 'includes.partials.messages',
    'markdownrepo' => 'pkeogan/laravel-adminlte',
    'titledefault' => 'Laravel AdminLTE',
    'titlebefore' => 'Laravel AdminLTE | ',
    'coldefault' => 'md', //default col size when calling @col(number)
    'defaultModalStyle' => 'danger',
    'defaultActionButtonStyle' => 'info',


    /*
    |--------------------------------------------------------------------------
    | Frontend Settings
    |--------------------------------------------------------------------------
    | 
    |  If Meta Data isnt provided, this is what the default values will fall back to
    | 
    | 
    |
    */
  
    'frontend' => [
        'nav'   => 'frontend.includes.nav',
        'brand' => '<b>Hennepin</b> EMS',
        'route' => 'frontend.index',
    ],
  
    /*
    |--------------------------------------------------------------------------
    | Datatable Settings
    |--------------------------------------------------------------------------
    | 
    |  Default Data Table Settings
    | 
    | 
    |
    */
  
    'datatables' => [
          'config' => [ 'dom'         => config('adminlte.datatables.dom'),             
                        'lengthMenu'  => config('adminlte.datatables.lengthMenu'),
                        'buttons'     => config('adminlte.datatables.buttons'), ],
      
         // Got the DOM settings from https://datatables.net/reference/option/dom
         // Then escaped it on this site https://www.freeformatter.com/javascript-escape.html#ad-output
        'dom'   => '<\'row\'<\'col-sm-6\'B><\'col-sm-6\'f>>\" + \"<\'row\'<\'col-sm-12\'tr>>\" + \"<\'row\'<\'col-sm-5\'i><\'col-sm-7\'p>>', //
        'lengthMenu' => [[10, 25, 50, -1], [10, 25, 50, 'All']],
        'buttons' =>  [ 'pageLength',
                        ['extend'  =>  'collection', 'text'    =>  'Controls', 'buttons' => ['colvis']],
                        ['extend' =>  'collection', 'text' =>  'Export', 'buttons' => [ ['extend' => 'copy',   'text' => 'Copy',              'exportOptions' => ['columns' => [':visible']]],
                                                                                        ['extend' => 'excel',  'text' => 'Excel Spreadsheet', 'exportOptions' => ['columns' => [':visible']]],
                                                                                        ['extend' => 'csv',    'text' => 'CSV',               'exportOptions' => ['columns' => [':visible']]],
                                                                                        ['extend' => 'pdf',    'text' => 'PDF',               'exportOptions' => ['columns' => [':visible']]],
                                                                                        ['extend' => 'print',  'text' => 'Print',             'exportOptions' => ['columns' => [':visible']]] 
                                                                                      ]
                        ]
                       ],
        'serverSide' => 'true',
        'exportOptions' => ['columns' => [':visible']],
    ],
    
  
    /*
    |--------------------------------------------------------------------------
    | Default Meta Data
    |--------------------------------------------------------------------------
    | 
    |  If Meta Data isnt provided, this is what the default values will fall back to
    | 
    | 
    |
    */
  
    'meta' => [
        'description' => 'This Applcation was made by Peter Keogan',
        'author' => 'Peter Keogan',
    ],
];