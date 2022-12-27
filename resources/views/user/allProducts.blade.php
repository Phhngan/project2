@extends('layout.base_page')

@section('title','Sản phẩm')

@section('content')
<div class="row">
<div class="col-3">
      <div class="card">
        <img src="https://github.com/Phhngan/snack_images/blob/master/do-uong/drink_meco.jpg?raw=true" alt="tra-hoa-qua"
          style="width:100%">
        <h3>Trà hoa quả Meco</h3>
        <p class="price">30.000VND</p>
        <a class="btn-detail" href="#" role="button">Xem chi tiết</a>
        <a class="btn-add-to-cart" href="#" role="button">Thêm vào giỏ</a>
      </div>
    </div>
</div>
@endsection

@section('js')
@parent

@endsection