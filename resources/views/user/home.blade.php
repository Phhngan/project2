@extends('layout.base_page')

@section('title','Home')

@section('style')
.carousel-inner{
margin-top:25px;
margin-bottom: 50px;
height: 500px;
}
.sp-noi-bat{
background-color: #B8B0E3;
height: 600px;
margin-bottom:50px;
border-radius: 5px;
}

.sp-moi{
background-color: #B8B0E3;
height: 600px;
margin-bottom:50px;
border-radius: 5px;
}

.tieu-de{
text-align: center;
color: #FFFFFF;
text-decoration: underline;
}

.card {
box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
max-width: 300px;
margin: auto;
text-align: center;
font-family: arial;
}

.price {
color: grey;
font-size: 22px;
}

.card button {
border: none;
outline: 0;
padding: 8px;
color: white;
background-color: #5168A1;
text-align: center;
cursor: pointer;
width: 100%;
font-size: 15px;
}

.card button:hover {
opacity: 0.7;
}

/* Create four equal columns that floats next to each other */
.column {
float: left;
width: 25%;
padding: 10px;
height: 300px;
}

/* Clear floats after the columns */
.row:after {
content: "";
display: table;
clear: both;
}

@endsection

@section('content')
<!-- Carousel -->
<div id="demo" class="carousel slide" data-bs-ride="carousel">

  <!-- Indicators/dots -->
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#demo" data-bs-slide-to="0" class="active"></button>
    <button type="button" data-bs-target="#demo" data-bs-slide-to="1"></button>
    <button type="button" data-bs-target="#demo" data-bs-slide-to="2"></button>
  </div>

  <!-- The slideshow/carousel -->
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="https://github.com/Phhngan/snack_images/blob/master/silder/snack1.jpg?raw=true" alt="Slide 1"
        class="d-block" style="width:100%">
      <div class="carousel-caption d-none d-md-block">
        <h3><strong>Khuyến mãi tháng 1</strong></h3>
        <h1>Sale up to 50%</h1>
      </div>
    </div>
    <div class="carousel-item">
      <img src="https://github.com/Phhngan/snack_images/blob/master/silder/snack1.jpg?raw=true" alt="Slide 2"
        class="d-block" style="width:100%">
    </div>
    <div class="carousel-item">
      <img src="https://github.com/Phhngan/snack_images/blob/master/silder/snack1.jpg?raw=true" alt="Slide 3"
        class="d-block" style="width:100%">
    </div>
  </div>

  <!-- Left and right controls/icons -->
  <button class="carousel-control-prev" type="button" data-bs-target="#demo" data-bs-slide="prev">
    <span class="carousel-control-prev-icon"></span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#demo" data-bs-slide="next">
    <span class="carousel-control-next-icon"></span>
  </button>
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
        <p><button>Thêm vào giỏ</button></p>
      </div>
    </div>
    <div class="column">
      <div class="card">
        <img src="https://github.com/Phhngan/snack_images/blob/master/do-man/doman_comchay.png?raw=true" alt="com-chay"
          style="width:100%">
        <h3>Cơm cháy chà bông</h3>
        <p class="price">50.000VND</p>
        <p><button>Thêm vào giỏ</button></p>
      </div>
    </div>
    <div class="column">
      <div class="card">
        <img src="https://github.com/Phhngan/snack_images/blob/master/do-uong/drink_coca.jpg?raw=true" alt="co-ca"
          style="width:100%">
        <h3>Coca cola Sig Mixers</h3>
        <p class="price">96.000VND</p>
        <p><button>Thêm vào giỏ</button></p>
      </div>
    </div>
    <div class="column">
      <div class="card">
        <img src="https://github.com/Phhngan/snack_images/blob/master/do-ngot/dongot_banhgau.png?raw=true"
          alt="banh-gau" style="width:100%">
        <h3>Bánh gấu mix 3 vị</h3>
        <p class="price">60.000VND</p>
        <p><button>Thêm vào giỏ </button></p>
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
        <p><button>Thêm vào giỏ</button></p>
      </div>
    </div>
    <div class="column">
      <div class="card">
        <img src="https://github.com/Phhngan/snack_images/blob/master/do-man/doman_comchay.png?raw=true" alt="com-chay"
          style="width:100%">
        <h3>Cơm cháy chà bông</h3>
        <p class="price">50.000VND</p>
        <p><button>Thêm vào giỏ</button></p>
      </div>
    </div>
    <div class="column">
      <div class="card">
        <img src="https://github.com/Phhngan/snack_images/blob/master/do-uong/drink_coca.jpg?raw=true" alt="co-ca"
          style="width:100%">
        <h3>Coca cola Sig Mixers</h3>
        <p class="price">96.000VND</p>
        <p><button>Thêm vào giỏ</button></p>
      </div>
    </div>
    <div class="column">
      <div class="card">
        <img src="https://github.com/Phhngan/snack_images/blob/master/do-ngot/dongot_banhgau.png?raw=true"
          alt="banh-gau" style="width:100%">
        <h3>Bánh gấu mix 3 vị</h3>
        <p class="price">60.000VND</p>
        <p><button>Thêm vào giỏ </button></p>
      </div>
    </div>
  </div>
</div>
@endsection

@section('full-screen-content')
<div class="nhan-hang">
<h2 class="tieu-de">Các nhãn hàng</h2>
<div class="row">
<div class="column">

</div>
<div class="column">

</div>
<div class="column">

</div>
<div class="column">

</div>
<div class="column">

</div>
<div class="column">

</div>
</div>
</div>
@endsection
