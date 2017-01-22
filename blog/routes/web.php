<?php

Route::get('/','MainController@index');

Route::get('/category/{id}','CategoryController@index');

Route::get('/article/{id}','ArticleController@index');

Route::post('/article/{id}', 'CommentController@add_comment');

Auth::routes();

Route::get('/home', 'HomeController@index');

//ADMIN
//Route::get('/admin', 'AdminController@index');


Route::group(['prefix'=>'admin'], function()
{
    Route::get('/', 'AdminController@index');

});
