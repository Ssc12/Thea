@extends('template')

@section('content')
<div class="container">
    <div class="container mt-4 mb-4 col-12 d-inline-flex p-3 border">

       <div class="" style="width: 250px">
       <img src="{{ url('image/' . $tea->image) }}" alt="Tea" style="width: 100%; height: auto">
       </div>

       <div class="col-md-6 ml-4">
        <h1>{{$tea->name}}</h1><br>
        <h5>{{$tea->price}}</h5><br>
        <h5>{{$tea->desc}}</h5><br>
        <h5>{{$tea->stock}}</h5><br>
        
        <div>
        <form action="/admin/deleteButton/{{$tea->tea_id}}" method="POST">
            @csrf
            <button type="submit" class="btn btn-danger">
                {{ __('Delete Tea') }}
            </button>
            </form>
        </div>
@endsection