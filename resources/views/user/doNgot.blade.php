@extends('layout.base_page')

@section('title','Đồ ngọt')

@section('style')
.danhmuc-sp{
  height: 500px;
}
body{
  background-color: #EBECFE;
}
@endsection

@section('content')
<div class="cf-title">
  <h3>Đồ ngọt</h3>
</div>
<div class="row danhmuc-sp">
  @forelse($products as $product)
  <div class="column-product">
    <div class="card">
      <img src="{{$product->img_url}}" style="height:298px" id="zoom"><br>
      <h4 class="ten-sp">{{$product->prd_name}}</h4>
      <p class="price">{{$product->prd_price}} VND</p><br>
      <a class="btn-detail" href="/{{$product->prd_id}}/productDetails" role="button">Xem chi tiết</a>
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