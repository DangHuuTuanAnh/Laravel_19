<?php 

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\task;

class TaskController extends Controller{

    public function index(){
        // $tasks = Task::all();
        $tasks = Task::where('status', 1)
        ->orderBy('created_at', 'desc')
        ->take(5)
        ->get();  //lấy ra dữ liệu
        foreach ($tasks as $task){
            // echo $task->name .$task->deadline."<br>";
        }
        return view('todolist')->with(['tasks'=>$tasks]);
    }

    public function create(){
        return 'tạo mới';
    }

    public function store(Request $request){
        // $name = $request->input('name');
        // $deadline = $request->input('deadline');
        // dd($name,$deadline);

        $name = $request->get('name');
        // $status = $request->get('status');
        $content = $request->get('content');
        $deadline = $request->get('deadline');

        $task = new Task();
        $task->name = $name;
        // $task->status = $status;
        $task->content = $content;   
        // $task->deadline = '2019-12-17 23:00:00';
        $task->deadline = $deadline;
        $task->save();

        // $tasks = Task::all();
        // foreach ($tasks as $task){
        //     // echo $task->name .$task->deadline."<br>";
        // }
        // return view('list')->with(['tasks'=>$tasks]);
        return redirect()->back();
    }

    public function show($id){
    // return 'trang chi tiết có id = '. $id;
    // $task = Task::find($id);
        $task = Task::find($id);
        $task = Task::where('id', $id)->first();

        // dd($task->name);
    }

    public function edit($id){
        return 'cập nhật với id = '.$id;
    }

    public function update(Request $request,$id){
    // return 'lưu cập nhật với id = '.$id;
       $task = Task::find($id);
       $task->name = 'Học Laravel 123';
       $task->status = 1;
       $task->save();
   }

   public function destroy($id){
    // dd('đã xóa công việc '.$id);
    $task = Task::find($id);
    $task->delete();

    // $tasks = Task::all();
    // foreach ($tasks as $task){
    //         // echo $task->name .$task->deadline."<br>";
    // }
    // return view('list')->with(['tasks'=>$tasks]);
    return redirect()->back();

}

public function complete($id){
    return 'hoàn thành công việc '.$id;
}

public function recomplete($id){
    return 'làm lại công việc ' .$id;
}
}


?>