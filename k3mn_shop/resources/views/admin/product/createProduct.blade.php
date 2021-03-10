@extends('adminlte::page')

@section('title', 'Tạo sản phẩm')

@section('content_header')
    
    
@stop

@section('content')
    <!-- Nội dung chính của trang quản trị -->
  <form action="{{ route('adminProduct.store') }}" method="POST">
    @csrf
    <div class="card card-primary">
      <div class="card-header">
        <h1 class="card-title">Thêm mới sản phẩm</h1>
      </div>
      <!-- /.card-header -->
      <div class="card-body col-md-8">
        <div class="form-group">
          <label for="productName">Tên sản phẩm mới</label>
          <input type="text" name="name" class="form-control form-control-border" id="productName" placeholder="IPhone 12 Pro Max...">
        </div>
        <div class="form-group">
          <label>Lựa chọn danh mục cho sản phẩm</label>          
          <select name="category_id" class="form-control select2bs4 select2-hidden-accessible" style="width: 100%;" data-select2-id="17" tabindex="-1" aria-hidden="true">
            @foreach ($categories as $category)
              @if ($loop->index == 0)
                <option value="{{ $category->id }}" selected="selected">{{ $category->name }}</option>
              @else
                <option value="{{ $category->id }}">{{ $category->name }}</option>
              @endif
            @endforeach          
          </select>
        </div>
        <div class="form-group">
          <label for="productImage">Ảnh sản phẩm</label>
          <input type="text" name="image" class="form-control form-control-border" id="productImage" placeholder="Ảnh...">
        </div>
        <div class="form-group">
          <label for="shortDesc">Mô tả ngắn</label>
          <input type="text" name="short_desc" class="form-control form-control-border" id="shortDesc" placeholder="Tập hợp các dòng điện thoại mới nhất...">
        </div>
        <div class="form-group">
          <label for="fullDesc">Mô tả chi tiết</label>
          <textarea class="form-control" name="full_desc" id="fullDesc" rows="3" placeholder="Cung cấp điện thoại uy tín..."></textarea>
        </div>
        <div class="form-group">
          <label for="productPrice">Giá bán sản phẩm</label>
          <input type="number" name="price" class="form-control form-control-border" id="productPrice">
        </div>
        <div class="form-group">
          <label>Trạng thái sản phẩm</label>          
          <select name="status_product_id" class="form-control select2bs4 select2-hidden-accessible" style="width: 100%;" data-select2-id="17" tabindex="-1" aria-hidden="true">
            @foreach ($status_products as $status_product)
              @if ($loop->index == 0)
                <option value="{{ $status_product->id }}" selected="selected">{{ $status_product->name }}</option>
              @else
                <option value="{{ $status_product->id }}">{{ $status_product->name }}</option>
              @endif
            @endforeach          
          </select>
        </div>
        <div class="custom-control custom-switch">
          <input name="star" type="checkbox" class="custom-control-input" id="productStar">
          <label class="custom-control-label" for="productStar">Sản phẩm nổi bật?</label>
        </div>
        <div>
          <br>          
          <button type="submit" class="btn btn-success float-right">Xác nhận</button>
          <a href="{{ route('adminProduct.index') }}" class="btn btn-danger float-right">Hủy bỏ</a>
        </div>        
      </div>
      <!-- /.card-body -->
    </div>
  </form>
@stop

@section('css')
    <!-- <link rel="stylesheet" href="/css/admin_custom.css"> -->
@stop

@section('js')
  
@stop