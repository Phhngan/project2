@extends('layout.clientInfo')

@section('title','Xem đơn hàng')

@section('style')

@endsection

@section('sidebar-client')
<a href="/client">Thông tin khách hàng</a>
<a href="/client/favorite">Sản phẩm yêu thích</a>
<a href="/client/edit">Sửa thông tin</a>
<a class="active" href="/client/invoices">Đơn hàng</a>
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

    <tr>
        <td>
            <p>SP1</p>
        </td>
        <td>
            <img src="https://github.com/Phhngan/snack_images/blob/master/do-man/doman_comchay.png?raw=true" width="100px">
        </td>
        <td>
            <p>Cơm cháy chà bông</p>
        </td>
        <td>
            <p>50,000 VND</p>
        </td>
        <td>
          <a class="btn btn-warning" href="/client/invoices/rattingSP" role="button">Đánh giá</a>
        </td>
    </tr>

    <tr>
        <td>
            <p>SP1</p>
        </td>
        <td>
            <img src="https://github.com/Phhngan/snack_images/blob/master/do-man/doman_comchay.png?raw=true" width="100px">
        </td>
        <td>
            <p>Cơm cháy chà bông</p>
        </td>
        <td>
            <p>50,000 VND</p>
        </td>
        <td>
            <a class="btn btn-warning" href="/client/invoices/rattingSP" role="button">Đánh giá</a>
        </td>
    </tr>
    <br>
</table>
@endsection

@section('js')
@parent

@endsection