@extends('layout.base_page')

@section('title','Home')

@section('css-link')
@endsection

@section('style')
.customer{
border-radius: 50%;
display: block;
margin-left: auto;
margin-right: auto;
height: 100px;
padding-bottom:6px;
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
@endsection

@section('content')

<div class="main">
    <div class="row">

        <div class="leftcolumn">
            <section class="slideShow">
                <a href="#order-now">
                    <img class="mySlides" src="https://github.com/Phhngan/snack_images/blob/master/silder/snack1.jpg?raw=true" style="width:100%">
                </a>
                <a href="/products">
                    <img class="mySlides" src="https://github.com/Phhngan/snack_images/blob/master/silder/snack2.png?raw=true" style="width:100%">
                </a>
                <a href="/products">
                    <img class="mySlides" src="https://github.com/Phhngan/snack_images/blob/master/silder/snack3.jpg?raw=true" style="width:100%">
                </a>
            </section>
        </div>

        <div class="rightcolumn">
            <table class="table">
                <tr>
                    <th>Danh mục sản phẩm</th>
                </tr>
                <tr>
                    <td>
                        <a href="/products" class="menu">Tất cả sản phẩm</a>
                    </td>
                </tr>
                <tr>
                    <td>
                        <a href="/doMan" class="menu">Đồ mặn</a>
                    </td>
                </tr>
                <tr>
                    <td>
                        <a href="doNgot" class="menu">Đồ ngọt</a>
                    </td>
                </tr>
                <tr>
                    <td>
                        <a href="doUong" class="menu">Đồ uống</a>
                    </td>
                </tr>
            </table>
            <br>
            <img src=" https://www.packagingstrategies.com/ext/resources/ISSUES/2021/06-June/MarketTrends-FamilyShot.jpg" alt="tra-hoa-qua" style="width:100%">
        </div>
    </div>
</div>


<!-- San pham moi -->
<div class="sp-moi">
    <div class="cf-title" style="padding-top: 25px">
        <h3 id="order-now">SẢN PHẨM MỚI NHẤT</h3>
    </div>
    <div class="row">
        @forelse($newProducts as $newProduct)
        @if($newProduct->prd_discount > 0)
        <div class="column-sales">
            <div class="card">
                <img src="/storage/{{substr($newProduct->prd_image, 7)}}" style="height:290px;width:290px" id="zoom">
                <div class="khuyen-mai">
                    <p><strong>- {{$newProduct->prd_discount}}%</strong></p>
                </div>
                <br>
                <h4 class="ten-sp">{{$newProduct->prd_name}}</h4>
                <a class="price" id="old-price">{{number_format($newProduct->prd_price).' VND'}}</a>
                <a class="price" id="new-price">{{number_format($newProduct->prd_price * (100 - $newProduct->prd_discount)/100).' VND'}}</a>
                <a class="btn-detail" href="/{{$newProduct->prd_id}}/productDetails" role="button">Xem chi tiết</a>
                <?php
                $quantity = App\Models\Importinvoicedetail::where('prd_id', $newProduct->prd_id)
                    ->where('prd_status_id', '<', 3)
                    ->sum('ImportInvoiceDetails.imp_quantity_left');
                ?>
                @if($quantity != 0)
                <div class="popup" onclick="addToCart()">
                    @if(Auth::check() == false)
                    <a class="btn-add-to-cart" href="/{{$newProduct->prd_id}}/addCart" role="button">Thêm vào giỏ</a>
                    @else
                    <a class="btn-add-to-cart" href="/{{$newProduct->prd_id}}/addCart" role="button">Thêm vào giỏ</a>
                    <span class="popuptext" id="myPopup">Đã thêm vào giỏ</span>
                    @endif
                </div>
                @else
                <a class="btn-add-to-cart" role="button" style="background-color:red;margin-top:0px;">Hết hàng</a>
                @endif
            </div>
        </div>
        @else
        <div class="column-product">
            <div class="card">
                <img src="/storage/{{substr($newProduct->prd_image, 7)}}" style="height:290px;width:290px" id="zoom">
                <br>
                <h4 class="ten-sp">{{$newProduct->prd_name}}</h4>
                <p class="price">{{number_format($newProduct->prd_price).' VND'}}</p>
                <br>
                <a class="btn-detail" href="/{{$newProduct->prd_id}}/productDetails" role="button">Xem chi tiết</a>
                <?php
                $quantity = App\Models\Importinvoicedetail::where('prd_id', $newProduct->prd_id)
                    ->where('prd_status_id', '<', 3)
                    ->sum('ImportInvoiceDetails.imp_quantity_left');
                ?>
                @if($quantity != 0)
                <div class="popup" onclick="addToCart()">
                    @if(Auth::check() == false)
                    <a class="btn-add-to-cart" href="/{{$newProduct->prd_id}}/addCart" role="button">Thêm vào giỏ</a>
                    @else
                    <a class="btn-add-to-cart" href="/{{$newProduct->prd_id}}/addCart" role="button">Thêm vào giỏ</a>
                    <span class="popuptext" id="myPopup">Đã thêm vào giỏ</span>
                    @endif
                </div>
                @else
                <a class="btn-add-to-cart" role="button" style="background-color:red;margin-top:0px;">Hết hàng</a>
                @endif
            </div>
        </div>
        @endif
        @empty
        <h3>Không có sản phẩm </h3>
        @endforelse
        <!-- <a class="xem-them" href="/sp-moi" role="button">Xem thêm</a> -->
    </div>
</div>

<!-- San pham giam gia -->
<div class="sp-moi">
    <div class="cf-title" style="padding-top: 25px">
        <h3>SẢN PHẨM GIẢM GIÁ</h3>
    </div>
    <div class="row">
        @forelse($discountProducts as $discountProduct)
        @if($discountProduct->prd_discount > 0)
        <div class="column-sales">
            <div class="card">
                <img src="/storage/{{substr($discountProduct->prd_image, 7)}}" style="height:290px;width:290px" id="zoom">
                <div class="khuyen-mai">
                    <p><strong>- {{$discountProduct->prd_discount}}%</strong></p>
                </div>
                <br>
                <h4 class="ten-sp">{{$discountProduct->prd_name}}</h4>
                <a class="price" id="old-price">{{number_format($discountProduct->prd_price).' VND'}}</a>
                <a class="price" id="new-price">{{number_format($discountProduct->prd_price * (100 - $discountProduct->prd_discount)/100).' VND'}}</a>
                <a class="btn-detail" href="/{{$discountProduct->prd_id}}/productDetails" role="button">Xem chi tiết</a>
                <?php
                $quantity = App\Models\Importinvoicedetail::where('prd_id', $discountProduct->prd_id)
                    ->where('prd_status_id', '<', 3)
                    ->sum('ImportInvoiceDetails.imp_quantity_left');
                ?>
                @if($quantity != 0)
                <div class="popup" onclick="addToCart()">
                    @if(Auth::check() == false)
                    <a class="btn-add-to-cart" href="/{{$discountProduct->prd_id}}/addCart" role="button">Thêm vào giỏ</a>
                    @else
                    <a class="btn-add-to-cart" href="/{{$discountProduct->prd_id}}/addCart" role="button">Thêm vào giỏ</a>
                    <span class="popuptext" id="myPopup">Đã thêm vào giỏ</span>
                    @endif
                </div>
                @else
                <a class="btn-add-to-cart" role="button" style="background-color:red;margin-top:0px;">Hết hàng</a>
                @endif
            </div>
        </div>
        @else
        <div class="column-product">
            <div class="card">
                <img src="/storage/{{substr($discountProduct->prd_image, 7)}}" style="height:290px;width:290px" id="zoom">
                <br>
                <h4 class="ten-sp">{{$discountProduct->prd_name}}</h4>
                <p class="price">{{number_format($discountProduct->prd_price).' VND'}}</p>
                <br>
                <a class="btn-detail" href="/{{$discountProduct->prd_id}}/productDetails" role="button">Xem chi tiết</a>
                <?php
                $quantity = App\Models\Importinvoicedetail::where('prd_id', $discountProduct->prd_id)
                    ->where('prd_status_id', '<', 3)
                    ->sum('ImportInvoiceDetails.imp_quantity_left');
                ?>
                @if($quantity != 0)
                <div class="popup" onclick="addToCart()">
                    @if(Auth::check() == false)
                    <a class="btn-add-to-cart" href="/{{$discountProduct->prd_id}}/addCart" role="button">Thêm vào giỏ</a>
                    @else
                    <a class="btn-add-to-cart" href="/{{$discountProduct->prd_id}}/addCart" role="button">Thêm vào giỏ</a>
                    <span class="popuptext" id="myPopup">Đã thêm vào giỏ</span>
                    @endif
                </div>
                @else
                <a class="btn-add-to-cart" role="button" style="background-color:red;margin-top:0px;">Hết hàng</a>
                @endif
            </div>
        </div>
        @endif
        @empty
        <h3>Không có sản phẩm </h3>
        @endforelse
    </div>
    <!-- <a class="xem-them" href="/sp-giam-gia" role="button">Xem thêm</a> -->
</div>
<!-- phản hồi khách hàng -->
<div class="phan-hoi-khach-hang" style="background-color:#EBECFE;height:455px;margin-bottom:50px;text-align:center;">
    <div class="cf-title" style="padding-top:25px">
        <h3>Chính sách mua hàng</h3>
    </div>
    <a href="/chinh-sach">
        <img src="https://github.com/Phhngan/snack_images/blob/master/trang-tin-tuc/policy.png?raw=true" style="height:250px">
    </a>
    <div class="post-text">
        <a href="/chinh-sach" style="color: white;text-decoration: none">Xem thêm </a>
    </div>
    <br>
    <p style="font-size:15px; margin-left: 0px; opacity: 0.8;">Các Chính Sách,Quy Định Chung Khi Mua Hàng và cách sử dụng xu</p>
</div>

@endsection

@section('full-screen-content')
<div class="nhan-hang">
    <div class="cf-title" style="padding-top: 25px">
        <h3>CÁC NHÃN HÀNG</h3>
    </div>

    <div class="row" id="row-nhan-hang">
        <div class="column nhan-hang-hover" id="ten-nhan-hang">
            <img src="https://github.com/Phhngan/snack_images/blob/master/nhan-hang/coca.png?raw=true" alt="co-ca" style="width:100%">
        </div>
        <div class="column nhan-hang-hover" id="ten-nhan-hang">
            <img src="https://github.com/Phhngan/snack_images/blob/master/nhan-hang/oreo.png?raw=true" alt="oreo" style="width:100%">
        </div>
        <div class="column nhan-hang-hover" id="ten-nhan-hang">
            <img src="https://github.com/Phhngan/snack_images/blob/master/nhan-hang/pocky2.jpg?raw=true" alt="pocky" style="width:100%">
        </div>
        <div class="column nhan-hang-hover" id="ten-nhan-hang">
            <img src="https://github.com/Phhngan/snack_images/blob/master/nhan-hang/coca.png?raw=true" alt="co-ca" style="width:100%">
        </div>
        <div class="column nhan-hang-hover" id="ten-nhan-hang">
            <img src="https://github.com/Phhngan/snack_images/blob/master/nhan-hang/oreo.png?raw=true" alt="oreo" style="width:100%">
        </div>
    </div>
</div>

<div class="video">
    <div class="cf-title" style="padding-top: 25px">
        <h3>QUÀ TẶNG TỪ snack - HOW WE MADE</h3><br>
    </div>
    <iframe style="margin-left:500px" width="560" height="315" src="https://www.youtube.com/embed/eNs4pTtmax4" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
</div>
@endsection

@section('js')
<script>
    // Automatic Slideshow - change image every 3 seconds
    var myIndex = 0;
    carousel();

    function carousel() {
        var i;
        var x = document.getElementsByClassName("mySlides");
        for (i = 0; i < x.length; i++) {
            x[i].style.display = "none";
        }
        myIndex++;
        if (myIndex > x.length) {
            myIndex = 1
        }
        x[myIndex - 1].style.display = "block";
        setTimeout(carousel, 3000);
    }

    // When the user clicks on div, open the popup
    function addToCart() {
        var popup = document.getElementById("myPopup");
        popup.classList.toggle("show");
    }
</script>


@endsection