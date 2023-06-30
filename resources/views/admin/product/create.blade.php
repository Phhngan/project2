@extends('layout.admin_base')

@section('title','Tạo sản phẩm')

@section('content')
<h1 class="text-center">Tạo sản phẩm mới</h1>
<form action="{{url('admin/products/create')}}" method="POST" enctype="multipart/form-data">
    @csrf
    <br>
    <label for="productCode">Mã sản phẩm:</label>
    <br>
    <input name="productCode" type="text" class="form-control" placeholder="Mã sản phẩm">
    <br>
    <label for="productName">Tên sản phẩm:</label>
    <br>
    <input name="productName" type="text" class="form-control" placeholder="Tên sản phẩm">
    <br>
    <label for="productImage">Ảnh sản phẩm:</label>
    <br>
    <input type="file" name="productImage">
    <br><br>
    <img id="imagePreview" src="#" alt="Preview Image" style="display: none;">
    <label for="productType">Loại sản phẩm:</label>
    <br>
    <select class="form-control" name="productType" required>
        <option value="" selected="selected">----Loại sản phẩm----</option>
        <option value="1">Đồ mặn</option>
        <option value="2">Đồ ngọt</option>
        <option value="3">Đồ uống</option>
    </select>
    <br>
    <label for="productWeigh">Khối lượng:</label>
    <br>
    <input name="productWeigh" type="number" class="form-control" placeholder="Khối lượng">
    <br>
    <label for="productSource">Nguồn gốc:</label>
    <br>
    <input name="productSource" type="text" class="form-control" placeholder="Nguồn gốc">
    <br>
    <label for="productPrice">Giá bán:</label>
    <br>
    <input name="productPrice" type="number" class="form-control" placeholder="Giá sản phẩm">
    <br>
    <label for="productDiscount">Giảm giá:</label>
    <br>
    <input name="productDiscount" type="number" class="form-control" placeholder="Giảm giá">
    <br>
    <label for="productDescription">Mô tả:</label>
    <br>
    <textarea id="editor" name="productDescription" type="text" class="form-control" placeholder="Mô tả"></textarea>
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
<script>
    // Get the file input element
    const input = document.getElementById('productImage');

    // Get the image preview element
    const preview = document.getElementById('imagePreview');

    // Add an event listener to the file input
    input.addEventListener('change', function(e) {
        // Get the selected file
        const file = e.target.files[0];

        // Check if a file was selected
        if (file) {
            // Create a FileReader
            const reader = new FileReader();

            // Set up the FileReader onload event
            reader.onload = function() {
                // Set the image source to the FileReader result
                preview.src = reader.result;
                preview.style.display = 'block'; // Show the image preview
            };

            // Read the file as a data URL
            reader.readAsDataURL(file);
        } else {
            // If no file was selected, hide the image preview
            preview.src = '#';
            preview.style.display = 'none';
        }
    });
</script>
@endsection