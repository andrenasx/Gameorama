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
Route::get('/home', 'HomeController@index')->name('home');

Route::get('/api/home/{content}/{page}', 'HomeController@content');

// Search
Route::get('/search', 'SearchController@show');

Route::get('/api/posts', 'NewsPostController@search');
Route::get('/api/topics', 'TopicController@search');
Route::get('/api/members', 'MemberController@search');


// Topic
Route::get('/topic/{name}', 'TopicController@show')->name('topic');

Route::get('/api/topic/{name}/posts/{content}/{page}', 'TopicController@content');

Route::post('/api/topic/{id_topic}/report', 'TopicController@report');

//Topic Follow
Route::post('/api/topic/{id_topic}/follow', 'TopicController@follow');

Route::delete('/api/topic/{id_topic}/follow', 'TopicController@unfollow');



// Member
Route::get('/member/{username}', 'MemberController@show')->name('profile');

//  Member Settings
Route::get('/member/{username}/edit', 'MemberController@edit')->name('edit_profile');

Route::patch('/member/{username}/edit', 'MemberController@update');

Route::get('/member/{username}/settings', 'MemberController@settings');

Route::patch('/api/change_email', 'MemberController@change_email');

Route::patch('/api/change_password', 'MemberController@change_password');

Route::delete('/api/member/{username}', 'MemberController@destroy');




Route::post('api/post/{id_post}/comment', 'CommentController@comment');
Route::patch('/api/comment/{id_comment}', 'CommentController@update');
Route::delete('/api/comment/{id_comment}', 'CommentController@destroy');

Route::post('api/post/{id_post}/comment/{id_comment}/reply', 'CommentController@reply');

Route::post('api/post/{id_post}/vote', 'NewsPostController@vote');

Route::post('/api/comment/{id_comment}/vote', 'CommentController@vote');


//Member Follow
Route::post('/api/member/{username}/follow', 'MemberController@follow');

Route::delete('/api/member/{username}/follow', 'MemberController@unfollow');

//  Member content
Route::get('/api/member/{username}/{content}/{page}', 'MemberController@content');

Route::post('/api/member/{id_member}/report', 'MemberController@report');

//Member modals
Route::post('/api/member/{id_member}/following', 'MemberController@getFollowingModal');
Route::post('/api/member/{id_member}/followers', 'MemberController@getFollowersModal');
Route::post('/api/member/{id_member}/followedTopics', 'MemberController@getFollowedTopicsModal');

// Post
Route::get('/post/create', 'NewsPostController@create')->name('create_post');

Route::post('/post/create', 'NewsPostController@store')->name('store_post');

Route::get('/post/{id_post}/edit', 'NewsPostController@edit')->name('edit_post');

Route::patch('/post/{id_post}/edit', 'NewsPostController@update')->name('update_post');

Route::get('/post/{id_post}', 'NewsPostController@show')->name('post');

Route::delete('/api/post/{id_post}', 'NewsPostController@destroy')->name('delete_post');

Route::post('/api/post/{id_post}/report', 'NewsPostController@report');

//Post Bookmark
Route::post('/api/post/{id_post}/bookmark', 'NewsPostController@bookmark');

Route::delete('/api/post/{id_post}/bookmark', 'NewsPostController@removeBookmark');


//Comment

Route::post('/api/comment/{id_comment}/report', 'CommentController@report')->middleware('auth');

Route::delete("/api/topic/{id_topic}", "TopidController@destroy");


//Notifications
Route::get('/api/notifications', 'NotificationController@getNotificationsModal')->middleware('auth');


// Static
Route::get('/404', function () {
    return view('pages.404');
})->name('404');

Route::fallback(function() {
    return view('pages.404');
});

Route::get('/about', function () {
    return view('pages.about');
})->name('about');


//  Administration Area
Route::get('/admin', 'AdminController@show');

Route::delete('/api/post/{id_post}/dismiss', 'NewsPostController@dismiss');

Route::delete('/api/comment/{id_comment}/dismiss', 'CommentController@dismiss');

Route::delete('/api/topic/{id_topic}/dismiss', 'TopicController@dismiss');

Route::delete('/api/member/{username}/dismiss', 'MemberController@dismiss');
