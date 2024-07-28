<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Home</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet">
    <style>
        .navbar {
            background-color: #b5c99a;
            /* Light brown background color */
            font-family: 'Montserrat', sans-serif;
            font-size: 16px;
            font-weight: bold;
        }

        .nav-item {
            margin-left: 30px;
        }

        .btn-outline-secondary {
            background-color: #b5c99a;
            color: black;
        }

        .navbar-brand {
            font-family: 'Montserrat', sans-serif;
            font-weight: bold;
        }

        .signin {
            background-color: #1c2331;
            color: white;
            font-weight: 200;
            border-radius: 5px;
        }

        .custom-card {
            position: relative;
            overflow: hidden;
        }

        .custom-card img {
            width: 100%;
            height: auto;
            display: block;
            transition: transform 0.3s ease-in-out;
            /* Smooth transition for motion effect */
        }

        .custom-card:hover img {
            transform: scale(1.1);
            /* Scale up the image on hover */
        }

        .card-bottom-overlay {
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            background: rgba(0, 0, 0, 0.6);
            /* Semi-transparent black background */
            color: white;
            text-align: center;
            padding: 20px;
        }

        .empty {
            height: 20px;
            width: 100%;
        }

        .emptytwo {
            height: 20px;
            width: 100%;
        }
    </style>
</head>

<body>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"></script>
    <nav class="navbar navbar-expand-lg">
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <a class="nav-link active" aria-current="page" href="{{ route('index') }}">
                <img src="{{ asset('assets/image/logo1.png') }}" alt="Yfasma"
                    style="height: 40px; padding-top: 0; margin-top: 0;">
            </a>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" href="{{ route('index') }}" style="padding-bottom:0">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="{{ route('designer') }}" style="padding-bottom:0">Designer</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="{{ route('aboutus') }}" style="padding-bottom:0">About</a>
                    </li>
                    @if (Auth::check() && (Auth::user()->role == 'admin' || Auth::user()->role == 'designer'))
                        <li class="nav-item">
                            {{-- <a class="nav-link active" href="{{ route('uploads.create') }}" >Upload</a> --}}
                            <a class="nav-link active" href="{{ route('add_image') }}">Upload</a>
                        </li>
                    @endif
                    <!-- Other menu items -->
                </ul>
                <form class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3" action="{{ route('search') }}" method="GET">
                    <div id="the-basics">
                        <div class="input-group">
                            <input name="searchField" id="searchField" type="search"
                                class="form-control form-control-dark" style="width: 426px;">
                            <button class="btn btn-outline-secondary" type="submit" id="button-addon2">Search</button>
                        </div>
                    </div>
                </form>
                <a href="{{ route('cart') }}" class="me-2">
                    <img src="{{ asset('assets/image/cart.png') }}" alt="Cart"
                        style="height: 25px; padding-top: 0; margin-top: 0;">
                </a>
                @guest
                    <button class="signin" type="button">
                        <a href="{{ route('login.form') }}" style="text-decoration: none; color: white;">Login</a>
                    </button>
                @else
                    <button class="signin" type="button">
                        <a href="{{ route('logout') }}" style="text-decoration: none; color: white;">Logout</a>
                    </button>
                @endguest
            </div>
        </div>
    </nav>
    <main>
        @auth
            <p class="mt-4 text-center" style="font-size: 24px; font-weight: bold; font-style: italic;">Welcome,
                {{ Auth::user()->name }}!</p>
        @else
            <p class="mt-4 text-center" style="font-size: 24px;"><b><i>Welcome to the home page! Please log in to see
                        personalized content.</i></b></p>
        @endauth
        <div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active" data-bs-interval="2000">
                    <img src="{{ asset('assets/image/carousel1.png') }}" class="d-block w-100" alt="First Slide">
                </div>
                <div class="carousel-item" data-bs-interval="2000">
                    <img src="{{ asset('assets/image/carousel2.png') }}" class="d-block w-100" alt="Second Slide">
                </div>
                <div class="carousel-item" data-bs-interval="2000">
                    <img src="{{ asset('assets/image/carousel3.png') }}" class="d-block w-100" alt="Third slide">
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying"
                data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying"
                data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
        <div class="empty"></div>
        <div class="row g-4">

            @foreach ($uploads as $item)
                <div class="col-lg-3 col-md-6">
                    <a href="{{ route('view_product', encrypt($item->id)) }}">
                        <div class="card h-100 custom-card">
                            <img src="{{ asset('storage/' . $item->profile_picture) }}" class="card-img-top"
                                alt="Western Dress">

                            <div class="card-bottom-overlay">
                                <p class="card-text">{{ $item->designer_name }}<br />{{ $item->description }}</p>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach

            {{-- <div class="col-lg-3 col-md-6">
                <div class="card h-100 custom-card">
                    <a href="popup.html">
                        <img src="{{ asset('assets/image/men1.png') }}" class="card-img-top" alt="Men's Wear">
                    </a>
                    <div class="card-bottom-overlay">
                        <p class="card-text">Manish Malhotra<br/>Lehenga</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="card h-100 custom-card">
                    <a href="popup.html">
                        <img src="{{ asset('assets/image/men2.png') }}" class="card-img-top" alt="Men's Wear">
                    </a>
                    <div class="card-bottom-overlay">
                        <p class="card-text">Manish Malhotra<br/>Lehenga</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="card h-100 custom-card">
                    <a href="popup.html">
                        <img src="{{ asset('assets/image/men3.png') }}" class="card-img-top" alt="Men's Wear">
                    </a>
                    <div class="card-bottom-overlay">
                        <p class="card-text">Manish Malhotra<br/>Lehenga</p>
                    </div>
                </div>
            </div> --}}
        </div>
        <div class="emptytwo"></div>
    </main>
    <!--footer-->
    <div class="container-fluid p-0">
        <footer class="text-center text-lg-start text-white" style="background-color: #1c2331">
            <div>
                <a href="" class="text-white me-4"><i class="fab fa-facebook-f"></i></a>
                <a href="" class="text-white me-4"><i class="fab fa-twitter"></i></a>
                <a href="" class="text-white me-4"><i class="fab fa-google"></i></a>
                <a href="" class="text-white me-4"><i class="fab fa-instagram"></i></a>
                <a href="" class="text-white me-4"><i class="fab fa-linkedin"></i></a>
                <a href="" class="text-white me-4"><i class="fab fa-github"></i></a>
            </div>
            <section>
                <div class="container text-center text-md-start mt-5">
                    <div class="row mt-3">
                        <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">
                            <h6 class="text-uppercase fw-bold">Yfasma</h6>
                            <hr class="mb-4 mt-0 d-inline-block mx-auto"
                                style="width: 60px; background-color: #7c4dff; height: 2px" />
                            <p>
                                Our website is based on providing our customers with custom-designed dresses according
                                to their needs, mainly focusing on events.
                            </p>
                        </div>
                        <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">
                            <h6 class="text-uppercase fw-bold">Products</h6>
                            <hr class="mb-4 mt-0 d-inline-block mx-auto"
                                style="width: 60px; background-color: #7c4dff; height: 2px" />
                            <p><a href="cultural.html" class="text-white">Cultural</a></p>
                            <p><a href="western.html" class="text-white">Western</a></p>
                            <p><a href="women.html" class="text-white">Women</a></p>
                            <p><a href="men.html" class="text-white">Men</a></p>
                        </div>
                        <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">
                            <h6 class="text-uppercase fw-bold">Useful links</h6>
                            <hr class="mb-4 mt-0 d-inline-block mx-auto"
                                style="width: 60px; background-color: #7c4dff; height: 2px" />
                            <p><a href="#!" class="text-white">Your Account</a></p>
                            <p><a href="#!" class="text-white">Become an Affiliate</a></p>
                            <p><a href="#!" class="text-white">Shipping Rates</a></p>
                            <p><a href="#!" class="text-white">Help</a></p>
                        </div>
                        <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
                            <h6 class="text-uppercase fw-bold">Contact</h6>
                            <hr class="mb-4 mt-0 d-inline-block mx-auto"
                                style="width: 60px; background-color: #7c4dff; height: 2px" />
                            <p><i class="fas fa-home mr-3"></i>Mid-Baneshor, Kathmandu, Nepal</p>
                            <p><i class="fas fa-envelope mr-3"></i>info@yfasma.com</p>
                            <p><i class="fas fa-phone mr-3"></i> + 977 551 2345</p>
                            <p><i class="fas fa-print mr-3"></i> + 977 551 2346</p>
                        </div>
                    </div>
                </div>
            </section>
            <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2)">
                © 2024 Copyright:
                <a class="text-white" href="https://mdbootstrap.com/">Yfasma</a>
            </div>
        </footer>
</body>

</html>
