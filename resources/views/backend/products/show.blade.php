@extends('backend.layouts.master')
@section('title')
Trang Quản Lý Sản Phẩm
@endsection

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<!-- Content Header -->
	<section class="content">

      <!-- Default box -->
      <div class="card card-solid">
        <div class="card-body">
          <div class="row">
            <div class="col-12 col-sm-6">
              <h3 class="d-inline-block d-sm-none">LOWA Men’s Renegade GTX Mid Hiking Boots Review</h3>
              @foreach($image as $img)
              <div class="col-12">
                <img src="{{$img->path}}" class="product-image" alt="Product Image">
              </div>
              @endforeach
              <div class="col-12 product-image-thumbs">
              	@foreach($images as $image)
                <div class="product-image-thumb active"><img src="{{$image->path}}" alt="Product Image"></div>
                @endforeach
              
              </div>
            </div>
            <div class="col-12 col-sm-6">
              <h3 class="my-3">{{$product->name}}</p>

              <hr>
             
			
              <div class="bg-gray py-2 px-3 mt-4">
                <h2 class="mb-0">
                  Giá bán: {{number_format($product->sale_price)}} VNĐ
                </h2>
                <h4 class="mt-0">
                  <small>Giá gốc: {{number_format($product->origin_price)}} VNĐ</small>
                </h4>
              </div>

              {{-- <div class="mt-4">
                <div class="btn btn-primary btn-lg btn-flat">
                  <i class="fas fa-cart-plus fa-lg mr-2"></i> 
                  Add to Cart
                </div>

                <div class="btn btn-default btn-lg btn-flat">
                  <i class="fas fa-heart fa-lg mr-2"></i> 
                  Add to Wishlist
                </div>
              </div> --}}

              <div class="mt-4 product-share">
                <a href="#" class="text-gray">
                  <i class="fab fa-facebook-square fa-2x"></i>
                </a>
                <a href="#" class="text-gray">
                  <i class="fab fa-twitter-square fa-2x"></i>
                </a>
                <a href="#" class="text-gray">
                  <i class="fas fa-envelope-square fa-2x"></i>
                </a>
                <a href="#" class="text-gray">
                  <i class="fas fa-rss-square fa-2x"></i>
                </a>
              </div>

            </div>
          </div>
          <div class="row mt-4">
            <nav class="w-100">
              <div class="nav nav-tabs" id="product-tab" role="tablist">
                <a class="nav-item nav-link active" id="product-desc-tab" data-toggle="tab" href="#product-desc" role="tab" aria-controls="product-desc" aria-selected="true">Description</a>
                <a class="nav-item nav-link" id="product-comments-tab" data-toggle="tab" href
              </div>
            </nav>
            <div class="tab-content p-3" id="nav-tabContent">
              <div class="tab-pane fade show active" id="product-desc" role="tabpanel" aria-labelledby="product-desc-tab">{!! $product->content!!}</div>
            </div>
          </div>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->

    </section>
</div>
</section>
@endsection

