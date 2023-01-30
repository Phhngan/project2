@extends('layout.admin_base')

@section('title','Thêm hóa đơn nhập hàng')

@section('content')
    <h1 class="text-center">Tạo hóa đơn nhập hàng mới</h1>
    <form action="{{url('/admin/importInvoice/create')}}" method="POST">
        @csrf
        <br>
        <label for="unitId">Đơn vị cung cấp:</label>
        <br>
        <?php
             $supplyunits = DB::table('Supplyunits')
                ->select('Supplyunits.*')
                ->get();
          ?>
	    <select class="form-control" id="" name="unitId" required>
        <option value="" selected="selected">----Chọn đơn vị cung cấp----</option>
			@foreach($supplyunits as $supplyunit)
        <option value="{{ $supplyunit->unit_id }}">{{ $supplyunit->unit_name }}</option>
            @endforeach
	    </select>
        <br>
        <label for="userId">Người nhập:</label>
        <br>
        <?php
             $users = DB::table('Users')
                ->select('Users.*')->where('Users.pos_id', '>', 1)
                ->get();
          ?>
	    <select class="form-control" id="" name="userId" required>
        <option value="" selected="selected">----Chọn người nhập----</option>
			@foreach($users as $user)
        <option value="{{ $user->id }}">{{ $user->use_lastName }} {{ $user->name }}</option>
            @endforeach
	    </select>
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