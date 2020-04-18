<?php

Route::get('/', 'HomeController@index')->name('index');

Route::prefix('blog')->name('blog.')->group(function () {
    Route::get('/', 'BlogController@index')->name('index');
    Route::get('/{slug}', 'BlogController@detail')->name('detail');
    Route::post('/commentSave', 'BlogController@commentSave')->name('commentSave');
});


Route::prefix('category')->name('category.')->group(function () {
    Route::get('/', 'CategoryController@index')->name('index');
    Route::get('/{slug}', 'CategoryController@detail')->name('detail');
});


Route::get('/arama', 'SearchController@index')->name('search');
