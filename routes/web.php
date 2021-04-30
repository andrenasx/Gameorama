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

Route::get('/', function() {
    return redirect('/home');
});

// Authentication
Route::get('/login', function() {
    return view('auth.login');
});

Route::post('/login', 'Auth\LoginController@login')->name('login');

Route::get('/logout', 'Auth\LoginController@logout')->name('logout');

Route::get('/signup', function() {
    return view('auth.signup');
});

Route::post('/signup', 'Auth\RegisterController@register')->name('signup');


Route::get('/home', function() {
    return view('pages.home');
});

Route::get('/about', function() {
    return view('pages.about');
});

Route::get('/admin', function() {
    return view('pages.admin');
});

Route::get('/topic/{name}', function () {
    return view('pages.topic');
});

// Member
Route::get('/member/{username}', 'MemberController@show')->name('profile');

//  Member Settings
Route::get('/member/{username}/edit', 'MemberController@edit')->name('edit_profile');

Route::patch('/member/{username}/edit', 'MemberController@update');

Route::get('/member/{username}/settings', 'MemberController@settings');

Route::patch('/api/change_email', 'MemberController@change_email');

Route::patch('/api/change_password', 'MemberController@change_password');

Route::delete('/api/member/{username}', 'MemberController@destroy');

//  Member content
Route::get('/api/member/{username}/{content}/{page}', 'MemberController@content');


// Post
Route::get('/post/{id_post}', 'PostController@show')->name('post');

Route::get('/create_post', function() {
    return view('pages.create_post');
});

Route::get('/edit_post', function() {
    return view('pages.edit_post');
});

// Search
Route::get('/search', function() {
    return view('pages.search');
});

Route::get('/404', function () {
    return view('pages.404');
})->name('404');

Route::fallback(function() {
    return view('pages.404');
});
