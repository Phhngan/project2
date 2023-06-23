@extends('layout.admin_base')

@section('title','Chi tiết tin tức')

@section('content')

<h2 class="text-center">Bài viết: {{$new->new_title}}</h2><br>
<h5 style="color:grey;">Ngày viết: {{$new->new_day}}</h5>
<img src="{{$new->new_image}}" width="100px">
<div class="tintuc">
    <h5>Nội dung:</h5>
    {{$new->new_content}}
</div>
@endsection