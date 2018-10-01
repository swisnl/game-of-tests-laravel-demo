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

Route::get('/', [
    'as' => 'game-of-tests',
    'uses' => 'GameOfTestsController@index'
]);
Route::get('faq', [
    'as' => 'faq',
    function(){
        return view('game-of-tests.faq');
    }
]);
Route::get('/{user}', [
    'as' => 'user-tests',
    'uses' => 'GameOfTestsController@user'
]);
