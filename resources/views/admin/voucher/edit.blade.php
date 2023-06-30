@extends('layout.admin_base')

@section('title','Sửa mã giảm giá')

@section('content')
<h1 class="text-center">Cập nhật mã giảm giá</h1>
<form action="{{url('admin/voucher/'.$voucher->vou_id.'/edit')}}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('put')
    <br>
    <label for="voucherName">Tên Voucher:</label>
    <br>
    <input value="{{$voucher->vou_title}}" name="voucherName" type="text" class="form-control" placeholder="Tên Voucher">
    <br>
    <label for="voucherImage">Ảnh voucher:</label>
    <br>
    <!-- <input value="{{$voucher->vou_image}}" name="voucherImage" type="text" class="form-control" placeholder="Link ảnh">
    <br> -->
    <img src="/storage/{{substr($voucher->vou_image, 7)}}" width="100px">
    <input type="file" name="voucherImage">
    <br><br>
    <label for="voucherDate">Ngày áp dụng:</label>
    <br>
    <input value="{{$voucher->vou_day}}" name="voucherDate" type="date" class="form-control" placeholder="Ngày áp dụng">
    <br>
    <label for="voucherDiscount">Giảm giá:</label>
    <br>
    <input value="{{$voucher->vou_discount}}" name="voucherDiscount" type="number" class="form-control" placeholder="Giảm giá">
    <br>
    <label for="voucherMin">Tổng tiền áp dụng:</label>
    <br>
    <input value="{{$voucher->vou_min}}" name="voucherMin" type="number" class="form-control" placeholder="Tổng tiền áp dụng">
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