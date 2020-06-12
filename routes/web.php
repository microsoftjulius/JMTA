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

Route::get('/dashboard','TraineesController@getAllTrainees');
Route::get('/suspend-trainee/{id}','TraineesController@suspendTrainee');
Route::get('/approve-trainee/{id}','TraineesController@activateTrainee');
Route::get('/',function(){
    return redirect('/dashboard');
});
Route::get('export', 'TraineesController@export');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
