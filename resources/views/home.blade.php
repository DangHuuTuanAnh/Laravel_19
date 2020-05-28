@extends('layouts.master')
@section('css')
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title>AdminLTE 3 | Blank Page</title>
<!-- Tell the browser to be responsive to screen width -->
<meta name="viewport" content="width=device-width, initial-scale=1">

<!-- Font Awesome -->
<link rel="stylesheet" href="asset/plugins/fontawesome-free/css/all.min.css">
<!-- Ionicons -->
<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
<!-- overlayScrollbars -->
<link rel="stylesheet" href="asset/dist/css/adminlte.min.css">
<!-- Google Font: Source Sans Pro -->
<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
@endsection

@section('title')
Trang Chủ
@endsection

@section('content')
<div class="wrapper">
	<!-- Content Wrapper. Contains page content -->
	<div class="content-wrapper">
		<!-- Content Header (Page header) -->
		<section class="content-header">
			<div class="container-fluid">
				<div class="row mb-2">
					<div class="col-sm-6">
						<h1>TRANG CHỦ</h1>
					</div>
					<div class="col-sm-6">
						<ol class="breadcrumb float-sm-right">
							<li class="breadcrumb-item"><a href="#">Home</a></li>
							<li class="breadcrumb-item active">Trang chủ</li>
						</ol>
					</div>
				</div>
			</div><!-- /.container-fluid -->
		</section>

		<!-- Main content -->
		<section class="content">

			<!-- Default box -->
			<div class="card">
				<div class="card-header">
					<h3 class="card-title">Title</h3>

					<div class="card-tools">
						<button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
							<i class="fas fa-minus"></i></button>
							<button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
								<i class="fas fa-times"></i></button>
							</div>
						</div>
						<div class="card-body">
							Đây là trang chủ
						</div>
						<!-- /.card-body -->
						<div class="card-footer">
							Footer
						</div>
						<!-- /.card-footer-->
					</div>
					<!-- /.card -->

				</section>
				<!-- /.content -->
			</div>
		</div>
		@endsection

		@section('script')
		<!-- jQuery -->
		<script src="asset/plugins/jquery/jquery.min.js"></script>
		<!-- Bootstrap 4 -->
		<script src="asset/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
		<!-- AdminLTE App -->
		<script src="asset/dist/js/adminlte.min.js"></script>
		<!-- AdminLTE for demo purposes -->
		<script src="asset/dist/js/demo.js"></script>
		@endsection
