@extends('layout.admin_base')

@section('title','Sản phẩm đã bán hết')

@section('content')
<br>
<table class="table" id="myTable">
    <thead>
        <tr>
            <th data-orderable="false">Mã sản phẩm</th>
            <th data-orderable="false">Sản phẩm</th>
            <th data-orderable="false">Ảnh</th>
            <th>Số lượng còn lại</th>
            <th data-orderable="false">Hạn sử dụng</th>
            <th data-orderable="false">Hành động</th>
        </tr>
    </thead>
    @forelse($products as $product)
    <tr>
        <td>
            <p>{{$product->prd_code}}</p>
        </td>
        <td>
            <a href="{{url('/admin/products/'.$product->prd_id)}}" class="text-sp">
                <p>{{$product->prd_name}}</p>
            </a>
        </td>
        <td>
            <img src="/storage/{{substr($product->prd_image, 7)}}" width="100px">
        </td>
        <td>
            <p>
                <?php
                $quantity = App\Models\Importinvoicedetail::where('prd_id', $product->prd_id)
                    ->where('imp_expiryDate', $product->imp_expiryDate)
                    ->sum('ImportInvoiceDetails.imp_quantity_left');
                echo $quantity;
                ?>
            </p>
        </td>
        <td>
            <p>{{$product->imp_expiryDate}}</p>
        </td>
        <?php
        $productRemains = Illuminate\Support\Facades\DB::table('ImportInvoiceDetails')
            ->distinct()
            ->select('ImportInvoiceDetails.prd_id')
            ->where('prd_id', $product->prd_id)
            ->where('prd_status_id', '<', 3)
            ->get();
        if (count($productRemains) == 0) {
        ?>
            <td>
                <a class="btn btn-warning" href="{{url('/admin/productStatus/'.$product->prd_id.'/chuyen')}}" role="button">Không còn sản xuất</a>
            </td>
        <?php } else { ?>
            <td></td>
        <?php } ?>
    </tr>
    @empty
    <tr>
        <td>Danh sách rỗng</td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
    </tr>
    @endforelse
</table>

@endsection