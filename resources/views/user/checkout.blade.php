@extends('layout.base_page')

@section('title','Checkout')

@section('style')
.qty {
width: 40px;
height: 25px;
text-align: center;
padding-bottom: 18px;
padding-top: 12px;
}

input.qtyplus, input.qtyminus{
width:26px;
height:26px;
padding-bottom: 30px;
background-color: #A8B3D0;
border-style: none;
}

.card{
max-width:600px;
}
.btn-mua-hang{
width:300px;
float:right;
}
.luu-y{
background-color:#EC8F9E;
height:80px;
border-radius:5px;
padding: 20px;
}

@endsection

@section('content')
<div class="cf-title">
  <h3>Thông tin đơn hàng</h3>
</div>

<div class="item-products">
  <table class="table">
    <tr style="background-color:#CED7FD">
      <th>Sản phẩm</th>
      <th>Tên sản phẩm</th>
      <th>Số lượng</th>
      <th>Giá</th>
    </tr>
    @forelse($products as $product)
    <tr>
      <td>
        <img src="{{$product->img_url}}" style="height:150px">
      </td>
      <td>
        <p>{{$product->prd_name}}</p>
      </td>
      <td>
        <p>{{$product->car_quantity}}</p>
      </td>
      <td>
        <p>{{number_format($product->prd_price * (100 - $product->prd_discount)/100).' VND'}}</p>
      </td>
    </tr>
    @empty
    <tr>
      <td colspan="3">Không có sản phẩm</td>
    </tr>
    @endforelse
    <br>
  </table>
</div>

<div class="row">

  <div class="col">

    <div class="card mb-4" id="card-client" style="background-color:#EBECFE;height:auto">
      <div class="card-body">
        @forelse($locations as $location)
        <div class="row">
          <div class="col">
            <h5 class="text-center">Thông tin giao hàng</h5>
          </div>
        </div>
        <hr>

        <div class="row">
          <div class="col-sm-5">
            <p class="mb-0">Họ và tên</p>
          </div>
          <div class="col-sm-7">
            <p class="text-muted mb-0">{{Auth::user()->use_lastName}} {{Auth::user()->name}}</p>
          </div>
        </div>
        <hr>

        <div class="row">
          <div class="col-sm-5">
            <p class="mb-0">Số điện thoại</p>
          </div>
          <div class="col-sm-7">
            <p class="text-muted mb-0">{{Auth::user()->use_phone}}</p>
          </div>
        </div>
        <hr>

        <div class="row">
          <div class="col-sm-5">
            <p class="mb-0">Địa chỉ chi tiết</p>
          </div>
          <div class="col-sm-7">
            <p class="text-muted mb-0">{{$location->sal_detailAddress}}, {{$location->sal_town}}, {{$location->sal_district}}, {{$location->pro_name}}</p>
          </div>
        </div>
        @empty
        <tr>
          <td colspan="3">Không có sản phẩm</td>
        </tr>
        @endforelse
      </div>
    </div>
  </div>

  <div class="col">

    <div class="card mb-4" id="card-client" style="height:auto">
      <div class="card-body">

        <div class="row">
          <div class="col-sm-6">
            <p class="mb-0">Giá thành:</p>
          </div>
          <div class="col-sm-6">
            <p class="text-muted mb-0">
              <?php
              $price = 0;
              foreach ($products as $product) {
                $price = $price + (($product->prd_price * (100 - $product->prd_discount) / 100) * $product->car_quantity);
              }
              ?>
              {{number_format($price).' VND'}}</p>
          </div>
        </div>
        <hr>

        <div class="row">
          <div class="col-sm-6">
            <p class="mb-0">Tiền ship:</p>
          </div>
          <div class="col-sm-6">
            <p class="text-muted mb-0">
              <?php
              $pro_id = 0;
              $weigh = 0;
              foreach ($products as $product) {
                  $pro_id = $product->pro_id;
                  $weigh = $weigh + ($product->prd_weigh * $product->car_quantity);
              }
              $ships = Illuminate\Support\Facades\DB::table('Provinces')
                  ->join('Regions', 'Provinces.reg_id', '=', 'Regions.reg_id')
                  ->select('Regions.*')
                  ->where('Provinces.pro_id', $pro_id)
                  ->get();
              $shipMoney = 0;
              foreach ($ships as $ship) {
                  if ($weigh <= 2000) {
                      $shipMoney = $ship->reg_ship;
                  } else {
                      $weighDiffer = $weigh - 2000;
                      $shipMoney = $ship->reg_ship + $ship->reg_ship_extra * ($weighDiffer / 200);
                  }
              }
              ?>
              {{number_format($shipMoney).' VND'}}</p>
          </div>
        </div>
        <hr>

        <div class="row">
          <div class="col-sm-6">
            <p class="mb-0">Tổng đơn hàng:</p>
          </div>
          <div class="col-sm-6">
            <p class="text-muted mb-0">
            <?php
              ?>
              {{number_format($shipMoney + $price).' VND'}}</p>
          </div>
        </div>
        <hr>
        <a class="btn btn-primary btn-mua-hang" href="/success" role="button">Mua hàng</a>
        <a class="btn btn-warning" href="/cart" role="button">Quay lại giỏ hàng</a>
      </div>
    </div>



  </div>
</div>

<div class="luu-y">
  <h6 class="text-center">Quý khách vui lòng kiểm tra kỹ thông tin, địa chỉ nhận hàng. Sau khi nhấn mua hàng, quý khách sẽ nhận được cuộc gọi xác nhận từ Snack.</h6>
  <h6 class="text-center">Hotline: 1900190012</h6>
</div>
@endsection

@section('js')
@parent

@endsection