@extends('layout.clientInfo')

@section('title','Đơn hàng')

@section('style')

@endsection

@section('sidebar-client')
<a href="/client">Thông tin khách hàng</a>
  <a class="active" href="/client/invoices">Đơn hàng</a>
  <a href="/client/changepass">Đổi mật khẩu</a>
@endsection

@section('content-info')


@endsection

@section('js')
@parent

@endsection