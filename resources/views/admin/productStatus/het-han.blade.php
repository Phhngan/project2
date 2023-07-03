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
        <th>Hành động</th>
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
        <td>
            <a class="btn btn-warning" href="{{url('/admin/productStatus/'.$product->prd_id.'/chuyen')}}" role="button">Không còn sản xuất</a>
        </td>
    </tr>
    @empty
    <tr>
        <td colspan="5">Danh sách rỗng</td>
    </tr>
    @endforelse
</table>

@endsection