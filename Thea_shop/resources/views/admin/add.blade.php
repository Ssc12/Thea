@extends('template')

@section('content')

<div class="container">
    <div class="container mt-4 mb-4 col-12 p-3 border">

        <form action="/admin/addButton" class="col" method="post" enctype="multipart/form-data">
            @csrf
            
            <div class="col">
                <h1 class="mt-4 mb-4">Add New Tea</h1>
            </div>
            
            <div class="row">
                <h5>Tea Name:</h5>
                <input type="text" class="form-control" id="teaName" name="teaName" placeholder="Enter Name" value="{{old('teaName')}}"><br>
                <h5>Tea Price:</h5>
                <input type="number" class="form-control" id="teaPrice" name="teaPrice" placeholder="Enter Price" value="{{old('teaPrice')}}"><br>
                <h5>Tea Description:</h5>
                <input type="text" class="form-control" id="teaDesc" name="teaDesc"  placeholder="Enter Description" value="{{old('teaDesc')}}"><br>
                <h5>Tea Stock:</h5>
                <input type="text" class="form-control" id="teaStock" name="teaStock"  placeholder="Enter Stock" value="{{old('teaStock')}}"><br><br>
                <h5>Tea Image:</h5>
                <input type="file" name="image"><br><br>
            </div>

            <div class="error">
                @if($errors->any())
                    {{$errors->first()}}
                @endif
            </div>
             
            <div class="col">
                <button type="submit" class="btn btn-danger">
                    {{ __('Add Tea') }}
                </button>
            </div>
        </form>
    </div>
</div>
@endsection