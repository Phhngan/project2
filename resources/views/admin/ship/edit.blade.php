@extends('layout.admin_base')

@section('title','Cập nhật shipping')

@section('content')
<h1 class="text-center">Cập nhật tiền ship</h1>
<form action="{{url('/admin/ship/'.$ship_id.'/edit')}}" method="POST">
    @csrf
    @method('put')
    <br>
    <label for="ship">Tiền ship:</label>
    <br>
    <input value="{{ $ship->ship_price }}" name="ship" type="number" class="form-control" placeholder="Tiền ship" required>
    <br>
    <label for="shipExtra">Phí ship extra:</label>
    <br>
    <input value="{{ $ship->ship_extra }}" name="shipExtra" type="number" class="form-control" placeholder="Phí ship extra" required>
    <br>
    <label for="shipTime">Thời gian ship:</label>
    <br>
    <input value="{{ $ship->ship_time }}" name="shipTime" type="number" class="form-control" placeholder="Thời gian ship" required>
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