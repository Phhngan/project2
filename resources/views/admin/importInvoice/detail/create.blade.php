@extends('layout.admin_base')

@section('title','Thêm sản phẩm')

@section('content')
    <h1 class="text-center">Thêm sản phẩm vào đơn nhập</h1>
    <form action="{{url('/admin/importInvoice/'.$imp_id.'/create')}}" method="POST">
        @csrf
        <br>
        <label for="productId">Mã sản phẩm:</label>
        <br>
        <input name="productId" type="text" class="form-control" placeholder="Mã sản phẩm">
        <br>
        <label for="quantity">Số lượng: </label>
        <br>
        <input name="quantity" type="text" class="form-control" placeholder="Số lượng">
        <br>
        <label for="price">Giá sản phẩm:</label>
        <br>
        <input name="price" type="number" class="form-control" placeholder="Giá sản phẩm">
        <br>
        <label for="expiryDate">Ngày hết hạn:</label>
        <br>
        <input name="expiryDate" type="date" class="form-control" placeholder="Ngày hết hạn">
        <br>
        <button type="submit" class="btn btn-primary">Thêm mới</button>
    </form>
@endsection

@section('js')
    @parent
    <script>
        ClassicEditor
            .create( document.querySelector( '#editor' ) )
            .then( editor => {
                console.log( editor );
            } )
            .catch( error => {
                console.error( error );
            } );
    </script>
@endsection