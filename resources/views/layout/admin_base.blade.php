@extends('adminlte::page')
@section('css')
    <link rel="stylesheet" href="{{url('/css/admin_custom.css')}}">
    <link rel="shortcut icon" type="image/png" href="https://github.com/Phhngan/snack_images/blob/master/logo/logo1.png?raw=true"/>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/4.2.0/chart.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs5/jq-3.6.0/dt-1.13.1/datatables.min.css"/>
@endsection

@section('js')
<script type="text/javascript" src="https://cdn.datatables.net/v/bs5/jq-3.6.0/dt-1.13.1/datatables.min.js"></script>

<script>
$(document).ready( function () {
    $('#myTable').DataTable();
} );
// $('#myTable').dataTable( {
//     "paging": false
// } );
</script>
@endsection
