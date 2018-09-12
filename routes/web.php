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
    return redirect('/users');
});

Auth::routes();

Route::group(['middleware' => 'auth'], function () {
    Route::get('/users', 'UsersController@index')->name('users');
    Route::get('/user/new', 'UsersController@new_form')->name('user/new_form');
    Route::post('/user','UsersController@create_user')->name('/user');
    Route::post('/user/{id}','UsersController@update_user')->name('/user_edit');            
    Route::get('/user/{id}','UsersController@edit_form')->name('user/edit_form');
    Route::put('/user/favorite',
            'UsersController@favorite_toogle')
            ->name('/user/favorite');
    Route::delete('/user/{id}',
            'UsersController@delete_user')
            ->name('user/delete');
    Route::get('/payments','PaymentsController@index')->name('payments');
});