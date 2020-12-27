@extends('template')

@section('content')
    @foreach ($order->Detail as $detail)
        <img src="{{asset($detail->image)}}" alt="" style="width:250px; height:auto">
        {{$detail->name}}
        {{$detail->price}}
        {{$detail->pivot->quantity}}
    @endforeach
@endsection