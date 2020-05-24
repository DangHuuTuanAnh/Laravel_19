<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>TO DO</title>
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
		<table class="table">
			<thead>
				<th>Tên Công Việc</th>
			</thead>
			<tr>
				<td>Làm bài tập Laravel</td>
				<td>
					<a href="{{ route('todo.task.complete') }}" class="btn btn-success">Complete</a>
					<a href="{{ route('todo.task.reset') }}" class="btn btn-danger">Reset</a>
				</td>
			</tr>
			<tr>
				<td>Làm bài tập PHP</td>
				<td>
					<a href="{{ route('todo.task.complete') }}" class="btn btn-success">Complete</a>
					<a href="{{ route('todo.task.reset') }}" class="btn btn-danger">Reset</a>
				</td>
			</tr>
			<tr>
				<td>Làm project Laravel</td>
				<td>
					<a href="{{ route('todo.task.complete') }}" class="btn btn-success">Complete</a>
					<a href="{{ route('todo.task.reset') }}" class="btn btn-danger">Reset</a>
				</td>
			</tr>
		</table>
	</div>
</body>
</html>