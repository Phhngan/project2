@extends('layout.admin_base')

@section('title','Loại sản phẩm')

@section('content')
{{-- Do du lieu --}}
<br>
<table class="table">
    <tr>
        <th>Mã sản phẩm</th>
        <th>Sản phẩm</th>
        <th>Số lượng còn lại</th>
    </tr>
    @forelse($products as $product)
    <tr>
        <td>
            <p>{{$product->prd_code}}</p>
        </td>
        <td>
            <p>{{$product->prd_name}}</p>

        </td>
        <td>
            <p>
                <?php
                    $quantity = App\Models\Importinvoicedetail::
                        where('prd_id', $product->prd_id)
                        ->sum('ImportInvoiceDetails.imp_quantity_left');
                    echo $quantity;
                ?>
            </p>
    </tr>
    @empty
    <tr>
        <td colspan="3">Danh sách rỗng</td>
    </tr>
    @endforelse
</table>

@endsection