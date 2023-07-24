@extends('layout.admin_base')

@section('title','Chi tiết sản phẩm')

@section('content')

@if($product == null)
<h2>Sản phẩm không tồn tại</h2>

@else
<h2 class="text-center">{{ $product->prd_name  }}</h2><br>
<table class="table">

    <tr>
        <th width="200px">Hình ảnh sản phẩm:</th>
        <td>
            <img src="/storage/{{substr($product->prd_image, 7)}}" width="300px" style="display:flex;margin-left:auto;margin-right:auto;">
        </td>
    </tr>
    <tr>
        <th>Giá sản phẩm: </th>
        <td>
            <p>{{number_format($product->prd_price).' VND'}}</p>
        </td>
    </tr>
    <tr>
        <th>Giảm giá (%): </th>
        <td>
            <p>{{$product->prd_discount}}</p>
        </td>
    </tr>
    <tr>
        <th>Nguồn gốc: </th>
        <td>
            <p>{{$product->prd_source}}</p>
        </td>
    </tr>
    <tr>
        <th>Khối lượng (gam): </th>
        <td>
            <p>{{$product->prd_weigh}}g</p>
        </td>
    </tr>
    <tr>
        <th>Mô tả: </th>
        <td>
            <p>{!!$product->prd_description!!}</p>
        </td>
    </tr>
    <tr>
        <td colspan=" 2" style="text-align:center;">
            <a class="btn btn-primary" href="{{url('/admin/products/'.$product->prd_id.'/edit')}}" role="button">Sửa</a>
        </td>
    </tr>

</table>

@endif

@endsection