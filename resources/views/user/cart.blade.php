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
max-width:600px;
}
.btn-mua-hang{
width:300px;
float:right;
}
.text-sp{
text-decoration: none;
color:black;
}
.text-sp:hover{
text-decoration: none;
color:#3E526D;
}

@endsection

@section('content')
<div class="cf-title">
  <h3>Giỏ hàng</h3>
</div>
<div class="item-products">
  <table class="table">
    <tr>
      <th>Mã sản phẩm</th>
      <th>Hình ảnh</th>
      <th>Tên sản phẩm</th>
      <th>Số lượng</th>
      <th>Giá</th>
      <th>Hành động</th>
    </tr>
    @forelse($products as $product)
    <tr>
      <td>
        <p>{{$product->prd_code}}</p>
      </td>
      <td>
        <img src="{{$product->img_url}}" style="height:100px">
      </td>
      <td>
        <a href="/{{$product->prd_id}}/productDetails" class="text-sp">{{$product->prd_name}}</a>
      </td>
      <td>
        <form id='form-quantity' method='PUT' class='quantity' action='cart/{{$product->car_id}}/update'>
          <input type='button' value='-' class='qtyminus minus' field='quantity' />
          <input type='number' name='quantity' min='1' value='{{$product->car_quantity}}' class='qty' />
          <input type='button' value='+' class='qtyplus plus' field='quantity' />
          <br>
          <button type="submit" class="btn btn-primary">Cập nhật</button>
        </form>

      </td>
      <td>
        <p>{{number_format($product->prd_price * (100 - $product->prd_discount)/100).' VND'}}</p>
      </td>
      <td>
        <!-- <a class="btn btn-success" href="/cart/{{$product->car_id}}/update" role="button">Cập nhật số lượng</a> -->
        <!-- <a class="btn btn-danger" href="/cart/{{$product->car_id}}/delete" role="button">Xóa</a> -->
        <form method="POST" action="{{url('/cart/'.$product->car_id.'/delete')}}">
          @csrf
          @method('delete')
          <button type="submit" class="btn btn-danger">Xóa</button>
        </form>
      </td>
    </tr>
    @empty
    <tr>
      <td colspan="3">Chưa có sản phẩm trong giỏ hàng</td>
    </tr>
    @endforelse
    <br>
  </table>
</div>

<div class="row">
  <div class="col">
    <div class="card mb-4" id="card-client" style="background-color:#EBECFE">
      <div class="card-body">
        @forelse($addresses as $address)
        <div class="row">
          <div class="col">
            <h5 class="text-center">Thông tin giao hàng</h5>
          </div>
        </div>
        <hr>
        <form action="{{url('/cart/updateAddress')}}" method="POST">
          @csrf
          @method('put')
          <label for="province" style="float:left;padding-bottom:6px">Tỉnh:</label>
          <br>
          <?php
          $provinces = Illuminate\Support\Facades\DB::table('Provinces')
            ->select('Provinces.*')
            ->get();
          ?>
          <select class="form-control" id="" name="province" required>
            <option value="{{ $address->pro_id  }}" selected="selected">----{{$address->pro_name}}----</option>
            @foreach($provinces as $province)
              <option value="{{ $province->pro_id }}">{{ $province->pro_name }}</option>
            @endforeach
          </select>
          <label for="district" style="float:left;padding-bottom:6px">Huyện</label>
          <br>
          <input value="{{ $address->sal_district  }}" name="district" type="text" class="form-control" placeholder="Huyện">
          <br>
          <label for="town" style="float:left;padding-bottom:6px">Xã:</label>
          <br>
          <input value="{{ $address->sal_town  }}" name="town" type="text" class="form-control" placeholder="Xã">
          <br>
          <label for="detailAddress" style="float:left;padding-bottom:6px">Địa chỉ cụ thể:</label>
          <br>
          <input value="{{ $address->sal_detailAddress  }}" name="detailAddress" type="text" class="form-control" placeholder="Địa chỉ cụ thể">
          <br>
          <button type="submit" class="btn btn-primary" style="float:left;width:90px">Cập nhật</button>
          <br>
        </form>
        @empty
        <tr>
          <td colspan="3">Xin mời thêm sản phẩm</td>
        </tr>
        @endforelse
      </div>
    </div>
  </div>
  <div class="card mb-4" id="card-client">
    <div class="card-body">

      <div class="row">
        <div class="col-sm-6">
          <p class="mb-0">Tổng tiền:</p>
        </div>
        <div class="col-sm-6">
          <p class="text-muted mb-0">
            <?php
            $price = 0;
            foreach ($products as $product) {
              $price = $price + (($product->prd_price * (100 - $product->prd_discount) / 100) * $product->car_quantity);
            }
            ?>
            {{number_format($price).' VND'}}
          </p>
        </div>
      </div>
      <hr>
      @if(count($products) > 0)
      <a class="btn btn-primary btn-mua-hang" href="/checkOut" role="button">Tiếp tục</a>
      @endif
    </div>
  </div>



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
        if (val < 0) {
          $input = 1;
        }
        if (val = 0) {
          $input = 1;
        }

      });
  });
</script>
@endsection