@extends('layout.admin_base')

@section('title','Cập nhật ảnh')

@section('content')
<h1 class="text-center">Cập nhật ảnh</h1>
@foreach($images as $image)
<form action="{{url('admin/images/'.$image->img_id.'/edit')}}" method="POST">
    @csrf
    @method('put')
    <br>
    <label for="imageURL">URL ảnh:</label>
    <br>
    <input value="{{ $image->img_url  }}" name="imageURL" type="text" class="form-control" placeholder="URL ảnh">
    <br>
    <label for="imageRole">Role của ảnh:</label>
    <br>
    <input value="{{ $image->img_role  }}" name="imageRole" type="text" class="form-control" placeholder="Role ảnh">
    <br>
    <label for="productId">Tên sản phẩm:</label>
        <br>
    <?php
             $products = DB::table('Products')
                ->select('Products.*')
                ->get();
          ?>
	<select class="form-control" name="productId" required>
    <option value="{{$image->prd_id}}" selected="selected">----{{$image->prd_name}}----</option>
			@foreach($products as $product)
    <option value="{{ $product->prd_id }}">{{ $product->prd_name }}</option>
    @endforeach
    <br>
    <button type="submit" class="btn btn-primary">Cập nhật</button>
</form>
@endforeach
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