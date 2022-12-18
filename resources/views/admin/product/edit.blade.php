@extends('layout.admin_base')

@section('title','Cập nhật sản phẩm')

@section('content')
    <h1 class="text-center">Cập nhật sản phẩm</h1>
    <form action="{{url('admin/product/'.$product->id.'/edit')}}" method="POST">
        @csrf
        @method('put')
        <br>
        <input value="{{ $product->name  }}" name="productName" type="text" class="form-control"
               placeholder="Tên sản phẩm">
        <br>
        <input value="{{ $product->price  }}" name="productPrice" type="number" class="form-control"
               placeholder="Giá sản phẩm">
        <br>
        <input value="{{ $product->image }}" name="productImageURL" type="text" class="form-control"
               placeholder="Link ảnh sản phẩm - nhập URL">
        <br>
        <textarea name="productDescription" id="editor">{{$product->description}}</textarea>
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