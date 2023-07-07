@extends('layout.admin_base')

@section('title','Đơn vị cung cấp')

@section('content')
<br>
<a class="btn btn-primary" href="{{url('/admin/supplyUnit/create')}}" role="button">+ Thêm đơn vị cung cấp</a>
<br><br>
<table class="table" id="myTable">
    <thead>
        <tr>
            <th> ID
            <th>Mã đơn vị</th>
            <th data-orderable="false">Tên đơn vị</th>
            <th data-orderable="false">Email</th>
            <th data-orderable="false">Số điện thoại</th>
            <th data-orderable="false">Hành động</th>
        </tr>
    </thead>
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
            <a class="btn btn-primary" href="{{url('/admin/supplyUnit/'.$supplyUnit->unit_id.'/edit')}}" role="button">Sửa</a>
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
        <td colspan="6">Danh sách rỗng</td>
    </tr>
    @endforelse
</table>
@endsection