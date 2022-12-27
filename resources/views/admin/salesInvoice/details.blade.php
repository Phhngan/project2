@extends('layout.admin_base')

@section('title','Chi tiết đơn hàng')

@section('content')

@if($salesInvoiceDetails == null)
<h2>Đơn không tồn tại</h2>
@else
<h3>Hóa đơn số: {{$salesInvoiceDetails->sal_id}}</h3>
<br>
<table class="table">
    <tr>
        <th>Mã sản phẩm</th>
        <th>Số lượng</th>
        <th>Giá bán</th>
    </tr>
    @forelse($salesInvoiceDetails as $salesInvoiceDetail)
    <tr>
        <td>
            <p>{{$salesInvoiceDetail->prd_id}}</p>
        </td>
        <td>
            <p>{{$salesInvoiceDetail->sal_quantity}}</p>

        </td>
        <td>
            <p>{{$salesInvoiceDetail->sal_price}} VND</p>
        </td>
    </tr>
    <br>
    <!-- <form method="POST" action="{{url('/admin/salesInvoice/{sal_id}/continue')}}">
                        @csrf
                        @method('chua biet')
                        <button type="submit" class="btn btn-outline-primary">Chuyển trạng thái</button>
                    </form> -->
    @empty
    <tr>
        <td colspan="3">Danh sach rong</td>
    </tr>
    @endforelse
</table>
@endsection