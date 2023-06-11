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

Route::group(['prefix'=>'documents','middleware' => ['auth']],function(){
    Route::get('/', 'ProjectsController@index');
});

Route::group(['prefix'=>'documents','middleware' => ['auth']],function(){
    Route::get('/create', 'ProjectsController@create');
    Route::POST('/store', 'ProjectsController@store');
});

Route::group(['prefix'=>'documents'],function(){
    Route::get('/show/', 'ProjectsController@show');
});


Route::group(['prefix'=>'documents','middleware' => ['auth']],function(){
    Route::get('/edit/{id}', 'ProjectsController@edit');
    Route::POST('/update/{id}', 'ProjectsController@update');
    Route::POST('/ajax-update/{id}', 'ProjectsController@ajaxupdate');
    Route::get('/status/{id}', 'ProjectsController@status');

});
Route::group(['prefix'=>'documents','middleware' => ['auth']],function(){
    Route::get('/destroy/{id}', 'ProjectsController@destroy');
});

