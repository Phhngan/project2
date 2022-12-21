@extends('layout.admin_base')

@section('title','Cập nhật loại sản phẩm')

@section('content')
<h1 class="text-center">Cập nhật loại sản phẩm</h1>
<form action="{{url('admin/productType/'.$productType->prd_type_id.'/edit')}}" method="POST">
    @csrf
    @method('put')
    <br>
    <input value="{{ $productType->prd_type  }}" name="productTypeName" type="text" class="form-control"
        placeholder="Tên loại sản phẩm">
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