<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('master/currency','HomeController@currency');
Route::get('cronGetCurrency','HomeController@getCurrency');
Route::get('master/lang','HomeController@lang');
Route::get('cronGetLang','HomeController@getLang');
Route::get('master/country','HomeController@country');
Route::get('cronGetLang','HomeController@getCountry');
