@extends('layout.admin_base')

@section('title','Cập nhật tin tức')

@section('content')
<h1 class="text-center">Cập nhật tin tức</h1>
<form action="{{url('admin/news/'.$new->new_id.'/edit')}}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('put')
    <br>
    <label for="newsName">Tiêu đề bài viết:</label>
    <br>
    <input value="{{$new->new_title}}" name="newsName" type="text" class="form-control" placeholder="Tiêu đề bài viết" required>
    <br>
    <label for="newsImage">Ảnh bài viết:</label>
    <br>
    <img id="imagePreview" src="/storage/{{substr($new->new_image, 7)}}" width="200px">
    <input accept="image/*" type="file" name="newsImage" onchange="previewImage(event)">
    <br><br>
    <label for="newsDate">Ngày viết:</label>
    <br>
    <input value="{{$new->new_day}}" name="newsDate" type="date" class="form-control" placeholder="Ngày viết" required>
    <br>
    <label for="newsDescription">Nội dung:</label>
    <br>
    <textarea id="editor" value="{{$new->new_content}}" name="newsDescription" type="text" class="form-control" placeholder="Nội dung">{{$new->new_content}}</textarea>
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