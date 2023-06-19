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

.card-tt {
   background-color: #CED7FD;
   padding: 20px;
   margin-top: 20px;
   border-radius: 20px;
}
.cf-title h2:after {
	width:120px;
	height:2px;
	display:block;
	content:"";
	position:relative;
	margin-top:10px;
  margin-bottom:20px;
	left:50%;
	margin-left:-120px;
	background-color: #b80000;
}
.post-text{
    margin-top: 15px;
    text-decoration: none;
    font-weight: bold;
    background-color: #495FB6;
    width: 100px;
    padding: 10px;
    border-radius: 50px;
    text-align: center;
    display: flex;
    margin-left: auto;
    margin-right: auto;
}

.short-content{
    text-overflow: ellipsis;
    overflow: hidden;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
    display: -webkit-box;
    opacity: 0.8;
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
      <p class="short-content" style="font-size:15px; margin-left: 0px; opacity: 0.5;">
      Sale Mùa Thu: Hấp dẫn đến 50% cho những giây phút ăn vặt tuyệt vời! Mùa thu đã đến, và Snack rất vui mừng thông báo về đợt sale đặc biệt dành cho các tín đồ yêu thích đồ ăn vặt. Chúng tôi xin giới thiệu "Sale mùa thu" - cơ hội tuyệt vời để bạn thỏa sức thưởng thức những món ngon với giá cực kỳ hấp dẫn. Hãy sẵn sàng khám phá những ưu đãi độc đáo mà chúng tôi mang đến! Với tinh thần chọn lọc những sản phẩm tốt nhất từ các thương hiệu nước ngoài, Snack cam kết mang đến cho bạn trải nghiệm ăn vặt thú vị và đa dạng. Và giờ đây, bạn còn có thể tiết kiệm đáng kể với ưu đãi "Sale mùa thu" của chúng tôi. Hãy chuẩn bị sẵn sàng cho những ly thức uống hấp dẫn! Tất cả các loại đồ uống đều được giảm giá 10%, giúp bạn thưởng thức những cốc sữa thơm ngon hoặc những ly nước trái cây tươi mát mà không cần lo lắng về giá cả. Chúng tôi hi vọng rằng với sự giảm giá này, bạn sẽ có thêm động lực để thử những loại thức uống mới, khám phá những hương vị đặc biệt.
      </p>
    </div>
  </div>
</div>

<div class="row">
  <div class="leftcolumn">
    <div class="card-tt">
      <h2>Sale mùa thu</h2>
      <h5>Dec 7, 2017</h5>
      <a href="/bai-viet-1">
        <img src="https://raw.githubusercontent.com/Phhngan/snack_images/master/trang-tin-tuc/banner-sale.jpeg"  style="width:60%;display:flex;margin-left:auto;margin-right:auto;">
      </a>
      <div class="post-text">
        <a href="/bai-viet-1" style="color: white;text-decoration: none">Xem thêm </a>
      </div>
      <p class="short-content">
      Sale Mùa Thu: Hấp dẫn đến 50% cho những giây phút ăn vặt tuyệt vời! Mùa thu đã đến, và Snack rất vui mừng thông báo về đợt sale đặc biệt dành cho các tín đồ yêu thích đồ ăn vặt. Chúng tôi xin giới thiệu "Sale mùa thu" - cơ hội tuyệt vời để bạn thỏa sức thưởng thức những món ngon với giá cực kỳ hấp dẫn. Hãy sẵn sàng khám phá những ưu đãi độc đáo mà chúng tôi mang đến! Với tinh thần chọn lọc những sản phẩm tốt nhất từ các thương hiệu nước ngoài, Snack cam kết mang đến cho bạn trải nghiệm ăn vặt thú vị và đa dạng. Và giờ đây, bạn còn có thể tiết kiệm đáng kể với ưu đãi "Sale mùa thu" của chúng tôi. Hãy chuẩn bị sẵn sàng cho những ly thức uống hấp dẫn! Tất cả các loại đồ uống đều được giảm giá 10%, giúp bạn thưởng thức những cốc sữa thơm ngon hoặc những ly nước trái cây tươi mát mà không cần lo lắng về giá cả. Chúng tôi hi vọng rằng với sự giảm giá này, bạn sẽ có thêm động lực để thử những loại thức uống mới, khám phá những hương vị đặc biệt.
      </p>
    </div>
    
    <div class="card-tt">
      <h2>Sale mùa thu</h2>
      <h5>Dec 7, 2017</h5>
      <a href="/bai-viet-1">
        <img src="https://raw.githubusercontent.com/Phhngan/snack_images/master/trang-tin-tuc/banner-sale.jpeg"  style="width:60%;display:flex;margin-left:auto;margin-right:auto;">
      </a>
      <div class="post-text">
        <a href="/bai-viet-1" style="color: white;text-decoration: none">Xem thêm </a>
      </div>
      <p class="short-content">
      Sale Mùa Thu: Hấp dẫn đến 50% cho những giây phút ăn vặt tuyệt vời! Mùa thu đã đến, và Snack rất vui mừng thông báo về đợt sale đặc biệt dành cho các tín đồ yêu thích đồ ăn vặt. Chúng tôi xin giới thiệu "Sale mùa thu" - cơ hội tuyệt vời để bạn thỏa sức thưởng thức những món ngon với giá cực kỳ hấp dẫn. Hãy sẵn sàng khám phá những ưu đãi độc đáo mà chúng tôi mang đến! Với tinh thần chọn lọc những sản phẩm tốt nhất từ các thương hiệu nước ngoài, Snack cam kết mang đến cho bạn trải nghiệm ăn vặt thú vị và đa dạng. Và giờ đây, bạn còn có thể tiết kiệm đáng kể với ưu đãi "Sale mùa thu" của chúng tôi. Hãy chuẩn bị sẵn sàng cho những ly thức uống hấp dẫn! Tất cả các loại đồ uống đều được giảm giá 10%, giúp bạn thưởng thức những cốc sữa thơm ngon hoặc những ly nước trái cây tươi mát mà không cần lo lắng về giá cả. Chúng tôi hi vọng rằng với sự giảm giá này, bạn sẽ có thêm động lực để thử những loại thức uống mới, khám phá những hương vị đặc biệt.
      </p>
    </div>
  </div>

  <div class="rightcolumn">
    <div class="card-tt">
      <div class="cf-title">
      <h2>Về chúng tôi</h2>
      </div>
      <a href="/gioi-thieu">
        <img src="https://github.com/Phhngan/snack_images/blob/master/trang-tin-tuc/Snack-gioithieu.png?raw=true"  style="width:100%;">
      </a>
      <div class="post-text">
        <a href="/bai-viet-1" style="color: white;text-decoration: none">Xem thêm </a>
      </div>
        <br>
      <p style="font-size:15px; margin-left: 0px; opacity: 0.8;">Snack là website cung cấp các sản phẩm nhập khẩu trực tiếp từ Châu Âu, Mỹ, Đức, Hàn, Nhật...</p>
    </div>
    <div class="card-tt">
      <h3>Follow Me</h3>
      <p>Some text..</p>
    </div>
  </div>
</div>

@endsection


@section('js')
@parent

@endsection