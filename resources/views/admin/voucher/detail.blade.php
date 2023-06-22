@extends('layout.admin_base')

@section('title','Chi tiết Voucher')

@section('content')
<h2 class="text-center">Sale Quốc tế thiếu nhi voucher</h2><br>
<table class="table">
    <tr>
        <th>Ngày sử dụng: </th>
        <td>
            <p>06/06/2023</p>
        </td>
    </tr>
    <tr>
        <th>Giảm giá: </th>
        <td>
            <p>10.000 VND</p>
        </td>
    </tr>
    <tr>
        <th>Số tiền tối thiểu để áp dụng: </th>
        <td>
            <p>10,000 VND </p>
        </td>
    </tr>
    <tr>
        <th>Mô tả: </th>
        <td>
            <p>Voucher này sử dụng tri ân các khách hàng. Các bé con nít</p>
        </td>
    </tr>
    <tr>
        <th>Hành động: </th>
        <td>
            <a class="btn btn-primary" href="{{url('admin/voucher/edit')}}" role="button">Sửa</a>
        </td>
    </tr>

</table>
@endsection