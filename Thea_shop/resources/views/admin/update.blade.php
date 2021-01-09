@extends('template')

@section('content')
<div class="container">
    <div class="container mt-4 mb-4 col-12 d-inline-flex p-3 border">
  
        <div class="" style="width: 250px">
          <img src="{{ asset($tea->image) }}" alt="teaImage" style="width: 100%; height: auto">
        </div>
        
        <form class="col" method="post" action="/admin/updateButton/{{$tea->id}}" enctype="multipart/form-data">
          @csrf
          <div class="col-md-6 ml-4">
            <div class="col">
              <h1 class="mt-4 mb-4">Update Tea Details</h1>
            </div>

            <div class="row">
              <h5>Tea Name:</h5>
              <input type="text" class="form-control" value="{{$tea->name}}"  name="teaName" placeholder="Enter Name"><br>
              <h5>Tea Price:</h5>
              <input type="number" class="form-control" value="{{$tea->price}}" name="teaPrice" placeholder="Enter Price"><br>
              <h5>Tea Description:</h5>
              <input type="text" class="form-control" value="{{$tea->desc}}" name="teaDesc" placeholder="Enter Description"><br>
              <h5>Tea Stock:</h5>
              <input type="text" class="form-control" value="{{$tea->stock}}" name="teaStock" placeholder="Enter Stock"><br>
              <h5>Tea Image:</h5>
              <input type="file" value="{{$tea->image}}" class="form-control-file" name="image"><br><br>
            </div>

            <div class="error">
              @if($errors->any())
                  {{$errors->first()}}
              @endif
            </div>

            <div class="col">
              <button type="submit" class="btn btn-danger">
                {{ _('Update Tea')}}
              </button>
            </div>
          </form>
@endsection