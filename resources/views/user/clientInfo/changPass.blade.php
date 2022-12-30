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
h1{
margin-top: 20px;
text-align: center;
text-shadow: 2px 2px 5px #7B89E6;

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
  <a href="/client/invoices">Đơn hàng</a>
  <a class="active" href="/client/changepass">Đổi mật khẩu</a>
@endsection

@section('content-info')
<div>
    <h1>Đổi mật khẩu</h1>

</div>
<form class="register" action="{{url('/changePass')}}" method="POST">
    @csrf
    <div class="form-group">
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Nhập mật khẩu cũ: </label>
            <input name="oldpassword" type="oldpassword" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Mật khẩu mới: </label>
            <input name="password" type="password" class="form-control" id="exampleInputPassword1">
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword2" class="form-label">Nhập lại mật khẩu mới: </label>
            <input name="password2" type="password2" class="form-control" id="exampleInputPassword2">
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