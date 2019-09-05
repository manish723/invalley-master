<?php

Route::get('/', 'Cp\AdminController@getHomeRedirect');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix' => 'service-blocks'], function() {
    Route::get('/', 'Cp\ServiceBlockController@getList');
    Route::get('a/{uuid}', 'Cp\ServiceBlockController@getAjaxBlock');
    Route::delete('a/{uuid}', 'Cp\ServiceBlockController@deleteServiceBlock');

    Route::post('/', 'Cp\ServiceBlockController@postServiceBlock');
    Route::post('order', 'Cp\ServiceBlockController@postOrder');
});

Route::group(['prefix' => 'blog'], function() {
    Route::get('/', 'Cp\BlogController@getList');
    Route::get('new-post', 'Cp\BlogController@getNewPost');
    Route::get('edit-post/{uuid}', 'Cp\BlogController@getEditPost');
    Route::post('edit-post/', 'Cp\BlogController@postEditPost');

    Route::delete('a/{uuid}', 'Cp\BlogController@deletePost');
});

Route::group(['prefix' => 'upload'], function() {
    Route::post('service-block-icon', 'Cp\UploaderController@postServiceBlockIcon');
});