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

//MAIN ROUTE
Route::get('/', 'HomeController@index');
Route::get('/home', 'HomeController@index')->name('home');

//CART ROUTE
Route::get('/cart', 'CartController@index');
Route::get('/addToCart/{pizza}', 'CartController@create');
Route::patch('/updateCart/{cart_id}', 'CartController@update');
Route::delete('/removeCart/{cart_id}', 'CartController@removeCart');

//PIZZA ROUTE
Route::get('/pizza/create', 'PizzaController@create');
Route::get('/pizza/search', 'PizzaController@search');
Route::get('/pizza/{pizza}', 'PizzaController@show');
Route::get('/pizza/{pizza}/edit', 'PizzaController@edit'); 
Route::get('/pizza/{pizza}/delete', 'PizzaController@delete');
Route::post('/pizza', 'PizzaController@store'); 
Route::patch('/pizza/{pizza}/edit', 'PizzaController@update');
Route::delete('/pizza/{pizza}', 'PizzaController@destroy');

//TRANSACTION ROUTE
Route::get('/transaction/{user_id}', 'TransactionController@indexMember');
Route::get('/transaction/{transaction_id}/detail','TransactionController@showDetail');
Route::get('/transaction/{user_id}/{transaction_id}', 'TransactionController@show');
Route::post('/transaction', 'TransactionController@store');
Route::get('/alltransaction', 'TransactionController@indexAdmin');
Route::get('/alluser', 'TransactionController@showUser');

//AUTH ROUTE
Auth::routes();


