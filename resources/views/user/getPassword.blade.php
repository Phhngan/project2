@extends('layout.base_page')

@section('title','Vui lòng kiểm tra mail')

@section('style')
.register{
background: #A8B3D0;
padding: 20px 10px 20px 10px;
margin-top: 50px;
margin-left: 200px;
margin-right: 200px;
border-radius: 5px;
border: 2px solid #766FD2;
height: auto;
}
h1{
margin-top: 20px;
text-align: center;
text-shadow: 2px 2px 5px #7B89E6;

}
.mb-3 {
margin: 25px 200px 0px 200px;
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

@section('content')
<div>
    <h1>Vui lòng kiểm tra gmail để lấy lại mật khẩu</h1>

</div>
<div class="form-group register">
    <h5 style="text-align:center;">Bạn có muốn đăng nhập tài khoản khác hay tạo tài khoản mới?</h5>
    <div class="mb-3" style="display:flex;justify-content:center;padding: 50px;">
        <a href="/login" role="button" class="btn btn-primary"> Đăng nhập </a>
        <h5 style="padding-top:5px;">&nbsp;&nbsp; hay &nbsp;&nbsp; </h5>
        <a href="/register" role="button" class="btn btn-warning"> Đăng ký </a>
    </div>
</div>

@endsection