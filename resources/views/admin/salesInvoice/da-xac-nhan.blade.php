@extends('layout.admin_base')

@section('title','Đơn đã xác nhận')

@section('content')
<br>
<table class="table">
    <tr>
        <th>Mã hóa đơn</th>
        <th>Khách hàng</th>
        <th>Ngày đặt</th>
        <th>Tổng tiền</th>
        <th width="350px">Địa chỉ</th>
        <th>Ghi chú</th>
        <th>Hành động</th>
    </tr>
    @forelse($salesInvoices as $salesInvoice)
    <tr>
        <td>
            <p>{{$salesInvoice->sal_id}}</p>
        </td>
        <td>
            <p>{{$salesInvoice->use_lastName}} {{$salesInvoice->name}}</p>
        </td>
        <td>
            <p>{{$salesInvoice->sal_date}}</p>

        </td>
        <td>
            <p>{{number_format($salesInvoice->sal_total).' VND'}}</p>
        </td>
        <td>
            <p>{{$salesInvoice->sal_detailAddress}} - {{$salesInvoice->sal_town}} - {{$salesInvoice->sal_district}} - {{$salesInvoice->sal_province}}</p>
        </td>
        <td>
            <p>{{$salesInvoice->sal_note}}</p>
        </td>
        <td>
            <a class="btn btn-primary" href="{{url('/admin/salesInvoice/'.$salesInvoice->sal_id)}}" role="button">Xem chi tiết</a>
            <a class="btn btn-success" href="{{url('/admin/salesInvoice/'.$salesInvoice->sal_id.'/giaohang')}}" role="button">Giao hàng</a>
        </td>
    </tr>
    @empty
    <tr>
        <td colspan="7">Danh sach rong</td>
    </tr>
    @endforelse
</table>
@endsection