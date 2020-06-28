@extends('backend.layouts.master')
@section('title')
Trang Quản Lý Sản Phẩm
@endsection

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<!-- Content Header -->
	<div class="container-fluid">
		<div class="row mb-2">
			<div class="col-sm-6">
				<h1 class="m-0 text-dark">Danh sách sản phẩm</h1>
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
						<h3 class="card-title">Sản phẩm mới nhập</h3>

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
									<th>Tên sản phẩm</th>
									<th>Thời gian</th>
									<th></th>
									{{-- <th>Mô tả</th> --}}
								</tr>
							</thead>
							<tbody>
								@foreach($products as $product)
								<tr>
									<td>{{$product->id}}</td>
									<td>{{$product->name}}</td>
									<td>{{$product->updated_at}}</td>
									{{-- <td><span class="tag tag-success">Approved</span></td> --}}
									<td>
										<form action="{{route('backend.product.show',$product->id)}}">
											<button type="submit" class="btn btn-success">
												<i class="fa fa-btn fa-eye"></i> Xem
											</button>
										</form>
										<form action="{{-- {{route('backend.product.edit',$product->id)}} --}}" >

											
											<button type="submit" class="btn btn-primary">
												<i class="fa fa-btn fa-pen"></i> Sửa
											</button>
										</form>
										<form action="{{-- {{route('backend.product.destroy',$product->id)}} --}}" >
											{{ csrf_field() }}
											{{ method_field('DELETE') }}
											<button type="submit" class="btn btn-danger">
												<i class="fa fa-btn fa-trash"></i> Xoá
											</button>
										</form>

									</td>
								</tr>
								@endforeach
								
							</tbody>
						</table>
					</div>
					{!! $products->links() !!}
					<!-- /.card-body -->
				</div>
				<!-- /.card -->
			</div>
		</div>
		<!-- /.row (main row) -->
	</div><!-- /.container-fluid -->
</div>
</section>
@endsection

