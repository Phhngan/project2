@extends('layout.base_page')

@section('title','Chi tiết sản phẩm')

@section('style')

.body{
    background-color: #DDE0F4;
}
.details{
    background-color: white;
}

.price-details{
    color: red;

}

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
.section-details{
background-color: #F3F3FC;
width: 100%;
padding: 6px;
}

@endsection

@section('content')

@forelse($products as $product)
<div class="details">
    <div class="row align-items-start">
        <div class="col">
            <div class="details-img">
                <img src="{{$product->img_url}}"
                    style="width:80%">
            </div>
        </div>

        <div class="col">
            <h3>{{$product->prd_name}}</h3>
            <br>

            <h4 class="price-details">Giá bán: <span>{{ $product->prd_price }}</span></h4>
            <br>
            <form id='form-quantity' method='POST' class='quantity' action='#'>
                <input type='button' value='-' class='qtyminus minus' field='quantity' />
                <input type='text' name='quantity' value='1' class='qty' />
                <input type='button' value='+' class='qtyplus plus' field='quantity' />
            </form>
            <br>
            <div class="action">
                <button class="btn-add-to-cart btn btn-primary" type="button">Thêm vào giỏ</button>
            </div>
            <br>
            <div class="product-about">
        <hr>
        <h4 class="section-details">CHI TIẾT SẢN PHẨM</h4>
        <div class="row">
              <div class="col-sm-5">
                <p class="text-muted mb-0">Danh mục</p>
              </div>
              <div class="col-sm-7">
                <p class="mb-0">{{$product->prd_type}}</p>
              </div>
            </div>

            <div class="row">
              <div class="col-sm-5">
                <p class="text-muted mb-0">Xuất xứ</p>
              </div>
              <div class="col-sm-7">
                <p class="mb-0">{{$product->prd_source}}</p>
              </div>
            </div>

            <div class="row">
              <div class="col-sm-5">
                <p class="text-muted mb-0">Trọng lượng (hoặc thể tích)</p>
              </div>
              <div class="col-sm-7">
                <p class="mb-0">{{$product->prd_weigh}}g</p>
              </div>
            </div>
    </div>
        </div>

    </div>

    <div class="product-description">
        <hr>
        <h4 class="section-details">MÔ TẢ SẢN PHẨM</h4>
        <p class="product-description"> {{$product->prd_description}}
        </p>
    </div>
    <hr>
<br>

@empty
  <h3>Không có sản phẩm </h3>
  @endforelse
    <!-- San pham gợi ý -->
<div class="sp-noi-bat">
  <h2 class="tieu-de">Các sản phẩm khác</h2>
  <div class="row">
    <div class="column-sales">
      <div class="card">
        <img src="https://github.com/Phhngan/snack_images/blob/master/do-uong/drink_meco.jpg?raw=true" alt="tra-hoa-qua"
          style="width:100%" id="zoom">
        <h4 class="ten-sp">Trà hoa quả Meco</h4>
        <p class="price">30.000VND</p>
        <a class="btn-detail" href="/productDetails" role="button">Xem chi tiết</a>
        <a class="btn-add-to-cart" href="#" role="button">Thêm vào giỏ</a>
      </div>
    </div>
    <div class="column-product">
      <div class="card">
        <img src="https://github.com/Phhngan/snack_images/blob/master/do-man/doman_comchay.png?raw=true" alt="com-chay"
          style="width:100%">
        <h4>Cơm cháy chà bông</h4>
        <p class="price">50.000VND</p>
        <a class="btn-detail" href="#" role="button">Xem chi tiết</a>
        <a class="btn-add-to-cart" href="#" role="button">Thêm vào giỏ</a>
      </div>
    </div>
    <div class="column-product">
      <div class="card">
        <img src="https://github.com/Phhngan/snack_images/blob/master/do-uong/drink_coca.jpg?raw=true" alt="co-ca"
          style="width:100%">
        <h3>Coca cola Sig Mixers</h3>
        <p class="price">96.000VND</p>
        <a class="btn-detail" href="#" role="button">Xem chi tiết</a>
        <a class="btn-add-to-cart" href="#" role="button">Thêm vào giỏ</a>
      </div>
    </div>
    <div class="column-product">
      <div class="card">
        <img src="https://github.com/Phhngan/snack_images/blob/master/do-ngot/dongot_banhgau.png?raw=true"
          alt="banh-gau" style="width:100%">
        <h3>Bánh gấu mix 3 vị</h3>
        <p class="price">60.000VND</p>
        <a class="btn-detail" href="#" role="button">Xem chi tiết</a>
        <a class="btn-add-to-cart" href="#" role="button">Thêm vào giỏ</a>
      </div>
    </div>
  </div>
</div>


</div>

@endsection

@section('js')
@parent
<script>
    jQuery(document).ready(($) => {
        $('.quantity').on('click', '.plus', function (e) {
            let $input = $(this).prev('input.qty');
            let val = parseInt($input.val());
            $input.val(val + 1).change();
        });

        $('.quantity').on('click', '.minus',
            function (e) {
                let $input = $(this).next('input.qty');
                var val = parseInt($input.val());
                if (val > 0) {
                    $input.val(val - 1).change();
                }
            });
    });
</script>
@endsection