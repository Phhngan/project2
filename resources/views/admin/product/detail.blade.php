@extends('layout.admin_base')

@section('title','Chi tiết sản phẩm')

@section('content')

@if($product == null)
<h2>Sản phẩm không tồn tại</h2>

@else
<h2 class="text-center">{{ $product->prd_name  }}</h2>
<table class="table">

    <!-- <tr>
                    <th>Hình ảnh sản phẩm:</th>
                <td>
                    <img src="{{ $product->image  }}" width="300px">
               </td>
             </tr> -->
    <tr>
        <th>Giá sản phẩm: </th>
        <td>
            <p>{{ $product->prd_price }}</p>
        </td>
    </tr>
    <tr>
        <th>Giảm giá: </th>
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
        <th>Khối lượng: </th>
        <td>
            <p>{{$product->prd_weigh}}g</p>
        </td>
    </tr>
    <tr>
        <th>Mô tả: </th>
        <td>
            <p>{{$product->prd_description}}</p>
        </td>
    </tr>
    </td>
    </tr>

</table>

@endif

@endsection