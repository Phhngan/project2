@extends('layout.admin_base')

@section('title','Quản lí nhân viên')

@section('content')
    <br>
    <a class="btn btn-primary" href="{{url('/admin/employee/create')}}" role="button">+ Thêm nhân viên</a>
    <br>
    <br>
    <table class="table">
        <tr>
            <th>Họ và tên</th>
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
                    <p>{{$user->use_lastName}} {{$user->name}}</p>
                    
                </td>
                <td>
                    <p>{{$user->use_birth}}</p>
                </td>
                <td>
                    <p>
                        <?php if($user->use_gender == 1) {
                            echo "Nam";
                        } else {
                            echo "Nữ";
                        }?>
                    </p>
                </td>
                <td>
                    <p>{{$user->email}}</p>
                </td>
                <td>
                    <p>{{$user->use_phone}}</p>
                </td>
                <td>
                    <p>{{$user->pos_name}}</p>
                </td>
                <td>
                    <a class="btn btn-outline-primary" href="{{url('/admin/employee/'.$user->id.'/edit')}}" role="button">Sửa</a>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="3">Danh sach rong</td>
            </tr>
        @endforelse
    </table>
@endsection