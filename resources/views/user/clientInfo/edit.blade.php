@extends('layout.clientInfo')

@section('title','Thông tin khách hàng')

@section('style')
#card-client{
  max-width: 950px!important;
}

.edit-info{
  padding-left: 200px;
  padding-right: 200px;
  background-color: #F3F3FC;
  margin-left: 50px;
  margin-right: 50px;
  border-radius: 10px;
}
@endsection

@section('sidebar-client')
  <a href="/client">Thông tin khách hàng</a>
<a class="active" href="/client/edit">Sửa thông tin</a>
  <a href="/client/invoices">Đơn hàng</a>
  <a href="/client/changePass">Đổi mật khẩu</a>
@endsection

@section('content-info')
<br>
<div class="cf-title">
  <h3>Cập nhật thông tin khách hàng</h3>
</div>
<br>
<form class="edit-info" action="{{url('client/edit')}}" method="POST">
    @csrf
    @method('put')
    <br>
    <label for="lastName">Họ:</label>
    <br>
    <input value="{{ $user->use_lastName }}" name="lastName" type="text" class="form-control" placeholder="Họ">
    <br>
    <label for="firstName">Tên:</label>
    <br>
    <input value="{{ $user->name }}" name="firstName" type="text" class="form-control" placeholder="Tên">
    <br>
    <label for="birth">Ngày sinh:</label>
    <br>
    <input value="{{ $user->use_birth }}" name="birth" type="date" class="form-control" placeholder="Ngày sinh">
    <br>
    <label for="gender">Giới tính:</label>
    <br>
    <input value="<?php
                    if ($user->use_gender == 1){echo "Nam";
                    }else
                      echo "Nữ";
                  ?>" name="gender" type="text" class="form-control" placeholder="Giới tính">
    <br>
    <label for="phone">Số điện thoại:</label>
    <br>
    <input value="{{ $user->use_phone }}" name="phone" type="phone" class="form-control" placeholder="Số điện thoại">
    <br>
    <!-- <label for="province">Tỉnh thành:</label>
    <br>
    <input value="{{ $user->pro_name }}" name="province" type="text" class="form-control" placeholder="Tỉnh thành"> -->

    <label for="khoi">Tỉnh thành:</label>
	<select class="form-control" id="khoi" name="khoi" required>
		<option value="">-- Chọn tỉnh thành --</option>
			<option>Hà Nội</option>
	</select>


    <br>
    <label for="district">Quận/huyện:</label>
    <br>
    <input value="{{ $user->use_district}}" name="district" type="text" class="form-control" placeholder="Quận/huyện">
    <br>
    <label for="town">Phường/xã:</label>
    <br>
    <input value="{{ $user->use_town}}" name="town" type="text" class="form-control" placeholder="Phường/xã">
    <br>
    <label for="detailAddress">Địa chỉ cụ thể:</label>
    <br>
    <input value="{{ $user->use_detailAddress}}" name="detailAddress" type="text" class="form-control" placeholder="Địa chỉ cụ thể">
    <br>
    <button type="submit" class="btn btn-primary">Cập nhật</button>
    <br><br>
</form>

<br><br>

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