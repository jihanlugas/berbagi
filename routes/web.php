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


Route::get('/', 'SiteController@index');
Route::get('/form', 'SiteController@form');
Route::post('/', 'SiteController@store');

Route::resource('kontak','Kontak');

Route::resource('register','RegisterController');




//Route::get('/kontak', 'Kontak@index');



//Auth::routes();

Route::get('/tes', 'HomeController@index')->name('home');


Route::get('/trait', 'BrandstraitController@index');
