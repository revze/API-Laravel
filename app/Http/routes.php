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

Route::get('/', 'HomeController@index');

Route::get('master/currency','HomeController@currency');
Route::get('cronGetCurrency','HomeController@getCurrency');
Route::get('master/lang','HomeController@lang');
Route::get('cronGetLang','HomeController@getLang');
Route::get('master/country','HomeController@country');
Route::get('cronGetCountry','HomeController@getCountry');

Route::get('master/airport','HomeController@airport');
Route::get('cronGetAirport','HomeController@getAirport');

Route::get('airline/flight',['as'=>'airline_flight',
                              'uses'=>'Reservasi@flight']);

Route::post('airline/flight/search',['as'=>'ajax_search_flight',
                                      'uses'=>'Reservasi@searchFlight']);
