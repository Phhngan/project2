@extends('layout.admin_base')

@section('title','Cập nhật nhân viên')

@section('content')
<h1 class="text-center">Cập nhật nhân viên</h1>
<form action="{{url('/admin/employee/edit')}}" method="POST">
    @csrf
    @method('put')
    <br>
    <label for="password">Mật khẩu:</label>
    <br>
    <input value="{{ $user->password  }}" name="password" type="text" class="form-control" placeholder="Mật khẩu">
    <br>
    <label for="position">Vị trí công việc:</label>
    <br>
    <input value="{{ $user->pos_id  }}" name="position" type="number" class="form-control" placeholder="Vị trí công việc">
    <br>
    <button type="submit" class="btn btn-primary">Cập nhật</button>
</form>
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