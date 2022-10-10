<?php

use Illuminate\Support\Facades\Auth;
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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::middleware('auth')->name('admin.')->prefix('admin')->group(function () {
    Route::resource('dishes', 'DishesController');

    Route::get('/orders', 'OrdersController@index')->name('orders.index');
    Route::get('/orders/{id}', 'OrdersController@show')->name('orders.show');
    Route::delete('/orders/{id}', 'OrdersController@destroy')->name('orders.destroy');
});

Route::get('/{any}', function () {
    return view('welcome');
})->where('any', '.*');
