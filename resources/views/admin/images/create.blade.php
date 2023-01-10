@extends('layout.admin_base')

@section('title','Thêm ảnh')

@section('content')
    <h1 class="text-center">Thêm ảnh mới</h1>
    <form action="{{url('admin/images/create')}}" method="POST">
        @csrf
        <br>
        <label for="imageURL">URL ảnh:</label>
        <br>
        <input name="imageURL" type="text" class="form-control" placeholder="URL ảnh">
        <br>
        <label for="imageRole">Role của ảnh:</label>
        <br>
        <input name="imageRole" type="text" class="form-control" placeholder="Role">
        <br>
        <label for="imageURL">Mã sản phẩm:</label>
        <br>
        <input name="productId" type="number" class="form-control" placeholder="Mã sản phẩm">
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