@extends('layout.admin_base')

@section('title','Trạng thái sản phẩm')

@section('content')
<table class="table">
    <tr>
        <th>Mã trạng thái</th>
        <th>Trạng thái sản phẩm</th>
    </tr>
    @forelse($ProductStatuss as $ProductStatus)
    <tr>
        <td>
            <p>{{$ProductStatus->prd_status_id}}</p>
        </td>
        <td>
        <a href="{{url('/admin/product-status/'.$ProductStatus->prd_status_id)}}">{{$ProductStatus->prd_status}}</a>
        </td>
    </tr>
    @empty
    <tr>
        <td colspan="3">Danh sach rong</td>
    </tr>
    @endforelse
</table>
@endsection