# Laravel-AdminLTE (WIP)

This Laravel Package is made to fully intergrate AdminLTE into Blade templating. The goal will to be able to use blade directive calls in order to populate and create pages, boxes, alerts etc. 

## Getting Started

This project is not done yet, but if you would like to check it out, or follow along, follow the instructions below to get started. 

### Prerequisites

What you need running on you dev, or local server.

```
Laravel 5.5
PHP 7.0^
```

### Installing

Install AdminLTE via Composer


```
composer require almasaeed2010/AdminLTE
```

Install Laravel-AdminLTE via Composer

```
composer require pkeogan/laravel-adminlte dev-master
```

Update Composer

```
composer update
```

Move some AdminLTE file to Resources (So we can edit then complie)

```
cp -a vendor/almasaeed2010/adminlte/build/. resources/assets/adminlte/build
cp -a vendor/almasaeed2010/adminlte/bower_components/. resources/assets/adminlte/bower_components
cp -a vendor/almasaeed2010/adminlte/dist/. resources/assets/adminlte/dist
cp -a vendor/almasaeed2010/adminlte/plugins/. resources/assets/adminlte/plugins


cp -a vendor/almasaeed2010/adminlte/dist/img/. resources/assets/img/
cp -a vendor/almasaeed2010/adminlte/dist/js/. resources/assets/js/adminlte
cp -a vendor/almasaeed2010/adminlte/plugins/. resources/assets/plugins

sudo sed -i 's/DocumentRoot\ \/home\/ubuntu\/workspace/DocumentRoot\ \/home\/ubuntu\/workspace\/public/g' /resources/assets/less/AdminLTE.less


```


Add the service provider

```
 /config/app.php
 
 'providers' => [
  ...
  Pkeogan\LaravelAdminLTE\LaravelAdminLTEServiceProvider::class,
  ...

```

Add the Webpack Mix, copy and insert from /vendor/pkeogan/laravel-admintle/webpack.mix.js

```
/webpack.mix.js

mix.sass(blah blah),
  .less(more stuff),
  (copy and paste here)
  .js(blah, blah);

```

(Still writing this install)

### Useage

In the future I will have every option in here, and also a demo page with the code to call.

In any blade.php file, you can call a compontent such as below. 
```
@component('adminlte::callout', ['type' => 'danger', 'title' => 'This is a Danger Callout'])
        @slot('message')
            You cannot close this message.
        @endslot
    @endcomponent
```

## Buttons
```
 @include('adminlte::button', ['link' => route('backend.auth.user.deactivated'), 
                               'label' => 'Deactivated',
                               'style' => 'success', 
                               'uriPattern' => 'URI For Active Class', 
                               'tooltip' => 'This is a tooltip'])
```


## Modal
```
@include('adminlte::modal', ['buttonIcon' => 'fa fa-id-card-o ',
'modalID' => ('loginas'.$user->id),
'modalHeader' => 'Login As '.$user->full_name,
'modalSubmit' => 'Login As '.$user->full_name,
'modalBody' => 'Are you sure you want to login as this user?',
'submitLink' => route('backend.auth.user.login-as', $user)])
```


## Versioning

Not ready yet, I will be in 0.1-dev for some time.

## Authors

* **Peter Keogan** - *inital release* - [Pkeogan](https://github.com/Pkeogan)

## Acknowledgments

* almasaeed2010 for the great AdminLTE theme!
* Anyone who contributes to Laravel!
* anyone who elses code was used