@extends('template')

@section('content')
    <h1>Cart</h1>

    @foreach ($carts as $cart)
        <h1>{{$cart->tea_id}}</h1>
        <h1>{{$cart->pivot->quantity}}</h1>
        <br>
    @endforeach
@endsection