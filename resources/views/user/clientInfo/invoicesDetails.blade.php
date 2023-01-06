@extends('layout.clientInfo')

@section('title','Xem đơn hàng')

@section('style')

@endsection

@section('sidebar-client')
<a href="/client">Thông tin khách hàng</a>
<a href="/client/edit">Sửa thông tin</a>
<a class="active" href="/client/invoices">Đơn hàng</a>
<a href="/client/changePass">Đổi mật khẩu</a>
@endsection

@section('content-info')
<br>
<div class="cf-title">
  <h3>Đơn hàng</h3>
</div>
<br>
@if($salesInvoiceDetails == null)
<h2>Đơn không tồn tại</h2>
@else
<h3>Chi tiết hóa đơn:</h3>
<table class="table">
    <tr>
        <th>Mã sản phẩm</th>
        <th>Tên sản phẩm</th>
        <th>Số lượng</th>
        <th>Trọng lượng tổng</th>
        <th>Giá bán</th>
        <th>Trạng thái</th>
    </tr>
    @forelse($invoiceDetails as $invoiceDetail)
    <tr>
        <td>
            <p>{{$invoiceDetail->prd_code}}</p>
        </td>
        <td>
            <p>{{$invoiceDetail->prd_name}}</p>
        </td>
        <td>
            <p>{{$invoiceDetail->sal_quantity}}</p>

        </td>
        <td>
            <p>{{$invoiceDetail->prd_weigh * $invoiceDetail->sal_quantity}}g</p>
        </td>
        <td>
            <p>{{$invoiceDetail->sal_price}} VND</p>
        </td>
        <td>
            <p>{{$invoiceDetail->sal_status}} VND</p>
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