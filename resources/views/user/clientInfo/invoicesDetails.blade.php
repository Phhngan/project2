@extends('layout.clientInfo')

@section('title','Xem đơn hàng')

@section('style')

@endsection

@section('sidebar-client')
<a href="/client">Thông tin khách hàng</a>
<a href="/client/edit">Sửa thông tin</a>
<a href="/client/favorite">Sản phẩm yêu thích</a>
<a class="active" href="/client/invoices">Đơn hàng</a>
<a href="/client/changePass">Đổi mật khẩu</a>
@endsection

@section('content-info')
<br>
<div class="cf-title">
    <h3>Chi tiết đơn hàng</h3>
</div>
<br>
@if($invoiceDetails == null)
<h2>Đơn không tồn tại</h2>
@else
<table class="table">
    <tr style="background-color:#CED7FD">
        <th>Mã sản phẩm</th>
        <th>Ảnh sản phẩm</th>
        <th>Tên sản phẩm</th>
        <th>Số lượng</th>
        <th>Trọng lượng</th>
        <th>Giá bán</th>
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
            <a href="/{{$invoiceDetail->prd_id}}/productDetails" class="text-sp">{{$invoiceDetail->prd_name}}</a>
        </td>
        <td>
            <p>{{$invoiceDetail->sal_quantity}}</p>
        </td>
        <td>
            <p>{{$invoiceDetail->prd_weigh}}g</p>
        </td>
        <td>
            <p>{{number_format($invoiceDetail->sal_price).' VND'}}</p>
        </td>
    </tr>
    <br>

    @empty
    <tr>
        <td colspan="3">Danh sach rong</td>
    </tr>
    @endforelse
</table>
@endif

@endsection

@section('js')
@parent

@endsection