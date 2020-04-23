<?php

Route::name('panel.')->group(function () {
    Auth::routes([
        'register' => false,
        'reset' => false,
        'verify' => false,
    ]);
    Route::get('/logout', 'Auth\LoginController@logout')->name('logout_get');



    Route::middleware(['auth'])->group(function () {

        Route::get('/', 'HomeController@index')->name('dawnstar');


        Route::prefix('Admin')->name('admin.')->group(function () {
            Route::get('/', 'AdminController@index')->name('index');
            Route::get('/create', 'AdminController@create')->name('create');
            Route::post('/store', 'AdminController@store')->name('store');

            Route::prefix('/{id}')->group(function () {
                Route::get('/edit', 'AdminController@edit')->name('edit');
                Route::post('/update', 'AdminController@update')->name('update');
                Route::get('/delete', 'AdminController@delete')->name('delete');
            });
        });

        Route::prefix('Category')->name('category.')->group(function () {
            Route::get('/', 'CategoryController@index')->name('index');
            Route::get('/create', 'CategoryController@create')->name('create');
            Route::post('/store', 'CategoryController@store')->name('store');
            Route::post('/orderSave', 'CategoryController@orderSave')->name('orderSave');

            Route::prefix('/{id}')->group(function () {
                Route::get('/edit', 'CategoryController@edit')->name('edit');
                Route::post('/update', 'CategoryController@update')->name('update');
                Route::get('/delete', 'CategoryController@delete')->name('delete');
            });
        });

        Route::prefix('Tag')->name('tag.')->group(function () {
            Route::get('/', 'TagController@index')->name('index');
            Route::get('/create', 'TagController@create')->name('create');
            Route::post('/store', 'TagController@store')->name('store');
            Route::post('/orderSave', 'TagController@orderSave')->name('orderSave');

            Route::prefix('/{id}')->group(function () {
                Route::get('/edit', 'TagController@edit')->name('edit');
                Route::post('/update', 'TagController@update')->name('update');
                Route::get('/delete', 'TagController@delete')->name('delete');
            });
        });

        Route::prefix('Blog')->name('blog.')->group(function () {
            Route::get('/', 'BlogController@index')->name('index');
            Route::get('/create', 'BlogController@create')->name('create');
            Route::post('/store', 'BlogController@store')->name('store');

            Route::get('/getTags', 'BlogController@getTags')->name('getTags');

            Route::prefix('/{id}')->group(function () {
                Route::get('/edit', 'BlogController@edit')->name('edit');
                Route::post('/update', 'BlogController@update')->name('update');
                Route::get('/delete', 'BlogController@delete')->name('delete');
            });
        });

        Route::prefix('Comment')->name('comment.')->group(function () {
            Route::get('/', 'CommentController@index')->name('index');
            Route::get('/updateRead', 'CommentController@updateRead')->name('updateRead');

            Route::prefix('/{id}')->group(function () {
                Route::get('/updateStatus', 'CommentController@updateStatus')->name('updateStatus');
                Route::get('/delete', 'CommentController@delete')->name('delete');
            });
        });


        Route::post('/ckEditorUpload', 'CkEditorController@upload')->name('ckEditorUpload');

    });
});
