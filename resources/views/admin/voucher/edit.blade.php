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
    <input value="{{$voucher->vou_title}}" name="voucherName" type="text" class="form-control" placeholder="Tên Voucher" required>
    <br>
    <label for="voucherImage">Ảnh voucher:</label>
    <br>
    <img id="imagePreview" src="/storage/{{substr($voucher->vou_image, 7)}}" width="200px">
    <input accept="image/*" type="file" name="voucherImage" onchange="previewImage(event)">
    <br><br>
    <label for="voucherDate">Ngày áp dụng:</label>
    <br>
    <input value="{{$voucher->vou_day}}" name="voucherDate" type="date" class="form-control" placeholder="Ngày áp dụng" required>
    <br>
    <label for="voucherDiscount">Giảm giá (VND):</label>
    <br>
    <input value="{{$voucher->vou_discount}}" name="voucherDiscount" type="number" class="form-control" placeholder="Giảm giá" required>
    <br>
    <label for="voucherMin">Tổng tiền áp dụng (VND):</label>
    <br>
    <input value="{{$voucher->vou_min}}" name="voucherMin" type="number" class="form-control" placeholder="Tổng tiền áp dụng" required>
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
<script>
    function previewImage(event) {
        var input = event.target;
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                document.getElementById("imagePreview").src = e.target.result;
            };
            reader.readAsDataURL(input.files[0]);
        }
    }
</script>
@endsection