@extends('layout.admin_base')

@section('title','Cập nhật hóa đơn nhập')

@section('content')
<h1 class="text-center">Cập nhật hóa đơn nhập</h1>
@foreach($importInvoices as $importInvoice)
<form action="{{url('/admin/importInvoice/'.$importInvoice->imp_id.'/edit')}}" method="POST">
    @csrf
    @method('put')
    <br>
        <label for="unitId">Đơn vị cung cấp:</label>
        <br>
        <?php
             $supplyunits = Illuminate\Support\Facades\DB::table('Supplyunits')
                ->select('Supplyunits.*')
                ->get();
          ?>
	    <select class="form-control" id="" name="unitId" required>
        <option value="{{$importInvoice->unit_id}}" selected="selected">----{{ $importInvoice->unit_name }}----</option>
			@foreach($supplyunits as $supplyunit)
        <option value="{{ $supplyunit->unit_id }}">{{ $supplyunit->unit_name }}</option>
            @endforeach
	    </select>
        <br>
        <label for="userId">Tên người nhập:</label>
        <br>
        <?php
             $users = Illuminate\Support\Facades\DB::table('Users')
                ->select('Users.*')->where('Users.pos_id', '>', 1)
                ->get();
          ?>
	    <select class="form-control" id="" name="userId" required>
        <option value="{{$importInvoice->unit_id}}" selected="selected">----{{$importInvoice->use_lastName}} {{$importInvoice->name}}----</option>
			@foreach($users as $user)
        <option value="{{ $user->id }}">{{ $user->use_lastName }} {{ $user->name }}</option>
            @endforeach
	    </select>
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
@endforeach
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