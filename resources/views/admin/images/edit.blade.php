@extends('layout.admin_base')

@section('title','Cập nhật ảnh')

@section('content')
<h1 class="text-center">Cập nhật ảnh</h1>
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
    <label for="imageURL">Mã sản phẩm:</label>
    <br>
    <input value="{{ $image->prd_id }}" name="productId" type="number" class="form-control" placeholder="Mã sản phẩm">
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