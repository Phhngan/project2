@extends('layout.admin_base')

@section('title','Cập nhật sản phẩm')

@section('content')
    <h1 class="text-center">Cập nhật sản phẩm</h1>
    <form action="{{url('admin/products/'.$product->prd_id.'/edit')}}" method="POST">
        @csrf
        @method('put')
        <br>
        <input value="{{ $product->prd_code  }}" name="productCode" type="text" class="form-control"
               placeholder="Mã sản phẩm">
        <br>
        <input value="{{ $product->prd_name  }}" name="productName" type="text" class="form-control"
               placeholder="Tên sản phẩm">
        <br>
        <input value="{{ $product->prd_type_id  }}" name="productType" type="text" class="form-control"
               placeholder="Loại sản phẩm">
        <br>
        <input value="{{ $product->prd_weigh  }}" name="productWeigh" type="text" class="form-control"
               placeholder="Khối lượng">
        <br>
        <input value="{{ $product->prd_source  }}" name="productSource" type="text" class="form-control"
               placeholder="Nguồn gốc">
        <br>
        <input value="{{ $product->prd_price  }}" name="productPrice" type="number" class="form-control"
               placeholder="Giá bán">
        <br>
        <input value="{{ $product->prd_discount  }}" name="productDiscount" type="text" class="form-control"
               placeholder="Giảm giá">
        <br>
        <input value="{{ $product->prd_description  }}" name="productDescription" type="text" class="form-control"
               placeholder="Mô tả">
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