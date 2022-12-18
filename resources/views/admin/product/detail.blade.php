@extends('layout.admin_base')

@section('title','Chi tiết sản phẩm')

@section('content')

    @if($product == null)
        <h2>Sản phẩm không tồn tại</h2>

    @else

        <table class="table table-bordered">
            <tr>
                <td>
                    <h2>{{ $product->name  }}</h2>
                    <img src="{{ $product->image  }}" width="300px">
                    <br>
                    <h3>{{ $product->price }}</h3>
                </td>
                <td>
                    {!! $product->description !!}
                </td>
            </tr>

        </table>

    @endif

@endsection