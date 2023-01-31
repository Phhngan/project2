@extends('layout.base_page')

@section('title','Tất cả sản phẩm')

@section('style')
body{
background-color: #EBECFE;
}
@endsection

@section('content')
<div class="cf-title">
  <h3>Tất cả sản phẩm</h3>
</div>
<div class="row danhmuc-sp">
@forelse($products as $product)
    @if($product->prd_discount > 0)
    <div class="column-sales">
      <div class="card">
        <img src="{{$product->img_url}}" style="height:290px;width:290px" id="zoom">
        <div class="khuyen-mai">
          <p><strong>- {{$product->prd_discount}}%</strong></p>
        </div>
        <br>
        <h4 class="ten-sp">{{$product->prd_name}}</h4>
        <a class="price" id="old-price">{{number_format($product->prd_price).' VND'}}</a>
        <a class="price" id="new-price">{{number_format($product->prd_price * (100 - $product->prd_discount)/100).' VND'}}</a>
        <a class="btn-detail" href="/{{$product->prd_id}}/productDetails" role="button">Xem chi tiết</a>
        <div class="popup" onclick="addToCart()">
        <a class="btn-add-to-cart" href="/{{$product->prd_id}}/addCart" role="button">Thêm vào giỏ</a>
            <span class="popuptext" id="myPopup">Đã thêm vào giỏ</span>
          </div>
      </div>
    </div>
    @else
    <div class="column-product">
      <div class="card">
        <img src="{{$product->img_url}}" style="height:290px;width:290px" id="zoom">
        <br>
        <h4>{{$product->prd_name}}</h4>
        <p class="price">{{number_format($product->prd_price).' VND'}}</p>
        <br>
        <a class="btn-detail" href="/{{$product->prd_id}}/productDetails" role="button">Xem chi tiết</a>
        <div class="popup" onclick="addToCart()">
        <a class="btn-add-to-cart" href="/{{$product->prd_id}}/addCart" role="button">Thêm vào giỏ</a>
            <span class="popuptext" id="myPopup">Đã thêm vào giỏ</span>
          </div>
      </div>
    </div>
    @endif
    @empty
    <h3>Không có sản phẩm </h3>
    @endforelse
</div>
{{ $products->links() }}
@endsection

@section('js')
@parent
<script>
function addToCart() {
  var popup = document.getElementById("myPopup");
  popup.classList.toggle("show");
}
</script>
@endsection