@extends('backend.layouts.master')
@section('title')
Trang Thêm Mới Sản Phẩm
@endsection

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<div class="container-fluid">
		<div class="row mb-2">
			<div class="col-sm-6">
				<h1 class="m-0 text-dark">Tạo sản phẩm</h1>
			</div><!-- /.col -->
			<div class="col-sm-6">
				<ol class="breadcrumb float-sm-right">
					<li class="breadcrumb-item"><a href="#">Home</a></li>
					<li class="breadcrumb-item"><a href="#">Sản phẩm</a></li>
					<li class="breadcrumb-item active">Tạo sản phẩm</li>
				</ol>
			</div><!-- /.col -->
		</div><!-- /.row -->
	</div><!-- /.container-fluid -->
	<!-- Content -->
	<div class="container-fluid">
		<!-- Main row -->
		<div class="row">
			<div class="col-md-12">
				<!-- general form elements -->
				<div class="card">
					<div class="card-header">
						<h3 class="card-title">Tạo sản phẩm</h3>
					</div>
					<!-- /.card-header -->
					<!-- form start -->
					<form role="form" method="post" action="{{ route('backend.product.store') }}" enctype="multipart/form-data">
						@csrf
						
						<div class="card-body">
							<div class="form-group">
								<label for="exampleInputEmail1">Tên sản phẩm</label>
								<input type="text" name="name" class="form-control" id="" placeholder="Điền tên sản phẩm">
								{{-- Hiển thị lỗi từng ô input --}}
								@error('name')
								<p style="color: red;">{{$message}}</p>
								@enderror
							</div>
							<div class="form-group">
								<label>Danh mục sản phẩm</label>
								<select name="category_id" class="form-control select2" style="width: 100%;">
									<option>--Chọn danh mục---</option>
									@foreach($categories as $category)
									<option value="{{ $category->id }}">{{ $category->name }}</option>
									@endforeach
								</select>
								@error('category_id')
								<p style="color: red;">{{$message}}</p>
								@enderror
							</div>
							<div class="row">
								<div class="col-6">
									<div class="form-group">
										<label>Giá gốc</label>
										<input type="text" name="origin_price" class="form-control" placeholder="Điền giá gốc">
									</div>
									@error('origin_price')
									<p style="color: red;">{{$message}}</p>
									@enderror
								</div>
								<div class="col-6">
									<div class="form-group">
										<label>Giá bán</label>
										<input type="text" name="sale_price" class="form-control" placeholder="Điền giá gốc">
									</div>
									@error('sale_price')
									<p style="color: red;">{{$message}}</p>
									@enderror
								</div>
							</div>
							<div class="form-group">
								<label for="exampleInputEmail1">Mô tả sản phẩm</label>
								<textarea class="textarea" name="content" placeholder="Place some text here"
								style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
								@error('content')
								<p style="color: red;">{{$message}}</p>
								@enderror
							</div>
							<div class="form-group">
								<label for="exampleInputFile">Hình ảnh sản phẩm</label>
								<div class="input-group">
									<div class="custom-file">
										<input type="file" class="custom-file-input" id="exampleInputFile" name="images[]" multiple>
										<label class="custom-file-label" for="exampleInputFile" >Choose file</label>
									</div>
									<div class="input-group-append">
										<span class="input-group-text" id="">Upload</span>
									</div>
								</div>
								@error('images')
								<p style="color: red;">{{$message}}</p>
								@enderror
							</div>

							{{-- Test mảng JSON --}}
							{{-- <div>
								<label>THÔNG SỐ KỸ THUẬT</label>
								<div class="row">
									<div class="col-6">
										<div class="form-group">
											<div class="row">
												<label class="col-4">Hãng sản xuất</label>
												<input class="col-8" type="text" name="manufacturer" class="form-control" placeholder="">
											</div>
										</div>
									</div>
									<div class="col-6">
										<div class="form-group">
											<div class="row">
												<label class="col-4">Kích thước</label>
												<input class="col-8" type="text" name="size" class="form-control" placeholder="">
											</div>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-6">
										<div class="form-group">
											<div class="row">
												<label class="col-4">Trọng lượng</label>
												<input class="col-8" type="text" name="weight" class="form-control" placeholder="">
											</div>
										</div>
									</div>
									<div class="col-6">
										<div class="form-group">
											<div class="row">
												<label class="col-4">Bộ nhớ đệm/Ram</label>
												<input class="col-8" type="text" name="ram" class="form-control" placeholder="">
											</div>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-6">
										<div class="form-group">
											<div class="row">
												<label class="col-4">Bộ nhớ trong</label>
												<input class="col-8" type="text" name="memory" class="form-control" placeholder="">
											</div>
										</div>
									</div>
									<div class="col-6">
										<div class="form-group">
											<div class="row">
												<label class="col-4">Loại SIM</label>
												<input class="col-8" type="text" name="sim" class="form-control" placeholder="">
											</div>
										</div>
									</div>
								</div>


							</div> --}}
							{{-- Kết thúc test --}}
							<div class="form-group">
								<label>Trạng thái sản phẩm</label>
								<select name="status" class="form-control select2" style="width: 100%;">
									<option>--Chọn trạng thái---</option>
									<option value="0">Đang nhập</option>
									<option value="1">Mở bán</option>
									<option value="-1">Hết hàng</option>
								</select>
								@error('status')
								<p style="color: red;">{{$message}}</p>
								@enderror
							</div>
						</div>
						<!-- /.card-body -->

						<div class="card-footer">
							<a href="{{ route('backend.product.index') }}" class="btn btn-default">Huỷ bỏ</a>
							<button type="submit" class="btn btn-success">Tạo mới</button>
						</div>
					</form>
				</div>
			</div>
		</div>
		<!-- /.row (main row) -->
	</div><!-- /.container-fluid -->
</div>
</section>
@endsection

