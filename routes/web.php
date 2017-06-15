<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group(['middleware' => [ 'auth']], function (){

    Route::match(['get','post'], '/', ['uses' => 'MainController@index', 'as' => 'main']);
    Route::match(['get','post'], '/statistic', ['uses' => 'StatisticController@index', 'as' => 'statistic']);
    Route::match(['get','post'], '/cards', ['uses' => 'CardsController@index', 'as' => 'cards']);
    Route::match(['get','post'], '/password', ['uses' => 'MainController@password', 'as' => 'password']);
    Route::match(['get','put'], '/change', ['uses' => 'MainController@update', 'as' => 'change']);


    Route::resource('/order', 'OrdersController');
    Route::resource('/position', 'PositionsController');
    Route::resource('/menuposition', 'MenuPositionsController');

    Route::group(['middleware' => [ 'mainStewardManagerAccess']], function () {
        Route::resource('/steward', 'StewardsController');
        Route::resource('/event', 'EventsController');
    });

    Route::group(['middleware' => [ 'managerAccess']], function () {
        Route::resource('/manager', 'ManagersController');
        Route::resource('/club', 'ClubsController');
        Route::resource('/phone', 'PhonesController');
    });

    Route::get('/noaccess', ['uses' => 'MainController@noaccess', 'as' => 'noaccess']);

    //Route::any( '/picture', ['uses' => 'PicturesController@index', 'as' => 'pictures']);
//
//    Route::get('/logout', ['uses' => 'MainController@logout', 'as' => 'logout']);



});

Route::auth();
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
