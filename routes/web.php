<?php

use Illuminate\Support\Facades\Route;

Auth::routes();


Route::get('locale/{locale}', function($locale){
    App::setLocale($locale);

    Session::put('locale',$locale);
    return redirect()->route('home');
});
Route::get('/', 'PostController@index')->name('home');
