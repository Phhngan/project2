@extends('layout.admin_base')

@section('title','Thêm đơn vị cung cấp')

@section('content')
    <h1 class="text-center">Thêm đơn vị cung cấp</h1>
    <form action="{{url('admin/supplyUnit/create')}}" method="POST">
        @csrf
        <br>
        <label for="unitCode">Mã đơn vị:</label>
        <br>
        <input name="unitCode" type="text" class="form-control" placeholder="Mã đơn vị">
        <br>
        <label for="unitName">Tên đơn vị:</label>
        <br>
        <input name="unitName" type="text" class="form-control" placeholder="Tên đơn vị">
        <br>
        <label for="unitEmail">Email:</label>
        <br>
        <input name="unitEmail" type="text" class="form-control" placeholder="Email">
        <br>
        <label for="unitPhone">Số điện thoại:</label>
        <br>
        <input name="unitPhone" type="number" class="form-control" placeholder="Số điện thoại">
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