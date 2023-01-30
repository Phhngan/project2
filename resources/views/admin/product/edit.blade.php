@extends('layout.admin_base')

@section('title','Cập nhật sản phẩm')

@section('content')
    <h1 class="text-center">Cập nhật sản phẩm</h1>
    <form action="{{url('admin/products/'.$product->prd_id.'/edit')}}" method="POST">
        @csrf
        @method('put')
        <br>
        <label for="productCode">Mã sản phẩm:</label>
        <br>
        <input value="{{ $product->prd_code  }}" name="productCode" type="text" class="form-control"
               placeholder="Mã sản phẩm">
        <br>
        <label for="productName">Tên sản phẩm:</label>
        <br>
        <input value="{{ $product->prd_name  }}" name="productName" type="text" class="form-control"
               placeholder="Tên sản phẩm">
        <br>
        <label for="productType">Loại sản phẩm:</label>
        <br>
        <select class="form-control" name="productType" required>
        <option value="{{$product->prd_type_id}}" selected="selected">----<?php
            if ($product->prd_type_id == 1){echo "Đồ mặn";
            }else if($product->prd_type_id == 2){
                echo "Đồ ngọt";
            }else
                echo "Đồ uống";
            ?>----</option>
            <option value="1">Đồ mặn</option>
            <option value="2">Đồ ngọt</option>
            <option value="3">Đồ uống</option>
            </select>
       <br>
        <label for="productWeigh">Khối lượng:</label>
        <br>
        <input value="{{ $product->prd_weigh  }}" name="productWeigh" type="text" class="form-control"
               placeholder="Khối lượng">
       <br>
        <label for="productSource">Nguồn gốc:</label>
        <br>
        <input value="{{ $product->prd_source  }}" name="productSource" type="text" class="form-control"
               placeholder="Nguồn gốc">
       <br>
        <label for="productPrice">Giá bán:</label>
        <br>
        <input value="{{ $product->prd_price  }}" name="productPrice" type="number" class="form-control"
               placeholder="Giá bán">
       <br>
        <label for="productDiscount">Giảm giá:</label>
        <br>
        <input value="{{ $product->prd_discount  }}" name="productDiscount" type="text" class="form-control"
               placeholder="Giảm giá">
       <br>
        <label for="productDescription">Mô tả:</label>
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