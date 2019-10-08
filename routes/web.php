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

Route::view('/', 'site.pages.homepage')->name('home');
Route::get('user/{id}', 'UserController@show')->name('auth.clearance');
Route::get('user/{id}/hallticket', 'UserController@print')->name('auth.hallticket');



Auth::routes();
require 'admin.php';
