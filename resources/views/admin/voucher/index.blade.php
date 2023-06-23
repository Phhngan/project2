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
            <th>Ảnh</th>
            <th>Ngày áp dụng</th>
            <th>Giảm giá</th>
            <th>Tổng tiền áp dụng</th>
            <th>Hành động</th>
        </tr>
    </thead>
    @forelse($vouchers as $voucher)
    <tr>
        <td>
            <p>{{$voucher->vou_id}}</p>
        </td>
        <td>
            <p>{{$voucher->vou_title}}</p>
        </td>
        <td>
            <img src="{{$voucher->vou_image}}" width="100px">
        </td>
        <td>
            <p>{{$voucher->vou_day}}</p>
        </td>
        <td>
            <p>{{number_format($voucher->vou_discount).' VND'}}</p>
        </td>
        <td>
            <p>{{number_format($voucher->vou_min).' VND'}}</p>
        </td>
        <td>
            <a class="btn btn-primary" href="{{url('/admin/voucher/'.$voucher->vou_id.'/edit')}}" role="button">Sửa</a>
            <!-- <a class="btn btn-outline-secondary" href="{{url('admin/voucher/detail')}}" role="button">Xem chi tiết</a> -->
            <br>
        </td>
    </tr>
    @empty
    <tr>
        <td colspan="3">Danh sach rong</td>
    </tr>
    @endforelse
</table>
@endsection