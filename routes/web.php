<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('admin/login', 'UserController@getLogin');
Route::post('admin/login', 'UserController@postLogin');
Route::get('admin/logout', 'UserController@getLogout');

Route::group(['prefix'=>'admin'],function(){
    //admin/TopicStatus/list
    Route::group(['prefix'=>'TopicStatus'], function(){
        Route::get('list','TopicStatusController@getList');

        Route::get('create','TopicStatusController@getCreate')->name('abc');
        Route::post('create', 'TopicStatusController@postCreate');

        Route::get('update/{id}','TopicStatusController@getUpdate');
        Route::post('update/{id}','TopicStatusController@postUpdate');

        Route::get('delete/{id}','TopicStatusController@getDelete');
    });
    Route::group(['prefix'=>'status'], function(){
        Route::get('list','StatusController@getList');

        Route::get('create','StatusController@getCreate');
        Route::post('create','StatusController@postCreate');
        
        Route::get('update/{id}','StatusController@getUpdate');
        Route::post('update/{id}','StatusController@postUpdate');

        Route::get('delete/{id}', 'StatusController@getDelete');
    });
    Route::group(['prefix'=>'topicSuggestion'], function(){
        Route::get('list','TopicSuggestionController@getList');

        Route::get('create','TopicSuggestionController@getCreate');
        Route::post('create', 'TopicSuggestionController@postCreate');

        Route::get('update/{id}','TopicSuggestionController@getUpdate');
        Route::post('update/{id}', 'TopicSuggestionController@postUpdate');

        Route::get('delete/{id}', 'TopicSuggestionController@getDelete');
    });
    Route::group(['prefix'=>'suggestion'], function(){
        Route::get('list','SuggestionController@getList');

        Route::get('create','SuggestionController@getCreate');
        Route::post('create','SuggestionController@postCreate');

        Route::get('update/{id}','SuggestionController@getUpdate');
        Route::post('update/{id}', 'SuggestionController@postUpdate');

        Route::get('delete/{id}', 'SuggestionController@getDelete');

    });
    Route::group(['prefix'=>'user'], function(){
        Route::get('list','UserController@getList');

        Route::get('create','UserController@getCreate');
        Route::post('create','UserController@postCreate');

        Route::get('update/{id}','UserController@getUpdate');
        Route::post('update/{id}', 'UserController@postUpdate');

        Route::get('delete/{id}', 'UserController@getDelete');

    });
    Route::group(['prefix'=>'aboutme'], function(){
        Route::get('list','AboutMeController@getList');

        Route::get('create','AboutMeController@getCreate');
        Route::post('create','AboutMeController@postCreate');

        Route::get('update/{id}','AboutMeController@getUpdate');
        Route::post('update/{id}', 'AboutMeController@postUpdate');

        Route::get('delete/{id}', 'AboutMeController@getDelete');

    });


});