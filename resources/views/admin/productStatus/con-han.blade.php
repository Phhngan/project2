@extends('layout.admin_base')

@section('title','Sản phẩm còn hạn')

@section('content')
<br><a class="btn btn-primary" href="{{url('admin/productStatus/update')}}" role="button" method="put">Cập nhật</a>
<br><br>
<table class="table" id="myTable">
    <thead>
        <tr>
            <th data-orderable="false">Mã sản phẩm</th>
            <th data-orderable="false">Sản phẩm</th>
            <th data-orderable="false">Ảnh</th>
            <th>Số lượng còn lại</th>
            <th data-orderable="false">Hạn sử dụng</th>
    </thead>
    </tr>
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
    </tr>
    @empty
    <tr>
        <td>Danh sách rỗng</td><td></td><td></td><td></td><td></td>
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
                targets: 0,
                render: function(data, type, row, meta) {
                    if (type === 'sort') {
                        return parseInt(data.replace('SP', ''));
                    }
                    return data;
                }
            }],
            ordering: true,
            searching: true,
            paging: true,
            language: {
        url: '//cdn.datatables.net/plug-ins/1.13.4/i18n/vi.json'
        }
        });
    });
</script>
@endsection