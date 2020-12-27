@extends('template')

@section('content')
    @foreach ($transactions as $transaction)
        <a href="/history/{{$transaction->id}}" class="link" style="color:#000; text-align: left">
            {{$transaction->created_at}}
        </a>
    @endforeach
@endsection