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

    <tr>
        <td>
        <img src="https://github.com/Phhngan/snack_images/blob/master/san-pham/SP1/doman_khoga.png?raw=true" style="height:200px">
        </td>
        <td>
            <p>Khô gà</p>
        </td>
        <td>
            <p>1</p>
        </td>
        <td>
            <p>50 000 VND</p>
        </td>
    </tr>
    <br>
</table>
  </div>

<div class="row">

    <div class="col">

        <div class="card mb-4" id="card-client" style="background-color:#EBECFE">
        <div class="card-body">

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
        <p class="text-muted mb-0">Phạm Hà Ngân</p>
      </div>
    </div>
    <hr>  

    <div class="row">
      <div class="col-sm-5">
        <p class="mb-0">Số điện thoại</p>
      </div>
      <div class="col-sm-7">
        <p class="text-muted mb-0">0966835587</p>
      </div>
    </div>
    <hr> 
  
      <div class="row">
      <div class="col-sm-5">
        <p class="mb-0">Địa chỉ chi tiết</p>
      </div>
      <div class="col-sm-7">
        <p class="text-muted mb-0">Tòa Nam, Rice City Linh Đàm, Hà Nội</p>
      </div>
    </div>

</div>
    </div>
</div>

<div class="col">

    <div class="card mb-4" id="card-client">
        <div class="card-body">

        <div class="row">
      <div class="col-sm-6">
        <p class="mb-0">Giá thành:</p>
      </div>
      <div class="col-sm-6">
        <p class="text-muted mb-0">50 000VND</p>
      </div>
    </div>
    <hr>

    <div class="row">
      <div class="col-sm-6">
        <p class="mb-0">Tiền ship:</p>
      </div>
      <div class="col-sm-6">
        <p class="text-muted mb-0">20 000VND</p>
      </div>
    </div>
    <hr>

    <div class="row">
      <div class="col-sm-6">
        <p class="mb-0">Tổng đơn hàng:</p>
      </div>
      <div class="col-sm-6">
        <p class="text-muted mb-0">70 000VND</p>
      </div>
    </div>
    <hr>


    <a class="btn btn-primary btn-mua-hang" href="/cart/success" role="button">Mua hàng</a>
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