<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TodoController;


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

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::prefix('todos')->as('todos.')->controller(TodoController::class)->group(function () {

    Route::get('index', 'index')->name('index');
    Route::get('create', 'create')->name('create');
    Route::get('edit', 'edit')->name('edit');
    Route::post('store', 'store')->name('store');
    Route::get('show/{id}', 'show')->name('show');
    Route::get('edit/{id}', 'edit')->name('edit');
    Route::put('update', 'update')->name('update');
    Route::delete('destroy/{id}', 'destroy')->name('destroy');


});