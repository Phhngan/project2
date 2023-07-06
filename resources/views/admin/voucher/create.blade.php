@extends('layout.admin_base')

@section('title','Thêm mã giảm giá')

@section('content')
<h1 class="text-center">Tạo mã giảm giá mới</h1>
<form action="{{url('admin/voucher/create')}}" method="POST" enctype="multipart/form-data">
    @csrf
    <br>
    <label for="voucherName">Tên Voucher:</label>
    <br>
    <input name="voucherName" type="text" class="form-control" placeholder="Tên Voucher" required>
    <br>
    <label for="voucherImage">Ảnh voucher:</label>
    <br>
    <input accept="image/*" type="file" id="voucherImage" name="voucherImage" required>
    <br>
    <p id="previewText" style="display: none;"><strong>Preview:</strong></p>
    <img id="imagePreview" src="#" alt="Preview Image" style="display: none;width: 200px;">
    <br>
    <label for="voucherDate">Ngày áp dụng:</label>
    <br>
    <input name="voucherDate" type="date" class="form-control" placeholder="Ngày áp dụng" required>
    <br>
    <label for="voucherDiscount">Giảm giá (VND):</label>
    <br>
    <input name="voucherDiscount" type="number" class="form-control" placeholder="Giảm giá" required>
    <br>
    <label for="voucherMin">Tổng tiền áp dụng (VND):</label>
    <br>
    <input name="voucherMin" type="number" class="form-control" placeholder="Tổng tiền áp dụng" required>
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
    const input = document.getElementById('voucherImage');

    // Get the image preview element
    const previewText = document.getElementById('previewText')
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
                preview.style.display = 'flex';
                previewText.style.display = 'block';
            };

            // Read the file as a data URL
            reader.readAsDataURL(file);
        } else {
            // If no file was selected, hide the image preview
            preview.src = '#';
            preview.style.display = 'none';
            previewText.style.display = 'none';
        }
    });
</script>
@endsection