@extends('layout.admin_base')

@section('title','Tạo sản phẩm')

@section('content')
    <h1 class="text-center">Tạo sản phẩm mới</h1>
    <form action="{{url('admin/products/create')}}" method="POST">
        @csrf
        <br>
        <input name="productCode" type="text" class="form-control" placeholder="Mã sản phẩm">
        <br>
        <input name="productName" type="text" class="form-control" placeholder="Tên sản phẩm">
        <br>
        <input name="productType" type="number" class="form-control" placeholder="Loại sản phẩm">
        <br>
        <input name="productWeigh" type="number" class="form-control" placeholder="Khối lượng">
        <br>
        <input name="productSource" type="text" class="form-control" placeholder="Nguồn gốc">
        <br>
        <input name="productPrice" type="number" class="form-control" placeholder="Giá sản phẩm">
        <br>
        <input name="productDiscount" type="number" class="form-control" placeholder="Giảm giá">
        <br>
        <input name="productDescription" type="text" class="form-control" placeholder="Mô tả">
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