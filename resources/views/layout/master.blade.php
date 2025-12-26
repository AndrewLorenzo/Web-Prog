<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
</head>

<body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary bg-primary">
        <div class="container-fluid">
            <a class="navbar-brand fw-bold" href="{{ route('home') }}"><span style="color: #000000;">Book</span><span style="color: #0d6af4;">Hub</span></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active text-dark" aria-current="page" href="{{ route('home') }}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-dark" href="{{ route('show') }}">List</a>
                    </li>
                </ul>
                <ul class="navbar-nav ms-auto">
                    @auth
                        <li class="nav-item ">
                            <span class="navbar-text fw-bold d-flex align-items-center me-1">
                                <span class="text-dark">Hello, {{ Auth::user()->role }}</span>
                                &nbsp;
                                <span class="text-primary">{{ Auth::user()->name }}</span>
                            </span>
                        </li>
                        <li class="nav-item d-flex align-items-center">
                            <form action="{{ route('logout') }}" method="post">
                                @csrf
                                <button type="submit" class="btn btn-outline-danger">Logout</button>
                            </form>
                        </li>
                    @else
                    <div class="d-flex">
                        <li class="nav-item">
                            <a class="nav-link text-dark" href="{{ route('login') }}">Login</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-dark" href="{{ route('register') }}">Register</a>
                        </li>
                    </div>
                        
                    @endauth
                </ul>
            </div>
        </div>
    </nav>
    @yield('content')
    <footer class="modern-footer">
        <div class="container">
            <div class="row gy-4 justify-content-evenly mb-3">

                <!-- About -->
                <div class="col-md-4 text-center text-md-start">
                    <a href="{{ route('home') }}" class="footer-logo">Book<span>Hub</span>.</a>
                    <p class="footer-desc">
                        Platform all-in-one untuk mencari buku dan menambahkan buku Anda dengan mudah.
                    </p>
                </div>

                <!-- Links -->
                <div class="col-md-4 text-center">
                    <h4 class="footer-heading">Quick Links</h4>
                    <ul class="footer-menu">
                        <li><a href="{{ route('home') }}">Home</a></li>
                        <li><a href="{{ route('show') }}">List</a></li>
                    </ul>
                </div>

                <!-- Social -->
                <!-- <div class="col-md-4 text-center text-md-start">
                    <h4 class="footer-heading">Follow Us</h4>
                    <div class="social-icons">
                        <a href="#" class="social-link"><img src="Assets/facebook.svg" alt="Facebook"></a>
                        <a href="#" class="social-link"><img src="Assets/twitter.svg" alt="Twitter"></a>
                        <a href="#" class="social-link"><img src="Assets/instagram.svg" alt="Instagram"></a>
                    </div>
                </div> -->
            </div>
            <div class="footer-copyright">
                <p>&copy; {{ date('Y') }} BookHub. All rights reserved.</p>
            </div>
        </div>
    </footer>
    <style>
        .modern-footer {
            background-color: #1a1a1a;
            color: #b0b0b0;
            padding-top: 70px;
            padding-bottom: 10px;
            margin-top: 100px;
        }

        .footer-logo {
            font-size: 28px;
            font-weight: 800;
            color: #ffffff;
            display: inline-block;
            margin-bottom: 20px;
            text-decoration: none;
        }

        .footer-logo span {
            color: #0d6af4;
        }

        .footer-desc {
            max-width: 400px;
        }

        .footer-heading {
            color: #ffffff;
            font-size: 18px;
            margin-bottom: 25px;
            position: relative;
            display: inline-block;
        }

        .footer-heading::after {
            content: '';
            position: absolute;
            left: 0;
            bottom: -8px;
            width: 100%;
            height: 3px;
            background-color: #ff6b00;
        }

        .footer-menu {
            list-style: none;
            padding: 0;
        }

        .footer-menu li {
            margin-bottom: 12px;
        }

        .footer-menu a {
            color: #b0b0b0;
            text-decoration: none;
            transition: all 0.3s ease;
        }

        .footer-menu a:hover {
            color: #ff6b00;
            transform: translateX(5px);
        }

        .footer-copyright {
            border-top: 1px solid #2a2a2a;
            padding-top: 25px;
            text-align: center;
            font-size: 14px;
        }
    </style>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous">
    </script>
</body>

</html>
