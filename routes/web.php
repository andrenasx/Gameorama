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

// Search
Route::get('/search', 'SearchController@show');

Route::get('/api/posts', 'PostController@search');
Route::get('/api/topics', 'TopicController@search');
Route::get('/api/members', 'MemberController@search');


// Topic
Route::get('/topic/{name}', 'TopicController@show')->name('topic');

Route::get('/api/topic/{name}/posts/{content}/{page}', 'TopicController@content');


// Member
Route::get('/member/{username}', 'MemberController@show')->name('profile');

//  Member Settings
Route::get('/member/{username}/edit', 'MemberController@edit')->name('edit_profile');

Route::patch('/member/{username}/edit', 'MemberController@update');

Route::get('/member/{username}/settings', 'MemberController@settings');

Route::patch('/api/change_email', 'MemberController@change_email');

Route::patch('/api/change_password', 'MemberController@change_password');

Route::delete('/api/member/{username}', 'MemberController@destroy');

Route::post('api/post/{id_post}/comment', 'CommentController@comment')->middleware('auth'); //(to be changed later) redirect to login page/modal

Route::post('api/post/{id_post}/vote', 'PostController@vote')->middleware('auth');

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
