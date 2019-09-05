<?php

Route::get('/', 'PageController@getHome');
Route::get('services', 'PageController@getServices');
Route::get('services/{page}', 'PageController@getServicePage');
Route::get('resellers', 'PageController@getResellers');
Route::get('reviews', 'PageController@getReviews');
Route::get('about-us', 'PageController@getAbout');
Route::get('contact-us', 'PageController@getContact');

Route::post('contact-us', 'PageController@postContact');

Route::get('home', 'Cp\AdminController@getHomeRedirect');

Route::group(['prefix' => 'blog'], function() {
    Route::get('post/{slugYear}/{slugMonth}/{slug}', 'BlogController@getPost');
});