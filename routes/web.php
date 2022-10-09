<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Auth;
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

// Route::get('/todos', 'App\Http\Controllers\TodosController@index');

// Route::get('todos/{todo}', 'App\Http\Controllers\TodosController@show');

// Route::get('new-todos', 'App\Http\Controllers\TodosController@create');

// Route::post('/store-todos', 'App\Http\Controllers\TodosController@store');

Route::resource('new-todos', 'App\Http\Controllers\TodosController', ['only' => [
    'show', 'store','create','index','edit', 'update']
]);

Route::get('new-todos/{todo}/delete','App\Http\Controllers\TodosController@destroy');

Route::get('new-todos/{todo}/complete', 'App\Http\Controllers\TodosController@complete');

// Route::resource('new-todos', 'App\Http\Controllers\TodosController', ['except' => [
    
// ]]);
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');