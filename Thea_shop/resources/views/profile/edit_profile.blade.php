@extends('template')

@section('content')

    <form role="form" method="POST" action="{{ url('/profile/save')}}" enctype="multipart/form-data" >
    {{ csrf_field() }}
        <div class="white-box flex">
            <div class="profile-pic">
                @if ($user->profile_pic == null)
                    <img src="{{asset('image/profile/profile.png')}}" alt="">
                @else
                    <img src="{{'/storage/'.asset($user->profile_pic)}}" alt="">
                @endif
                <input type="file" name="picture" accept=".jpg,.jpeg,.png" id="" class="">
            </div>
            <div class="profile">
                <div class="profile-info">
                    <div class="name">{{$user->name}}</div> 
                    <div></div><div></div>

                    <label for="">Email</label>
                    <label for="">:</label>
                    <input type="text" class="input" name="email" id="" value="{{$user->email}}">

                    <label for="">Date of Birth (YYYY-MM-DD)</label>
                    <label for="">:</label>
                    <input type="datetime" class="input" name="dob" id="" value="{{$user->dob}}">

                    <label for="">Gender</label>
                    <label for="">:</label>
                    <div class="gender_input">                  
                        <div class="one-line">
                            <input type="radio" name="gender" id="male" value="Male" {{ ($user->gender == "Male") ? 'checked' : ""}} >
                            <label for="male" class="radio-label">Male</label>
                        </div>
                        <div class="one-line">
                            <input type="radio" name="gender" id="female" value="Female" {{ ($user->gender == "Female") ? 'checked' : ""}} >
                            <label for="female" class="radio-label">Female</label>
                        </div>
                    </div>

                    <label for="">Address</label>
                    <label for="">:</label>
                    <input type="text" class="input" name="address" id="" value="{{$user->address}}">

                    <label for="">Phone number</label>
                    <label for="">:</label> 
                    <input type="text" class="input" name="phone_number" id="" value="{{$user->phone_number}}">
                </div>
                <div class="error">
                    @if($errors->any())
                        {{$errors->first()}}
                    @endif
                </div>
                <button type="submit" value="save" class="">Save</Button>
            </div>
        </div>
    </form>
@endsection