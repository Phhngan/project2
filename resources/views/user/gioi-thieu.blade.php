@extends('layout.base_page')

@section('title','Giới thiệu')

@section('style')
.banner-gioi-thieu{
    background-image: url("https://www.splitshire.com/wp-content/uploads/2014/11/SplitShire-03692-1800x1200-uai-1800x1012.jpg");
    color: white;
}
* {
  box-sizing:border-box;
}


.container-item {
  padding: 64px;
}

.row:after {
  content: "";
  display: table;
  clear: both
}

.column-66 {
  float: left;
  width: 66.66666%;
  padding: 20px;
}

.column-33 {
  float: left;
  width: 33.33333%;
  padding: 20px;
}


img {
  display: block;
  height: auto;
  max-width: 100%;
}

@media screen and (max-width: 1000px) {
  .column-66,
  .column-33 {
    width: 100%;
    text-align: center;
  }
  img {
    margin: auto;
  }
}
@endsection

@section('content')

@endsection

@section('full-screen-content')
<div class="banner-gioi-thieu">
<h2 class="text-center">Giới thiệu</h2>
<p class="text-center">Snack là website cung cấp các sản phẩm nhập khẩu trực tiếp từ Châu Âu, Mỹ, Đức, Hàn, Nhật...</p>
<p class="text-center">Với mong muốn mang đến những điều tốt đẹp nhất
cho gia đình với những thiết bị cao cấp, an toàn và tiện lợi...</p>
</div>

<div class="row">
    <div class="col-4">
    <i class="fas fa-weight-hanging"></i>
    <h3 class="text-center">Thấu hiểu khách hàng</h3>
    <p class="text-center">Luôn luôn lắng nghe, thấu hiểu khách hàng muốn gì, cần gì và hiểu được những điều mà khách hàng muốn truyền tải để mang đến những sản phẩm tốt nhất.</p>
</div>
<div class="col-4">
<i class="fas fa-heart"></i>
<h3 class="text-center">Chu đáo tận tình</h3>
<p class="text-center">Tư vấn rõ ràng sản phẩm về thông tin, chế độ bảo hành… Tận tâm chăm sóc khách hàng từ những điều nhỏ nhặt nhất. Sẵn sàng phục vụ 24/7 khi khách hàng cần.</p>
</div>
<div class="col-4">
<i class="fas fa-handshake"></i>
<h3 class="text-center">Đồng Hành Cùng Khách Hàng</h3>
<p class="text-center">Là người bạn đồng hành đáng tin cậy của khách hàng từ khi tiếp cận sản phẩm, đến việc giải quyết kịp thời các vấn đề khách hàng gặp phải trong quá trình sử dụng.</p>
</div>
</div>
<!-- Section 1 -->
<div class="container-item">
  <div class="row">
    <div class="column-66">
      <h3>QUAN ĐIỂM CHỦ ĐẠO</3>
      <p>Lấy sự chân thành để phát triển bền vững. Đồ Nhập Khẩu là người bạn tin cây, nơi để chia sẻ mọi điều khi cần.</p>
    </div>
    <div class="column-33">
        <img src="https://donhapkhau.vn/wp-content/uploads/2020/10/trust-in-business.jpg" width="335" height="471">
    </div>
  </div>
</div>

<!-- Section 2 -->
<div class="container-item" style="background-color:#f1f1f1">
  <div class="row">
    <div class="column-33">
      <img src="https://donhapkhau.vn/wp-content/uploads/2020/10/triet-ly-kinh-doanh.jpg" alt="App" width="335" height="471">
    </div>
    <div class="column-66">
      <h3>TRIẾT LÝ KINH DOANH</h3>
      <p>Snack luôn tận tâm vì những giá trị đích thực, luôn cống hiến và sáng tạo không ngừng nhằm tạo ra sản phẩm, dịch vụ ưu việt giúp khách hàng có được sự lựa chọn hữu ích cho cuộc sống.
Hướng tới sự phát triển bền vững bằng việc hài hòa lợi ích giữa công ty, khách hàng, cán bộ nhân viên, đối tác, xã hội.</p>
    </div>
  </div>
</div>

<!-- Section 3 -->
<div class="container-iten">
  <div class="row">
    <div class="column-66">
      <h3>VẬN CHUYỂN VÀ LẮP ĐẶT TOÀN QUỐC</h3>
      <p>Hiện nay tất cả các sản phẩm Snack đang kinh doanh được cung cấp trên toàn quốc và bán online.</p>
    </div>
    <div class="column-33">
        <img src="https://donhapkhau.vn/wp-content/uploads/2021/05/van-chuyen-toan-quoc-min.jpg" width="335" height="471" >
    </div>
  </div>
</div>

@endsection


@section('js')
@parent

@endsection