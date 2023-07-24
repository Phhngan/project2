@extends('layout.admin_base')

@section('title','Chi tiết đơn hàng')

@section('content')

@if($salesInvoiceDetails == null)
<h2>Đơn không tồn tại</h2>
@else
<h3>Chi tiết hóa đơn:</h3>
<table class="table">
    <tr>
        <th>Mã sản phẩm</th>
        <th>Tên sản phẩm</th>
        <th>Ảnh</th>
        <th>Số lượng</th>
        <th>Trọng lượng tổng</th>
        <th>Giá bán</th>
    </tr>
    @forelse($salesInvoiceDetails as $salesInvoiceDetail)
    <tr>
        <td>
            <p>{{$salesInvoiceDetail->prd_code}}</p>
        </td>
        <td>
            <a href="{{url('/admin/products/'.$salesInvoiceDetail->prd_id)}}" class="text-sp">
                <p>{{$salesInvoiceDetail->prd_name}}</p>
            </a>
        </td>
        <td>
            <img src="/storage/{{substr($salesInvoiceDetail->prd_image, 7)}}" width="100px">
        </td>
        <td>
            <p>{{$salesInvoiceDetail->sal_quantity}}</p>

        </td>
        <td>
            <p>{{$salesInvoiceDetail->prd_weigh * $salesInvoiceDetail->sal_quantity}}g</p>
        </td>
        <td>
            <p>{{number_format($salesInvoiceDetail->sal_price).' VND'}}</p>
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
@endif
@endsection