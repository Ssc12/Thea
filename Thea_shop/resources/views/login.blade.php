    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Login</title>

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
                <div class="login">
                    <form role="form" method="POST" action="{{ route('login') }}">
                    {{ csrf_field() }}
                        <div class="title">
                            Login
                        </div>
                        <div>
                            <div class="label">
                                Email
                            </div>
                            <input type="text" name="email" id="" class="input">
                        </div>
                        <div>
                            <div class="label">
                                Password
                            </div>
                            <input type="password" name="password" id="" class="input">
                        </div>
                        <div class="button">
                            <button type="submit" value="Login" class="">Login</Button>
                        </div>
                        <div class="reg">
                            Belum punya akun? 
                            <a href="{{url('/register')}}">Daftar sini</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>