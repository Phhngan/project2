@extends('layout.admin_base')

@section('title','Cập nhật hóa đơn nhập')

@section('content')
<h1 class="text-center">Cập nhật hóa đơn nhập</h1>
<form action="{{url('/admin/importInvoice/{imp_id}/edit')}}" method="POST">
    @csrf
    @method('put')
    <br>
        <label for="unitId">Mã đơn vị cung cấp:</label>
        <br>
        <input value="{{$importInvoice->imp_id}}" name="unitId" type="text" class="form-control" placeholder="Mã đơn vị cung cấp">
        <br>
        <label for="userId">Tên người nhập:</label>
        <br>
        <input value="{{$importInvoice->use_id}}" name="userId" type="text" class="form-control" placeholder="Tên người nhập">
        <br>
        <label for="importDate">Ngày nhập:</label>
        <br>
        <input value="{{$importInvoice->imp_date}}" name="importDate" type="date" class="form-control" placeholder="Ngày nhập">
        <br>
        <label for="importTotal">Tổng giá trị đơn nhập:</label>
        <br>
        <input value="{{$importInvoice->imp_total}}" name="importTotal" type="number" class="form-control" placeholder="Tổng tiền nhập">
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