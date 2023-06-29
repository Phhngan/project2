@extends('layout.clientInfo')

@section('title','Xem đơn hàng')

@section('style')

.container-post{ position: relative; width: 400px; background: #FF917D; border: 1px solid #FF917D; border-radius: 5px; padding: 5px; display: flex; align-items: center; justify-content: center; flex-direction: column; display: none; margin-left: auto; margin-right: auto; } .container-post .post{ display: none; } .container-post .text{ font-size: 12px; color: #666; font-weight: 500; } .container-post .edit{ position: absolute; right: 10px; top: 5px; font-size: 16px; color: #666; font-weight: 500; cursor: pointer; } .container-post .edit:hover{ text-decoration: underline; } .container-post .star-widget input{ display: none; } .star-widget label{ font-size: 20px; color: #444; padding: 3px; float: right; transition: all 0.2s ease; } input:not(:checked) ~ label:hover, input:not(:checked) ~ label:hover ~ label{ color: #fd4; } input:checked ~ label{ color: #fd4; } input#rate-5:checked ~ label{ color: #fe7; text-shadow: 0 0 20px #952; } #rate-1:checked ~ form header:before{ content: "I just hate it " ; } #rate-2:checked ~ form header:before{ content: "I don't like it " ; } #rate-3:checked ~ form header:before{ content: "It is awesome " ; } #rate-4:checked ~ form header:before{ content: "I just like it " ; } #rate-5:checked ~ form header:before{ content: "I just love it " ; } .container-post form{ display: none; } input:checked ~ form{ display: block; } form header{ width: 100%; font-size: 18px; color: #fe7; font-weight: 500; margin: 5px 0 20px 0; text-align: center; transition: all 0.2s ease; } form .textarea{ height: 100px; width: 100%; overflow: hidden; } form .textarea textarea{ height: 100%; width: 100%; outline: none; color: black; border: 1px solid #F4CCCD; background: #F4CCCD; padding: 10px; font-size: 17px; resize: none; } .textarea textarea:focus{ border-color: #444; } form .btn{ height: 45px; width: 100%; margin: 15px 0; } form .btn button{ height: 100%; width: 100%; border: 1px solid #F4CCCD; outline: none; background: #F4CCCD; color: white; font-size: 17px; font-weight: 500; text-transform: uppercase; cursor: pointer; transition: all 0.3s ease; } form .btn button:hover{ background: #FF917D; border: 1px solid #F4CCCD;
@endsection

@section('sidebar-client')
<a href="/client">Thông tin khách hàng</a>
<a href="/client/edit">Sửa thông tin</a>
<a href="/client/favorite">Sản phẩm yêu thích</a>
<a href="/client/invoices">Đơn hàng</a>
<a href="/client/changePass">Đổi mật khẩu</a>
@endsection

@section('content-info')
<br>
<div class="cf-title">
    <h3>Đánh giá đơn hàng</h3>
</div>
<br>

<table class="table">
    <tr style="background-color:#CED7FD">
        <th>Mã sản phẩm</th>
        <th>Ảnh sản phẩm</th>
        <th>Tên sản phẩm</th>
        <th>Giá bán</th>
        <th>Hành động</th>
    </tr>
    @forelse($invoiceDetails as $invoiceDetail)
    <tr>
        <td>
            <p>{{$invoiceDetail->prd_code}}</p>
        </td>
        <td>
            <img src="/storage/{{substr($invoiceDetail->prd_image, 7)}}" width="100px">
        </td>
        <td>
            <p>{{$invoiceDetail->prd_name}}</p>
        </td>
        <td>
            <p>{{number_format($invoiceDetail->sal_price).' VND'}}</p>
        </td>
        <?php
        $user = Illuminate\Support\Facades\Auth::user();
        $count = Illuminate\Support\Facades\DB::table('Comments')
            ->select('Comments.*',)
            ->where('Comments.use_id', $user->id)
            ->where('Comments.prd_id', $invoiceDetail->prd_id)
            ->where('Comments.sal_id', $invoiceDetail->sal_id)
            ->count();
        // dd($count);
        if ($count == 0) {
        ?>
            <td>
                <a class="btn btn-warning" href="{{url('/client/invoices/'.$invoiceDetail->id.'/rattingSP')}}" role="button">Đánh giá</a>
            </td>
        <?php
        } else {
        ?>
            <td>
                <p class="btn btn-success" disabled>Đã đánh giá</p>
            </td>
        <?php } ?>
    </tr>
    @empty
    <tr>
        <td colspan="3">Danh sach rong</td>
    </tr>
    @endforelse
    <br>
</table>

<!-- <div class="container-post" id="popup-ratting">
    <div class="post">
        <div class="text">Thanks for rating us!</div>
        <div class="edit">EDIT</div>
    </div>
    <div class="star-widget">
        <input type="radio" name="rate" id="rate-5">
        <label for="rate-5" class="fas fa-star"></label>
        <input type="radio" name="rate" id="rate-4">
        <label for="rate-4" class="fas fa-star"></label>
        <input type="radio" name="rate" id="rate-3">
        <label for="rate-3" class="fas fa-star"></label>
        <input type="radio" name="rate" id="rate-2">
        <label for="rate-2" class="fas fa-star"></label>
        <input type="radio" name="rate" id="rate-1">
        <label for="rate-1" class="fas fa-star"></label>
        <form action="#">
            <header></header>
            <div class="textarea">
                <textarea cols="30" placeholder="Đánh giá của bạn"></textarea>
            </div>
            <div class="btn">
                <button type="submit">Đánh giá</button>
            </div>
        </form>
    </div>
</div> -->

@endsection

@section('js')
@parent
<!-- <script>
    const btn = document.querySelector("button");
    const widget = document.querySelector(".star-widget");
    const editBtn = document.querySelector(".edit");
    btn.onclick = () => {
        widget.style.display = "none";
        post.style.display = "block";
        editBtn.onclick = () => {
            widget.style.display = "block";
            post.style.display = "none";
        }
        return false;
    }
</script> -->

<!-- <script>
    function showPopup() {
        var popup = document.getElementById("popup-ratting");
        popup.style.display = "flex";
    }
</script> -->
@endsection