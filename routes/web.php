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
Route::get('/', [
    'as' => 'homes.home',
    'uses' => 'HomeController@home'
]);

Auth::routes();

Route::prefix('admin')->middleware('auth')->group(function () {
    Route::get('/', [
        'as' => 'homes.index',
        'uses' => 'HomeController@index'
    ]);
});