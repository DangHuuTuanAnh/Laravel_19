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

Route::get('/', function () {

	return view('welcome1');
});

Route::prefix('task')->group(function(){
	Route::get('complete/3',function(){
		return "Hoàn thành!";
	})->name('todo.task.complete');
	Route::get('reset/3',function(){
		return "Làm lại!";
	})->name('todo.task.reset');
});
