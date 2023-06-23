@extends('layout.admin_base')

@section('title','Thêm mã giảm giá')

@section('content')
<h1 class="text-center">Tạo mã giảm giá mới</h1>
<form action="{{url('admin/voucher/create')}}" method="POST">
    @csrf
    <br>
    <label for="voucherName">Tên Voucher:</label>
    <br>
    <input name="voucherName" type="text" class="form-control" placeholder="Tên Voucher">
    <br>
    <label for="voucherImage">Link ảnh:</label>
    <br>
    <input name="voucherImage" type="text" class="form-control" placeholder="Link ảnh">
    <br>
    <label for="voucherDate">Ngày áp dụng:</label>
    <br>
    <input name="voucherDate" type="date" class="form-control" placeholder="Ngày áp dụng">
    <br>
    <label for="voucherDiscount">Giảm giá:</label>
    <br>
    <input name="voucherDiscount" type="number" class="form-control" placeholder="Giảm giá">
    <br>
    <label for="voucherMin">Tổng tiền áp dụng:</label>
    <br>
    <input name="voucherMin" type="number" class="form-control" placeholder="Tổng tiền áp dụng">
    <br>
    <button type="submit" class="btn btn-primary">Thêm mới</button>
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