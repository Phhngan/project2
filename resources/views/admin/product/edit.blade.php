@extends('layout.admin_base')

@section('title','Cập nhật sản phẩm')

@section('content')
<h1 class="text-center">Cập nhật sản phẩm</h1>
<form action="{{url('admin/products/'.$product->prd_id.'/edit')}}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('put')
    <br>
    <label for="productCode">Mã sản phẩm:</label>
    <br>
    <input value="{{ $product->prd_code  }}" name="productCode" type="text" class="form-control" placeholder="Mã sản phẩm" required>
    <br>
    <label for="productName">Tên sản phẩm:</label>
    <br>
    <input value="{{ $product->prd_name  }}" name="productName" type="text" class="form-control" placeholder="Tên sản phẩm" required>
    <br>
    <label for="image">Ảnh sản phẩm:</label>
    <br>
    <img id="imagePreview" src="/storage/{{substr($product->prd_image, 7)}}" width="200px">
    <input accept="image/*" type="file" name="image" onchange="previewImage(event)">
    <br><br>
    <label for="productType">Loại sản phẩm:</label>
    <br>
    <select class="form-control" name="productType" required>
        <option value="{{$product->prd_type_id}}" selected="selected">----
            <?php
            if ($product->prd_type_id == 1) {
                echo "Đồ mặn";
            } else if ($product->prd_type_id == 2) {
                echo "Đồ ngọt";
            } else
                echo "Đồ uống";
            ?>----
        </option>
        <option value="1">Đồ mặn</option>
        <option value="2">Đồ ngọt</option>
        <option value="3">Đồ uống</option>
    </select>
    <br>
    <label for="productWeigh">Khối lượng (gam):</label>
    <br>
    <input value="{{ $product->prd_weigh  }}" name="productWeigh" type="text" class="form-control" placeholder="Khối lượng" required>
    <br>
    <label for="productSource">Nguồn gốc:</label>
    <br>
    <input value="{{ $product->prd_source  }}" name="productSource" type="text" class="form-control" placeholder="Nguồn gốc">
    <br>
    <label for="productPrice">Giá bán (VND):</label>
    <br>
    <input value="{{ $product->prd_price  }}" name="productPrice" type="number" class="form-control" placeholder="Giá bán" required>
    <br>
    <label for="productDiscount">Giảm giá (%):</label>
    <br>
    <input value="{{ $product->prd_discount  }}" name="productDiscount" type="text" class="form-control" placeholder="Giảm giá" required>
    <br>
    <label for="productDescription">Mô tả:</label>
    <br>
    <textarea id="editor" value="" name="productDescription" type="text" class="form-control" placeholder="Mô tả">{{ $product->prd_description  }}</textarea>
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
<script>
    function previewImage(event) {
        var input = event.target;
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                document.getElementById("imagePreview").src = e.target.result;
            };
            reader.readAsDataURL(input.files[0]);
        }
    }
</script>
@endsection