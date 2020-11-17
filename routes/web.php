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

Route::get('/', 'HomeController@index');
Route::get('/home', 'HomeController@index')->name('home');

Route::get('/cart/{pizza}', 'PizzaController@showCart');

// Route::get('/pizza/create', 'PizzaController@create');
Route::get('/pizza/{pizza}', 'PizzaController@show');
// Route::get('/pizza/{pizza_id}/edit', 'PizzaController@edit'); 

// Route::post('/pizza', 'PizzaController@store'); 
// Route::delete('/pizza/{pizza_id}', 'PizzaController@destroy'); 

Route::get('/transaction', 'TransactionController@index');
Route::get('/transaction/{transaction_id}', 'TransactionController@show');

Auth::routes();


