@extends('layout.base_page')

@section('title','Tin tức')

@section('style')
#banner-tintuc{
    width: 50%;
    height: auto;
}
.banner-tintuc .row:after {
  content: "";
  display: table;
  clear: both;
}
coltt-1{
    float: left;
}
.coltt-2{
    float: left;
}
.banner-text{
    background-color: black;
    opacity: 0.5;
    text-align: center;
    text-decoration: none;
    color: white;
    margin-left: 0;
    font-weight: bold;


}
@endsection

@section('content')
<div class="banner-tintuc">
<div class="row">
<div class="coltt-1">
<img id="banner-tintuc" src="https://raw.githubusercontent.com/Phhngan/snack_images/master/trang-tin-tuc/banner-sale.jpeg">
</div>
<div class="coltt-2 banner-text">
<p style="float: left">>> Xem thêm </p>
</div>
</div>
</div>

@endsection


@section('js')
@parent

@endsection