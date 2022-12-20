@extends('layout.admin_base')

@section('title','Tạo loại sản phẩm')

@section('content')
<h1 class="text-center">Tạo loại sản phẩm</h1>
<form action="{{url('admin/product-type/create')}}" method="POST">
        @csrf
        <br>
        <input name="productTypeCode" type="text" class="form-control" placeholder="Mã loại sản phẩm">
        <br>
        <input name="productTypeName" type="text" class="form-control" placeholder="Tên loại sản phẩm">
        <br>
        <button type="submit" class="btn btn-primary">Thêm mới</button>
    </form>

@endsection

@section('js')

@endsection