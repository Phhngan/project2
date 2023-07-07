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
    @forelse($ships as $ship)
    <tr>
        <td>
            <p>
                <?php
                $region = '';
                if ($ship->ship_id == 1) $region = 'Hà Nội';
                if ($ship->ship_id == 2) $region = 'Miền Bắc';
                if ($ship->ship_id == 3) $region = 'Miền Trung';
                if ($ship->ship_id == 4) $region = 'Miền Nam';
                echo $region;
                ?>
            </p>
        </td>
        <td>
            <p>{{number_format($ship->ship_price).' VND'}}</p>

        </td>
        <td>
            <p>{{number_format($ship->ship_extra).' VND'}}</p>
        </td>
        <td>
            <p>{{$ship->ship_time}} ngày</p>
        </td>
        <td>
            <a class="btn btn-primary" href="{{url('/admin/ship/'.$ship->ship_id.'/edit')}}" role="button">Sửa</a>
        </td>
    </tr>
    @empty
    <tr>
        <td colspan="3">Danh sach rong</td>
    </tr>
    @endforelse
</table>
@endsection