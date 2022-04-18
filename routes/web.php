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
    Route::prefix('categories')->group(function () {
        Route::get('/index', [
            'as' => 'categories.index',
            'uses' => 'CategoryController@index'
        ]);
        Route::get('/create', [
            'as' => 'categories.create',
            'uses' => 'CategoryController@create'
        ]);
        Route::post('/store', [
            'as' => 'categories.store',
            'uses' => 'CategoryController@store'
        ]);
        Route::get('/edit/{id}', [
            'as' => 'categories.edit',
            'uses' => 'CategoryController@edit'
        ]);
        Route::post('/update/{id}', [
            'as' => 'categories.update',
            'uses' => 'CategoryController@update'
        ]);
        Route::get('/destroy/{id}', [
            'as' => 'categories.destroy',
            'uses' => 'CategoryController@destroy'
        ]);
    });
    
});


