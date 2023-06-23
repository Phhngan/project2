@extends('layout.admin_base')

@section('title','Chi tiết hóa đơn')

@section('content')
<br>
<h3>Hóa đơn số: {{$importInvoice->imp_id}}</h3>
<br>
<a class="btn btn-primary" href="{{url('/admin/importInvoice/'.$importInvoice->imp_id.'/create')}}" role="button">+ Thêm sản phẩm</a>
<br><br>
<table class="table">
    <tr>
        <th>Mã sản phẩm</th>
        <th>Tên sản phẩm</th>
        <th>Số lượng</th>
        <th>Giá tiền</th>
        <th>Hạn sử dụng</th>
        <th>Hành động</th>
    </tr>
    @forelse($importInvoiceDetails as $importInvoiceDetail)
    <tr>
        <td>
            <p>{{$importInvoiceDetail->prd_code}}</p>
        </td>
        <td>
            <p>{{$importInvoiceDetail->prd_name}}</p>
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
        <td>
            <!-- <a class="btn btn-outline-primary" href="{{url('/admin/importInvoice/'.$importInvoice->imp_id.'/'.$importInvoiceDetail->id.'/edit')}}" role="button">Sửa</a> -->
            <form method="POST" action="{{url('/admin/importInvoice/'.$importInvoice->imp_id.'/'.$importInvoiceDetail->id.'/delete')}}">
                @csrf
                @method('delete')
                <button type="submit" class="btn btn-danger">Xóa</button>
            </form>
        </td>
    </tr>
    @empty
    <tr>
        <td colspan="6">Danh sach rong</td>
    </tr>
    @endforelse
</table>
@endsection