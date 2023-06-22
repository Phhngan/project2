@extends('layout.admin_base')

@section('title','Thêm mã giảm giá')

@section('content')
<h1 class="text-center">Tạo mã giảm giá mới</h1>
    <form action="{{url('admin/news/create')}}" method="POST">
        @csrf
        <br>
        <label for="voucherId">Mã Voucher:</label>
        <br>
        <input name="voucherId" type="text" class="form-control" placeholder="Mã Voucher">
        <br>
        <label for="voucherName">Tên Voucher:</label>
        <br>
        <input name="voucherName" type="text" class="form-control" placeholder="Tên Voucher">
        <br>
        <label for="voucherDate">Ngày sử dụng:</label>
        <br>
        <input name="voucherDate" type="date" class="form-control" placeholder="Ngày sử dụng">
        <br>
        <label for="voucherDiscount">Số tiền giảm:</label>
        <br>
        <input name="voucherDiscount" type="number" class="form-control" placeholder="Số tiền giảm">
        <br>
        <label for="voucherMin">Số tối thiểu để áp dụng:</label>
        <br>
        <input name="voucherMin" type="number" class="form-control" placeholder="Số tối thiểu để áp dụng">
        <br>
        <label for="voucherDescription">Mô tả:</label>
        <br>
        <textarea id="editor" name="voucherDescription" type="text" class="form-control" placeholder="Mô tả"></textarea>
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