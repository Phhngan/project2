@extends('layout.admin_base')

@section('title','Thêm nhân viên')

@section('content')
<h1 class="text-center">Thêm nhân viên mới</h1>
<form action="{{url('/admin/employee/create')}}" method="POST">
    @csrf
    <br>
    <label for="lastName">Họ:</label>
    <br>
    <input name="lastName" type="text" class="form-control" placeholder="Họ" required>
    <br>
    <label for="firstName">Tên:</label>
    <br>
    <input name="firstName" type="text" class="form-control" placeholder="Tên" required>
    <br>
    <label for="gender">Giới tính:</label>
    <br>
    <select class="form-control" id="" name="gender" required>
        <option value="" selected="selected">----Chọn giới tính----</option>
        <option value="1">Nam</option>
        <option value="2">Nữ</option>
    </select>
    <br>
    <label for="email">Email:</label>
    <br>
    <input name="email" type="text" class="form-control" placeholder="Email" required>
    <br>
    <label for="phone">Số điện thoại:</label>
    <br>
    <input name="phone" type="text" class="form-control" placeholder="Số điện thoại" required>
    <br>
    <label for="password">Mật khẩu:</label>
    <br>
    <input name="password" type="text" class="form-control" placeholder="Mật khẩu" required>
    <br>
    <label for="position">Vị trí công việc:</label>
    <br>
    <select class="form-control" id="" name="position" required>
        <option value="" selected="selected">----Chọn vị trí----</option>
        <option value="2">Quản lý tổng</option>
        <option value="3">Nhân viên kho</option>
        <option value="4">Nhân viên thu ngân</option>
        <option value="5">Nhân viên tiếp thị</option>
        <option value="6">Nhân viên gói hàng</option>
    </select>
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