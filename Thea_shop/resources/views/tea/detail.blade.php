@extends('template')

@section('content')
  
    <div class="DetailContainer">
        <div class="row">
            <div class="col-md-6">
                <div class="detail-img">
                    <img class="img-fluid" src={{ asset($tea->image) }} alt="">
                </div>
            </div>
            <div class="col-md-6">
                
            <div class="detail-content"> 
                <div class="detail-name">
                    {{$tea->name}}
                </div>

                <div>
                    @if ($rating == 0)
                        No rating yet
                    @else
                        @for ($i = 0; $i < $rating; $i++)
                            <img style="width:50px; height:50px" src={{ asset('image/rating/star.png') }} alt="">
                        @endfor 
                    @endif
                </div>

                 <div class = "mt-3">
                    Price : Rp.{{$tea->price}}
                </div>

                <div class = "mt-3">
                    Stock : {{$tea->stock}}
                </div>

                @if (Auth::check() && Auth::user()->role_id == 1)
                    <div class="mt-3">
                        <form method="POST" action="{{ url('/cart/add/tea/'.$tea->id) }}" role="form">
                            {{ csrf_field() }}
                            <div class="form-group d-flex">
                                <div>
                                    <label for="">Quantity : </label>
                                </div>
                                <div class="ml-3">
                                    <input type="number" name="qty" id="" class="form-control @error('qty') is-invalid @enderror">
                                        @error('qty')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>       
                                        @enderror
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary">Add to Cart</button>

                        </form>
                    </div>
                @endif

                @if (Auth::check() && Auth::user()->role_id == 2)
                    <div class="mt-3">
                            @csrf
                            <div>
                                <a href="/admin/update/{{$tea->id}}">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Update Tea') }}
                                    </button>
                                  </a>

                                  <a href="/admin/deleteButton{{$tea->id}}">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Delete Tea') }}
                                    </button>
                                  </a>
                            </div>
                    </div>
                @endif


            </div>
                   
            </div>
        </div>

        <div class="descContainer">
                <h3>Description :</h3>
                {{$tea->description}}
        </div>
    </div>

    <div class="commentContainer">
        <h3>Comment : </h3>
        
        @if (Auth::user())
            <div class="submitComment">
                <form role="form" method="POST" action="{{ url('tea/'.$tea->id.'/comment') }}">
                {{ csrf_field() }}
                    
                    <div>
                        Rating
                        <input type="number" name="rating" id="" min="1" max="5">
                    </div>
                    <div>
                        <div class="label">
                            Comment :
                        </div>
                        <textarea name="comment" id="" cols="119" rows="4"></textarea>
                    </div>
                    <button type="submit" value="Login" class="">Comment</Button>
                </form>
            </div>
        @endif

        @if ($reviews->count() == 0)
            There is no comment yet
        @else
            @foreach ($reviews as $review)
                <div>
                    <div class="comment-header">
                        <div class="review-profile">
                            @if ($review->profile_pic == null)
                                <img src="{{asset('image/profile/profile.png')}}" alt="">
                            @else
                                <img src="{{asset('/storage/'.$review->profile_pic)}}" alt="">
                            @endif
                        </div>

                        <div>
                            {{$review->name}} <span class='text text-secondary date'>{{$review->pivot->created_at->format('d M Y')}}</span>
                        </div>
                    </div>
                    <div >
                        {{$review->pivot->review}}
                    </div>
                </div>
            @endforeach
        @endif
    </div>

@endsection