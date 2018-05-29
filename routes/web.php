<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
| 73WA23z22M
*/

Route::get('/', 'IndexController@index');
Route::post('/signup', 'IndexController@signup');
Route::post('/contact-us', 'IndexController@contactUs');


Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});
