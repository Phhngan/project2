@extends('layout.base_page')

@section('title','Home')

@yield('css-link')


@section('content')

<div class="main">
  <div class="row">
    <div class="leftcolumn">
<section class="slideShow">
  <img class="mySlides" src="https://github.com/Phhngan/snack_images/blob/master/silder/snack3.jpg?raw=true"
  style="width:100%">
  <img class="mySlides" src="https://github.com/Phhngan/snack_images/blob/master/silder/snack2.jpg?raw=true"
  style="width:100%">
  <img class="mySlides" src="https://github.com/Phhngan/snack_images/blob/master/silder/snack1.jpg?raw=true"
  style="width:100%">
</section>
</div>
<div class="rightcolumn">
<table class="table">
        <tr>
            <th>Danh mục sản phẩm</th>
        </tr>
        <tr>
                <td>
                <a href="/allProducts" class="menu">Tất cả sản phẩm</a>
                </td>
</tr>
            <tr>
                <td>
                <a href="/do-man" class="menu">Đồ mặn</a>
                </td>
</tr>
<tr>
                <td>
                <a href="do-ngot" class="menu">Đồ ngọt</a>
                </td>
</tr>
<tr>
                <td>
                <a href="do-uong" class="menu">Đồ uống</a>
                </td>
                <td>
</tr>
</table>
</div>
</div>
</div>


<!-- San pham noi bat -->
<div class="sp-noi-bat">
  <h2 class="tieu-de">SẢN PHẨM NỔI BẬT</h2>
  <div class="row">
    <div class="column">
      <div class="card">
        <img src="https://github.com/Phhngan/snack_images/blob/master/do-uong/drink_meco.jpg?raw=true" alt="tra-hoa-qua"
          style="width:100%">
        <h3>Trà hoa quả Meco</h3>
        <p class="price">30.000VND</p>
        <a class="btn-detail" href="/productDetails" role="button">Xem chi tiết</a>
        <a class="btn-add-to-cart" href="#" role="button">Thêm vào giỏ</a>
      </div>
    </div>
    <div class="column">
      <div class="card">
        <img src="https://github.com/Phhngan/snack_images/blob/master/do-man/doman_comchay.png?raw=true" alt="com-chay"
          style="width:100%">
        <h3>Cơm cháy chà bông</h3>
        <p class="price">50.000VND</p>
        <a class="btn-detail" href="#" role="button">Xem chi tiết</a>
        <a class="btn-add-to-cart" href="#" role="button">Thêm vào giỏ</a>
      </div>
    </div>
    <div class="column">
      <div class="card">
        <img src="https://github.com/Phhngan/snack_images/blob/master/do-uong/drink_coca.jpg?raw=true" alt="co-ca"
          style="width:100%">
        <h3>Coca cola Sig Mixers</h3>
        <p class="price">96.000VND</p>
        <a class="btn-detail" href="#" role="button">Xem chi tiết</a>
        <a class="btn-add-to-cart" href="#" role="button">Thêm vào giỏ</a>
      </div>
    </div>
    <div class="column">
      <div class="card">
        <img src="https://github.com/Phhngan/snack_images/blob/master/do-ngot/dongot_banhgau.png?raw=true"
          alt="banh-gau" style="width:100%">
        <h3>Bánh gấu mix 3 vị</h3>
        <p class="price">60.000VND</p>
        <a class="btn-detail" href="#" role="button">Xem chi tiết</a>
        <a class="btn-add-to-cart" href="#" role="button">Thêm vào giỏ</a>
      </div>
    </div>
  </div>
</div>

<!-- San pham moi -->
<div class="sp-moi">
  <h2 class="tieu-de">SẢN PHẨM MỚI</h2>
  <div class="row">
    <div class="column">
      <div class="card">
        <img src="https://github.com/Phhngan/snack_images/blob/master/do-uong/drink_meco.jpg?raw=true" alt="tra-hoa-qua"
          style="width:100%">
        <h3>Trà hoa quả Meco</h3>
        <p class="price">30.000VND</p>
        <a class="btn-detail" href="#" role="button">Xem chi tiết</a>
        <a class="btn-add-to-cart" href="#" role="button">Thêm vào giỏ</a>
      </div>
    </div>
    <div class="column">
      <div class="card">
        <img src="https://github.com/Phhngan/snack_images/blob/master/do-man/doman_comchay.png?raw=true" alt="com-chay"
          style="width:100%">
        <h3>Cơm cháy chà bông</h3>
        <p class="price">50.000VND</p>
        <a class="btn-detail" href="#" role="button">Xem chi tiết</a>
        <a class="btn-add-to-cart" href="#" role="button">Thêm vào giỏ</a>
      </div>
    </div>
    <div class="column">
      <div class="card">
        <img src="https://github.com/Phhngan/snack_images/blob/master/do-uong/drink_coca.jpg?raw=true" alt="co-ca"
          style="width:100%">
        <h3>Coca cola Sig Mixers</h3>
        <p class="price">96.000VND</p>
        <a class="btn-detail" href="#" role="button">Xem chi tiết</a>
        <a class="btn-add-to-cart" href="#" role="button">Thêm vào giỏ</a>
      </div>
    </div>
    <div class="column">
      <div class="card">
        <img src="https://github.com/Phhngan/snack_images/blob/master/do-ngot/dongot_banhgau.png?raw=true"
          alt="banh-gau" style="width:100%">
        <h3>Bánh gấu mix 3 vị</h3>
        <p class="price">60.000VND</p>
        <a class="btn-detail" href="#" role="button">Xem chi tiết</a>
        <a class="btn-add-to-cart" href="#" role="button">Thêm vào giỏ</a>
      </div>
    </div>
  </div>
</div>

@endsection

@section('full-screen-content')
<div class="nhan-hang">
  <h2 class="tieu-de">Các nhãn hàng</h2>
  <div class="row" id="row-nhan-hang">
    <div class="column" id="ten-nhan-hang">
      <img src="https://github.com/Phhngan/snack_images/blob/master/nhan-hang/coca.png?raw=true" alt="co-ca"
        style="width:100%">
    </div>
    <div class="column" id="ten-nhan-hang">
      <img src="https://github.com/Phhngan/snack_images/blob/master/nhan-hang/oreo.png?raw=true" alt="oreo"
        style="width:100%">
    </div>
    <div class="column" id="ten-nhan-hang">
      <img src="https://github.com/Phhngan/snack_images/blob/master/nhan-hang/pocky2.jpg?raw=true" alt="pocky"
        style="width:100%">
    </div>
    <div class="column" id="ten-nhan-hang">
      <img src="https://github.com/Phhngan/snack_images/blob/master/nhan-hang/coca.png?raw=true" alt="co-ca"
        style="width:100%">
    </div>
  <div class="column" id="ten-nhan-hang">
    <img src="https://github.com/Phhngan/snack_images/blob/master/nhan-hang/oreo.png?raw=true" alt="oreo"
      style="width:100%">
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
    if (myIndex > x.length) {myIndex = 1}
    x[myIndex-1].style.display = "block";
    setTimeout(carousel, 3000);
}
</script>
@endsection