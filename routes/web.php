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

Route::get('/', 'HomeController@index');
Route::get('/home', 'HomeController@index')->name('home');
//Route::get('search', 'HomeController@search')->name('search');

Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::get('logout', 'Auth\LoginController@logout')->name('get_logout');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');

Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('register', 'Auth\RegisterController@register');

Route::get('aboutme', 'AboutController@index')->name('aboutme');

Route::resource('todolist', 'TodolistController');
Route::get('todolist', 'TodolistController@index')->name('todolist');
Route::post('/todolist/{id}', 'TodolistController@update')->name('todolist.update');

Route::get('search', 'TodolistController@search')->name('search');
Route::get('mymap', 'MyMapController@index')->name('mymap');
Route::get('movie', 'MovieController@index')->name('movie');

//Auth::routes();
Route::prefix('login/social')->name('social.')->group(function(){
    Route::get('{provider}/redirect', 'Auth\SocialController@getSocialRedirect')->name('redirect');
    Route::get('{provider}/callback', 'Auth\SocialController@getSocialCallback')->name('callback');
});

