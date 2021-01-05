@extends('template')

@section('content')

<div class="container">
    <div class="card bg-danger text-white" style="width: 70rem;">
        <div class="card-body">
            <h5 class="card-name">Transaction at: {{$transaction->created_at}}</h5>
            <h5 class="card-email">User ID: {{$transaction->user_id}}</h5>
            <h5 class="card-address">Username: {{$transaction->user->name}}</h5>
            <a href="/transaction/detail/admin/{{$transaction->id}}" class=" stretched-link"></a>
        </div>
    </div>  
</div>

@endsection