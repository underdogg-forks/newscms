<?php

/*
 * Routes inside the web middleware have:
 * - CSRF Protection
 * - Encrypted Cookies
 * All Routes have Encrypted Sessions
 */
Route::group(['middleware' => 'web'], function () {
    /*
     * Administration routes must come first in order to be loaded properly
     */
    Route::group(['prefix' => '/admin'], function () {
        Route::group(['middleware' => 'auth'], function () {
            Route::get('/', function () {
                return Theme::view('admin.index');
            });
            Route::group(['prefix' => '/posts'], function () {
                // List posts/drafts
                Route::get('/', 'Admin\PostsController@getPosts');
                Route::post('/deleted', 'Admin\PostsController@getDeletedPosts');
                // Create new Post/Draft
                Route::get('/new', function () {
                    return Theme::view('admin.posts.new');
                });
                Route::post('/new', 'Admin\PostsController@createPost');

                // Update current Post/Draft
                Route::get('/update/{id}', 'Admin\PostsController@getPostToUpdate');
                Route::post('/update/{id}', 'Admin\PostsController@updatePost');

                // Delete a post softly or permanently depending on list its being deleted from.
                Route::delete('/delete/{id}', 'Admin\PostsController@deletePost');
            });
        });

        // Authentication (no registration or activation, only admins can create users)
        Route::get('/login', function () {
            return Theme::view('admin.auth.login');
        });
        Route::post('/login', 'Auth\AuthController@login');;
    });

    /*
     * Post them selves and home page must come last.
     */
    Route::get('/', function () {
        return Theme::view('welcome');
    });
    // Get a post of a certain category
    Route::get('/category/{category}', 'PostsController@getCategories');
    Route::group(['prefix' => '/{year}'], function () {
        // Get posts from a specific year
        Route::get('/', 'PostsController@getYear');
        Route::group(['prefix' => '/{month}'], function () {
            // Get posts from a specific month in a specific year
            Route::get('/', 'PostsController@getMonth');
            // Get an individual post
            Route::get('/{slug}', 'PostsController@getSlug');
        });
    });
});
