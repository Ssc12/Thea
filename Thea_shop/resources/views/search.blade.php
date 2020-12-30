@extends('template')

@section('content')

    @if ($teas->count() == 0)
        <div style="height: 100px; border: 1px solid black;">
            <h1 style="line-height: 100px">Item not found</h1>
        </div> 
    @else
    <div class="Icontainer">
        @foreach ($teas as $tea)
        <div class="ICard">
            <a href= {{ route('tea_detail', ['tea'=>$tea->id]) }}>
                <img  class="img-fluid" src= {{ asset($tea->image) }} alt="">
                <div class="ICard-body">
                    <p>{{$tea->name}}</p>
                    <p>Rp.{{$tea->price}}</p>
                </div>
                <span>Click to view more</span>
            </a>    
        </div>
        @endforeach
    </div>
    @endif

@endsection