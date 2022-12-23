@extends('layout.admin_base')

@section('title','Chi tiết hóa đơn')

@section('content')
    <a class="btn btn-primary" href="{{url('/admin/importInvoice/{imp_id}/create')}}" role="button">+ Thêm sản phẩm</a>
    <h3>Hóa đơn số: {{$importInvoiceDetail->imp_id}}</h3>
    <table class="table">
        <tr>
            <th>Mã sản phẩm</th>
            <th>Số lượng</th>
            <th>Giá tiền</th>
            <th>Hạn sử dụng</th>
            <th>Hành động</th>
        </tr>
        @forelse($importInvoiceDetails as $importInvoiceDetail)
            <tr>
                <td>
                    <p>{{$importInvoiceDetail->prd_id}}</p>
                </td>
                <td>
                    <p>{{$importInvoiceDetail->imp_quantity}}</p>
                    
                </td>
                <td>
                    <p>{{$importInvoiceDetail->imp_price}}VND</p>
                </td>
                <td>
                    <p>{{$importInvoiceDetail->imp_expiryDate}}</p>
                </td>
                <td>
                    <a class="btn btn-outline-primary" href="{{url('/admin/importInvoice/{imp_id}/{id}/edit')}}" role="button">Sửa</a>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="3">Danh sach rong</td>
            </tr>
        @endforelse
    </table>
@endsection