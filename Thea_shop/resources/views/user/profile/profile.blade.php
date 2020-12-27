@extends('template')

@section('content')
    <div class="white-box flex">
        <div class="profile-pic">
            @if ($user->profile_pic == null)
                <img src="{{asset('image/profile/profile.png')}}" alt="">
            @else
                <img src="{{asset('/storage/'.$user->profile_pic)}}" alt="">
            @endif
        </div>
        <div class="profile">
            <div class="profile-info">
                <div class="name">{{$user->name}}</div> 
                <div></div><div></div>

                <label for="">Email</label>
                <label for="">:</label>
                <div class="email">{{$user->email}}</div>

                <label for="">Date of Birth</label>
                <label for="">:</label>
                <div class="dob">{{$user->dob}}</div>

                <label for="">Gender</label>
                <label for="">:</label>
                <div class="gender">{{$user->gender}}</div>

                <label for="">Address</label>
                <label for="">:</label>
                <div class="address">{{$user->address}}</div>

                <label for="">Phone number</label>
                <label for="">:</label> 
                <div class="phone">{{$user->phone_number}}</div>
            </div>
            <input type="button" value="Edit" onclick="editProfile()">
        </div>
    </div>

    <script>
        function editProfile(){
            window.location.href = '/profile/edit';
        }
    </script>
@endsection