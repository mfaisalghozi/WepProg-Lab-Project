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

Route::get('/cart', 'PizzaController@showCart');
Route::get('/addToCart/{pizza}', 'PizzaController@addToCart');
route::patch('/updateCart/{cart_id}', 'PizzaController@updateCart');
route::delete('/removeCart/{cart_id}', 'pizzaController@removeCart');


Route::get('/pizza/create', 'PizzaController@create');
Route::get('/pizza/search', 'PizzaController@search');
Route::get('/pizza/{pizza}', 'PizzaController@show');
Route::get('/pizza/{pizza}/edit', 'PizzaController@edit'); 
Route::get('/pizza/{pizza}/delete', 'PizzaController@delete');


Route::post('/pizza', 'PizzaController@store'); 
Route::patch('/pizza/{pizza}/edit', 'PizzaController@update');
Route::delete('/pizza/{pizza}', 'PizzaController@destroy');

Route::get('/transaction/{user_id}', 'TransactionController@indexMember');
Route::get('/transaction/{transaction_id}/detail','TransactionController@showDetail');
Route::get('/transaction/{user_id}/{transaction_id}', 'TransactionController@show');

Route::post('/transaction', 'TransactionController@store');

Route::get('/alltransaction', 'TransactionController@indexAdmin');
Route::get('/alluser', 'TransactionController@showUser');


Auth::routes();


