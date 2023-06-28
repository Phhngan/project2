@extends('layout.admin_base')

@section('title','Thêm ảnh')

@section('content')
<h1 class="text-center">Thêm ảnh mới</h1>
<form method="POST" action="{{url('admin/images/create')}}" enctype="multipart/form-data">
    @csrf
    <input type="file" name="image"><br><br>
    <label for="imageRole">Role của ảnh:</label>
    <br>
    <input name="imageRole" type="text" class="form-control" placeholder="Role">
    <br>
    <label for="productId">Tên sản phẩm:</label>
    <br>
    <?php
    $products = Illuminate\Support\Facades\DB::table('Products')
        ->select('Products.*')
        ->get();
    ?>
    <select class="form-control" name="productId" required>
        <option value="" selected="selected">----Chọn sản phẩm----</option>
        @foreach($products as $product)
        <option value="{{ $product->prd_id }}">{{ $product->prd_name }}</option>
        @endforeach
    </select>
    <br>
    <button type="submit" class="btn btn-primary">Thêm mới</button>
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