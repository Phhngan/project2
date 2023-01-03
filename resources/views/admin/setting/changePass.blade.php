@extends('layout.admin_base')

@section('title','Đổi mật khẩu')

@section('content')
<h1 class="text-center">Đổi mật khẩu</h1>
<form action="{{url('/admin/changePass')}}" method="POST">
    @csrf
    @method('put')
    <br>
    <label for="oldPass">Mật khẩu cũ: </label>
    <br>
    <input name="oldpass" type="text"  class="form-control" placeholder="Mật khẩu cũ">
    <br>
    <label for="newPass1">Nhập khẩu mới:</label>
    <br>
    <input name="newPass1" type="text" class="form-control" placeholder="Mật khẩu mới">
    <br>
    <label for="newPass2">Nhập lại khẩu mới:</label>
    <br>
    <input name="newPass2" type="text" class="form-control" placeholder="Mật khẩu mới">
    <br>
    <p class="error-noti">{{$error}}</p>
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