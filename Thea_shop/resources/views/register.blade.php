<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register</title>

    <link rel="stylesheet" href="{{asset('css/style.css')}}">
</head>
<body class="body">
    <div class="green-bg">
        <div class="logo">
            <img src="{{asset("image/logo/thea.png")}}" alt="">
        </div>
        <div class="center">
            <div class="info">
                <img src="{{asset("image/infografis/infografis.png")}}" alt="">
            </div>
            <div class="register">
                <form role="form" method="POST" action="{{ url('/register') }}">
                {{ csrf_field() }}
                    <div class="title">
                        Register
                    </div>
                    <div>
                        <div class="label">
                            Name
                        </div>
                        <input type="text" name="username" id="" class="input" value="{{old('username')}}">
                    </div>
                    <div>
                        <div class="label">
                            Email
                        </div>
                        <input type="text" name="email" id="" class="input" value="{{old('email')}}">
                    </div>
                    <div>
                        <div class="label">
                            Phone Number
                        </div>
                        <input type="text" name="phone_number" id="" class="input" value="{{old('phone_number')}}">
                    </div>
                    <div>
                        <div class="label">
                            Password
                        </div>
                        <input type="password" name="password" id="" class="input" value="{{old('password')}}">
                    </div>
                    <div class="regulations">By registering, I agree to the terms and conditions and Privacy Policy.
                    </div>
                    <div class="button">
                        <button type="submit" value="register" class="">Register</Button>
                    </div>
                    <div class="error">
                        @if($errors->any())
                            {{$errors->first()}}
                        @endif
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>