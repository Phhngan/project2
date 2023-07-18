@extends('layout.clientInfo')

@section('title','Sản phẩm yêu thích')

@section('style')
.text-sp{
text-decoration: none;
color:black;
}
.text-sp:hover{
text-decoration: none;
color:#3E526D;
}
.popup-container {
position: fixed;
top: 0;
left: 0;
width: 100%;
height: 100%;
background-color: rgba(0, 0, 0, 0.5);
display: flex;
justify-content: center;
align-items: center;
z-index: 9999;
display: none; /* Hide the popup by default */
}

.popup-content {
background-color: #CED7FD;
padding: 20px;
border-radius: 5px;
text-align: center;
width: 498px;
height: 150px;
position: fixed;
top: 50%;
left: 50%;
transform: translate(-50%, -50%);
}

.popup-buttons {
margin-top: 20px;
display: flex;
justify-content: center;
}

.popup-button {
margin: 0 10px;
padding: 8px 16px;
border: none;
border-radius: 10px;
cursor: pointer;
}

.popup-button:hover {
background-color: #ddd;
}
@endsection

@section('sidebar-client')
<a href="/client">Thông tin khách hàng</a>
<a href="/client/edit">Sửa thông tin</a>
<a class="active" href="/client/favorite">Sản phẩm yêu thích</a>
<a href="/client/invoices">Đơn hàng</a>
<a href="/client/changePass">Đổi mật khẩu</a>
@endsection

@section('content-info')
<br>
<div class="cf-title">
    <h3>Sản phẩm yêu thích</h3>
</div>

<div class="item-products">
    <table class="table">
        <tr>
            <th>Mã sản phẩm</th>
            <th>Hình ảnh</th>
            <th>Tên sản phẩm</th>
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
            <td>
                <p>{{number_format($product->prd_price * (100 - $product->prd_discount)/100).' VND'}}</p>
            </td>
            <td>
                <!-- <form method="POST" action="{{url('/client/favorite/'.$product->prd_id.'/delete')}}">
                    @csrf
                    @method('delete')
                    <button type="submit" class="btn btn-danger">Xóa</button>
                </form> -->
                <a class="btn btn-danger" onclick="deleteFav()" role="button">Xóa <i class="fa-solid fa-heart-circle-xmark" style="color: #ffffff;"></i></i></a>
                <div id="favPopup" class="popup-container">
                    <div class="popup-content">
                        <p><strong>Sản phẩm sẽ bị xóa khỏi Sản phẩm yêu thích. Tiếp tục?</strong></p>
                        <div class="popup-buttons">
                            <button class="popup-button" onClick="closePopup()" style="background-color:#F4CCCD;">Cancel</button>
                            <form method="POST" action="{{url('/client/favorite/'.$product->prd_id.'/delete')}}">
                                @csrf
                                @method('delete')
                                <button class="popup-button" style="color:white;background-color:red">Xóa</button>
                            </form>
                        </div>
                    </div>
                </div>
            </td>
        </tr>
        @empty
        <tr>
            <td colspan="3">Chưa có sản phẩm yêu thích</td>
        </tr>
        @endforelse
    </table>
</div>

@endsection

@section('js')
@parent
<script>
    function deleteFav() {
        var confirmationPopup = document.getElementById("favPopup");
        confirmationPopup.style.display = "block";
    }

    function closePopup() {
        var confirmationPopup = document.getElementById("favPopup");
        confirmationPopup.style.display = "none";
    }

    var cancel = document.getElementById('favPopup');
    window.onclick = function(event) {
        if (event.target == cancel) {
            cancel.style.display = "none";
        }
    }
</script>
@endsection