@extends('layout.base_page')

@section('title','Giỏ hàng')

@section('content')
<h2 class="text-center">Giỏ hàng</h2>
<div class="col-25">
    <div class="container-cart">
      <h4>Cart <span class="price" style="color:black"><i class="fa fa-shopping-cart"></i> <b>4</b></span></h4>
      <p><a href="#">Product 1</a> <span class="price">$15</span></p>
      <p><a href="#">Product 2</a> <span class="price">$5</span></p>
      <p><a href="#">Product 3</a> <span class="price">$8</span></p>
      <p><a href="#">Product 4</a> <span class="price">$2</span></p>
      <hr>
      <p><span class="tien-ship">$2</span></p>
      <hr>
      <p>Total <span class="price" style="color:black"><b>$30</b></span></p>
    </div>
    <a class="btn btn-primary" href="/checkout" role="button">Check out</a>
  </div>

@endsection

@section('js')
@parent

@endsection