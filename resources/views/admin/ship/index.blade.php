@extends('layout.admin_base')

@section('title','Shipping')

@section('content')
<br>
    <table class="table">
        <tr>
            <th>Miền</th>
            <th>Tiền ship</th>
            <th>Phí ship extra</th>
            <th>Thời gian ship</th>
            <th>Hành động</th>
        </tr>
        @forelse($regions as $region)
            <tr>
                <td>
                    <p>{{$region->reg_ship}}</p>
                </td>
                <td>
                    <p>{{$region->}}VND</p>
                    
                </td>
                <td>
                    <p>{{$region->$reg_ship_extra }}VND</p>
                </td>
                <td>
                    <p>{{$region->reg_ship_time}}</p>
                </td>
                <td>
                    <a class="btn btn-outline-primary" href="{{url('/admin/ship/edit')}}" role="button">Sửa</a>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="3">Danh sach rong</td>
            </tr>
        @endforelse
    </table>
@endsection