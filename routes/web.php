<?php

Route::get('/', 'HomeController@index')->name('index');

Route::prefix('blog')->name('blog.')->group(function () {
    Route::get('/', 'BlogController@index')->name('index');
    Route::get('/{slug}', 'BlogController@detail')->name('detail');
    Route::post('/commentSave', 'BlogController@commentSave')->name('commentSave');
});


Route::prefix('kategori')->name('category.')->group(function () {
    Route::get('/', 'CategoryController@index')->name('index');
    Route::get('/{slug}', 'CategoryController@detail')->name('detail');
});


Route::get('/arama', 'SearchController@index')->name('search');


Route::get('/sitemap.xml', 'SitemapXmlController@index')->name('sitemap');


Route::get('/wp-admin', function() {
    return view('errors.wp');
});


