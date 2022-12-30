@extends('layout.admin_base')

@section('title','Thông tin cá nhân')

@section('content')
<h1 class="text-center">Thông tin cá nhân</h1>
<br>
<div class="card mb-4" id="card-client">
          <div class="card-body">
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
                <p class="mb-0">Vị trí làm việc</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0">{{$user->pos_name}}</p>
              </div>
            </div>
            <hr>

            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Ngày sinh</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0">{{$user->use_birth}}</p>
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
                    if ($user->use_gender == 1){
                      echo "Nam";
                    }else
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
                <p class="mb-0">Tỉnh thành</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0">{{$user->pro_name}}</p>
              </div>
            </div>
            <hr>

            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Quận/huyện</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0">{{$user->use_district}}</p>
              </div>
            </div>
            <hr>

            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Phường/xã</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0">{{$user->use_town}}</p>
              </div>
            </div>
            <hr>

            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Địa chỉ chi tiết</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0">{{$user->use_detailAddress}}</p>
              </div>
            </div>
          </div>
</div>
<a class="btn btn-primary" href="{{url('/admin/profile/edit')}}" role="button">Sửa thông tin</a><br><br>
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