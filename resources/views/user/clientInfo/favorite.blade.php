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

@endsection

@section('sidebar-client')
<a href="/client">Thông tin khách hàng</a>
<a class="active" href="/client/favorite">Sản phẩm yêu thích</a>
<a href="/client/edit">Sửa thông tin</a>
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

        <tr>
            <td>
                <p>SP1</p>
            </td>
            <td>
                <img src="https://github.com/Phhngan/snack_images/blob/master/do-man/doman_comchay.png?raw=true" style="height:100px">
            </td>
            <td>
                <a href="" class="text-sp">Cơm cháy chà bông</a>
            </td>
            <td>
                <p>40.000 VND</p>
            </td>
            <td>
                <form method="POST" action="">
                    @csrf
                    @method('delete')
                    <button type="submit" class="btn btn-danger">Xóa</button>
                </form>
            </td>
        </tr>
    </table>
</div>

@endsection

@section('js')
@parent

@endsection