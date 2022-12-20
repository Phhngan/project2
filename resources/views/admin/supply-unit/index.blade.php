@extends('layout.admin_base')

@section('title','Đơn vị cung cấp')

@section('content')
    <a href="{{url('/admin/supply-unit/create')}}">+ Thêm đơn vị cung cấp</a>
    <table class="table">
        <tr>
            <th> ID <th>
            <th>Mã đơn vị</th>
            <th>Tên đơn vị</th>
            <th>Email</th>
            <th>Số điện thoại</th>
            <th>Hành động</th>
        </tr>
        @forelse($SupplyUnits as $SupplyUnit)
            <tr>
            <td>
                    <p>{{$SupplyUnit->unit_id}}</p>
                </td>
                <td>
                    <p>{{$SupplyUnit->unit_code}}</p>
                </td>
                <td>
                    <p>{{$SupplyUnit->unit_name}}</p>
                    
                </td>
                <td>
                    <p>{{$SupplyUnit->unit_email}}</p>
                </td>
                <td>
                    <p>{{$SupplyUnit->unit_phone}}</p>
                </td>
                
<td>
    <a class="btn btn-outline-secondary" href="{{url('/admin/supply-unit/'.$SupplyUnit->unit_id.'/edit')}}" role="button">Sửa</a>
</td>
</tr>
@empty
<tr>
    <td colspan="3">Danh sach rong</td>
</tr>
@endforelse
</table>
@endsection