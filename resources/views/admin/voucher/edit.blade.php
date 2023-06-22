@extends('layout.admin_base')

@section('title','Sửa mã giảm giá')

@section('content')
<h1 class="text-center">Cập nhật mã giảm giá</h1>
    <form action="" method="POST">
        @csrf
        @method('put')
        <br>
        <label for="voucherId">Mã Voucher:</label>
        <br>
        <input value="" name="voucherId" type="text" class="form-control"
               placeholder="Mã Voucher">
        <br>
        <label for="voucherName">Tên Voucher:</label>
        <br>
        <input value="" name="voucherName" type="text" class="form-control"
               placeholder="Tên Voucher:">
        <br>
        <label for="voucherDate">Ngày sử dụng:</label>
        <br>
        <input value="" name="voucherDate" type="date" class="form-control"
               placeholder="Ngày sử dụng">
       <br>
       <label for="voucherDiscount">Số tiền giảm:</label>
        <br>
        <input value="" name="voucherDiscount" type="number" class="form-control"
               placeholder="Số tiền giảm">
       <br>
       <label for="voucherMin">Số tối thiểu để áp dụng:</label>
        <br>
        <input value="" name="voucherMin" type="number" class="form-control"
               placeholder="Số tối thiểu để áp dụng">
       <br>
        <label for="voucherDescription">Mô tả:</label>
        <br>
        <textarea id="editor" value="" name="voucherDescription" type="text" class="form-control"
               placeholder="Mô tả"></textarea>
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