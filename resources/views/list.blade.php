

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Danh sách công việc</title>
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="http://netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">

	<!-- Optional theme -->
	<link rel="stylesheet" href="http://netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap-theme.min.css">

	<!-- Latest compiled and minified JavaScript -->
	<script src="http://netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
</head>
<body>
	<div class="container">
		<h3 class="text-center">Danh Sách Công Việc</h3>
		<form method="post" action="{{route('task.store')}}">
			{{csrf_field()}}
			<p>Thêm mới công việc</p>
			<input type="text" name="name">
			<p>Thời hạn</p>
			<input type="text" name="deadline">
			<input type="submit" value="Thêm mới" class="btn btn-primary">
		</form>
		<table class="table">
			<thead>
				<th>Tên Công Việc</th>
			</thead>
			@foreach($list as $value )
			<tr>
				<td>{{$value['name']}}</td>
				{{-- <td>
					@if($value['status'] == 0)
					<a href="" class="btn btn-info">Chưa làm!</a>
					@elseif($value['status'] == 1)
					<a href="" class="btn btn-success">Đã hoàn thành</a>
					@else
					<a href="" class="btn btn-danger">Không thực hiện</a>
					@endif
				</td> --}}

				<td>
					<a href="{{route('task.complete',10)}}" class="btn btn-success">Hoàn Thành</a>
					<a href="{{route('task.recomplete',10)}}" class="btn btn-info">Làm lại</a>
					<a href="{{route('task.destroy',10)}}" class="btn btn-danger">Xóa</a>
				</td>
			</tr>
			@endforeach
		</table>
	</div>
</body>
</html>
