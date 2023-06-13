@extends('layout.admin_base')

@section('title','Cập nhật tin tức')

@section('content')
<h1 class="text-center">Cập nhật tin tức</h1>
    <form action="" method="POST">
        @csrf
        @method('put')
        <br>
        <label for="newsCode">Mã bài viết:</label>
        <br>
        <input value="" name="newsCode" type="text" class="form-control"
               placeholder="Mã bài viết">
        <br>
        <label for="newsName">Tiêu đề bài viết:</label>
        <br>
        <input value="" name="newsName" type="text" class="form-control"
               placeholder="Tiêu đề bài viết">
        <br>
        <label for="newsDate">Ngày viết:</label>
        <br>
        <input value="" name="newsDate" type="date" class="form-control"
               placeholder="Ngày viết">
       <br>
        <label for="newsDescription">Mô tả:</label>
        <br>
        <textarea id="editor" value="" name="newsDescription" type="text" class="form-control"
               placeholder="Mô tả"></textarea>
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