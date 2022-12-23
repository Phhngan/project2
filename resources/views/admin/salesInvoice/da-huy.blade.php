@extends('layout.admin_base')

@section('title','Đơn đã hủy')

@section('content')
    <br>
    <table class="table">
        <tr>
            <th>Mã hóa đơn</th>
            <th>Khách hàng</th>
            <th>Ngày đặt</th>
            <th>Tổng tiền</th>
            <th>Địa chỉ</th>
            <th>Ghi chú</th>
            <th>Hành động</th>
        </tr>
        @forelse($salesInvoices as $salesInvoice)
            <tr>
                <td>
                    <p>{{$salesInvoice->sal_id}}</p>
                </td>
                <td>
                    <p>{{$salesInvoice->use_id}}</p>
                </td>
                <td>
                    <p>{{$salesInvoice->sal_date}}</p>
                    
                </td>
                <td>
                    <p>{{$salesInvoice->sal_total}}VND</p>
                </td>
                <td>
                    <p>{{$salesInvoice->sal_detailAddress}}</p>
                </td>
                <td>
                    <p>{{$salesInvoice->sal_note}}</p>
                </td>             
                <td>
                    <a class="btn btn-outline-secondary" href="{{url('/admin/salesInvoice/'.$salesInvoice->sal_id.'/details')}}" role="button">Xem chi tiết</a> 
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="3">Danh sach rong</td>
            </tr>
        @endforelse
    </table>
@endsection