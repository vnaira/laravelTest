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

Route::get('/', function () {
    return view('home');
});
Route::get('/singers', 'SingersController@home');

Route::get('/discs', 'DiscsController@index');
Route::get('/newsinger', function () {
	return view('createsinger');
});
Route::get('/newdisc', 'DiscsController@newDisc');


Route::post('/insert','SingersController@add' );
Route::post('/insert_disc','DiscsController@add' );

Route::get('/edit_singer/{id}', 'SingersController@update');
Route::get('/edit_disc/{id}', 'DiscsController@update');

Route::post('/update_singer/{id}','SingersController@doUpdate' );
Route::post('/update_disc/{id}','DiscsController@doUpdate' );
Route::get('/delete_disc/{id}','DiscsController@delete' );

Route::get('/delete_singer/{id}','SingersController@delete' );
Route::get('/disc_list/{id}','SingersController@getDiscList' );