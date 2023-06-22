@extends('layout.admin_base')

@section('title','Danh mục sản phẩm')

@section('content')
{{-- Do du lieu      --}}
<br>
<a class="btn btn-primary" href="{{url('admin/products/create')}}" role="button">+ Thêm sản phẩm</a>
<br><br>
<table class="table" id="myTable">
    <thead>
        <tr>
            <th>Mã sản phẩm</th>
            <th>Sản phẩm</th>
            <th>Loại sản phẩm</th>
            <th>Số lượng</th>
            <th>Giá bán</th>
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
                $type = '';
                if ($product->prd_type_id == 1) $type = 'Đồ mặn';
                if ($product->prd_type_id == 2) $type = 'Đồ ngọt';
                if ($product->prd_type_id == 3) $type = 'Đồ uống';
                echo $type
                ?>
            </p>
        </td>
        <td>
            <p>
                <?php
                $quantity = App\Models\Importinvoicedetail::where('prd_id', $product->prd_id)
                    ->where('prd_status_id', '<', 3)
                    ->sum('ImportInvoiceDetails.imp_quantity_left');
                echo $quantity;
                ?>
            </p>
        </td>
        <td>
            <p>{{number_format($product->prd_price).' VND'}}</p>
        </td>
        <td>
            <a class="btn btn-primary" href="{{url('/admin/products/'.$product->prd_id.'/edit')}}" role="button">Sửa</a>
            <a class="btn btn-outline-secondary" href="{{url('/admin/products/'.$product->prd_id)}}" role="button">Xem chi tiết</a>
            <br>
            <!-- <form method="POST" action="{{url('admin/products/'.$product->prd_id.'/delete')}}">
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