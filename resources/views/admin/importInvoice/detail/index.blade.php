@extends('layout.admin_base')

@section('title','Chi tiết hóa đơn')

@section('content')
<br>
<h3>Hóa đơn số: {{$importInvoice->imp_id}}</h3>
<br><br>
<table class="table">
    <tr>
        <th>Mã sản phẩm</th>
        <th>Tên sản phẩm</th>
        <th>Hình ảnh</th>
        <th>Số lượng</th>
        <th>Giá tiền</th>
        <th>Hạn sử dụng</th>
    </tr>
    @forelse($importInvoiceDetails as $importInvoiceDetail)
    <tr>
        <td>
            <p>{{$importInvoiceDetail->prd_code}}</p>
        </td>
        <td>
            <a href="/admin/products/{{$importInvoiceDetail->prd_id}}" class="text-sp">{{$importInvoiceDetail->prd_name}}</a>
        </td>
        <td>
            <img src="/storage/{{substr($importInvoiceDetail->prd_image, 7)}}" style="height:100px">
        </td>
        <td>
            <p>{{$importInvoiceDetail->imp_quantity}}</p>
        </td>
        <td>
            <p>{{number_format($importInvoiceDetail->imp_price).' VND'}}</p>
        </td>
        <td>
            <p>{{$importInvoiceDetail->imp_expiryDate}}</p>
        </td>
        <!-- <td>
            <a class="btn btn-outline-primary" href="{{url('/admin/importInvoice/'.$importInvoice->imp_id.'/'.$importInvoiceDetail->id.'/edit')}}" role="button">Sửa</a> -->
        <!-- <form method="POST" action="{{url('/admin/importInvoice/'.$importInvoice->imp_id.'/'.$importInvoiceDetail->id.'/delete')}}">
            @csrf
            @method('delete')
            <button type="submit" class="btn btn-danger">Xóa</button>
        </form> -->
        <!-- </td> -->
    </tr>
    @empty
    <tr>
        <td colspan="6">Danh sach rong</td>
    </tr>
    @endforelse
</table>
@endsection