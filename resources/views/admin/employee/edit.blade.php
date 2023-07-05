@extends('layout.admin_base')

@section('title','Cập nhật nhân viên')

@section('content')
<h1 class="text-center">Cập nhật nhân viên</h1>
@foreach($users as $user)
<form action="{{url('/admin/employee/'.$user->id.'/edit')}}" method="POST">
    @csrf
    @method('put')
    <br>
    <label for="email">Email:</label>
    <br>
    <input value="{{ $user->email  }}" name="email" type="text" class="form-control" placeholder="Email" required>
    <br>
    <label for="password">Mật khẩu:</label>
    <br>
    <input name="password" type="text" class="form-control" placeholder="Mật khẩu" required>
    <br>
    <label for="position">Vị trí công việc:</label>
    <br>
    <?php
    $position = '';
    if ($user->pos_id == 2) {
        $position = "Quản lý tổng";
    }
    if ($user->pos_id == 3) {
        $position = "Nhân viên kho";
    }
    if ($user->pos_id == 4) {
        $position = "Nhân viên thu ngân";
    }
    if ($user->pos_id == 5) {
        $position = "Nhân viên tiếp thị";
    }
    if ($user->pos_id == 6) {
        $position = "Nhân viên gói hàng";
    }
    ?>
    <select class="form-control" id="" name="position" required>
        <option value="{{$user->pos_id}}" selected="selected">----{{$position}}----</option>
        <option value="2">Quản lý tổng</option>
        <option value="3">Nhân viên kho</option>
        <option value="4">Nhân viên thu ngân</option>
        <option value="5">Nhân viên tiếp thị</option>
        <option value="6">Nhân viên gói hàng</option>
    </select>
    <br>
    <button type="submit" class="btn btn-primary">Cập nhật</button>
</form>
@endforeach
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