@extends('layout.admin_base')

@section('title','Cập nhật nhân viên')

@section('content')
<h1 class="text-center">Cập nhật nhân viên</h1>
@foreach($users as $user)
<form action="{{url('/admin/employee/'.$user->id.'/edit')}}" method="POST">
    @csrf
    @method('put')
    <br>
    <label for="email">Mật khẩu:</label>
    <br>
    <input value="{{ $user->email  }}" name="email" type="text" class="form-control" placeholder="Email">
    <br>
    <label for="password">Mật khẩu:</label>
    <br>
    <input name="password" type="text" class="form-control" placeholder="Mật khẩu">
    <br>
    <label for="position">Vị trí công việc:</label>
    <br>
        <?php
             $positions = DB::table('PositionTypes')
                ->select('PositionTypes.*')
                ->get();
          ?>
	<select class="form-control" id="" name="position" required>
  <option value="{{$user->pos_id}}" selected="selected">----{{$user->pos_name}}----</option>
			@foreach($positions as $position)
<option value="{{ $position->pos_id}}">{{ $position->pos_name}}</option>
@endforeach
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