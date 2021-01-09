@extends('template')

@section('content')

    @if(sizeof($carts)>0)
        <h1 style="text-align: left">My Cart</h1>

        <div class="main-grid-container">
            
            <div style="border: 1px solid; padding:5px;">
                <form method="POST" action="{{ url('/cart/deleteAll/') }}" role="form">
                    {{ csrf_field() }}
                    <button class="btn btn-danger" value="Delete All" type="submit" style="margin-right:610px;">Remove All From Cart</button> 
                </form>
            </div>

            <div class="cart-list">
            @foreach ($carts as $cart)
                <div class="cart-grid-container">
                    <div class="cart-image">
                        <img src="{{asset('/'.$cart->image)}}" alt="">
                    </div>

                    <div class="cart-description">
                        <h4>{{$cart->name}}</h4>
                        <p>Rp.{{$cart->price}} / pack(50 gr)</p>
                        
                        <form  method="POST" action="{{ url('/cart/update/tea/'.$cart->id) }}" role="form">
                            {{ csrf_field() }}
                            <div class="cart-qty-container">  
                                <p style="margin-right: 20px; margin-top:5px">Quantity :</p>   
                                <input type="number" name="qty" id="" value={{$cart->pivot->quantity}}>
                                <button class="btn btn-primary" value="Update Cart Quantity" type="submit" style="margin-left: 20px">Update Quantity</button> 
                            </div>  
                        </form> 

                        <br>
                        <form method="POST" action="{{ url('/cart/delete/tea/'.$cart->id) }}" role="form">
                            {{ csrf_field() }}
                            <button class="btn btn-danger" value="Delete from Cart" type="submit">Remove</button>
                        </form>
                    </div>  
                </div> 
            @endforeach
            @if($errors->any())
            {{$errors->first()}}          
             @endif   
            </div>

            <div class="checkout-sidebar">

                <div class="cart-total">
                    <div class="cart-total-header"><h4>Total Transaction</h4></div>
                    <div style="margin-top: 5px;"><p>Total Price Rp.{{$total}}</p></div>

                    <form method="POST" action="{{ url('/cart/checkout/') }}" role="form">
                        {{ csrf_field() }}
                        <button class="btn btn-dark" value="Checkout Cart" type="submit" style="width: 200px; margin-bottom: 5px;">Checkout</button> 
                    </form> 
                </div>
            </div>
        </div>
    @else
         <img src="{{asset("/image/logo/empty_cart.png")}}" alt="">
    @endif
@endsection