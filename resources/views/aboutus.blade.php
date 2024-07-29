<!DOCTYPE html>
<html lang="en">
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us - Fashion Store</title>
    <style>
        .navbar {
            background-color: #b5c99a; /* Light brown background color */
            font-family: 'Montserrat', sans-serif;
            font-size: 16px;
            font-weight: bold;
        }
        .nav-item{
            margin-left: 30px;
        }
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            /* background-color: #f4f4f4; */
        }
        .container {
            padding: 50px;
            /* background-color: #fff; */
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin: 50px auto;
            max-width: 1200px;
        }
        h1 {
            text-align: center;
            margin-bottom: 40px;
        }
        .section-title {
            margin-top: 40px;
            margin-bottom: 20px;
            font-size: 24px;
            color: #007BFF;
        }
        .clothing-category {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
        }
        .category {
            flex: 1 1 45%;
            background-color: #f4f4f4;
            margin: 10px;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
        }
        .category h3 {
            margin-top: 0;
        }
        .designers {
            background-color: #f4f4f4;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
        }
        @media (max-width: 768px) {
            .category {
                flex: 1 1 100%;
            }
        }
        /* Footer styling */
        footer {
            padding: 10px 0; /* Reduced padding */
            background-color: #1c2331;
            color: #fff;
            font-size: 14px; /* Reduced font size */
        }
        footer a {
            color: #fff;
            margin-right: 5px; /* Reduced margin */
        }
        footer .text-uppercase {
            margin-bottom: 5px; /* Reduced margin */
            font-size: 14px; /* Reduced font size */
        }
        footer .col-md-3,
        footer .col-md-2,
        footer .col-md-4 {
            margin-bottom: 5px; /* Reduced margin */
        }
        footer p {
            margin: 0;
            font-size: 12px; /* Reduced font size */
        }
        footer hr {
            margin: 5px 0; /* Reduced margin */
        }
        .footer-bottom {
            background-color: rgba(0, 0, 0, 0.2);
            padding: 5px 0; /* Reduced padding */
            font-size: 12px; /* Reduced font size */
        }

        .logout {
      background-color: black;
      color: white;
      font-weight: 200;
      border-radius: 5px;
    }

    .btn-outline-secondary {
      background-color: #b5c99a;
      color: black;
    }
    </style>
</head>
<body>

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
    <div class="container">
        <h1>About Us</h1>
        <p>Welcome to our Fashion Store! We offer a diverse range of clothing options to suit your unique style. Whether you're looking for traditional attire, western outfits, men's collection, or women's collection, we have something for everyone. Our goal is to provide high-quality fashion that makes you feel confident and stylish.</p>
        <h2 class="section-title">Clothing Categories</h2>
        <div class="clothing-category">
            <div class="category">
                <h3>Traditional</h3>
                <p>Explore our traditional clothing collection that showcases the rich cultural heritage and craftsmanship. Perfect for special occasions and celebrations.</p>
            </div>
            <div class="category">
                <h3>Western</h3>
                <p>Discover our western clothing range that includes trendy and fashionable pieces for a modern look. Ideal for casual outings and formal events.</p>
            </div>
            <div class="category">
                <h3>Men's Collection</h3>
                <p>Our men's collection features a variety of styles, from classic to contemporary, ensuring you find the perfect outfit for any occasion.</p>
            </div>
            <div class="category">
                <h3>Women's Collection</h3>
                <p>Browse through our women's collection, offering elegant and chic options for every event. Find your perfect dress, top, or accessory.</p>
            </div>
        </div>
        <h2 class="section-title">Our Designers</h2>
        <div class="designers">
            <p>Our designers are the backbone of our fashion store, bringing their unique visions and creativity to life. Each piece in our collection is crafted with precision and care, ensuring you receive the highest quality garments. Our designers draw inspiration from various sources, including cultural heritage, modern trends, and timeless classics, to create pieces that are both fashionable and functional. We are proud to work with talented designers who are dedicated to pushing the boundaries of fashion and delivering exceptional styles to our customers.</p>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <!--footer-->
    <footer class="text-center text-lg-start text-white">
        <div>
            <a href="" class="text-white me-2">
                <i class="fab fa-facebook-f"></i>
            </a>
            <a href="" class="text-white me-2">
                <i class="fab fa-twitter"></i>
            </a>
            <a href="" class="text-white me-2">
                <i class="fab fa-google"></i>
            </a>
            <a href="" class="text-white me-2">
                <i class="fab fa-instagram"></i>
            </a>
            <a href="" class="text-white me-2">
                <i class="fab fa-linkedin"></i>
            </a>
            <a href="" class="text-white me-2">
                <i class="fab fa-github"></i>
            </a>
        </div>
        <section>
            <div class="container text-center text-md-start mt-2">
                <div class="row mt-2">
                    <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-2">
                        <h6 class="text-uppercase fw-bold">Yfasma</h6>
                        <hr class="mb-2 mt-0 d-inline-block mx-auto" style="width: 60px; background-color: #7c4dff; height: 2px"/>
                        <h6>Our website is based on providing our customers with custom design dresses according to their needs. Mainly, our website focuses on events.</h6>
                    </div>
                    <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-2">
                        <h6 class="text-uppercase fw-bold">Products</h6>
                        <hr class="mb-2 mt-0 d-inline-block mx-auto" style="width: 60px; background-color: #7c4dff; height: 2px"/>
                        <h6><a href="cultural.html" class="text-white">Cultural</a></h6>
                        <h6><a href="western.html" class="text-white">Western</a></h6>
                        <h6><a href="women.html" class="text-white">Women</a></h6>
                        <h6><a href="men.html" class="text-white">Men</a></h6>
                    </div>
                    <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-2">
                        <h6 class="text-uppercase fw-bold">Useful links</h6>
                        <hr class="mb-2 mt-0 d-inline-block mx-auto" style="width: 60px; background-color: #7c4dff; height: 2px"/>
                        <h6><a href="#!" class="text-white">Your Account</a></h6>
                        <h6><a href="#!" class="text-white">Become an Affiliate</a></h6>
                        <h6><a href="#!" class="text-white">Shipping Rates</a></h6>
                        <h6><a href="#!" class="text-white">Help</a></h6>
                    </div>
                    <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-2">
                        <h6 class="text-uppercase fw-bold">Contact</h6>
                        <hr class="mb-2 mt-0 d-inline-block mx-auto" style="width: 60px; background-color: #7c4dff; height: 2px"/>
                        <h6><i class="fas fa-home mr-3"></i> Mid-Baneshor, Kathmandu, Nepal</h6>
                        <h6><i class="fas fa-envelope mr-3"></i> info@yfasma.com</h6>
                        <h6><i class="fas fa-phone mr-3"></i> + 977 551 2345</h6>
                        <h6><i class="fas fa-print mr-3"></i> + 977 551 2346</h6>
                    </div>
                </div>
            </div>
        </section>
        <div class="footer-bottom text-center p-2">
            © 2024 Copyright:
            <a class="text-white" href="https://mdbootstrap.com/">Yfasma</a>
        </div>
    </footer>
</body>
</html>
