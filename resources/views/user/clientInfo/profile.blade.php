@extends('layout.clientInfo')

@section('title','Thông tin khách hàng')

@section('style')
#card-client{
max-width: 950px!important;
height: auto !important;
}
.btn-editor{
margin-left: 480px;
margin-right:10px;
}

@endsection

@section('sidebar-client')
<a class="active" href="/client">Thông tin khách hàng</a>
<a href="/client/edit">Sửa thông tin</a>
<a href="/client/favorite">Sản phẩm yêu thích</a>
<a href="/client/invoices">Đơn hàng</a>
<a href="/client/changePass">Đổi mật khẩu</a>
@endsection

@section('content-info')
<br>
<div class="cf-title">
    <h3>Thông tin khách hàng</h3>
</div><br>

<div class="card mb-4" id="card-client">
    <div class="card-body">
        @forelse($users as $user)
        <div class="row">
            <div class="col-sm-3">
                <p class="mb-0">Họ và tên</p>
            </div>
            <div class="col-sm-9">
                <p class="text-muted mb-0">{{$user->use_lastName}} {{$user->name}}</p>
            </div>
        </div>
        <hr>

        <div class="row">
            <div class="col-sm-3">
                <p class="mb-0">Giới tính</p>
            </div>
            <div class="col-sm-9">
                <p class="text-muted mb-0">
                    <?php
                    if ($user->use_gender == 1) {
                        echo "Nam";
                    } else
                        echo "Nữ";
                    ?></p>
            </div>
        </div>
        <hr>

        <div class="row">
            <div class="col-sm-3">
                <p class="mb-0">Email</p>
            </div>
            <div class="col-sm-9">
                <p class="text-muted mb-0">{{$user->email}}</p>
            </div>
        </div>
        <hr>

        <div class="row">
            <div class="col-sm-3">
                <p class="mb-0">Số điện thoại</p>
            </div>
            <div class="col-sm-9">
                <p class="text-muted mb-0">{{$user->use_phone}}</p>
            </div>
        </div>
        <hr>

        <div class="row">
            <div class="col-sm-3">
                <p class="mb-0">Địa chỉ</p>
            </div>
            <div class="col-sm-9">
                <p class="text-muted mb-0">{{$user->use_detailAddress}} - {{$user->use_town}} - {{$user->use_district}} - {{$user->use_province}}</p>
            </div>
        </div>
        <hr>

        <div class="row">
            <div class="col-sm-3">
                <p class="mb-0">Số xu bạn có: </p>
            </div>
            <div class="col-sm-9">
                <p class="text-muted mb-0">{{$user->use_gold}} <img src="https://github.com/Phhngan/snack_images/blob/master/icon/xu.png?raw=true" style="width:22px;"></p>
            </div>
        </div>
        @empty
        <tr>
            <td colspan="3">Danh sach rong</td>
        </tr>
        @endforelse
    </div>
</div>

<br><br>

<a class="btn btn-primary btn-editor" href="{{url('/client/edit')}}" role="button">Sửa thông tin</a>
<a class="btn btn-danger" href="{{url('/logout')}}" role="button">Log Out</a>

@endsection

@section('js')
@parent

@endsection