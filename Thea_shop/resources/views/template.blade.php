<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Thea Shop</title>

    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <link rel="stylesheet" href="{{asset('css/app.css')}}">

</head>
<body class="body">
    
    <header class="header">
        <div class="nav">
            <div class="logo">
                <a href="{{url('/')}}">
                    <img src="{{asset("image/logo/thea.png")}}" alt="">
                </a>
            </div>
            <div class="search">
                <form class="form-inline my-2 my-lg-0 center-row" method="GET" action="{{ url('/') }}">
                    <input class="form-control" type="text" name="q" placeholder="Search Here" style="width:500px; margin-right:10px;"> 
                    <button class="btn btn-primary" type="submit">Search</button>
                </form>
            </div>
            <div class="nav-bar">
                <ul>
                    <li class="first">
                        <a href="{{url('/')}}" class="link">Login</a>
                    </li>
                    <li>
                        <a href="{{url('/')}}" class="link">Register</a>
                    </li>
                </ul>
            </div>
        </div>
    </header>

    <div class="content">
        @yield('content')
    </div>
</body>
</html>