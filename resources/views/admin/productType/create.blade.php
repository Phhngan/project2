@extends('layout.admin_base')

@section('title','Tạo loại sản phẩm')

@section('content')
<h1 class="text-center">Tạo loại sản phẩm</h1>
<form action="{{url('admin/productType/create')}}" method="POST">
        @csrf
        <br>
        <label for="productType">Loại sản phẩm:</label>
        <br>
        <input name="productTypeName" type="text" class="form-control" placeholder="Tên loại sản phẩm">
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