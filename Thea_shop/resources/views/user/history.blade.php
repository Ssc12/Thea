@extends('template')

@section('content')
    @foreach ($transactions as $transaction)
        @if($loop->last)
            <div class="history-block last-history-block">
                <a href="/history/{{$transaction->id}}" class="link" style="color:#000; text-align: left">
                    {{$transaction->created_at}}
                </a>
            </div>
        @else
            <div class="history-block">
                <a href="/history/{{$transaction->id}}" class="link" style="color:#000; text-align: left">
                    {{$transaction->created_at}}
                </a>
            </div>
        @endif
    @endforeach
@endsection