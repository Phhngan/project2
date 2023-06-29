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
            <img src="/storage/{{substr($voucher->vou_image, 7)}}" width="100px">
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
            <?php
            $today = date_create();
            $vouDay = date_create($voucher->vou_day);
            $compare = intval(date_diff($vouDay, $today)->format("%R%a"));
            if ($compare < 0) {
            ?>
                <a class="btn btn-primary" href="{{url('/admin/voucher/'.$voucher->vou_id.'/edit')}}" role="button">Sửa</a>
                <br>
            <?php  } ?>
        </td>
    </tr>
    @empty
    <tr>
        <td colspan="7">Danh sach rong</td>
    </tr>
    @endforelse
</table>
@endsection