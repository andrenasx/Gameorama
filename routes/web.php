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


// Home
Route::get('/home', 'HomeController@index');

Route::get('/api/home/{content}/{page}', 'HomeController@content');

// Topic
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


// Static
Route::get('/404', function () {
    return view('pages.404');
})->name('404');

Route::fallback(function() {
    return view('pages.404');
});

Route::get('/about', function () {
    return view('pages.about');
})->name('About');


// Storage files
Route::get('media/{path}', 'MediaController@retrieve');
