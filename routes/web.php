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

Route::get('/', function () {
    return redirect('/home');
});

// Authentication
Route::get('/login', function () {
    return view('auth.login');
})->name('login');
Route::post('/login', 'Auth\LoginController@login')->name('sub.login');
Route::get('/logout', 'Auth\LoginController@logout')->name('logout');
Route::get('/signup', function () {
    return view('auth.signup');
})->name('signup');
Route::post('/signup', 'Auth\RegisterController@register')->name('sub.signup');


// Home
Route::get('/home', 'HomeController@index')->name('home');


// Search
Route::get('/search', 'SearchController@show');


// Topic
Route::get('/topic/{topic:name}', 'TopicController@show')->name('topic');


// Post
Route::prefix('post/')->group(function () {
    Route::get('create', 'NewsPostController@create')->name('create_post');
    Route::post('create', 'NewsPostController@store')->name('store_post');

    Route::get('{newspost:id}/edit', 'NewsPostController@edit')->name('edit_post');
    Route::patch('{newspost:id}/edit', 'NewsPostController@update')->name('update_post');

    Route::get('{newspost:id}', 'NewsPostController@show')->name('post');
});


// Member
Route::prefix('member/')->group(function () {
    Route::get('{member:username}', 'MemberController@show')->name('profile');

    // Settings
    Route::get('{member:username}/edit', 'MemberController@edit')->name('edit_profile');
    Route::patch('{member:username}/edit', 'MemberController@update');

    Route::get('{member:username}/settings', 'MemberController@settings');
});
Route::patch('change_email', 'MemberController@change_email');
Route::patch('change_password', 'MemberController@change_password');


// Notifications
Route::get('/api/notifications', 'NotificationController@getNotificationsModal');


// API
Route::prefix('api/')->group(function () {
    Route::get('posts', 'NewsPostController@search');
    Route::get('topics', 'TopicController@search');
    Route::get('members', 'MemberController@search');
    Route::get('home/{content}/{page}', 'HomeController@content');

    // Member
    Route::prefix('member/')->group(function () {
        Route::delete('{member:username}', 'MemberController@destroy');

        // Content
        Route::get('{member:username}/{content}/{page}', 'MemberController@content');

        // Follow
        Route::post('{member:username}/follow', 'MemberController@follow');
        Route::delete('{member:username}/follow', 'MemberController@unfollow');

        // Modals
        Route::post('{member:id}/following', 'MemberController@getFollowingModal');
        Route::post('{member:id}/followers', 'MemberController@getFollowersModal');
        Route::post('{member:id}/followedTopics', 'MemberController@getFollowedTopicsModal');

        // Report
        Route::post('{member:id}/report', 'MemberController@report');
        Route::delete('{member:username}/dismiss', 'MemberController@dismiss');
    });

    // Post
    Route::prefix('post/')->group(function () {
        Route::delete('{newspost:id}', 'NewsPostController@destroy')->name('delete_post');

        // Comment
        Route::post('{newspost:id}/comment', 'CommentController@comment');
        Route::post('{newspost:id}/comment/{comment:id}/reply', 'CommentController@reply');

        // Vote
        Route::post('{newspost:id}/vote', 'NewsPostController@vote');

        // Bookmark
        Route::post('{newspost:id}/bookmark', 'NewsPostController@bookmark');
        Route::delete('{newspost:id}/bookmark', 'NewsPostController@removeBookmark');

        // Report
        Route::post('{newspost:id}/report', 'NewsPostController@report');
        Route::delete('{newspost:id}/dismiss', 'NewsPostController@dismiss');
    });

    Route::prefix('comment/')->group(function () {
        // Edit
        Route::patch('{comment:id}', 'CommentController@update');
        Route::delete('{comment:id}', 'CommentController@destroy');

        // Vote
        Route::post('{comment:id}/vote', 'CommentController@vote');

        // Report
        Route::post('{comment:id}/report', 'CommentController@report');
        Route::delete('{comment:id}/dismiss', 'CommentController@dismiss');
    });

    Route::prefix('topic/')->group(function () {
        // Content
        Route::get('{topic:name}/posts/{content}/{page}', 'TopicController@content');

        // Follow
        Route::post('{topic:id}/follow', 'TopicController@follow');
        Route::delete('{topic:id}/follow', 'TopicController@unfollow');

        // Report
        Route::post('{topic:id}/report', 'TopicController@report');
        Route::delete('{topic:id}/dismiss', 'TopicController@dismiss');

        Route::delete("{topic:id}", "TopidController@destroy");
    });
});

Route::patch('/api/notifications/read', 'NotificationController@readUnreadNotifications')->middleware('auth');

Route::delete('/api/notification/{id_notification}/delete', 'NotificationController@delete')->middleware('auth');


// Static
Route::get('/about', function () {
    return view('pages.about');
})->name('about');


//  Administration Area
Route::get('/admin', 'AdminController@show');

// Reset Password
Route::get('/forgot-password', 'Auth\ForgotPasswordController@show')->name('password.request');
Route::post('/forgot-password', 'Auth\ForgotPasswordController@sendMail')->name('password.email');
Route::get('/reset-password/{token}', 'Auth\ResetPasswordController@show')->name('password.reset');
Route::post('/reset-password', 'Auth\ResetPasswordController@update')->name('password.update');
