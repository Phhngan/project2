@extends('layout.clientInfo')

@section('title','Thông tin khách hàng')

@section('style')
#card-client{
  max-width: 950px!important;
}
@endsection

@section('sidebar-client')
<a class="active" href="/client">Thông tin khách hàng</a>
  <a href="/client/invoices">Đơn hàng</a>
  <a href="/client/changepass">Đổi mật khẩu</a>
@endsection

@section('content-info')
<br>
<h3 class="text-center">Thông tin khách hàng</h3>
<br>

        <div class="card mb-4" id="card-client">
          <div class="card-body">
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Full Name</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0">Johnatan Smith</p>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Ngày sinh</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0">01/01/2001</p>
              </div>
            </div>
            <hr>
            
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Giới tính</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0">Nữ</p>
              </div>
            </div>
            <hr>

            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Email</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0">example@example.com</p>
              </div>
            </div>
            <hr>

            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Phone</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0">(097) 234-5678</p>
              </div>
            </div>
            <hr>

            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Address</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0">Bay Area, San Francisco, CA</p>
              </div>
            </div>
          </div>
</div>

<br><br>
<a class="btn btn-primary" href="{{url('/client/#')}}" role="button">Sửa thông tin</a>

@endsection

@section('js')
@parent

@endsection