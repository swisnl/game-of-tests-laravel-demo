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