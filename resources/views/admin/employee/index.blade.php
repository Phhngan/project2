@extends('layout.admin_base')

@section('title','Quản lí nhân viên')

@section('content')
    <a class="btn btn-primary" href="{{url('/admin/employee/create')}}" role="button">+ Thêm nhân viên</a>
    <table class="table">
        <tr>
            <th>Mã nhân viên</th>
            <th>Họ</th>
            <th>Tên</th>
            <th>Ngày sinh</th>
            <th>Giới tính</th>
            <th>Email</th>
            <th>Số điện thoại</th>
            <th>Vị trí làm việc</th>
            <th>Hành động</th>

        </tr>
        @forelse($users as $user)
            <tr>
                <td>
                    <p>{{$user->id}}</p>
                </td>
                <td>
                    <p>{{$user->use_lastName}}</p>
                    
                </td>
                <td>
                    <p>{{$user->name}}</p>
                </td>
                <td>
                    <p>{{$user->use_birth}}</p>
                </td>
                <td>
                    <p>{{$user->use_gender}}</p>
                </td>
                <td>
                    <p>{{$user->email}}</p>
                </td>
                <td>
                    <p>{{$user->use_phone}}</p>
                </td>
                <td>
                    <p>{{$user->pos_id}}</p>
                </td>
                <td>
                    <a class="btn btn-outline-primary" href="{{url('/admin/employee/edit')}}" role="button">Sửa</a>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="3">Danh sach rong</td>
            </tr>
        @endforelse
    </table>
@endsection