<?php 

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TaskController extends Controller{

    public function index(){
        return 'trang index';
    }

    public function create(){
        return 'tạo mới';
    }

    public function store(Request $request){
        $name = $request->input('name');
        $deadline = $request->input('deadline');
        dd($name,$deadline);
    }

    public function show($id){
        return 'trang chi tiết có id = '. $id;
    }

    public function edit($id){
        return 'cập nhật với id = '.$id;
    }

    public function update(Request $request,$id){
        return 'lưu cập nhật với id = '.$id;
    }

    public function destroy($id){
        dd('đã xóa công việc '.$id);
    }

    public function complete($id){
        return 'hoàn thành công việc '.$id;
    }

    public function recomplete($id){
        return 'làm lại công việc ' .$id;
    }
}


?>