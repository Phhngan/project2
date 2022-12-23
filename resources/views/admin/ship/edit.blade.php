@extends('layout.admin_base')

@section('title','Cập nhật shipping')

@section('content')
<h1 class="text-center">Cập nhật </h1>
<form action="{{url('/admin/ship/edit')}}" method="POST">
    @csrf
    @method('put')
    <br>
    <label for="ship">Miền ship:</label>
    <br>
    <input value="{{ $region->reg_ship }}" name="ship" type="text" class="form-control" placeholder="Miền ship">
    <br>
    <label for="shipExtra">Phí ship extra:</label>
    <br>
    <input value="{{ $region->$reg_ship_extra }}" name="shipExtra" type="text" class="form-control" placeholder="Phí ship extra">
    <br>
    <label for="shipTime">Thời gian ship:</label>
    <br>
    <input value="{{ $region->$reg_ship_time }}" name="shipTime" type="number" class="form-control" placeholder="Thời gian ship">
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