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
                            Nama
                        </div>
                        <input type="text" name="username" id="" class="input">
                    </div>
                    <div>
                        <div class="label">
                            Email
                        </div>
                        <input type="text" name="email" id="" class="input">
                    </div>
                    <div>
                        <div class="label">
                            Nomor Telepon
                        </div>
                        <input type="text" name="phone_number" id="" class="input">
                    </div>
                    <div>
                        <div class="label">
                            Password
                        </div>
                        <input type="password" name="password" id="" class="input">
                    </div>
                    <div class="regulations">Dengan mendaftar, saya menyetujui Syarat dan Ketentuan serta Kebijakan Privasi.
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