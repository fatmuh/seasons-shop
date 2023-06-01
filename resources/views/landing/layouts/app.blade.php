<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Title  -->
    <title>SEASONS SHOP</title>

    <!-- Favicon  -->
    <link rel="icon" href="https://upload.wikimedia.org/wikipedia/commons/thumb/d/d6/S_from_Samsung_Galaxy_S_logo.svg/725px-S_from_Samsung_Galaxy_S_logo.svg.png">

    <!-- Core Style CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/core-style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/style.css') }}">

</head>

<body>
    <!-- ##### Header Area Start ##### -->
    <header class="header_area">
        <div class="classy-nav-container breakpoint-off d-flex align-items-center justify-content-between">
            <!-- Classy Menu -->
            <nav class="classy-navbar" id="essenceNav">
                <!-- Logo -->
                <a class="nav-brand" href="{{ route('landing.index') }}">SEASONS SHOP</a>
                <!-- Navbar Toggler -->
                <div class="classy-navbar-toggler">
                    <span class="navbarToggler"><span></span><span></span><span></span></span>
                </div>
                <!-- Menu -->
                <div class="classy-menu">
                    <!-- close btn -->
                    <div class="classycloseIcon">
                        <div class="cross-wrap"><span class="top"></span><span class="bottom"></span></div>
                    </div>
                    <!-- Nav Start -->
                    <div class="classynav">
                        <ul>
                            <li><a href="{{ route('landing.index') }}">Home</a></li>
                            <li><a href="{{ route('landing.about') }}">About</a></li>
                            <li><a href="{{ route('landing.contact') }}">Contact</a></li>
                        </ul>
                    </div>
                    <!-- Nav End -->
                </div>
            </nav>

            <!-- Header Meta Data -->
            <div class="header-meta d-flex clearfix justify-content-end">
                <!-- Search Area -->
                {{-- <div class="search-area">
                    <form action="#" method="post">
                        <input type="search" name="search" id="headerSearch" placeholder="Type for search">
                        <button type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
                    </form>
                </div> --}}
                <!-- User Login Info -->
                        @guest
                            @if (Route::has('login'))
                            <div class="user-login-info">
                                <a href="{{ route('home') }}"><img src="{{ asset('assets/img/core-img/user.svg') }}" alt=""></a>
                            </div>
                            @endif
                        @else
                            <div class="user-login-info">
                                <a href="{{ route('home') }}"><img src="{{ asset('assets/img/core-img/user.svg') }}" alt=""> {{ Auth::user()->name }}</a>
                            </div>
                        @endguest
            </div>

        </div>
    </header>

    @yield('content')

    <!-- ##### Footer Area Start ##### -->
    <footer class="footer_area clearfix">
        <div class="container">

<div class="row mt-5">
                <div class="col-md-12 text-center">
                    <p>
                        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
    Copyright SEASONS SHOP &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved
    <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                    </p>
                </div>
            </div>

        </div>
    </footer>
    <!-- ##### Footer Area End ##### -->

    <!-- jQuery (Necessary for All JavaScript Plugins) -->
    <script src="{{ asset('assets/js/jquery/jquery-2.2.4.min.js') }}"></script>
    <!-- Popper js -->
    <script src="{{ asset('assets/js/popper.min.js') }}"></>
    <!-- Bootstrap js -->
    <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
    <!-- Plugins js -->
    <script src="{{ asset('assets/js/plugins.js') }}"></script>
    <!-- Classy Nav js -->
    <script src="{{ asset('assets/js/classy-nav.min.js') }}"></script>
    <!-- Active js -->
    <script src="{{ asset('assets/js/active.js') }}"></script>
    @include('sweetalert::alert')
</body>

</html>
