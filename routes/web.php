<?php

use Illuminate\Support\Facades\Route;

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
Route::get('/', 'HomeController@home')->name('homes.home');

Auth::routes();

Route::prefix('admin')->middleware('auth')->group(function () {
    Route::get('/', 'HomeController@index')->name('homes.index');
    Route::prefix('landingpage')->group(function () {
        Route::get('/index', 'LandingpageController@index')->name('landingpages.index');
        Route::get('/create', 'LandingpageController@create')->name('landingpages.create');
        Route::post('/store', 'LandingpageController@store')->name('landingpages.store');
        Route::get('/edit/{id}', 'LandingpageController@edit')->name('landingpages.edit');
        Route::post('/update/{id}', 'LandingpageController@update')->name('landingpages.update');
        Route::get('/destroy/{id}', 'LandingpageController@destroy')->name('landingpages.destroy');
    });
    Route::prefix('customertype')->group(function () {
        Route::get('/index', 'customertypeController@index')->name('customertypes.index');
        Route::get('/create', 'customertypeController@create')->name('customertypes.create');
        Route::post('/store', 'customertypeController@store')->name('customertypes.store');
        Route::get('/edit/{id}', 'customertypeController@edit')->name('customertypes.edit');
        Route::post('/update/{id}', 'customertypeController@update')->name('customertypes.update');
        Route::get('/destroy/{id}', 'customertypeController@destroy')->name('customertypes.destroy');
    });
    Route::prefix('customer')->group(function () {
        Route::get('/index', 'customerController@index')->name('customers.index');
        Route::get('/create', 'customerController@create')->name('customers.create');
        Route::post('/store', 'customerController@store')->name('customers.store');
        Route::get('/edit/{id}', 'customerController@edit')->name('customers.edit');
        Route::post('/update/{id}', 'customerController@update')->name('customers.update');
        Route::get('/destroy/{id}', 'customerController@destroy')->name('customers.destroy');
    });
});