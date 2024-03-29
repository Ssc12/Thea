@extends('template')

@section('content')
    @foreach ($order->Detail as $detail)
        <div class="detail-box">
            <div class="img">
                <img src="{{asset($detail->image)}}" alt="">
            </div>
            <div class="info">                
                <div>Name : {{$detail->name}}</div>
                <div>Price(1 unit) : Rp. {{$detail->price}}</div>
                <div>Quantity : {{$detail->pivot->quantity}} </div>
                <div>Total : Rp. {{$detail->price * $detail->pivot->quantity}}</div>
            </div>
        </div>
    @endforeach
    <div class="total_price">
        Total : Rp. {{$order->total_price}}
    </div>
@endsection