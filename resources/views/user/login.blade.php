@extends('layout.base_page')

@section('title','Login')

@section('style')
.login{
background: #A8B3D0;
padding: 20px 10px 20px 10px;
margin-top: 50px;
margin-left: 200px;
margin-right: 200px;
border-radius: 5px;
border: 2px solid #766FD2;
height: 450px;
}
h1{
margin-top: 20px;
text-align: center;
text-shadow: 2px 2px 5px #7B89E6;

}
.mb-3 {
margin: 25px 200px 0px 200px;
}
.btn-dangnhap{
background-color: #2D1476;
color: white;
border-radius: 5px;
padding: 5px 80px 5px 80px;
display: flex;
margin-left: auto;
margin-right: auto;
}
.btn-dangnhap:hover {
background-color: white;
color: #2D1476;
}
a{
color: black;
}
.form-group{
padding: 20px;
}
.quen-mk-btn, .dki-btn{
margin-bottom: 5px;
}
@endsection

@section('content')
<div>
    <h1>Đăng nhập</h1>

</div>
<form class="login" method="post">
    @csrf
    <div class="form-group">
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Email</label>
            <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Mật khẩu</label>
            <input type="password" name="password" class="form-control" id="exampleInputPassword1">
        </div>
        <p class="error-noti">{{$error}}</p>
        <br>
        <button type="submit" class="btn-dangnhap">Đăng nhập</button>
        <div class="mb-3">
            <a href="/forgetPass" role="button" class="quen-mk-btn"> Quên mật khẩu </a>
            <br>
            <a><strong>Chưa có tài khoản?</strong></a>
            <a href="/register" role="button" class="dki-btn"> Đăng kí </a>
        </div>
    </div>
</form>
@endsection