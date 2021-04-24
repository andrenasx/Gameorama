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

/* EXAMPLES
// Home
Route::get('/', 'Auth\LoginController@home');

// Cards
Route::get('cards', 'CardController@list');
Route::get('cards/{id}', 'CardController@show');

// API
Route::put('api/cards', 'CardController@create');
Route::delete('api/cards/{card_id}', 'CardController@delete');
Route::put('api/cards/{card_id}/', 'ItemController@create');
Route::post('api/item/{id}', 'ItemController@update');
Route::delete('api/item/{id}', 'ItemController@delete');

// Authentication
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::get('logout', 'Auth\LoginController@logout')->name('logout');
Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('register', 'Auth\RegisterController@register');
*/

//Search
Route::get('/search', function() {
    return view('pages.search');
});

Route::get('/login', function() {
    return view('pages.login');
});

Route::get('/signup', function() {
    return view('pages.signup');
});

Route::get('/home', function() {
    return view('pages.home');
});

Route::get('/settings', function() {
    return view('pages.settings');
});

Route::get('/about', function() {
    return view('pages.about');
});

Route::get('/admin', function() {
    return view('pages.admin');
});

Route::get('/topic', function() {
    return view('pages.topic');
});

Route::get('/profile', function() {
    return view('pages.profile');
});

Route::get('/create_post', function() {
    return view('pages.create_post');
});

Route::get('/edit_post', function() {
    return view('pages.edit_post');
});

Route::get('/edit_profile', function() {
    return view('pages.edit_profile');
});