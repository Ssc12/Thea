@extends('template')

@section('content')
    
    <div>
        <img class="img-fluid" src={{ asset('image/banner/banner.jpg') }} alt="">
    </div>

    <div class="mt-4"></div>

    <div>
        <div class ="Iheader">
          Popular Products
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
          Recommend for You
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

    <div>
        <form class="" style="margin: 20px 0; float:right" method="GET" action="{{ route('view_all') }}">
            <button class="btn btn-success" type="submit">View All</button>
        </form>
    </div>
@endsection