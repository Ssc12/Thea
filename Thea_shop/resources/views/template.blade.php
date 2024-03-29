<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Thea Shop</title>

    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <link rel="stylesheet" href="{{asset('css/style2.css')}}">
    <link rel="stylesheet" href="{{asset('css/style3.css')}}">
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
                <form class="form-inline my-2 my-lg-0 center-row" method="GET" action={{ route("search_tea") }}>
                    <input class="form-control" type="text" name="q" placeholder="Search Here" style="width:500px; margin-right:10px;"> 
                    <button class="btn btn-primary" type="submit">Search</button>
                </form>
            </div>
            <div class="nav-bar">
                <ul>
                    @guest
                        <a href="{{url('/login')}}">
                            <li class="first link">
                                Login
                            </li>
                        </a>
                        <a href="{{url('/register')}}">
                            <li class="first link">
                                Register
                            </li>
                        </a>
                    @endguest
                    @auth
                        @if (Auth::user()->role_id == 2)
                            <a href="{{url('/admin/add')}}">
                                <li class="first link">
                                    Add Product
                                </li>
                            </a>
                            <li>{{Auth::user()->name}}
                                <ul>
                                    <a href="{{url('/admin/transaction')}}">
                                        <li class="first link">
                                            View Orders 
                                        </li>
                                    </a>

                                    <a href="{{url('/admin/user')}}">
                                        <li class="first link">
                                            View All User
                                        </li>
                                    </a>
                                    <a href="{{url('/logout')}}">
                                        <li class="first link">
                                            Log Out
                                        </li>
                                    </a>
                                </ul>
                            </li>
                        @else
                            <a href="{{url('/cart/user/')}}">
                                <li class="first link">
                                    Cart
                                </li>
                            </a>
                            <li>{{Auth::user()->name}}
                                <ul>
                                    <a href="{{url('/profile')}}">
                                        <li class="first link">
                                            Profile
                                        </li>
                                    </a>
                                    <a href="{{url('/history')}}">
                                        <li class="first link">
                                            History
                                        </li>
                                    </a>
                                    <a href="{{url('/logout')}}">
                                        <li class="first link">
                                            Log Out
                                        </li>
                                    </a>
                                </ul>
                            </li>
                        @endif
                    @endauth
                </ul>
            </div>
        </div>
    </header>

    <div class="content">
        @yield('content')
    </div>
</body>
</html>