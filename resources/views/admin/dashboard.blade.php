@extends('layout.admin_base')

@section('title', 'Admin Dashboard')
@section('style')

@endsection

@section('content')

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