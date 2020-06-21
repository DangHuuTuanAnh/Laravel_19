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

Route::get('/', function () {

	return view('welcome');
})->middleware('auth');
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



Route::group([
    "prefix" =>"admin",
	'namespace' => 'Backend',
	// 'middleware'=> 'auth'
], function (){
    // Trang dashboard - trang chủ admin
	Route::get('/dashboard', 'DashboardController@index')->name('backend.dashboard');
    // Quản lý sản phẩm
	Route::group(['prefix' => 'products'], function(){
		Route::get('/', 'ProductController@index')->name('backend.product.index');
       Route::get('/create', 'ProductController@create')->name('backend.product.create');
       Route::get('/{id}', 'ProductController@show')->name('backend.product.show');
	});
    //Quản lý người dùng
	Route::group(['prefix' => 'users'], function(){
		Route::get('/', 'UserController@index')->name('backend.user.index');
		Route::get('/create', 'UserController@create')->name('backend.user.create');
		Route::get('/{id}', 'UserController@showProducts')->name('backend.user.showProducts');
	});
	//Quản lý danh mục
	Route::group(['prefix' => 'categories'], function(){
		Route::get('/', 'CategoryController@index')->name('backend.category.index');
		Route::get('/{id}', 'CategoryController@showProducts')->name('backend.category.showProducts');
	});
	//Quản lý hình ảnh
	Route::group(['prefix' => 'images'], function(){
		Route::get('/{id}','ImageController@show')->name('backend.image.show');
	});
	//Quản lý đơn hàng:
	Route::group(['prefix' => 'orders'], function(){
		Route::get('/{id}','OrderController@showProducts')->name('backend.order.showProducts');
	});
});


// Route::get('/',function(){
// 	$users = \Illuminate\Support\Facades\DB::table('users')->get();

// 	dd($users);
// });
Route::get('/','Frontend\HomeController@index')->name('frontend.home');



//Đăng ký & đăng nhập

//middleware bắt buộc phải đăng nhập

// public function __construct()
// {
//     $this->middleware('auth');
// }
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
