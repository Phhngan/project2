@extends('layout.admin_base')

@section('title','Danh mục sản phẩm')

@section('content')
<br>
<a class="btn btn-primary" href="{{url('admin/products/create')}}" role="button">+ Thêm sản phẩm</a>
<br><br>
<table class="table" id="myTable">
    <thead>
        <tr>
            <th>STT</th>
            <th data-orderable="false">Mã sản phẩm</th>
            <th>Sản phẩm</th>
            <th data-orderable="false">Ảnh sản phẩm</th>
            <th>Loại sản phẩm</th>
            <th>Số lượng</th>
            <th data-orderable="false">Giá bán</th>
            <th data-orderable="false">Hành động</th>
        </tr>
    </thead>
    @forelse($products as $product)
    <tr>
        <td>
            <p>{{$product->prd_id}}</p>
        </td>
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
            <a class="btn btn-outline-primary" href="{{url('/admin/products/'.$product->prd_id)}}" role="button">Xem chi tiết</a>
            <br>
        </td>
    </tr>
    @empty
    <tr>
        <td colspan="7">Chưa có sản phẩm nào</td>
    </tr>
    @endforelse
</table>
@endsection
@section('js')
<script type="text/javascript" src="https://cdn.datatables.net/v/bs5/jq-3.6.0/dt-1.13.1/datatables.min.js"></script>
<script>
    $(document).ready(function() {
        $('#myTable').DataTable({
            columnDefs: [{
                targets: 1,
                render: function(data, type, row, meta) {
                    if (type === 'sort') {
                        return parseInt(data.replace('SP', ''));
                    }
                    return data;
                }
            }],
            searching: true,
            paging: true,
            language: {
                url: '//cdn.datatables.net/plug-ins/1.13.4/i18n/vi.json'
            }
        });
    });
</script>
@endsection