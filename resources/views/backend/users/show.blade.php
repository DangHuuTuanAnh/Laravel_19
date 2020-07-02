@extends('backend.layouts.master')
@section('title')
Trang Quản Lý Người Dùng
@endsection

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<!-- Content Header -->
	<div class="container-fluid">
		<div class="row mb-2">
			<div class="col-sm-6">
				<h1 class="m-0 text-dark">Thông tin khách hàng</h1>
			</div><!-- /.col -->
			<div class="col-sm-6">
				<ol class="breadcrumb float-sm-right">
					<li class="breadcrumb-item"><a href="#">Home</a></li>
					<li class="breadcrumb-item"><a href="#">Sản phẩm</a></li>
					<li class="breadcrumb-item active">Danh sách</li>
				</ol>
			</div><!-- /.col -->
		</div><!-- /.row -->
	</div><!-- /.container-fluid -->
	<!-- Content -->
	<div class="container-fluid">
		<!-- Main row -->
		<div class="row">

			<div class="col-12">
				<div class="card">
					<div class="card-header">
						<h3 class="card-title">Thông tin khách hàng</h3>

						<div class="card-tools">
							<div class="input-group input-group-sm" style="width: 150px;">
								<input type="text" name="table_search" class="form-control float-right" placeholder="Search">

								<div class="input-group-append">
									<button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
								</div>
							</div>
						</div>
					</div>
					<!-- /.card-header -->
					<div class="card-body table-responsive p-0">
						<table class="table table-hover">
							<thead>
								<tr>
									<th>ID</th>
									<th>Tên khách hàng</th>
									<th>Sản phẩm đã mua</th>
									<th>Thời gian</th>
									{{-- <th>Status</th> --}}
									
									<th>Mô tả</th>
								</tr>
							</thead>
							<tbody>
								
								<tr>
									<td>{{$user->id}}</td>
									<td>{{$user->name}}</td>
									
									{{-- <td>
										@foreach($products as $product)
										{{$product->name}}<br>
										@endforeach
									</td> --}}
									<td>{{$user->updated_at}}</td>
									{{-- <td><span class="tag tag-success">Approved</span></td> --}}
									
								</tr>
							</tbody>
						</table>
					</div>
					{{-- {!! $products->links() !!} --}}
					<!-- /.card-body -->
					<div class="card-footer">
						<a href="{{ route('backend.user.index') }}" class="btn btn-default">Quay Lại</a>
					</div>
				</div>
				<!-- /.card -->
			</div>
		</div>
		<!-- /.row (main row) -->
	</div><!-- /.container-fluid -->
</div>
</section>
@endsection

