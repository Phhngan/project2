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
    <table class="table">
        <tr>
            <th>Mã hóa đơn</th>
            <th>Ngày đặt</th>
            <th>Tổng tiền</th>
            <th>Địa chỉ</th>
            <th>Ghi chú</th>
            <th>Trạng thái</th>
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
                    <p>{{$invoice->sal_detailAddress}} </p>
                </td>
                <td>
                    <p>{{$invoice->sal_note}}</p>
                </td>             
                <td>
                <p>{{$invoice->sal_status}}</p>
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