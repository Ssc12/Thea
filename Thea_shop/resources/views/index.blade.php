@extends('template')

@section('content')
    
    <div>
        <img class="img-fluid" src={{ asset('image/banner/banner.jpg') }} alt="">
    </div>

    <div class="mt-4"></div>

    <div>
        <div class ="Iheader">
          Produk Populer
        </div>
        <div class="Ibody">
            @foreach ($populars as $popular)
                <div class="ICard">

                    <a href= {{ route('tea_detail', ['tea'=>$popular->id]) }}>
                    <img  class="img-fluid" src= {{ asset($popular->image) }} alt="">
                    <div class="ICard-body">
                        <p>{{$popular->name}}</p>
                        <p>Rp.{{$popular->price}}</p>
                    </div>
                    <span>Click to view more</span>
                    </a>
                </div>
            @endforeach
        </div>

    </div>

    <div class="mt-4"></div>

    <div>
        <div class ="Iheader">
          Rekomendasi untuk kamu
        </div>
        <div class="Ibody">
            @foreach ($recommends as $recommend)
                <div class="ICard">
                    <a href= {{ route('tea_detail', ['tea'=>$recommend->id]) }}>
                        <img  class="img-fluid" src= {{ asset($recommend->image) }} alt="">
                        <div class="ICard-body">
                            <p>{{$recommend->name}}</p>
                            <p>Rp.{{$recommend->price}}</p>
                        </div>
                        <span>Click to view more</span>
                    </a>    
                </div>
            @endforeach
        </div>

    </div>
@endsection