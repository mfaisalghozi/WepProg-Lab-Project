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



Route::get('/pizza/create', 'PizzaController@create');
Route::get('/pizza/{pizza}', 'PizzaController@show');
// Route::get('/pizza/{pizza_id}/edit', 'PizzaController@edit'); 
Route::get('/pizza/{pizza_id}/delete', 'PizzaController@delete');


// Route::post('/pizza', 'PizzaController@store'); 
// Route::delete('/pizza/{pizza_id}', 'PizzaController@destroy'); 

Route::get('/transaction/{user_id}', 'TransactionController@indexMember');
Route::get('/transaction/{user_id}/{transaction_id}', 'TransactionController@show');

Route::post('/transaction', 'TransactionController@store');

Route::get('/alltransaction', 'TransactionController@indexAdmin');
Route::get('/alluser', 'TransactionController@showUser');



Auth::routes();


