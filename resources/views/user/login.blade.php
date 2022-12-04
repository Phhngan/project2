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
            margin: 0px 200px 0px 200px;
            background-color: #2D1476;
            color: white;
            border-radius: 5px;
            padding: 5px 10px 5px 10px;
        }
        .btn-dangnhap:hover {
            background-color: white;
            color: #2D1476;
        }  
        a{
            color: black;
        }
        .form-group{
            padding: 50px;
        }
       
@endsection

@section('content')
<div>
        <h1>Đăng nhập</h1>
        
    </div>
    <form class="login">
        <div class="form-group">
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Email</label>
            <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Mật khẩu</label>
            <input type="password" class="form-control" id="exampleInputPassword1">
        </div>
        <button type="submit" class="btn-dangnhap" >Submit</button>
        <div class="mb-3">
        <a class="quen-mat-khau" href="#forgetpass"> Quên mật khẩu </a>
            <br>
            <a>Chưa có tài khoản?</a>
            <a href="/register"> Đăng kí </a>
    </div>
    </div>
    </form>
@endsection