@extends('layout.base_page')

@section('title','Tin tức')

@section('style')
#banner-tintuc{
    width: 100%;
    height: 520px;
    border-radius: 50px 0 0 50px;
}
/* Clear floats after the columns */
 banner-tintuc .row:after {
  content: "";
  display: table;
  clear: both;
}

.coltt-1 {
  float: left;
  width: 70%;
  padding: 0px;
}

.coltt-2 {
  float: left;
  width: 30%;
  padding: 0px;
}

.banner-text{
    background-color: #FF917D;
    opacity: 0.5;
    text-align: center;
    text-decoration: none;
    color: white;
    font-weight: bold;
    margin-top: auto;
    margin-bottom: auto;
    height: 520px;
    padding-top: 100px;
    font-size: 20px;
    border-radius: 0px 50px 50px 0px;
}


@endsection

@section('content')
<div class="banner-tintuc">
<div class="row">
<div class="coltt-1">
<a href="/bai-viet-1">
<img id="banner-tintuc" src="https://raw.githubusercontent.com/Phhngan/snack_images/master/trang-tin-tuc/banner-sale.jpeg">
</a>
</div>
<div class="coltt-2 banner-text">
<a href="/bai-viet-1" style="color: white;">>> Xem thêm </a>
<br>
<p style="float: left; font-size:15px; margin-left: 0px; opacity: 0.5;">Đợt Sale mùa thu năm 2023 với nhiều sản phẩm giảm giá lên tới 50%...</p>
</div>
</div>
</div>

@endsection


@section('js')
@parent

@endsection