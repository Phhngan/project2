@extends('layout.admin_base')

@section('title','Đơn vị cung cấp')

@section('content')
<a class="btn btn-primary" href="{{url('/admin/supplyUnit/create')}}" role="button">+ Thêm đơn vị cung cấp</a>
<table class="table">
    <tr>
        <th> ID
        <th>Mã đơn vị</th>
        <th>Tên đơn vị</th>
        <th>Email</th>
        <th>Số điện thoại</th>
        <th>Hành động</th>
    </tr>
    @forelse($supplyUnits as $supplyUnit)
    <tr>
        <td>
            <p>{{$supplyUnit->unit_id}}</p>
        </td>
        <td>
            <p>{{$supplyUnit->unit_code}}</p>
        </td>
        <td>
            <p>{{$supplyUnit->unit_name}}</p>

        </td>
        <td>
            <p>{{$supplyUnit->unit_email}}</p>
        </td>
        <td>
            <p>{{$supplyUnit->unit_phone}}</p>
        </td>

        <td>
            <a class="btn btn-outline-secondary" href="{{url('/admin/supplyUnit/'.$supplyUnit->unit_id.'/edit')}}" role="button">Sửa</a>
            <br>
            <!-- <form method="POST" action="{{url('admin/supplyUnit/'.$supplyUnit->unit_id.'/delete')}}">
                @csrf
                @method('delete')
                <button type="submit" class="btn btn-danger">Xóa</button>
            </form> -->
        </td>
    </tr>
    @empty
    <tr>
        <td colspan="3">Danh sach rong</td>
    </tr>
    @endforelse
</table>
@endsection