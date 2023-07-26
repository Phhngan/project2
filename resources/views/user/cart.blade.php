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
.disabled {
pointer-events: none;
}
input::-webkit-outer-spin-button,
input::-webkit-inner-spin-button {
-webkit-appearance: none;
margin: 0;
}
@endsection

@section('content')
<div class="cf-title">
    <h3>Giỏ hàng</h3>
</div>
<div class="item-products">
    <form id="form-quantity" method='PUT' action="cart/update">
        @csrf
        <table class="table" id="cartTable">
            <tr>
                <th>Mã sản phẩm</th>
                <th>Hình ảnh</th>
                <th width="360px">Tên sản phẩm</th>
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
                    <img src="/storage/{{substr($product->prd_image, 7)}}" style="height:100px">
                </td>
                <td>
                    <a href="/{{$product->prd_id}}/productDetails" class="text-sp">{{$product->prd_name}}</a>
                </td>
                <?php
                $quantity = App\Models\Importinvoicedetail::where('prd_id', $product->prd_id)
                    ->where('prd_status_id', '<', 3)
                    ->sum('ImportInvoiceDetails.imp_quantity_left');
                ?>
                <td>
                    <input type="hidden" name="car_ids[]" value='{{$product->car_id}}'>
                    <input type='button' value='-' class='qtyminus minus' field='quantity' />
                    <input type='number' name='quantities[]' min='1' max='{{$quantity}}' value='{{$product->car_quantity}}' class='qty' data-car-id='{{$product->car_id}}' required/>
                    <input type='button' value='+' class='qtyplus plus' field='quantity' />
                </td>
                <td>
                    <p>{{number_format($product->prd_price * (100 - $product->prd_discount)/100).' VND'}}</p>
                </td>
                <td>
                    <!-- <form method="POST" onClick="deleteProduct()" action="{{url('/cart/'.$product->car_id.'/delete')}}">
                        @csrf
                        @method('delete')
                        <button type="submit" class="btn btn-danger">Xóa</button>
                    </form> -->
                    <a class="btn btn-danger" href="/cart/{{$product->car_id}}/delete" role="button" onClick="deleteProduct()">Xóa</a>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="3">Chưa có sản phẩm trong giỏ hàng</td>
            </tr>
            @endforelse
        </table>
        <?php
        if (count($products) != 0) {
        ?>
            <td colspan="6" style="text-align:center;">
                <button style="margin-left:780px;margin-bottom:15px;" type="submit" class="btn btn-primary">Cập nhật số lượng</button>
            </td>
        <?php } ?>
    </form>
</div>

<div class="row">
    <div class="col">
        <div class="card mb-4" id="card-client" style="background-color:#EBECFE;height:auto">
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
                    <?php
                    if ($address->car_province != null) {
                        $province = $address->car_province;
                        $district = $address->car_district;
                        $town = $address->car_town;
                        $detailAddress = $address->car_detailAddress;
                    } else {
                        $province = "Tỉnh thành";
                        $district = "Quận huyện";
                        $town = "Phường/Xã";
                        $detailAddress = "";
                    }
                    ?>
                    <label for="province" style="float:left;padding-bottom:6px">Tỉnh:</label>
                    <br>
                    <select class="form-control" id="city" name="province" required>
                        <option value="" selected>---{{$province}}---</option>
                    </select>
                    <br>
                    <label for="district" style="float:left;padding-bottom:6px">Quận/Huyện</label>
                    <select class="form-control" id="district" name="district" required>
                        <option value="" selected>---{{$district}}---</option>
                    </select>
                    <br>
                    <label for="town" style="float:left;padding-bottom:6px">Phường/Xã:</label>
                    <select class="form-control" id="ward" name="town" required>
                        <option value="" selected>---{{$town}}---</option>
                    </select>
                    <br>
                    <label for="detailAddress" style="float:left;padding-bottom:6px">Thôn/Đường/Số nhà</label>
                    <br>
                    <input value="{{$detailAddress}}" name="detailAddress" type="text" class="form-control" placeholder="" required>
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

    <div class="card mb-4" id="card-client" style="height:auto">
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
            <?php
            $user = Illuminate\Support\Facades\Auth::user();
            $carts = Illuminate\Support\Facades\DB::table('Carts')
                ->select('Carts.car_province', 'Carts.car_district', 'Carts.car_town', 'Carts.car_detailAddress')
                ->where('Carts.use_id', $user->id)
                ->distinct()
                ->get();
            foreach ($carts as $cart) {
                if ($cart->car_province == null) {
                    $countCart = 0;
                } else {
                    $countCart = 1;
                }
            }
            ?>
            @if(count($products) > 0)
            @if($countCart != 0)
            <a class="btn btn-primary btn-mua-hang" href="/checkOut" role="button">Tiếp tục</a>
            @else
            <!-- <a class="btn btn-primary btn-mua-hang disabled" href="/checkOut" role="button">Tiếp tục</a><br><br> -->
            <div class="alert alert-danger" role="alert">
                Xin mời điền địa chỉ
            </div>
            @endif
            @endif
        </div>
    </div>

</div>

</div>
</div>

@endsection

@section('js')
@parent
<script>
    // Add event listeners to the minus and plus buttons
    const minusButtons = document.querySelectorAll('.minus');
    const plusButtons = document.querySelectorAll('.plus');
    const form = document.getElementById('form-quantity');
    const carIdsInput = form.querySelector('input[name="car_ids"]');
    const quantitiesInput = form.querySelector('input[name="quantities"]');
    var carIds = [];
    var quantities = [];

    minusButtons.forEach(button => {
        button.addEventListener('click', function() {
            const quantityInput = this.parentNode.querySelector('.qty');
            let quantity = parseInt(quantityInput.value);
            if (quantity > 1) {
                quantity--;
                quantityInput.value = quantity;
            }
        });
    });

    plusButtons.forEach(button => {
        button.addEventListener('click', function() {
            const quantityInput = this.parentNode.querySelector('.qty');
            const maxQuantity = parseInt(quantityInput.getAttribute('max'));
            let quantity = parseInt(quantityInput.value);
            if (quantity < maxQuantity) {
                quantity++;
                quantityInput.value = quantity;
            }
        });
    });

    form.addEventListener('submit', function(e) {
        e.preventDefault();

        // Clear previous values
        carIds.length = 0;
        quantities.length = 0;

        // Collect the updated quantities
        const quantityInputs = document.querySelectorAll('.qty');
        quantityInputs.forEach(input => {
            const carId = input.getAttribute('data-car-id');
            const quantity = input.value;
            carIds.push(carId);
            quantities.push(quantity);
        });

        // Submit the form
        this.submit();
    });
</script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.21.1/axios.min.js"></script>
<script>
    var citis = document.getElementById("city");
    var districts = document.getElementById("district");
    var wards = document.getElementById("ward");
    var Parameter = {
        url: "https://raw.githubusercontent.com/kenzouno1/DiaGioiHanhChinhVN/master/data.json",
        method: "GET",
        responseType: "application/json",
    };
    var promise = axios(Parameter);
    promise.then(function(result) {
        renderCity(result.data);
    });

    function renderCity(data) {
        for (const x of data) {
            var opt = document.createElement('option');
            opt.value = x.Name;
            opt.text = x.Name;
            opt.setAttribute('data-id', x.Id);
            citis.options.add(opt);
        }
        citis.onchange = function() {
            district.length = 1;
            ward.length = 1;
            if (this.options[this.selectedIndex].dataset.id != "") {
                const result = data.filter(n => n.Id === this.options[this.selectedIndex].dataset.id);

                // In tên miền vào phần tử HTML có id là "region"
                // const cityCode = parseInt(result[0].Id);
                for (const k of result[0].Districts) {
                    var opt = document.createElement('option');
                    opt.value = k.Name;
                    opt.text = k.Name;
                    opt.setAttribute('data-id', k.Id);
                    district.options.add(opt);
                }
            }
        };
        district.onchange = function() {
            ward.length = 1;
            const dataCity = data.filter((n) => n.Id === citis.options[citis.selectedIndex].dataset.id);
            if (this.options[this.selectedIndex].dataset.id != "") {
                const dataWards = dataCity[0].Districts.filter(n => n.Id === this.options[this.selectedIndex].dataset.id)[0].Wards;

                for (const w of dataWards) {
                    var opt = document.createElement('option');
                    opt.value = w.Name;
                    opt.text = w.Name;
                    opt.setAttribute('data-id', w.Id);
                    wards.options.add(opt);
                }
            }
        };
    }

    function deleteProduct() {
        alert("Bạn đã xóa sản phẩm trong giỏ hàng!");
    }
</script>
@endsection