@extends('layout.base_page')

@section('title','Chi tiết sản phẩm')

@section('style')

.body{
background-color: #DDE0F4;
}
.details{
background-color: white;
}
.sp-goi-y{
background-color: #CED7FD;
height:650px;
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

.popup {
position: relative;
cursor: pointer;
-webkit-user-select: none;
-moz-user-select: none;
-ms-user-select: none;
user-select: none;
}

/* The actual popup */
.popuptext {
visibility: hidden;
width: 160px;
background-color: green;
color: #fff;
text-align: center;
border-radius: 6px;
padding: 8px 0;
position: fixed;
bottom: 50px;
left: 40%
}


/* Toggle this class - hide and show the popup */
.popup .show {
visibility: visible;
-webkit-animation: fadeIn 1s;
animation: fadeIn 1s;
}

/* Add animation (fade in the popup) */
@-webkit-keyframes fadeIn {
from {opacity: 0;}
to {opacity: 1;}
}

@keyframes fadeIn {
from {opacity: 0;}
to {opacity:1 ;}
}

.details{
position: relative;
}
.add-favorite{
position: absolute;
top:50px;
right:70px;
}
.hide {
display: none;
position: absolute;
top: 130px;
right: -15px;
opacity: 0.5;
border-radius: 3px;
}

.add-favorite:hover + .hide {
display: block;
background-color: black;
color: white;
width: fit-content;

}
.ratting-star{
background-color: #CED7FD;
height:60px;
width:280px;
border-radius:25px;
padding-top: 14px;
padding-left: 85px;
margin-left: auto;
margin-right: auto;
position: relative;
}
.customer-cmt{
height: 155px;
margin-top:20px;
}
.card-cmt {
box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
background-color: #CED7FD;
border-radius:10px;
padding: 20px;
}

.leftcolumn {
margin-left: 120px;
float: left;
width: 10%;
}

.rightcolumn {
float: left;
width: 70%;
}
.time{
color:grey;
}

@endsection

@section('content')

@forelse($products as $product)
<div class="details">
    <div class="row align-items-start">
        <div class="col">
            <div class="details-img">
                <img src="{{$product->img_url}}" style="height:450px">
            </div>
        </div>
        <div class="col details">
            <br>
            @if($product->prd_discount == 0)
            <h3>{{$product->prd_name}}</h3><br>
            <h4 class="price-details">Giá bán: <span> {{number_format($product->prd_price).' VND'}}</span></h4>
            @else
            <h3>{{$product->prd_name}}</h3>
            <p style="margin-top:20px">
                <span style="background-color:red; color:white;font-size:20px;padding:8px 5px 8px 3px; border-radius:10px"> <strong>- {{$product->prd_discount}}%</strong></span>
            </p>
            <br>
            <h4 class="price-details" style="color:#3E526D">Giá gốc: <span id="old-price"> {{number_format($product->prd_price).' VND'}}</span></h4>
            <h4 class="price-details">Giá bán: <span id="new-price"> {{number_format($product->prd_price * (100 - $product->prd_discount)/100).' VND'}}</span></h4>
            @endif

            <!-- <form id='form-quantity' method='POST' class='quantity' action='#'>
        <input type='button' value='-' class='qtyminus minus' field='quantity' />
        <input type='text' name='quantity' value='1' class='qty' />
        <input type='button' value='+' class='qtyplus plus' field='quantity' />
      </form> -->

            <p style="margin:10px 0px 25px 0px;background-color:#FFECEC;padding:6px;border-radius:5px;display:inline-flex">Còn lại:
                <?php
                $quantity = App\Models\Importinvoicedetail::where('prd_id', $product->prd_id)
                    ->where('prd_status_id', '<', 3)
                    ->sum('ImportInvoiceDetails.imp_quantity_left');
                echo $quantity;
                ?> sản phẩm
            </p>
            @if($quantity != 0)
            <div class="action popup" onclick="addToCart()" style="width: fit-content;">
                <a class="btn-add-to-cart" href="/{{$product->prd_id}}/addCart" role="button" style="text-decoration:none;background-color:#5168A1;padding:8px;border-radius:5px;color:white">Thêm vào giỏ</a>
                <span class="popuptext" id="myPopup">Đã thêm vào giỏ</span>
            </div>
            @endif
            <?php
            $user = Illuminate\Support\Facades\Auth::user();
            if ($user == null) {
                $number = -1;
            } else {
                $number = App\Models\Favoriteproduct::where('prd_id', $product->prd_id)
                    ->where('use_id', $user->id)
                    ->count();
            }
            ?>
            <?php
            if ($number == -1) {
            ?>
                <div class="add-favorite">
                    <p>
                        <img src="https://raw.githubusercontent.com/Phhngan/snack_images/master/icon/heart.png" alt="heart" height="45px" style="margin-top:25px;" class="heart">
                    </p>
                </div>
                <?php
            } else {
                if ($number == 0) {
                ?>
                    <div class="add-favorite">
                        <a href="/{{$product->prd_id}}/addFavorite">
                            <img src="https://raw.githubusercontent.com/Phhngan/snack_images/master/icon/un-heart.png" alt="heart" height="45px" style="margin-top:25px;" class="heart">
                        </a>
                    </div>
                    <div class="hide">Thêm vào sản phẩm yêu thích</div>
                <?php
                } else {
                ?>
                    <div class="add-favorite">
                        <a href="/{{$product->prd_id}}/deleteFavorite">
                            <img src="https://raw.githubusercontent.com/Phhngan/snack_images/master/icon/heart.png" alt="heart" height="45px" style="margin-top:25px;" class="heart">
                        </a>
                    </div>
                    <div class="hide">Đã có trong sản phẩm yêu thích</div>
            <?php
                }
            }
            ?>
            <br>
            <div class="product-about">
                <hr>
                <h4 class="section-details">CHI TIẾT SẢN PHẨM</h4>
                <div class="row">
                    <div class="col-sm-5">
                        <p class="text-muted mb-0">Danh mục</p>
                    </div>
                    <div class="col-sm-7">
                        <p class="mb-0">
                            <?php
                            $type = '';
                            if ($product->prd_type_id == 1) $type = 'Đồ mặn';
                            if ($product->prd_type_id == 2) $type = 'Đồ ngọt';
                            if ($product->prd_type_id == 3) $type = 'Đồ uống';
                            echo $type
                            ?>
                        </p>
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
        <?php echo $product->prd_description ?>

    </div>
    <hr>
    <br>

    @empty
    <h3>Không có sản phẩm </h3>
    @endforelse

    <!-- đánh giá -->
    <div class="product-ratting">
        <div class="cf-title">
            <h3>Đánh giá của người dùng</h3>
        </div>
        <!-- RATE SAO -->
        <!-- <div class="ratting-star">
            <span style="font-weight: bold;font-size:21px;left:22px;position:absolute;">3.5/5</span>
            <img src="https://github.com/Phhngan/snack_images/blob/master/ratting/star.png?raw=true" alt="Star" width="30" height="30">
            <img src="https://github.com/Phhngan/snack_images/blob/master/ratting/star.png?raw=true" alt="Star" width="30" height="30">
            <img src="https://github.com/Phhngan/snack_images/blob/master/ratting/star.png?raw=true" alt="Star" width="30" height="30">
            <img src="https://github.com/Phhngan/snack_images/blob/master/ratting/half-star.png?raw=true" alt="Star" width="30" height="30">
            <img src="https://github.com/Phhngan/snack_images/blob/master/ratting/star-none.png?raw=true" alt="Star" width="30" height="30">
        </div> -->

        <div class="ratting-star">
            <span style="font-weight: bold;font-size:21px;left:22px;position:absolute;">
                <?php
                // Retrieve the selected rating from the session
                session_start();
                // $_SESSION['selected_rating'] = 3.5;
                $selectedRating = isset($_SESSION['selected_rating']) ? $_SESSION['selected_rating'] : null;
                $selectedRating = 3;
                echo $selectedRating . '/5';
                ?>
            </span>
            <!-- Render the star images based on the selected rating -->
            <?php
            if ($selectedRating !== null) {
                $fullStars = floor($selectedRating);
                $halfStar = ($selectedRating - $fullStars) >= 0.5;
                $emptyStars = 5 - $fullStars - ($halfStar ? 1 : 0);

                for ($i = 0; $i < $fullStars; $i++) {
                    echo '<img src="https://github.com/Phhngan/snack_images/blob/master/ratting/star.png?raw=true" alt="Star" width="30" height="30">';
                }
                if ($halfStar) {
                    echo '<img src="https://github.com/Phhngan/snack_images/blob/master/ratting/half-star.png?raw=true" alt="Star" width="30" height="30">';
                }
                for ($i = 0; $i < $emptyStars; $i++) {
                    echo '<img src="https://github.com/Phhngan/snack_images/blob/master/ratting/star-none.png?raw=true" alt="Star" width="30" height="30">';
                }
            }
            ?>
        </div>

        <!-- ĐÁNH GIÁ -->
        <div class="customer-cmt">
    <div class="leftcolumn">
        <img src="https://github.com/Phhngan/snack_images/blob/master/icon/customer-ava.png?raw=true" height="70">
    </div>
    <div class="rightcolumn">
        <div class="card-cmt">
            <div class="row">
                <h4>Phạm Hà Ngân</h4>
                <div class="rating">
                    <?php
                    // Retrieve the rating value for this customer comment
                    $customerRating = 4; // Example rating value

                    // Validate the rating value to ensure it falls within the valid range (1-5)
                    $customerRating = max(1, min(5, $customerRating));

                    // Render the star images based on the rating value
                    for ($i = 1; $i <= 5; $i++) {
                        $starImage = ($i <= $customerRating) ? 'star' : 'star-none';
                        echo '<img src="https://github.com/Phhngan/snack_images/blob/master/ratting/' . $starImage . '.png?raw=true" alt="Star" width="18" height="18">';
                    }
                    ?>
                </div>
            </div>
            <div class="row">
                <p class="time" style="padding-top:10px;">16/04/2023</p>
            </div>
            <div class="row">
                <p>hello hello</p>
            </div>
        </div>
    </div>
</div><br><br>

<div class="customer-cmt">
    <div class="leftcolumn">
        <img src="https://github.com/Phhngan/snack_images/blob/master/icon/customer-ava.png?raw=true" height="70">
    </div>
    <div class="rightcolumn">
        <div class="card-cmt">
            <div class="row">
                <h4>Phạm Hà Ngân</h4>
                <div class="rating">
                    <?php
                    // Retrieve the rating value for this customer comment
                    $customerRating = 4; // Example rating value

                    // Validate the rating value to ensure it falls within the valid range (1-5)
                    $customerRating = max(1, min(5, $customerRating));

                    // Render the star images based on the rating value
                    for ($i = 1; $i <= 5; $i++) {
                        $starImage = ($i <= $customerRating) ? 'star' : 'star-none';
                        echo '<img src="https://github.com/Phhngan/snack_images/blob/master/ratting/' . $starImage . '.png?raw=true" alt="Star" width="18" height="18">';
                    }
                    ?>
                </div>
            </div>
            <div class="row">
                <p class="time" style="padding-top:10px;">16/04/2023</p>
            </div>
            <div class="row">
                <p>hello hello</p>
            </div>
        </div>
    </div>
</div><br><br>

    </div>

    <hr>
    <br>

    <!-- San pham gợi ý -->
    <div class="sp-goi-y">
        <div class="cf-title" style="padding-top: 25px">
            <h3>Các sản phẩm khác</h3>
        </div>

        <div class="row">
            @forelse($randomProducts as $randomProduct)
            @if($randomProduct->prd_discount > 0)
            <div class="column-sales">
                <div class="card">
                    <img src="{{$randomProduct->img_url}}" style="height:290px;width:290px" id="zoom">
                    <div class="khuyen-mai">
                        <p><strong>- {{$randomProduct->prd_discount}}%</strong></p>
                    </div>
                    <br>
                    <h4 class="ten-sp">{{$randomProduct->prd_name}}</h4>
                    <a class="price" id="old-price">{{number_format($randomProduct->prd_price).' VND'}}</a>
                    <a class="price" id="new-price">{{number_format($randomProduct->prd_price * (100 - $randomProduct->prd_discount)/100).' VND'}}</a>
                    <a class="btn-detail" href="/{{$randomProduct->prd_id}}/productDetails" role="button">Xem chi tiết</a>
                    <?php
                    $quantity = App\Models\Importinvoicedetail::where('prd_id', $randomProduct->prd_id)
                        ->where('prd_status_id', '<', 3)
                        ->sum('ImportInvoiceDetails.imp_quantity_left');
                    ?>
                    @if($quantity != 0)
                    <div class="popup" onclick="addToCart()">
                        <a class="btn-add-to-cart" href="/{{$randomProduct->prd_id}}/addCart" role="button">Thêm vào giỏ</a>
                        <span class="popuptext" id="myPopup">Đã thêm vào giỏ</span>
                    </div>
                    @else
                    <a class="btn-add-to-cart" role="button" style="background-color:red;">Hết hàng</a>
                    @endif
                </div>
            </div>
            @else
            <div class="column-product">
                <div class="card">
                    <img src="{{$randomProduct->img_url}}" style="height:290px;width:290px" id="zoom">
                    <br>
                    <h4>{{$randomProduct->prd_name}}</h4>
                    <p class="price">{{number_format($randomProduct->prd_price).' VND'}}</p>
                    <br>
                    <a class="btn-detail" href="/{{$randomProduct->prd_id}}/productDetails" role="button">Xem chi tiết</a>
                    <?php
                    $quantity = App\Models\Importinvoicedetail::where('prd_id', $randomProduct->prd_id)
                        ->where('prd_status_id', '<', 3)
                        ->sum('ImportInvoiceDetails.imp_quantity_left');
                    ?>
                    @if($quantity != 0)
                    <div class="popup" onclick="addToCart()">
                        <a class="btn-add-to-cart" href="/{{$randomProduct->prd_id}}/addCart" role="button">Thêm vào giỏ</a>
                        <span class="popuptext" id="myPopup">Đã thêm vào giỏ</span>
                    </div>
                    @else
                    <a class="btn-add-to-cart" role="button" style="background-color:red;">Hết hàng</a>
                    @endif
                </div>
            </div>
            @endif
            @empty
            <h3>Không có sản phẩm </h3>
            @endforelse
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
            });
    });
</script>

<script>
    // When the user clicks on div, open the popup
    function addToCart() {
        var popup = document.getElementById("myPopup");
        popup.classList.toggle("show");
    }
</script>

@endsection