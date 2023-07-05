@extends('layout.base_page')

@section('title','Lỗi')

@section('style')
.chua-dang-nhap{
height: 450px;
}

.btn-dangnhap{
margin: 10px auto 0px 680px;
background-color: #2D1476;
color: white;
border-radius: 5px;
padding: 10px;
text-decoration: none;
}
.btn-dangnhap:hover {
background-color: #7386B9;
color: #2D1476;
}

@endsection

@section('full-screen-content')
<div class="chua-dang-nhap"><br>
    <h1 class="text-center"><strong>Đã xảy ra lỗi</strong></h1>
    <h3 class="text-center">Đơn hàng đã được admin xử lý!</h3><br>
    <a href="/home" class="btn-dangnhap">Quay lại trang chủ</a>
</div>


@endsection

@section('js')
@parent

@endsection