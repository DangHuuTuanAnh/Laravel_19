<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class HomeController extends Controller
{
    public function index(){

    	// $users = DB::table('users')->get();

    	// $users = DB::table('users')->where('name','Ta')->first();
    	// Storage::put('test1.txt', 'tuan anh');
    	// Storage::put('abc/text.txt', 'tuan anh');

    	//Lấy nội dung file:
    	// $content = Storage::get('test1.txt');

    	//Tạo file:
    	// Storage::disk('local2')->put('abc/test1.txt','tuan anh');

    	// Storage::disk('public')->put('abcd/test1.txt','tuan anh');\

    	//Kiểm tra file có tồn tại trong local k?: -> trả về true/false
    	// $exists = Storage::disk('public')->exists('abcd/test1.txt','tuan anh');

    	//Tải file:
    	//Mặc định trỏ đến local:
		// return Storage::download('abc/test1.txt');

		//Lấy trong disk cụ thể:
    	// return Storage::disk('public')->download('abcd/test1.txt');

    	//Lấy các file trong thư mục:
    	// $files = Storage::files('public');

    	//Lấy tất cả các file trong các thư mục con 
    	// $files = Storage::allFiles('public');

    	//Tạo thư mục:
    	 // Storage::makeDirectory('Test'); 
    	 // Storage::disk('local2')->makeDirectory('Test'); 

    	 //Xóa thư mục:

    	 // Storage::deleteDirectory('Test');	

    	// dd($files);

    	// dd($exists);

    	// dd($content);
    	

    	// dd($users);
    	return view('frontend.home');
    }
}
