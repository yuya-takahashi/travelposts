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

Route::get('/', 'TravelpostsController@index');

Route::get('signup', 'Auth\RegisterController@showRegistrationForm')->name('signup.get');
Route::post('signup', 'Auth\RegisterController@register')->name('signup.post');

Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login')->name('login.post');
Route::get('logout', 'Auth\LoginController@logout')->name('logout.get');

Route::group(['middleware' => ['auth']], function () {
    Route::group(['prefix' => 'users/{id}'], function () {
        Route::get('favorites', 'UsersController@favorites')->name('users.favoritings');
    });    
    Route::resource('users', 'UsersController', ['only' => ['index', 'show']]);
    Route::resource('travelposts', 'TravelpostsController', ['only' => ['create', 'store', 'destroy']]);
});

Route::group(['prefix' => 'travelposts/{id}'], function () {
        Route::post('favorite', 'FavoritesController@store')->name('travelposts.favorite');
        Route::delete('unfavorite', 'FavoritesController@destroy')->name('travelposts.unfavorite');
    });