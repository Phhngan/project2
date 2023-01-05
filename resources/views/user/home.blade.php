@extends('layout.base_page')

@section('title','Home')

@section('css-link')
@endsection

@section('style')

@endsection

@section('content')

<div class="main">
  <div class="row">
    <div class="leftcolumn">
      <section class="slideShow">
        <img class="mySlides" src="https://github.com/Phhngan/snack_images/blob/master/silder/snack3.jpg?raw=true" style="width:100%">
        <img class="mySlides" src="https://github.com/Phhngan/snack_images/blob/master/silder/snack2.jpg?raw=true" style="width:100%">
        <img class="mySlides" src="https://github.com/Phhngan/snack_images/blob/master/silder/snack1.jpg?raw=true" style="width:100%">
      </section>
    </div>
    <div class="rightcolumn">
      <table class="table">
        <tr>
          <th>Danh mục sản phẩm</th>
        </tr>
        <tr>
          <td>
            <a href="/products" class="menu">Tất cả sản phẩm</a>
          </td>
        </tr>
        <tr>
          <td>
            <a href="/doMan" class="menu">Đồ mặn</a>
          </td>
        </tr>
        <tr>
          <td>
            <a href="doNgot" class="menu">Đồ ngọt</a>
          </td>
        </tr>
        <tr>
          <td>
            <a href="doUong" class="menu">Đồ uống</a>
          </td>
        </tr>
      </table>
      <br>
      <img src=" https://www.packagingstrategies.com/ext/resources/ISSUES/2021/06-June/MarketTrends-FamilyShot.jpg" alt="tra-hoa-qua" style="width:100%">
    </div>
  </div>
</div>


<!-- San pham moi -->
<div class="sp-moi">
  <h2 class="tieu-de">SẢN PHẨM MỚI NHẤT</h2>
  <div class="row">
    @forelse($newProducts as $newProduct)
    @if($newProduct->prd_discount > 0)
    <div class="column-sales">
      <div class="card">
        <img src="{{$newProduct->img_url}}" alt="tra-hoa-qua" style="width:100%" id="zoom">
        <div class="khuyen-mai">
          <p><strong>- {{$newProduct->prd_discount}}%</strong></p>
        </div>
        <br>
        <h4 class="ten-sp">{{$newProduct->prd_name}}</h4>
        <a class="price" id="old-price">{{$newProduct->prd_price}}VND</a>
        <a class="price" id="new-price">{{$newProduct->prd_price * (100 - $newProduct->prd_discount)/100}}VND</a>
        <a class="btn-detail" href="/{{$newProduct->prd_id}}/productDetails" role="button">Xem chi tiết</a>
        <a class="btn-add-to-cart" href="#" role="button">Thêm vào giỏ</a>
      </div>
    </div>
    @else
    <div class="column-product">
      <div class="card">
        <img src="{{$newProduct->img_url}}" alt="com-chay" style="width:100%" id="zoom">
        <br>
        <h4>{{$newProduct->prd_name}}</h4>
        <p class="price">{{$newProduct->prd_price}}VND</p>
        <br>
        <a class="btn-detail" href="/{{$newProduct->prd_id}}/productDetails" role="button">Xem chi tiết</a>
        <a class="btn-add-to-cart" href="#" role="button">Thêm vào giỏ</a>
      </div>
    </div>
    @endif
    @empty
    <h3>Không có sản phẩm </h3>
    @endforelse
  </div>
</div>

<!-- San pham giam gia -->
<div class="sp-moi">
  <h2 class="tieu-de">SẢN PHẨM GIẢM GIÁ</h2>
  <div class="row">
    @forelse($discountProducts as $discountProduct)
    @if($discountProduct->prd_discount > 0)
    <div class="column-sales">
      <div class="card">
        <img src="{{$discountProduct->img_url}}" alt="tra-hoa-qua" style="width:100%" id="zoom">
        <div class="khuyen-mai">
          <p><strong>- {{$discountProduct->prd_discount}}%</strong></p>
        </div>
        <br>
        <h4 class="ten-sp">{{$discountProduct->prd_name}}</h4>
        <a class="price" id="old-price">{{$discountProduct->prd_price}}VND</a>
        <a class="price" id="new-price">{{$discountProduct->prd_price * (100 - $discountProduct->prd_discount)/100}}VND</a>
        <a class="btn-detail" href="/{{$discountProduct->prd_id}}/productDetails" role="button">Xem chi tiết</a>
        <a class="btn-add-to-cart" href="#" role="button">Thêm vào giỏ</a>
      </div>
    </div>
    @else
    <div class="column-product">
      <div class="card">
        <img src="{{$discountProduct->img_url}}" alt="com-chay" style="width:100%" id="zoom">
        <br>
        <h4>{{$discountProduct->prd_name}}</h4>
        <p class="price">{{$discountProduct->prd_price}}VND</p>
        <br>
        <a class="btn-detail" href="/{{$discountProduct->prd_id}}/productDetails" role="button">Xem chi tiết</a>
        <a class="btn-add-to-cart" href="#" role="button">Thêm vào giỏ</a>
      </div>
    </div>
    @endif
    @empty
    <h3>Không có sản phẩm </h3>
    @endforelse
  </div>
</div>

@endsection

@section('full-screen-content')
<div class="nhan-hang">
  <div class="cf-title" style="padding-top: 25px">
    <h3>CÁC NHÃN HÀNG</h3>
  </div>

  <div class="row" id="row-nhan-hang">
    <div class="column" id="ten-nhan-hang">
      <img src="https://github.com/Phhngan/snack_images/blob/master/nhan-hang/coca.png?raw=true" alt="co-ca" style="width:100%">
    </div>
    <div class="column" id="ten-nhan-hang">
      <img src="https://github.com/Phhngan/snack_images/blob/master/nhan-hang/oreo.png?raw=true" alt="oreo" style="width:100%">
    </div>
    <div class="column" id="ten-nhan-hang">
      <img src="https://github.com/Phhngan/snack_images/blob/master/nhan-hang/pocky2.jpg?raw=true" alt="pocky" style="width:100%">
    </div>
    <div class="column" id="ten-nhan-hang">
      <img src="https://github.com/Phhngan/snack_images/blob/master/nhan-hang/coca.png?raw=true" alt="co-ca" style="width:100%">
    </div>
    <div class="column" id="ten-nhan-hang">
      <img src="https://github.com/Phhngan/snack_images/blob/master/nhan-hang/oreo.png?raw=true" alt="oreo" style="width:100%">
    </div>
  </div>
</div>
@endsection

@section('js')
<script>
  // Automatic Slideshow - change image every 3 seconds
  var myIndex = 0;
  carousel();

  function carousel() {
    var i;
    var x = document.getElementsByClassName("mySlides");
    for (i = 0; i < x.length; i++) {
      x[i].style.display = "none";
    }
    myIndex++;
    if (myIndex > x.length) {
      myIndex = 1
    }
    x[myIndex - 1].style.display = "block";
    setTimeout(carousel, 3000);
  }
</script>
@endsection