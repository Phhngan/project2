@extends('layout.admin_base')

@section('title','Đổi mật khẩu')

@section('content')
<h1 class="text-center">Cập nhật nhân viên</h1>
<form action="{{url('/admin/changPass')}}" method="POST">
    @csrf
    @method('put')
    <br>
    <label for="old-password">Mật khẩu:</label>
    <br>
    <input name="old-password" type="text" class="form-control" placeholder="Mật khẩu cũ">
    <br>
    <label for="password">Nhập khẩu mới:</label>
    <br>
    <input name="password" type="text" class="form-control" placeholder="Mật khẩu mới">
    <br>
    <label for="password1">Nhập lại khẩu mới:</label>
    <br>
    <input name="password1" type="text" class="form-control" placeholder="Mật khẩu mới">
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