@extends('layout.base_page')

@section('title','Home')

@section('style')
.carousel-inner{
    margin-top:50px;
    margin-bottom: 50px;
}
.sp-noi-bat{
    background-color: #B8B0E3;
    height: 500px;
    margin-bottom:50px;
    opacity: 0.5;
}
.tieu-de{
    text-align: center;
    color: #FFFFFF;
    text-decoration: underline;
    font-family: "Times New Roman", Times, serif;
}

@endsection

@section('full-screen-content')

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
      <img src="https://github.com/Phhngan/snack_images/blob/master/silder/snack1.jpg?raw=true" alt="Slide 1" class="d-block" style="width:100%">
      <div class="carousel-caption d-none d-md-block">
        <h3><strong>Khuyến mãi tháng 1</strong></h3>
        <h1>Sale up to 50%</h1>
      </div>
    </div>
    <div class="carousel-item">
      <img src="https://github.com/Phhngan/snack_images/blob/master/silder/snack1.jpg?raw=true" alt="Slide 2" class="d-block" style="width:100%">
    </div>
    <div class="carousel-item">
      <img src="https://github.com/Phhngan/snack_images/blob/master/silder/snack1.jpg?raw=true" alt="Slide 3" class="d-block" style="width:100%">
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
<h2 class="tieu-de">Sản phẩm nổi bật</h2>
<div class="row">
<div class="col-sm-3">
<div class="card">
<p>helo</p>
</div>
</div>
<div class="col-sm-3">

</div>
<div class="col-sm-3">

</div>
<div class="col-sm-3">

</div>
</div>
</div>

@endsection


