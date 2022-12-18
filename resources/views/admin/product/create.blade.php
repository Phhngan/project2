@extends('layout.admin_base')

@section('title','Tao san pham')

@section('content')
    <h1 class="text-center">Tạo sản phẩm mới</h1>
    <form action="{{url('admin/products/create')}}" method="POST">
        @csrf
        <br>
        <input name="productName" type="text" class="form-control" placeholder="Tên sản phẩm">
        <br>
        <input name="productPrice" type="number" class="form-control" placeholder="Giá sản phẩm">
        <br>
        <input name="productImageURL" type="text" class="form-control" placeholder="Link ảnh sản phẩm - nhập URL">
        <br>
        <textarea name="productDescription" id="editor"></textarea>
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