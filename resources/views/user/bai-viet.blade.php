@extends('layout.base_page')

@section('title','Sale mùa thu')

@section('style')
#banner-tintuc{
width: 650px;
height: auto;
margin-left: auto;
margin-right: auto;
display: flex;
}

@endsection

@section('content')
@forelse($news as $new)
<div class="cf-title">
    <h3>{{$new->new_title}}</h3>
</div>
<div>
    <h5 style="text-align:center;">Ngày viết: {{$new->new_day}}</h5>
</div>
<img id="banner-tintuc" src="/storage/{{substr($new->new_image, 7)}}">
<br>
<div class="bai-viet">
    {!!$new->new_content!!}
</div>
@empty
<h3>Không có tin tức </h3>
@endforelse
@endsection


@section('js')
@parent

@endsection