@extends('layout.admin_base')

@section('title','Thêm bài viết')

@section('content')
<h1 class="text-center">Tạo bài viết mới</h1>
<form action="{{url('admin/news/create')}}" method="POST" enctype="multipart/form-data">
    @csrf
    <br>
    <label for="newsName">Tiêu đề bài viết:</label>
    <br>
    <input name="newsName" type="text" class="form-control" placeholder="Tiêu đề bài viết" required>
    <br>
    <!-- <label for="newsImage">Link ảnh:</label>
        <input name="newsImage" type="text" class="form-control" placeholder="Link ảnh">
    <br>
    <br> -->
    <label for="newsImage">Ảnh bài viết:</label>
    <br>
    <input accept="image/*" type="file" id="newsImage" name="newsImage" required>
    <br>
    <p id="previewText" style="display: none;"><strong>Preview:</strong></p>
    <img id="imagePreview" src="#" alt="Preview Image" style="display: none;width: 200px;">
    <br>
    <label for="newsDate">Ngày viết:</label>
    <br>
    <input name="newsDate" type="date" class="form-control" placeholder="Ngày viết" required>
    <br>
    <label for="newsContent">Nội dung:</label>
    <br>
    <textarea id="editor" name="newsContent" type="text" class="form-control" placeholder="Nội dung"></textarea>
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
    const input = document.getElementById('newsImage');

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