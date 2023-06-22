@extends('layout.clientInfo')

@section('title','Đổi mật khẩu')

@section('style')
.register{
background: white;
padding: 20px 10px 20px 10px;
margin-top: 50px;
margin-left: 200px;
margin-right: 200px;
border-radius: 5px;
border: 2px solid #766FD2;
height: auto;
}
.mb-3 {
margin: 25px 200px 0px 200px;
}
.btn-dangki{
margin: 0px 200px 5px 200px;
background-color: #2D1476;
color: white;
border-radius: 5px;
padding: 5px 10px 5px 10px;
}
.btn-dangki:hover {
background-color: white;
color: #2D1476;
}
a{
color: black;
}
.form-group{
padding: 50px;
}
.form-select{
width: 380px;
margin-left: 0px;
}
@endsection

@section('sidebar-client')
<a href="/client">Thông tin khách hàng</a>
<a href="/client/edit">Sửa thông tin</a>
<a href="/client/favorite">Sản phẩm yêu thích</a>
<a href="/client/invoices">Đơn hàng</a>
<a class="active" href="/client/changePass">Đổi mật khẩu</a>
@endsection

@section('content-info')
<br>
<div class="cf-title">
    <h3>Đổi mật khẩu</h3>
</div>

<form class="register" action="{{url('client/changePass')}}" method="POST">
    @csrf
    @method('put')
    <div class="form-group">
        <div class="mb-3">
            <label for="oldPass" class="form-label">Nhập mật khẩu cũ: </label>
            <input name="oldPass" type="password" class="form-control" id="oldPass" placeholder="Mật khẩu cũ">
        </div>
        <div class="mb-3">
            <label for="newPass1" class="form-label">Mật khẩu mới: </label>
            <input name="newPass1" type="password" class="form-control" placeholder="Mật khẩu mới">
        </div>
        <div class="mb-3">
            <label for="newPass2" class="form-label">Nhập lại mật khẩu mới: </label>
            <input name="newPass2" type="password" class="form-control" placeholder="Nhập lại mật khẩu mới">
        </div>
        <p class="error-noti">{{$error}}</p>
        <br>
        <button type="submit" class="btn-dangki">Đổi mật khẩu</button>
    </div>
</form>

@endsection

@section('js')
@parent

@endsection