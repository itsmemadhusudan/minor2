<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Landing page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .navbar {
            background-color: #b5c99a;
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
        .gradient-custom-2 {
            background: #fccb90;
            background: -webkit-linear-gradient(to right, #ee7724, #d8363a, #dd3675, #b44593);
            background: linear-gradient(to right, #ee7724, #d8363a, #dd3675, #b44593);
        }
        @media (min-width: 768px) {
            .gradient-form {
                height: 100vh !important;
            }
        }
        @media (min-width: 769px) {
            .gradient-custom-2 {
                border-top-right-radius: .3rem;
                border-bottom-right-radius: .3rem;
            }
        }
        .logout {
            background-color: #1c2331;
            color: white;
            font-weight: 200;
            border-radius: 5px;
        }
        .image-container img {
            width: 100%;
            height: auto;
            object-fit: cover;
        }
        .form-container {
            padding: 20px;
        }
    </style>
</head>
<body>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"></script>
    <nav class="navbar navbar-expand-lg">
        <div class="container-fluid">
            <a class="nav-link active" aria-current="page" href="{{ route('index') }}">
                <img src="{{ asset('assets/image/logo1.png') }}" alt="Yfasma"
                    style="height: 40px; padding-top: 0; margin-top: 0;">
            </a>
            {{-- {{ route('index') }} --}}
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="{{ route('index') }}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="{{ route('designer') }}" style="padding-bottom:0">Designer</a>
                    </li>
                    @if(Auth::check() && (Auth::user()->role == 'admin' || Auth::user()->role == 'designer'))
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('add_image') }}">Upload</a>
                    </li>
                    @endif
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="{{ route('aboutus') }}">About</a>
                    </li>
                </ul>
                <form class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3" action="{{ route('search') }}" method="GET">
                    <div id="the-basics">
                        <div class="input-group">
                            <input name="searchField" id="searchField" type="search" class="form-control form-control-dark" style="width: 426px;">
                            <button class="btn btn-outline-secondary" type="submit" id="button-addon2">Search</button>
                        </div>
                    </div>
                </form>
                @auth
                <a href="{{ route('logout') }}" class="btn logout">Logout</a>
                @else
                <a href="{{ route('login.form') }}" class="btn logout">Login</a>
                @endauth
            </div>
        </div>
    </nav> <div class="container-fluid d-flex justify-content-center align-items-center min-vh-100">
        <div class="row bg-light shadow rounded p-4" style="max-width: 800px;">
            <div class="col-md-6 image-container">
                <img src="{{ asset('storage/' . $product->profile_picture) }}" alt="Image">
            </div>
            <div class="col-md-6 form-container">
                <h2>Details</h2>
                <form action="{{ route('store_cart') }}" method="post">
                    @csrf
                    <label for="price">Price: {{ $product->price }}</label> <br/> <br/>
                    <label for="description">Description: {{ $product->description }}</label> <br/> <br/>
                    <label for="size">Size:</label>
                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                    <span id="selected-size"></span> <br/> <br/>
                    <div>
                        <input class="form-check-input me-2" type="radio" name="size" value="S" id="sizeS" onchange="updateSize()" />
                        <label class="form-check-label" for="sizeS">S</label>
                        <input class="form-check-input me-2" type="radio" name="size" value="M" id="sizeM" onchange="updateSize()" />
                        <label class="form-check-label" for="sizeM">M</label>
                        <input class="form-check-input me-2" type="radio" name="size" value="L" id="sizeL" onchange="updateSize()" />
                        <label class="form-check-label" for="sizeL">L</label>
                        <input class="form-check-input me-2" type="radio" name="size" value="XL" id="sizeXL" onchange="updateSize()" />
                        <label class="form-check-label" for="sizeXL">XL</label>
                        <input class="form-check-input me-2" type="radio" name="size" value="XXL" id="sizeXXL" onchange="updateSize()" />
                        <label class="form-check-label" for="sizeXXL">XXL</label>
                        <input class="form-check-input me-2" type="radio" name="size" value="XXXL" id="sizeXXXL" onchange="updateSize()" />
                        <label class="form-check-label" for="sizeXXXL">XXXL</label>
                    </div>
                    <br/>
                    <label for="qty">Quantity:</label>
                    <input type="number" name="quantity" id="qty">



                    <div class="d-flex justify-content-between mt-4">
                        {{-- <button type="button" class="btn btn-primary btn-lg" style="background-color: black; border-radius: 5px;">Buy Now</button> --}}
                        <button type="submit" class="btn btn-primary btn-lg" style="background-color: black; border-radius: 5px;">Add to Cart</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
    <!-- Footer -->
    <footer class="text-center text-lg-start text-white" style="background-color: #1c2331">
        <section>
            <div class="container text-center text-md-start mt-5">
                <div class="row mt-3">
                    <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">
                        <h6 class="text-uppercase fw-bold">Yfasma</h6>
                        <hr class="mb-4 mt-0 d-inline-block mx-auto" style="width: 60px; background-color: #7c4dff; height: 2px"/>
                        <p>
                            Our website is based on providing our customers with custom-designed dresses according to their needs. Mainly, our website focuses on events.
                        </p>
                    </div>
                    <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">
                        <h6 class="text-uppercase fw-bold">Products</h6>
                        <hr class="mb-4 mt-0 d-inline-block mx-auto" style="width: 60px; background-color: #7c4dff; height: 2px"/>
                        <p><a href="{{ route('cultural') }}" class="text-white">Cultural</a></p>
                        <p><a href="{{ route('western') }}" class="text-white">Western</a></p>
                        <p><a href="{{ route('women') }}" class="text-white">Women</a></p>
                        <p><a href="{{ route('men') }}" class="text-white">Men</a></p>
                    </div>
                    <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">
                        <h6 class="text-uppercase fw-bold">Useful links</h6>
                        <hr class="mb-4 mt-0 d-inline-block mx-auto" style="width: 60px; background-color: #7c4dff; height: 2px"/>
                        <p><a href="#!" class="text-white">Your Account</a></p>
                        <p><a href="#!" class="text-white">Become an Affiliate</a></p>
                        <p><a href="#!" class="text-white">Shipping Rates</a></p>
                        <p><a href="#!" class="text-white">Help</a></p>
                    </div>
                    <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
                        <h6 class="text-uppercase fw-bold">Contact</h6>
                        <hr class="mb-4 mt-0 d-inline-block mx-auto" style="width: 60px; background-color: #7c4dff; height: 2px"/>
                        <p><i class="fas fa-home mr-3"></i>Mid-Baneshor, Kathmandu, Nepal</p>
                        <p><i class="fas fa-envelope mr-3"></i>info@yfasma.com</p>
                        <p><i class="fas fa-phone mr-3"></i> +977 551 2345</p>
                        <p><i class="fas fa-print mr-3"></i> +977 551 2346</p>
                    </div>
                </div>
            </div>
        </section>
        <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2)">
            © 2024 Copyright:
            <a class="text-white" href="https://mdbootstrap.com/">Yfasma</a>
        </div>
    </footer>

    </div>
    <script>
        function updateSize() {
            const selectedSize = document.querySelector('.form-check-input:checked').value;
            document.getElementById('selected-size').innerText = selectedSize;
        }
        </script>
</body>
</html>
