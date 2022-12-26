@extends('layout.base_page')

@section('title','Sản phẩm')

@section('styles')
body {
  font-family: 'open sans';
  overflow-x: hidden; }

img {
  max-width: 100%; }

.preview {
  display: -webkit-box;
  display: -webkit-flex;
display: -ms-flexbox;
display: flex;
-webkit-box-orient: vertical;
-webkit-box-direction: normal;
-webkit-flex-direction: column;
-ms-flex-direction: column;
flex-direction: column; }
@media screen and (max-width: 996px) {
.preview {
margin-bottom: 20px; } }

.preview-pic {
-webkit-box-flex: 1;
-webkit-flex-grow: 1;
-ms-flex-positive: 1;
flex-grow: 1; }

.preview-thumbnail.nav-tabs {
border: none;
margin-top: 15px; }
.preview-thumbnail.nav-tabs li {
width: 18%;
margin-right: 2.5%; }
.preview-thumbnail.nav-tabs li img {
max-width: 100%;
display: block; }
.preview-thumbnail.nav-tabs li a {
padding: 0;
margin: 0; }
.preview-thumbnail.nav-tabs li:last-of-type {
margin-right: 0; }

.tab-content {
overflow: hidden; }
.tab-content img {
width: 100%;
-webkit-animation-name: opacity;
animation-name: opacity;
-webkit-animation-duration: .3s;
animation-duration: .3s; }

.card {
margin-top: 50px;
background: #eee;
padding: 3em;
line-height: 1.5em; }

@media screen and (min-width: 997px) {
.wrapper {
display: -webkit-box;
display: -webkit-flex;
display: -ms-flexbox;
display: flex; } }

.details {
display: -webkit-box;
display: -webkit-flex;
display: -ms-flexbox;
display: flex;
-webkit-box-orient: vertical;
-webkit-box-direction: normal;
-webkit-flex-direction: column;
-ms-flex-direction: column;
flex-direction: column; }

.colors {
-webkit-box-flex: 1;
-webkit-flex-grow: 1;
-ms-flex-positive: 1;
flex-grow: 1; }

.product-title, .price, .sizes, .colors {
text-transform: UPPERCASE;
font-weight: bold; }

.checked, .price span {
color: #ff9f1a; }

.product-title, .rating, .product-description, .price, .vote, .sizes {
margin-bottom: 15px; }

.product-title {
margin-top: 0; }

.size {
margin-right: 10px; }
.size:first-of-type {
margin-left: 40px; }

.color {
display: inline-block;
vertical-align: middle;
margin-right: 10px;
height: 2em;
width: 2em;
border-radius: 2px; }
.color:first-of-type {
margin-left: 20px; }

.add-to-cart, .like {
background: #ff9f1a;
padding: 1.2em 1.5em;
border: none;
text-transform: UPPERCASE;
font-weight: bold;
color: #fff;
-webkit-transition: background .3s ease;
transition: background .3s ease; }
.add-to-cart:hover, .like:hover {
background: #b36800;
color: #fff; }

.not-available {
text-align: center;
line-height: 2em; }
.not-available:before {
font-family: fontawesome;
content: "\f00d";
color: #fff; }

.orange {
background: #ff9f1a; }

.green {
background: #85ad00; }

.blue {
background: #0076ad; }

.tooltip-inner {
padding: 1.3em; }

@-webkit-keyframes opacity {
0% {
opacity: 0;
-webkit-transform: scale(3);
transform: scale(3); }
100% {
opacity: 1;
-webkit-transform: scale(1);
transform: scale(1); } }

@keyframes opacity {
0% {
opacity: 0;
-webkit-transform: scale(3);
transform: scale(3); }
100% {
opacity: 1;
-webkit-transform: scale(1);
transform: scale(1); } }
@endsection
@section('content')
<div class="card">
    <div class="container-fliud">
        <div class="wrapper row">
            <div class="preview col-md-6">

                <div class="preview-pic tab-content">
                    <div class="tab-pane active" id="pic-1"><img src="http://placekitten.com/400/252" /></div>
                    <div class="tab-pane" id="pic-2"><img src="http://placekitten.com/400/252" /></div>
                    <div class="tab-pane" id="pic-3"><img src="http://placekitten.com/400/252" /></div>
                    <div class="tab-pane" id="pic-4"><img src="http://placekitten.com/400/252" /></div>
                    <div class="tab-pane" id="pic-5"><img src="http://placekitten.com/400/252" /></div>
                </div>
                <ul class="preview-thumbnail nav nav-tabs">
                    <li class="active"><a data-target="#pic-1" data-toggle="tab"><img
                                src="http://placekitten.com/200/126" /></a></li>
                    <li><a data-target="#pic-2" data-toggle="tab"><img src="http://placekitten.com/200/126" /></a></li>
                    <li><a data-target="#pic-3" data-toggle="tab"><img src="http://placekitten.com/200/126" /></a></li>
                    <li><a data-target="#pic-4" data-toggle="tab"><img src="http://placekitten.com/200/126" /></a></li>
                    <li><a data-target="#pic-5" data-toggle="tab"><img src="http://placekitten.com/200/126" /></a></li>
                </ul>

            </div>
            <div class="details col-md-6">
                <h3 class="product-title">Trà hoa quả MECO</h3>
                    <span class="review-no">41 reviews</span>
                </div>
                <p class="product-description">Trà Meco vị chanh Thái 400ml được làm từ hồng trà Assam Ấn Độ kết hợp với
                    nước ép trái cây tươi mang lại hương vị thơm đặc trưng từ chanh, một loại trái cây ưa dùng và thường
                    được mọi người sử dụng.Có tác dụng giải khát, thanh nhiệt cơ thể, sảng khoái tinh thần.Sản phẩm
                    thiết kế dạng ly nhựa PP đảm bảo an toàn vệ sinh thực phẩm với công nghệ sản xuất chiết rót tiệt
                    trùng.Có ống hút nhỏ kèm theo, dễ dàng mang mang theo.
                    Bảo quản nơi khô ráo, thoáng mát, tránh ẩm ướt và tránh ánh nắng trực tiếp.
                    Hướng dẫn sử dụng: dùng trực tiếp. Ngon hơn khi để lạnh
                    Sau khi mở cốc có thể bảo quản được 6 tiếng ở nhiệt độ 0 - 6 độ C.
                </p>
                <h4 class="price">Giá bán: <span>30.000VND</span></h4>


                <div class="action">
                    <button class="add-to-cart btn btn-default" type="button">add to cart</button>
                    <button class="like btn btn-default" type="button"><span class="fa fa-heart"></span></button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
@parent

@endsection