<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Response;

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

Route::prefix('')->group(function () {


    /*
    * Login
    */
    Route::get('/', 'Auth\LoginController@getLoginView');
    Route::post('/login', 'Auth\LoginController@login')->name('auth.login');

    /*
    * Register
    */
    Route::get('/register', 'Auth\LoginController@create');
    Route::post('/register', 'Auth\LoginController@register')->name('auth.register');

});


