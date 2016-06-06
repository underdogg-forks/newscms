<?php

/*
 * Routes inside the web middleware have:
 * - CSRF Protection
 * - Encrypted Cookies
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
                Route::get('/', function () {
                    return Theme::view('admin.posts.list');
                });
                // Create new Post/Draft
                Route::get('/new', function () {
                    return Theme::view('admin.posts.new');
                });

                // Update current Post/Draft
                Route::get('/update/{id}', function ($id) {
                    return Theme::view('admin.posts.update');
                });

                // List deleted posts/drafts
                Route::post('/deleted', function ($id) {
                    return Theme::view('admin.posts.deleted');
                });
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
    Route::get('/category/{category}', function () {

    });
    Route::group(['prefix' => '/{year}'], function () {
        // Get posts from a specific year
        Route::get('/', function () {

        });
        Route::group(['prefix' => '/{month}'], function () {
            // Get posts from a specific month in a specific year
            Route::get('/', function () {

            });
            // Get an individual post
            Route::get('/{slug}', function () {

            });
        });
    });
});
