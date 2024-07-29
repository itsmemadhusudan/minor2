<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Landing page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
        }
        .navbar {
            background-color: #b5c99a;
            font-family: 'Montserrat', sans-serif;
            font-size: 16px;
            font-weight: bold;
            width: 100%;
        }
        .nav-item {
            margin-left: 30px;
        }
        .btn-outline-secondary {
            background-color: #b5c99a;
            color: black;
        }
        .navbar-brand {
            font-family: #b5c99a;
            font-weight: bold;
        }
        .container.my-5 {
            width: auto;
        }
        .gradient-custom-2 {
            /* fallback for old browsers */
            background: #fccb90;

            /* Chrome 10-25, Safari 5.1-6 */
            background: -webkit-linear-gradient(to right, #ee7724, #d8363a, #dd3675, #b44593);

            /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
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
            padding: 0px;
        }
        .center-content {
            display: flex;
            justify-content: center;
            align-items: center;
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
    </nav>    <div class="container center-content my-5">
        <div class="row bg-light shadow rounded p-4" style="max-width: 1150px; align-items: center;">
            <div class="col-md-6 image-container" style="width: 50%; height: 650px;">
                <img src="{{ asset('assets/image/yfasmaloginfinal.png') }}" alt="Image" style="width: 100%; height: 100%;">
            </div>
            <div class="col-md-6 form-container" style="width: 450px; height: 650px;">
                <h2>Designer Form</h2>
                {{-- @if($errors->has())
                @foreach ($errors->all() as $error)
                   <div>{{ $error }}</div>
               @endforeach
             @endif --}}
                <form action="{{ route('save_image') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <label for="username">Designer Name:</label>
                    <input type="text" id="designername" name="designer_name" required class="form-control mb-2">

                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email" required class="form-control mb-2">

                    <label for="address">Address:</label>
                    <input type="text" id="address" name="address" required class="form-control mb-2">

                    <label for="description">Dress Description:</label>
                    <textarea id="description" name="description" rows="4" class="form-control mb-2"></textarea>

                    <label for="price">Price:</label>
                    <input type="number" id="number" name="price" required class="form-control mb-2">

                    <label for="category">Category:</label>
                            <select name="category" class="form-select mb-2">
                                <option value="">Select Category</option>
                                <option value="Cultural">Cultural</option>
                                <option value="Western">Western</option>
                            </select>


                    <label for="profile-picture">Picture:</label>
                    <input type="file" id="profile-picture" name="profile_picture" class="form-control mb-2">

                    <button type="submit" class="btn btn-dark mt-3" style="background-color: black;">Submit</button>
                </form>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <div class="container-fluid p-0">
        <footer class="text-center text-lg-start text-white" style="background-color: #1c2331">
            <!-- Section: Social media -->
            <!-- Section: Links -->
            <section class="">
                <div class="container text-center text-md-start mt-5">
                    <div class="row mt-3" style="padding-top: 35px;">
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
                            <p>
                                <a href="cultural.html" class="text-white">Cultural</a>
                            </p>
                            <p>
                                <a href="western.html" class="text-white">Western</a>
                            </p>
                            <p>
                                <a href="women.html" class="text-white">Women</a>
                            </p>
                            <p>
                                <a href="men.html" class="text-white">Men</a>
                            </p>
                        </div>
                        <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">
                            <h6 class="text-uppercase fw-bold">Useful links</h6>
                            <hr class="mb-4 mt-0 d-inline-block mx-auto" style="width: 60px; background-color: #7c4dff; height: 2px"/>
                            <p>
                                <a href="#!" class="text-white">Your Account</a>
                            </p>
                            <p>
                                <a href="#!" class="text-white">Become an Affiliate</a>
                            </p>
                            <p>
                                <a href="#!" class="text-white">Shipping Rates</a>
                            </p>
                            <p>
                                <a href="#!" class="text-white">Help</a>
                            </p>
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
            <!-- Copyright -->
            <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2)">
                © 2024 Copyright:
                <a class="text-white" href="https://mdbootstrap.com/">Yfasma</a>
            </div>
        </footer>
    </div>

    <script>
        document.querySelectorAll('.dropdown-item').forEach(function(item) {
    item.addEventListener('click', function(event) {
        event.preventDefault();
        var dropdownMenu = item.getAttribute('data-dropdown');
        var dropdownToggle = document.getElementById(dropdownMenu);
        dropdownToggle.textContent = item.textContent;
    });
});
        </script>
</body>
</html>
