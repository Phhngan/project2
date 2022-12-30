@extends('layout.base_page')

@section('title','Đồ ngọt')

@section('content')
<div class="row">
@forelse($products as $product)
<div class="column-product">
      <div class="card">
        <img src="{{$product->img_url}}" style="width:100%">
        <h4 class="ten-sp">{{$product->prd_name}}</h4>
        <p class="price">{{$product->prd_price}} VND</p>
        <a class="btn-detail" href="#" role="button">Xem chi tiết</a>
        <a class="btn-add-to-cart" href="#" role="button">Thêm vào giỏ</a>
      </div>
    </div>
@empty
    <h3>Không có sản phẩm </h3> 
    @endforelse
    </div>
@endsection

@section('js')
@parent

@endsection