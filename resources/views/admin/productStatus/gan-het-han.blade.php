@extends('layout.admin_base')

@section('title','Loại sản phẩm')

@section('content')
{{-- Do du lieu      --}}
<br><a class="btn btn-primary" href="{{url('admin/productStatus/update')}}" role="button" method="put">Cập nhật</a>
<br><br>
<table class="table" id="myTable">
    <thead>
    <tr>
        <th>Mã sản phẩm</th>
        <th>Sản phẩm</th>
        <th>Số lượng còn lại</th>
        <th>Hạn sử dụng</th>
    </tr>
    </thead>
    @forelse($products as $product)
    <tr>
        <td>
            <p>{{$product->prd_code}}</p>
        </td>
        <td>
            <a href="{{url('/admin/products/'.$product->prd_id)}}" style="text-decoration:none;color:black;">
                <p>{{$product->prd_name}}</p>
            </a>
        </td>
        <td>
            <p>
                <?php
                    $quantity = App\Models\Importinvoicedetail::
                        where('prd_id', $product->prd_id)
                        ->where('imp_expiryDate', $product->imp_expiryDate)
                        ->sum('ImportInvoiceDetails.imp_quantity_left');
                    echo $quantity;
                ?>
            </p>
        </td>
        <td>
            <p>{{$product->imp_expiryDate}}</p>
        </td>
        <!-- <td>
            <a class="btn btn-outline-secondary" href="{{url('/admin/products/'.$product->prd_id.'/edit')}}" role="button">Sửa</a>
            <a class="btn btn-outline-secondary" href="{{url('/admin/products/'.$product->prd_id)}}" role="button">Xem chi tiết</a>
        </td> -->
    </tr>
    @empty
    <tr>
        <td>Danh sách rỗng</td><td></td><td></td><td></td>
    </tr>
    @endforelse
</table>

@endsection