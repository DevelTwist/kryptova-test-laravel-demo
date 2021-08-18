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
    Route::get('/', 'Auth\LoginController@getLoginView')->name('login');
    Route::post('/login', 'Auth\LoginController@login')->name('auth.login');
    Route::get('/logout', 'Auth\LoginController@logout')->name('auth.logout');

    /*
    * Register
    */
    Route::get('/register', 'Auth\LoginController@getRegisterView');
    Route::post('/register', 'Auth\LoginController@register')->name('auth.register');

    /*
    * Students
    */
    Route::group(['middleware' => 'auth'], function () {
        Route::get('/students', 'Data\StudentController@index')->name('show.student');
        Route::post('/students', 'Data\StudentController@create')->name('create.student');
        Route::patch('/students/{id}', 'Data\StudentController@update')->name('update.student');
        Route::delete('/students/{id}', 'Data\StudentController@destroy')->name('delete.student');
    });

});


