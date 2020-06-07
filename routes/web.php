<?php

// use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {

// 	return view('hello1');
// });
	// Route::get('/', function () {

	// 	return view('home');
	// });

// Route::get('/profile', function () {

// 	return view('profile',[
// 		'name'=>'Đặng Tuấn Anh',
// 		'years'=>'1997',
// 		'school'=>'Kinh Tế Kỹ Thuật Công Nghiệp',
// 		'address'=>'Bắc Giang'

// 	]);
// });

// Route::get('/list', function () {

	// return view('list',['list'=>[
	// 	[
	// 		'name' => 'Học View trong Laravel',
	// 		'status' => 0
	// 	],
	// 	[
	// 		'name' => 'Học Route trong Laravel',
	// 		'status' => 1
	// 	],
	// 	[
	// 		'name' => 'Làm bài tập View trong Laravel',
	// 		'status' => -1
	// 	]
	// ]]);
	// return view('list');
// });

// Route::prefix('task')->group(function(){
// 	Route::get('complete/3',function(){
// 		return "Hoàn thành!";
// 	})->name('todo.task.complete');
// 	Route::get('reset/3',function(){
// 		return "Làm lại!";
// 	})->name('todo.task.reset');
// });


	

Route::resource('task', 'Frontend\TaskController');
Route::group([
	"prefix"=>"task",
	"namespace"=>'Frontend'
],function(){
	Route::get('/', 'TaskController@index')->name('task.index');
	// Route::get('store/{id?}', 'TaskController@store')->name('task.store');
	Route::match(['put','patch'], '{task}', 'TaskController@store')->name('task.store');
	Route::get('show/{id?}', 'TaskController@show')->name('task.show');
	// Route::get('update/{id?}', 'TaskController@update');
	Route::match(['put','patch'], '{task}', 'TaskController@update')->name('task.update');
	Route::get('{id?}/edit', 'TaskController@edit')->name('task.edit');

	Route::get('destroy/{id?}', 'TaskController@destroy')->name('task.destroy');
	Route::get('complete/{id?}', 'TaskController@complete')->name('task.complete');
	Route::get('recomplete/{id?}', 'TaskController@recomplete')->name('task.recomplete');
});



