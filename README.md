## Laravel Localziation
This tutorial is not package.
This tutorial show you to manage multilanguage from a database.



<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/d/total.svg" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/v/stable.svg" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/license.svg" alt="License"></a>
</p>
## Migration

```
php artisan migrate
```
##  Database Seed
```
    php artisan db:seed
```
## Locales in Laravel
But how does Laravel know what the current language is or what languages are available in the application? It does this by looking at the locale setup in the `config/app.php` Open up this file and look for these two array keys:
```
/*
|--------------------------------------------------------------------------
| Application Locale Configuration
|--------------------------------------------------------------------------
|
| The application locale determines the default locale that will be used
| by the translation service provider. You are free to set this value
| to any of the locales which will be supported by the application.
|
*/

'locale' => 'en',

/*
|--------------------------------------------------------------------------
| Application Fallback Locale
|--------------------------------------------------------------------------
|
| The fallback locale determines the locale to use when the current one
| is not available. You may change the value to correspond to any of
| the language folders that are provided through your application.
|
*/

'fallback_locale' => 'en',
```

## Translation files
Let’s start by adding new localization files in the resources/lang folder. First, create a `resources/lang/en/home.php` file and add the corresponding translations, as follows:


```
<?php

return[


	'menu001'=>'Laravel'
];
```
Let’s start by adding new localization files in the resources/lang folder. First, create a `resources/lang/mm/home.php` file and add the corresponding translations, as follows:


```
<?php

return[


	'menu001'=>'လာလာဗယ်'
];
```
## Switching locales in Laravel `web.php`
```
Route::get('locale/{locale}', function($locale){
    App::setLocale($locale);

    Session::put('locale',$locale);
    return redirect()->route('home');
});
```
## Middleware
Passing the locale for every site link might not be what you want and could look not quite so clean esthetically. That’s why we’ll perform language setup via a special language switcher and use the user session to display the translated content. Therefore, create a new middleware inside the `app/Http/Middleware/Localization.php` file or by running `artisan make:middleware Localization`.

```
<?php

namespace App\Http\Middleware;

use Closure;
use Session;

class Localization
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (Session::has('locale')) {
            \App::setLocale(Session::get('locale'));
        }
        return $next($request);
    }
}
```
## Register Middleware
This middleware register in `app\Http\kernel.php`.
```
 protected $middlewareGroups = [
        'web' => [
            \App\Http\Middleware\EncryptCookies::class,
            \Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse::class,
            \Illuminate\Session\Middleware\StartSession::class,
            // \Illuminate\Session\Middleware\AuthenticateSession::class,
            \Illuminate\View\Middleware\ShareErrorsFromSession::class,
            \App\Http\Middleware\VerifyCsrfToken::class,
            \Illuminate\Routing\Middleware\SubstituteBindings::class,
            \App\Http\Middleware\Localization::class,
        ],

        'api' => [
            'throttle:60,1',
            \Illuminate\Routing\Middleware\SubstituteBindings::class,
        ],
    ];
```
## Changing routes
Next, we have to add a route to change locale. We’re using a closure route, but you can use exactly the same code inside your controller if you wish:
```
Route::get('locale/{locale}', function($locale){
    App::setLocale($locale);

    Session::put('locale',$locale);
    return redirect()->route('home');
});
```
### Localization Lang
we have to get switcher
```
    @lang('home.menu001')
```
## The actual switcher
`resource\view\layouts\app.blade.php`
```
<ul class="navbar-nav ml-auto">
                        
    <!-- this URL link is hardcoding, don't use in multiproject on one server-->
    <li class="nav-item">
        <a class="nav-link" href="/locale/en" style="{{ \App::isLocale('en') ?'color: #38c172':''}}">{{ __('en') }}</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="/locale/mm" style="{{ \App::isLocale('mm') ?'color: #38c172':''}}">{{ __('mm') }}</a>
    </li>
                            
</ul>
```
### Show in View Blade
we get data from database
```
@if(App::isLocale('en'))
    <!--your en data form database -->
@else
    <!--your mm data form database -->
@endif
```
