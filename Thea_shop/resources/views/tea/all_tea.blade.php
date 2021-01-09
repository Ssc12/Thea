@extends('template')

@section('content')
    <div class="Icontainer">
        @foreach ($teas as $tea)
        <div class="ICard">
            <a href= {{ route('tea_detail', ['tea'=>$tea->id]) }}>
                <img  class="img-fluid" src={{ asset($tea->image) }} alt="">
                <div class="ICard-body">
                    <p>{{$tea->name}}</p>
                    <p>Rp.{{$tea->price}}</p>
                </div>
            </a>    
        </div>
        @endforeach
    </div>
    <div style="float:right">
        {{ $teas->links() }}
    </div>

@endsection