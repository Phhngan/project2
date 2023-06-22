@extends('layout.admin_base')

@section('title','Danh sách mã giảm giá')

@section('content')
<br>
<a class="btn btn-primary" href="{{url('admin/voucher/create')}}" role="button">+ Thêm mã giảm giá</a>
<br><br>
<table class="table" id="myTable">
    <thead>
    <tr>
        <th>ID</th>
        <th>Tên mã giảm giá</th>
        <th>Ngày sử dụng</th>
        <th>Trị giá</th>
        <th>Số tiền tối thiểu để áp dụng</th>
        <th>Hành động</th>
    </tr>
    </thead>
    <tr>
        <td>
            <p>1</p>
        </td>
        <td>
            <p>Quốc tế thiếu nhi Sale</p>
        </td>
        <td>
            <p>02/06/2023</p>
        </td>
        <td>
            <p>10,000 VND</p>
        </td>
        <td>
            <p>100,000 VND</p>
        </td>
        <td>
            <a class="btn btn-primary" href="{{url('admin/voucher/edit')}}" role="button">Sửa</a>
            <a class="btn btn-outline-secondary" href="{{url('admin/voucher/detail')}}" role="button">Xem chi tiết</a>
            <br>
        </td>
    </tr>

</table>
@endsection