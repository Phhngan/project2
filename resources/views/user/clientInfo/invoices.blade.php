@extends('layout.clientInfo')

@section('title','Đơn hàng')

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
  <h3>Quản lí đơn hàng</h3>
</div>
<br>
<table class="table">
    <tr style="background-color:#CED7FD">
        <th>Mã hóa đơn</th>
        <th>Ngày đặt</th>
        <th>Tổng tiền</th>
        <th>Địa chỉ</th>
        <th>Ghi chú</th>
        <th>Trạng thái</th>
        <th>Hành động</th>
    </tr>
    @forelse($invoices as $invoice)
    <tr>
        <td>
            <p>{{$invoice->sal_id}}</p>
        </td>
        <td>
            <p>{{$invoice->sal_date}}</p>

        </td>
        <td>
            <p>{{$invoice->sal_total}} VND</p>
        </td>
        <td>
            <p>{{$invoice->sal_detailAddress}}-{{$invoice->sal_town}}-{{$invoice->sal_district}}-{{$invoice->pro_name}}</p>
        </td>
        <td>
            <p>{{$invoice->sal_note}}</p>
        </td>
        <td>
            <p>{{$invoice->sal_status}}</p>
        </td>
        <td>
            @if($invoice->sal_status_id == 1)
                <a class="btn btn-primary" href="{{url('/client/invoices/'.$invoice->sal_id.'/details')}}" role="button">Xem chi tiết</a>
                <a class="btn btn-danger" href="{{url('/client/invoices/'.$invoice->sal_id.'/cancel')}}" role="button">Hủy đơn</a>
            @else
                <a class="btn btn-primary" href="{{url('/client/invoices/'.$invoice->sal_id.'/details')}}" role="button">Xem chi tiết</a>
            @endif
        </td>
    </tr>
    @empty
    <tr>
        <td colspan="3">Chưa có đơn hàng nào</td>
    </tr>
    @endforelse
</table>

@endsection

@section('js')
@parent

@endsection