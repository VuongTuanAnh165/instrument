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
});