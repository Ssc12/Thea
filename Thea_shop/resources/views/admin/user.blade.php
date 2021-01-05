@extends('template')

@section('content')

<div class="container">
    <div class="row">
        @foreach ($user as $user)
        <div class="card m-4" style="width: 18rem;">
            <div class="card-body bg-success">
                <h5 class="card-title text-white">User ID: {{$user->id}}</h5>
            </div>

            <div class="card-body">
                <h5 class="card-name mt-4 mb-4">Name: {{$user->name}}</h5>
                <h5 class="card-email mt-4 mb-4">Email: {{$user->email}}</h5>
                <h5 class="card-address mt-4 mb-4">Address: {{$user->address}}</h5>
                <h5 class="card-phone mt-4 mb-4">Phone Number: {{$user->phone_number}}</h5>
                <h5 class="card-gender mt-4" >Gender: {{$user->gender}}</h5>
            </div>
        </div>  
        @endforeach 
    </div>
</div>     

@endsection