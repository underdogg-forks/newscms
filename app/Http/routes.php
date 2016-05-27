<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
Route::group(['middleware' => 'web'], function () {
    Route::get('/', function () {
        return Theme::view('welcome');
    });

    // All Administration Routes
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
});
