<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Edit todo</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
</head>
<body>
<nav class="navbar navbar-default">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">Todo</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li><a href="#">Danh sách công việc</a></li>
            </ul>
            <form class="navbar-form navbar-left">
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Tìm kiếm">
                </div>
                <button type="submit" class="btn btn-default">Tìm</button>
            </form>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="#">Thông báo</a></li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">hoannc <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="#">Action</a></li>
                        <li><a href="#">Another action</a></li>
                        <li><a href="#">Something else here</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="#">Separated link</a></li>
                    </ul>
                </li>
            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>
<div class="container">
    <form action="{{ route('task.update', $task->id)  }}" method="POST" class="" role="form">
        @csrf
        {{method_field('put')}}
        <div class="form-group">
            <legend>Cập Nhật</legend>
        </div>
        <div class="form-group">
            <label class="control-label" for="todo">Tên công việc:</label>
            <input name="name" type="text" class="form-control" id="todo" placeholder="Enter todo" value="{{$task->name}}">
        </div>
        <div class="form-group">
            <label class="control-label" for="todo">Mô tả:</label>
            <textarea name="content" class="form-control">{{$task->content}}</textarea>
        </div>
        <div class="form-group">
            <label class="control-label" for="todo">Mức độ ưu tiên:</label>
            <select name="priority">
                <option value="0" @if($task->priority ==0) selected="selected" @endif>Bình thường</option>
                <option value="1" @if($task->priority ==1) selected="selected" @endif>Quan trọng</option>
                <option value="2" @if($task->priority ==2) selected="selected" @endif>Khẩn cấp</option>
            </select>
        </div>
        <div class="form-group">
            <label class="control-label" for="todo">Thời hạn:</label>
             <input type="datetime-local" name="deadline" id="task-name" class="form-control" value="{{\Carbon\Carbon::parse($task->deadline)->format('Y-m-d')}}T{{\Carbon\Carbon::parse($task->deadline)->format('H:i')}}">
        </div>

        <div class="form-group">
            <div class="">
                <button type="submit" class="btn btn-primary">Cập nhật</button>
                <button type="submit" class="btn btn-primary"><a href="{{route('task.index')}}"></a>Quay lại</button>
            </div>
        </div>
    </form>
</div>

</body>
<!-- Latest compiled and minified CSS & JS -->
<script src="//code.jquery.com/jquery.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</html>