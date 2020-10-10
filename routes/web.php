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


Route::get('/','PagesController@welcome')->name('welcome');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::post('generateqr','PagesController@generateqr')->name('generateqr');

Route::resource('passes','PassController');

Route::post('/passes/loadpasses','PassController@loadpasses')->name('passes.loadpasses');

Route::post('/passes/loadprint','PassController@loadprint')->name('pass.loadprint');
Route::post('/passes/addtoprint','PassController@addtoprint')->name('pass.addtoprint');
Route::post('/passes/removetoprint','PassController@removetoprint')->name('pass.removetoprint');

Route::get('/printpass','PassController@printpass')->name('printpass');
