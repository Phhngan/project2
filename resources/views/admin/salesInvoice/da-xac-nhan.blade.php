@extends('layout.admin_base')

@section('title','Đơn đã xác nhận')

@section('content')
<br>
<table class="table" id="myTable">
    <thead>
        <tr>
            <th>Mã hóa đơn</th>
            <th data-orderable="false">Khách hàng</th>
            <th data-orderable="false">Ngày đặt</th>
            <th data-orderable="false">Tổng tiền</th>
            <th width="320px" data-orderable="false">Địa chỉ</th>
            <th data-orderable="false">Ghi chú</th>
            <th data-orderable="false">Hành động</th>
        </tr>
    </thead>
    @forelse($salesInvoices as $salesInvoice)
    <tbody>
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
                <a class="btn btn-outline-primary" href="{{url('/admin/salesInvoice/'.$salesInvoice->sal_id)}}" role="button">Xem chi tiết</a>
                <a class="btn btn-success" href="{{url('/admin/salesInvoice/'.$salesInvoice->sal_id.'/giaohang')}}" role="button">Giao hàng</a>
            </td>
        </tr>
    </tbody>
    @empty
    <tbody>
        <tr>
            <td>Danh sách rỗng</td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
    </tbody>
    @endforelse
</table>
@endsection