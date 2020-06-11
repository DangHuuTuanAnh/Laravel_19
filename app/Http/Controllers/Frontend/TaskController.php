<?php 

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\task;

class TaskController extends Controller{

    public function index(){
        // $tasks = Task::all();
        $tasks = Task::orderBy('created_at', 'desc')
        ->take(5)
        ->get();  //lấy ra dữ liệu
        foreach ($tasks as $task){
            // echo $task->name .$task->deadline."<br>";
        }
        return view('todolist')->with(['tasks'=>$tasks]);
    }

    public function create(){
        return view('create');
    }

    public function store(Request $request){
        // $name = $request->input('name');
        // $deadline = $request->input('deadline');
        // dd($name,$deadline);

        $name = $request->get('name');
        $content = $request->get('content');
        $deadline = $request->get('deadline');
        $priority = $request->get('priority');

        // status  == todo::Done(){}

        $task = new Task();
        $task->name = $name;
        $task->content = $content;   
        $task->deadline = $deadline;
        $task->priority = $priority;
        $task->save();

        // dd($name,$content);
        // return redirect()->back();
        return redirect()->route('task.index');
    }

    public function show($id){
    // $task = Task::find($id);
        $task = Task::find($id);
        // dd($task);
        // $task = Task::where('id', $id)->first();

        return view('show')->with(['task'=>$task]);

    }

    public function edit($id){
       $task = Task::find($id);   
       return view('edit')->with(['task'=>$task]);

   }

   public function update(Request $request,$id){
       $name = $request->get('name');
       $deadline = $request->get('deadline');
       $content = $request->get('content');
       $content = $request->get('content');
       $priority = $request->get('priority');
        // Cập nhật
       $task = Task::find($id);
       $task->name = $name;
       $task->status = 1;
       $task->content = $content;
       $task->deadline = $deadline;
       $task->priority = $priority;
       $task->save();
        return redirect()->route('task.index');

   }

   public function destroy($id){
    $task = Task::find($id);
    $task->delete();

    
    return redirect()->back();

}

public function complete($id){
    $task = Task::find($id);
    $task->status = 2;
    $task->save();
    return redirect()->route('task.index');
}

public function recomplete($id){
   $task = Task::find($id);
   $task->status = 1;
   $task->save();
   return redirect()->route('task.index');
}


}


?>