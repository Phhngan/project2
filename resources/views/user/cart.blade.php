@extends('layout.base_page')

@section('title','Giỏ hàng')

@section('style')

@endsection

@section('content')
<div class="cf-title">
<h3>Giỏ hàng</h3>
</div>
<div class="item-products">
<table class="table">
    <tr>
        <th>Sản phẩm</th>
        <th>Tên sản phẩm</th>
        <th>Số lượng</th>
        <th>Giá</th>
        <th>Hành động</th>
    </tr>
    <!-- @forelse($salesInvoiceDetails as $salesInvoiceDetail)
    <tr>
        <td>
            <img src="{{$image->img_url}}" width="100px">
        </td>
        <td>
            <p>{{$salesInvoiceDetail->prd_name}}</p>
        </td>
        <td>
            <p>{{$salesInvoiceDetail->sal_quantity}}</p>

        </td>
        <td>
            <p>{{$salesInvoiceDetail->sal_price}} VND</p>
        </td>
        <td>
                  <form method="POST" action="{{url('admin/products/'.$product->prd_id.'/delete')}}">
                        @csrf
                        @method('delete')
                        <button type="submit" class="btn btn-danger">Xóa</button>
                    </form>
        </td>
    </tr> -->
    <br>
</table>
  </div>

  <div class="row">
<div class="col-">

</div>

<div class="col-">

</div>

</div>

@endsection

@section('js')
@parent

@endsection