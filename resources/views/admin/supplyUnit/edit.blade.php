@extends('layout.admin_base')

@section('title','Cập nhật đơn vị cung cấp')

@section('content')
    <h1 class="text-center">Cập nhật đơn vị cung cấp</h1>
    <form action="{{url('admin/supplyUnit/'.$supplyUnit->unit_id.'/edit')}}" method="POST">
        @csrf
        @method('put')
        <br>
        <input value="{{ $supplyUnit->unit_code  }}" name="unitCode" type="text" class="form-control"
               placeholder="Mã đơn vị">
        <br>
        <input value="{{ $supplyUnit->unit_name }}" name="unitName" type="text" class="form-control"
               placeholder="Tên đơn vị">
        <br>
        <input value="{{$supplyUnit->unit_email }}" name="unitEmail" type="text" class="form-control"
               placeholder="Email">
        <br>
        <input value="{{$supplyUnit->unit_phone}}" name="unitPhone" type="text" class="form-control"
               placeholder="Số điện thoại">
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