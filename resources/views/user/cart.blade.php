@extends('layout.base_page')

@section('title','Giỏ hàng')

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
max-width:500px;
}
.btn-mua-hang{
    width:300px;
    float:right;
}

@endsection

@section('content')
<div class="cf-title">
<h3>Giỏ hàng</h3>
</div>
<div class="item-products">
<table class="table">
    <tr>
        <th>Sản phẩm</th>
        <th>Tên sản phẩm</th>
        <th>Số lượng</th>
        <th>Giá</th>
        <th>Hành động</th>
    </tr>

    <tr>
        <td>
        <img src="https://github.com/Phhngan/snack_images/blob/master/san-pham/SP1/doman_khoga.png?raw=true" style="height:200px">
        </td>
        <td>
            <p>Khô gà</p>
        </td>
        <td>
        <form id='form-quantity' method='POST' class='quantity' action='#'>
        <input type='button' value='-' class='qtyminus minus' field='quantity' />
        <input type='text' name='quantity' value='1' class='qty' />
        <input type='button' value='+' class='qtyplus plus' field='quantity' />
      </form>

        </td>
        <td>
            <p>50 000 VND</p>
        </td>
        <td>
            <a class="btn btn-success" href="/" role="button">Cập nhật số lượng</a>
            <a class="btn btn-danger" href="/" role="button">Xóa</a>
        </td>
    </tr>
    <br>
</table>
  </div>

<div class="row">

    <div class="col">

        <div class="card mb-4" id="card-client">
        <div class="card-body">

             <div class="row">
                <div class="col">
                    <h5 class="text-center">Thông tin giao hàng</h5>
                </div>
                </div>
                 <br><hr>

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

    <button class="btn btn-info btn-mua-hang" >Mua hàng</button>
</div>

</div>

@endsection

@section('js')
@parent
<script>
  jQuery(document).ready(($) => {
    $('.quantity').on('click', '.plus', function(e) {
      let $input = $(this).prev('input.qty');
      let val = parseInt($input.val());
      $input.val(val + 1).change();
    });

    $('.quantity').on('click', '.minus',
      function(e) {
        let $input = $(this).next('input.qty');
        var val = parseInt($input.val());
        if (val > 0) {
          $input.val(val - 1).change();
        }
      });
  });
</script>
@endsection