@extends('layout.admin_base')

@section('title','Thêm nhân viên')

@section('content')
    <h1 class="text-center">Thêm nhân viên mới</h1>
    <form action="{{url('/admin/employee/create')}}" method="POST">
        @csrf
        <br>
        <label for="lastName">Họ:</label>
        <br>
        <input name="lastName" type="text" class="form-control" placeholder="Họ">
        <br>
        <label for="firstName">Tên:</label>
        <br>
        <input name="firstName" type="text" class="form-control" placeholder="Tên">
        <br>
        <label for="birth">Ngày sinh:</label>
        <br>
        <input name="birth" type="date" class="form-control" placeholder="Ngày sinh">
        <br>
        <label for="gender">Giới tính:</label>
        <br>
        <input name="gender" type="text" class="form-control" placeholder="Giới tính">
        <br>
        <label for="email">Email:</label>
        <br>
        <input name="email" type="text" class="form-control" placeholder="Email">
        <br>
        <label for="phone">Số điện thoại:</label>
        <br>
        <input name="phone" type="text" class="form-control" placeholder="Số điện thoại">
        <br>
        <label for="password">Mật khẩu:</label>
        <br>
        <input name="password" type="text" class="form-control" placeholder="Mật khẩu">
        <br>
        <label for="position">Vị trí công việc:</label>
        <br>
        <input name="position" type="text" class="form-control" placeholder="Vị trí công việc">
        <br>
        <button type="submit" class="btn btn-primary">Thêm mới</button>
    </form>
@endsection

@section('js')
    @parent
    <script>
        ClassicEditor
            .create( document.querySelector( '#editor' ) )
            .then( editor => {
                console.log( editor );
            } )
            .catch( error => {
                console.error( error );
            } );
    </script>
@endsection