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

Route::get('/', function () {
    return view('home');
});

Route::get('/allcards', 'CardsController@index');

Route::get('/card/{id}', 'CardsController@show');

Route::resource('/card/{id}/edit', 'CardsController@edit');

Route::post('/generatecards', ['as' => 'generatecards', 'uses' => 'CardsController@create']);

Route::post('/addprise', ['as' => 'addprise', 'uses' => 'CardsController@addprise']);

Route::post('/editcard', ['as' => 'editcard', 'uses' => 'CardsController@editcard']);
