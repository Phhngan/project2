@extends('layout.admin_base')

@section('title','Thêm bài viết')

@section('content')
<h1 class="text-center">Tạo bài viết mới</h1>
<form action="{{url('admin/news/create')}}" method="POST">
    @csrf
    <br>
    <label for="newsName">Tiêu đề bài viết:</label>
    <br>
    <input name="newsName" type="text" class="form-control" placeholder="Tiêu đề bài viết">
    <br>
    <label for="newsImage">Link ảnh:</label>
    <br>
    <input name="newsImage" type="text" class="form-control" placeholder="Link ảnh">
    <br>
    <label for="newsDate">Ngày viết:</label>
    <br>
    <input name="newsDate" type="date" class="form-control" placeholder="Ngày viết">
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
@endsection