@extends('layout.clientInfo')

@section('title','Sản phẩm yêu thích')

@section('style')


@endsection

@section('sidebar-client')
<a href="/client">Thông tin khách hàng</a>
<a class="active" href="/client/favorite">Sản phẩm yêu thích</a>
<a href="/client/edit">Sửa thông tin</a>
<a href="/client/invoices">Đơn hàng</a>
<a href="/client/changePass">Đổi mật khẩu</a>
@endsection

@section('content-info')
<br>
<div class="cf-title">
  <h3>Sản phẩm yêu thích</h3>
</div>


@endsection

@section('js')
@parent

@endsection