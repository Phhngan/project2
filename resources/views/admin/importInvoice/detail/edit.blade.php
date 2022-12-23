@extends('layout.admin_base')

@section('title','Cập nhật chi tiết hóa đơn')

@section('content')
<h1 class="text-center">Cập nhật chi tiết hóa đơn nhập</h1>
<form action="{{url('/admin/importInvoice/{imp_id}/{id}/edit')}}" method="POST">
    @csrf
    @method('put')
    <br>
    <label for="productId">Mã sản phẩm:</label>
        <br>
        <input value="{{$importInvoiceDetail->prd_id}}" name="productId" type="text" class="form-control" placeholder="Mã sản phẩm">
        <br>
        <label for="quantity">Số lượng: </label>
        <br>
        <input value="{{$importInvoiceDetail->imp_quantity}}" name="quantity" type="text" class="form-control" placeholder="Số lượng">
        <br>
        <label for="price">Giá sản phẩm:</label>
        <br>
        <input value="{{$importInvoiceDetail->imp_price}}" name="price" type="number" class="form-control" placeholder="Giá sản phẩm">
        <br>
        <label for="expiryDate">Ngày hết hạn:</label>
        <br>
        <input value="{{$importInvoiceDetail->imp_expiryDate}}" name="expiryDate" type="date" class="form-control" placeholder="Ngày hết hạn">
        <br>
    <button type="submit" class="btn btn-primary">Cập nhật</button>
</form>
@endsection

@section('js')
@parent
<script>
    ClassicEditor
        .create(document.querySelector('#editor'))
        .then(editor => {
            console.log(editor);
        })
        .catch(error => {
            console.error(error);
        });
</script>
@endsection