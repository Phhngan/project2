@extends('layout.admin_base')

@section('title','Thêm hóa đơn nhập hàng')

@section('content')
    <h1 class="text-center">Tạo hóa đơn nhập hàng mới</h1>
    <form action="{{url('/admin/importInvoice/create')}}" method="POST">
        @csrf
        <br>
        <label for="unitId">Mã đơn vị cung cấp:</label>
        <br>
        <input name="unitId" type="text" class="form-control" placeholder="Mã đơn vị cung cấp">
        <br>
        <label for="userId">Mã người nhập:</label>
        <br>
        <input name="userId" type="text" class="form-control" placeholder="Mã người nhập">
        <br>
        <label for="importDate">Ngày nhập:</label>
        <br>
        <input name="importDate" type="date" class="form-control" placeholder="Ngày nhập">
        <br>
        <label for="importTotal">Tổng giá trị đơn nhập:</label>
        <br>
        <input name="importTotal" type="number" class="form-control" placeholder="Tổng tiền nhập">
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