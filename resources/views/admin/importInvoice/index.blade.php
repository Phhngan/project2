@extends('layout.admin_base')

@section('title','Hóa đơn nhập hàng')

@section('content')
    <a class="btn btn-primary" href="{{url('/admin/importInvoice/create')}}" role="button">+ Thêm hóa đơn nhập</a>
    <table class="table">
        <tr>
            <th>Mã hóa đơn nhập</th>
            <th>Đơn vị cung cấp</th>
            <th>Tổng tiền nhập</th>
            <th>Ngày nhập</th>
            <th>Nhân viên nhập hàng</th>
            <th>Hành động</th>
        </tr>
        @forelse($importInvoices as $importInvoice)
            <tr>
                <td>
                    <p>{{$importInvoice->imp_id}}</p>
                </td>
                <td>
                    <p>{{$importInvoice->unit_id}}</p>
                    
                </td>
                <td>
                    <p>{{$importInvoice->imp_total}}VND</p>
                </td>
                <td>
                    <p>{{$importInvoice->imp_date}}</p>
                </td>
                <td>
                    <p>{{$importInvoice->use_id}}</p>
                </td>
                <td>
                    <a class="btn btn-outline-primary" href="{{url('/admin/importInvoice/{imp_id}/edit')}}" role="button">Sửa</a>
                    <a class="btn btn-outline-primary" href="{{url('/admin/importInvoice/{imp_id}')}}" role="button">Xem chi tiết</a>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="3">Danh sach rong</td>
            </tr>
        @endforelse
    </table>
@endsection