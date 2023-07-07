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
                <img src="/storage/{{substr($product->prd_image, 7)}}" style="height:150px">
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
        <div class="card mb-4" id="card-client" style="background-color:#EBECFE;height:280px;">
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
                        <p class="text-muted mb-0">{{$location->car_detailAddress}}, {{$location->car_town}}, {{$location->car_district}}, {{$location->car_province}}</p>
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
    <?php
    $user = Illuminate\Support\Facades\Auth::user();
    foreach ($locations as $location) {
        if ($location->car_note == null) {
            $note = '';
        } else {
            $note = $location->car_note;
        }
        if ($location->vou_id == null) {
            $vouID = 0;
        } else {
            $vouID = $location->vou_id;
        }
        if ($location->car_gold == null) {
            $gold = 0;
        } else {
            $gold = $location->car_gold;
        }
    }
    ?>
    <div class="col">
        <div class="card mb-4" id="card-client" style="height:280px;">
            <div class="card-body">
                <div class="row">
                    <form id='form-note' method='PUT' class='note' action='checkOut/updateNote'>
                        <label for="note" style="float:left;padding-bottom:6px">Ghi chú:</label>
                        <br>
                        <input name="note" value="{{$note}}" type="text" class="form-control" placeholder="Ghi chú" style="height:100px" required>
                        <br><br>
                        <button type="submit" class="btn btn-primary" style="float:left;width:90px;margin-top:10px">Cập nhật</button>
                        <br>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col">
        <div class="card mb-4" id="card-client" style="height:530px;">
            <div class="card-body">
                <div class="row">
                    <div class="row">
                        <div class="col">
                            <h5 class="text-center">Chọn voucher <a href="/chinh-sach#Xu" target="_blank"><i class="fa-regular fa-circle-question" style="color: #7389b0;"></i></a></h5><br>
                        </div>
                    </div>
                    <hr>
                    <form style="height: 150px; overflow-x: hidden;" action="checkOut/updateGold" method="PUT" onsubmit="return validateGold()">
                        <label for="use-xu">Bạn đang có {{$user->use_gold}} <img src="https://github.com/Phhngan/snack_images/blob/master/icon/xu.png?raw=true" style="width:22px;"></label>
                        <br>
                        <label for="use-xu">Sử dụng:
                            <input name="gold" id="gold-input" value="{{$gold}}" min="0" max="{{$user->use_gold}}" type="number" class="form-control" placeholder="" style="height:40px;width: 100px;" required>
                        </label>
                        <button type="submit" class="btn btn-primary" style="width:90px;margin-top:10px">Áp dụng</button>
                    </form>
                    <hr>
                    <label>Voucher hiện có:</label>
                    <br><br>
                    <form style="overflow-x: hidden;" action="checkOut/updateVoucher" method='PUT'>
                        @if ($countVoucher == 1)
                        <?php
                        $today = date('Y-m-d');
                        $vouchers = Illuminate\Support\Facades\DB::table('Vouchers')
                            ->select('Vouchers.*')
                            ->where('Vouchers.vou_day', $today)
                            ->get();
                        foreach ($vouchers as $voucher) {
                            $vou_image = $voucher->vou_image;
                            $vou_title = $voucher->vou_title;
                            $vou_id = $voucher->vou_id;
                        ?>
                            <div class="voucher-selector">
                                <div class="voucher-container">
                                    <img class="voucher-img" src="/storage/{{substr($vou_image, 7)}}" height="100" />
                                    <label for="voucher1" class="name-voucher">{{$vou_title}}</label>
                                    <input class="voucher-checkbox" type="checkbox" id="voucher1" name="voucher" value="{{$vou_id}}">
                                </div>
                            </div>
                        <?php } ?>
                        @else
                        <tr>
                            <td colspan="3">Không có voucher thích hợp</td>
                        </tr>
                        @endif
                        <button type="submit" class="btn btn-primary" style="width:90px;margin-top:10px">Áp dụng</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="col">

        <div class="card mb-4" id="card-client" style="height:530px;">
            <div class="card-body">
                <div class="row">
                    <div class="col">
                        <h5 class="text-center">Thanh toán</h5>
                    </div>
                </div>
                <hr>
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
                            {{number_format($price).' VND'}}
                        </p>
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
                            $ship_id = 0;
                            $weigh = 0;
                            foreach ($products as $product) {
                                $ship_id = $product->ship_id;
                                $weigh = $weigh + ($product->prd_weigh * $product->car_quantity);
                            }
                            $ships = Illuminate\Support\Facades\DB::table('Ships')
                                ->select('Ships.*')
                                ->where('Ships.ship_id', $ship_id)
                                ->get();
                            $shipMoney = 0;
                            foreach ($ships as $ship) {
                                if ($weigh <= 2000) {
                                    $shipMoney = $ship->ship_price;
                                } else {
                                    $weighDiffer = $weigh - 2000;
                                    $shipMoney = $ship->ship_price + $ship->ship_extra * ($weighDiffer / 200);
                                }
                            }
                            ?>
                            {{number_format($shipMoney).' VND'}}
                        </p>
                    </div>
                </div>
                <hr>

                <div class="row">
                    <div class="col-sm-6">
                        <p class="mb-0">Giảm xu:</p>
                    </div>
                    <div class="col-sm-6">
                        <p class="text-muted mb-0">{{number_format($gold).' VND'}}</p>
                    </div>
                </div>
                <hr>

                <div class="row">
                    <div class="col-sm-6">
                        <p class="mb-0">Mã giảm giá:</p>
                    </div>
                    <div class="col-sm-6">
                        <p class="text-muted mb-0">
                            <?php
                            if ($vouID == 0) {
                                $discount = 0;
                            } else {
                                $vous = Illuminate\Support\Facades\DB::table('Vouchers')
                                    ->select('Vouchers.*')
                                    ->where('Vouchers.vou_id', $vouID)
                                    ->get();
                                foreach ($vous as $vou) {
                                    $discount = $vou->vou_discount;
                                }
                            }
                            ?>
                            {{number_format($discount).' VND'}}
                        </p>
                    </div>
                </div>
                <hr>

                <div class="row">
                    <div class="col-sm-6">
                        <p class="mb-0">Tổng đơn hàng:</p>
                    </div>
                    <div class="col-sm-6">
                        <p class="text-muted mb-0">
                            <input type="hidden" value="{{$shipMoney + $price}}" name="total">
                            {{number_format($shipMoney + $price - $gold - $discount).' VND'}}
                        </p>
                    </div>
                </div>
                <hr>

                <form action="{{url('/VNPay')}}" method="POST">
                    @csrf
                    <button class="btn btn-primary" name="redirect" type="submit" style="height: 40px;"> Mua hàng với ví điện tử VNPay <img src="https://github.com/Phhngan/snack_images/blob/master/icon/vnpay.png?raw=true" height="25" /></button>
                </form>
                <form action="{{url('/Momo')}}" method="POST">
                    @csrf
                    <button class="btn btn-primary" name="payUrl" type="submit" style="height: 40px;"> Mua hàng với ví điện tử MoMo <img src="https://github.com/Phhngan/snack_images/blob/master/icon/MoMo_Logo.png?raw=true" height="25" /></button>
                </form>
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
<script>
    const checkboxes = document.querySelectorAll('input[type="checkbox"]');
    const selectedVoucherKey = 'selectedVoucher';

    checkboxes.forEach(checkbox => {
        checkbox.addEventListener('change', () => {
            const isChecked = checkbox.checked;

            // Uncheck all checkboxes
            checkboxes.forEach(cb => {
                cb.checked = false;
                cb.classList.remove('selected');
            });

            if (isChecked) {
                checkbox.checked = true;
                checkbox.classList.add('selected');
            }

            // Save the selected voucher ID to Local Storage
            const selectedVoucherId = isChecked ? checkbox.value : '';
            localStorage.setItem(selectedVoucherKey, selectedVoucherId);
        });
    });

    // Check if there is a selected voucher in Local Storage and mark the checkbox as checked
    const selectedVoucherId = localStorage.getItem(selectedVoucherKey);
    if (selectedVoucherId) {
        const selectedCheckbox = document.querySelector(`input[value="${selectedVoucherId}"]`);
        if (selectedCheckbox) {
            selectedCheckbox.checked = true;
            selectedCheckbox.classList.add('selected');
        }
    }
</script>
<script>
    function validateGold() {
        var goldInput = document.getElementById("gold-input");
        var goldValue = parseInt(goldInput.value);

        if (goldValue % 100 !== 0) {
            alert("Số xu sử dụng phải chia hết cho 100.");
            return false;
        }

        return true;
    }
</script>
@endsection