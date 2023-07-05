@extends('layout.admin_base')

@section('title','Đổi mật khẩu')

@section('content')
<h1 class="text-center">Đổi mật khẩu</h1>
<form class="register" action="{{url('/admin/changePass')}}" method="POST">
    @csrf
    @method('put')
    <br>
    <label for="oldPass" class="form-label">Nhập mật khẩu cũ: </label>
    <br>
    <input name="oldPass" type="password" class="form-control" id="oldPass" placeholder="Mật khẩu cũ" required>
    <br>
    <label for="newPass1" class="form-label">Nhập khẩu mới:</label>
    <br>
    <input name="newPass1" type="password" class="form-control" placeholder="Mật khẩu mới" required>
    <br>
    <label for="newPass2" class="form-label">Nhập lại khẩu mới:</label>
    <br>
    <input name="newPass2" type="password" class="form-control" placeholder="Nhập lại mật khẩu mới" required>
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