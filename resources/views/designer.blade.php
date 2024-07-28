<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Designer</title>
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
        .container.my-5 {
            width: auto;
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
        .custom-card {
            position: relative;
            overflow: hidden;
        }
        .custom-card img {
            width: 100%;
            height: auto;
            display: block;
            transition: transform 0.3s ease-in-out;
        }
        .custom-card:hover img {
            transform: scale(1.1);
        }
        .card-bottom-overlay {
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            background: rgba(0, 0, 0, 0.6);
            color: white;
            text-align: center;
            padding: 20px;
        }
        .sidebar {
            background-color: #f0f0f0;
            padding: 20px;
            border-radius: 5px;
            margin-bottom: 20px;
        }
        .sidebar h4 {
            margin-bottom: 15px;
            font-weight: bold;
        }
        .sidebar hr {
            margin-top: 5px;
            margin-bottom: 10px;
            border-color: #ddd;
        }
        .space {
            height: 20px;
            width: 100%;
        }
        .empty {
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
            <a class="navbar-brand" href="{{ route('index') }}">Yfasma</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="{{ route('index') }}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="{{ route('designer') }}">Designer</a>
                    </li>
                    @if(Auth::check() && (Auth::user()->role == 'admin' || Auth::user()->role == 'designer'))
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('uploads.index') }}">Upload</a>
                    </li>
                @endif
                    <!-- Add or uncomment these routes as needed -->
                    <!--
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="{{ route('women') }}">Women</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="{{ route('men') }}">Men</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="{{ route('cultural') }}">Cultural</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="{{ route('western') }}">Western</a>
                    </li>
                    -->
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="{{ route('aboutus') }}">About</a>
                    </li>
                </ul>
                <form class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3">
                    <div id="the-basics">
                        <div class="input-group">
                            <input name="searchField" id="searchField" type="search" class="form-control form-control-dark" style="width: 426px;">
                            <button class="btn btn-outline-secondary" type="button" id="button-addon2">Search</button>
                        </div>
                    </div>
                </form>
                <button type="button" class="logout"><a href="{{ route('logout') }}" style="text-decoration: none; color: white;">Log Out</a></button>
            </div>
        </div>
    </nav>

    <div class="empty"></div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-3">
                <div class="sidebar">
                    <h4>Filters By:</h4>
                    <hr>
                    <form>
                        <div class="mb-3">
                            <label for="priceDropdown" class="form-label">Price</label>
                            <select class="form-control" id="priceDropdown">
                                <option value="">Select Price Range</option>
                                <option value="5000">Up to 5000</option>
                                <option value="6000">Up to 6000</option>
                                <option value="7000">Up to 7000</option>
                                <option value="8000">Up to 8000</option>
                            </select>
                        </div>
                        <hr>
                        <div class="mb-3">
                            <label for="designerDropdown" class="form-label">Designer</label>
                            <select class="form-control" id="designerDropdown">
                                <option value="">Select Designer</option>
                                <option value="manish malhotra">Manish Malhotra</option>
                                <option value="sabyasachi">Sabyasachi</option>
                                <option value="rohit bal">Rohit Bal</option>
                                <option value="anita dongre">Anita Dongre</option>
                            </select>
                        </div>
                        <hr>
                        <div class="mb-3">
                            <label for="women" class="form-label">
                                <a href="#" class="text-decoration-none filter-category" data-category="women">Women</a>
                            </label>
                        </div>
                        <hr>
                        <div class="mb-3">
                            <label for="men" class="form-label">
                                <a href="#" class="text-decoration-none filter-category" data-category="men">Men</a>
                            </label>
                        </div>
                        <hr>
                        <div class="mb-3">
                            <label for="western" class="form-label">
                                <a href="#" class="text-decoration-none filter-category" data-category="western">Western</a>
                            </label>
                        </div>
                        <hr>
                        <div class="mb-3">
                            <label for="cultural" class="form-label">
                                <a href="#" class="text-decoration-none filter-category" data-category="cultural">Cultural</a>
                            </label>
                        </div>
                        <hr>
                    </form>
                </div>
            </div>
            <div class="col-lg-9">
                <div class="row row-cols-1 row-cols-md-4 g-4">
                    <div class="col-lg-3 col-md-6 product-card" data-price="5000" data-category="men" data-designer="manish malhotra">
                        <div class="card h-100 custom-card">
                            <a href="popup.html">
                                <img src="men3.png" class="card-img-top" alt="...">
                            </a>
                            <div class="card-bottom-overlay">
                                <p class="card-text">Manish Malhotra<br/>Lehenga</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 product-card" data-price="6000" data-category="cultural" data-designer="manish malhotra">
                        <div class="card h-100 custom-card">
                            <a href="popup.html">
                                <img src="cultural2.png" class="card-img-top" alt="...">
                            </a>
                            <div class="card-bottom-overlay">
                                <p class="card-text">Manish Malhotra<br/>Lehenga</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 product-card" data-price="7000" data-category="western" data-designer="sabyasachi">
                        <div class="card h-100 custom-card">
                            <a href="popup.html">
                                <img src="western3.png" class="card-img-top" alt="...">
                            </a>
                            <div class="card-bottom-overlay">
                                <p class="card-text">Sabyasachi<br/>Lehenga</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 product-card" data-price="8000" data-category="women" data-designer="rohit bal">
                        <div class="card h-100 custom-card">
                            <a href="popup.html">
                                <img src="women1.png" class="card-img-top" alt="...">
                            </a>
                            <div class="card-bottom-overlay">
                                <p class="card-text">Rohit Bal<br/>Lehenga</p>
                            </div>
                        </div>
                    </div>
                    <!-- Add more product cards as needed -->
                </div>
            </div>
        </div>
    </div>
    <div class="emptytwo"></div>
    <div class="container-fluid p-0">
        <!-- Footer -->
        <footer class="text-center text-lg-start text-white" style="background-color: #1c2331">
            <!-- Section: Social media -->
            <div>
                <a href="" class="text-white me-4">
                    <i class="fab fa-facebook-f"></i>
                </a>
                <a href="" class="text-white me-4">
                    <i class="fab fa-twitter"></i>
                </a>
                <a href="" class="text-white me-4">
                    <i class="fab fa-google"></i>
                </a>
                <a href="" class="text-white me-4">
                    <i class="fab fa-instagram"></i>
                </a>
                <a href="" class="text-white me-4">
                    <i class="fab fa-linkedin"></i>
                </a>
                <a href="" class="text-white me-4">
                    <i class="fab fa-github"></i>
                </a>
            </div>
            <!-- Section: Links  -->
            <section class="">
                <div class="container text-center text-md-start mt-5">
                    <div class="row mt-3">
                        <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">
                            <h6 class="text-uppercase fw-bold">Yfasma</h6>
                            <hr class="mb-4 mt-0 d-inline-block mx-auto" style="width: 60px; background-color: #7c4dff; height: 2px"/>
                            <p>
                                Our website is based on providing our customers about their customs design dress according to their needs. Mainly our website focused on events.
                            </p>
                        </div>
                        <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">
                            <h6 class="text-uppercase fw-bold">Products</h6>
                            <hr class="mb-4 mt-0 d-inline-block mx-auto" style="width: 60px; background-color: #7c4dff; height: 2px"/>
                            <p><a href="cultural.html" class="text-white">Cultural</a></p>
                            <p><a href="western.html" class="text-white">Western</a></p>
                            <p><a href="women.html" class="text-white">Women</a></p>
                            <p><a href="men.html" class="text-white">Men</a></p>
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
                            <p><i class="fas fa-home mr-3"></i> Mid-Baneshor, Kathmandu, Nepal</p>
                            <p><i class="fas fa-envelope mr-3"></i> info@yfasma.com</p>
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
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const priceDropdown = document.getElementById('priceDropdown');
            const designerDropdown = document.getElementById('designerDropdown');
            const categoryLinks = document.querySelectorAll('.filter-category');
            const productCards = document.querySelectorAll('.product-card');

            priceDropdown.addEventListener('change', filterProducts);
            designerDropdown.addEventListener('change', filterProducts);
            categoryLinks.forEach(link => {
                link.addEventListener('click', function(event) {
                    event.preventDefault();
                    const category = event.target.getAttribute('data-category');
                    filterProductsByCategory(category);
                });
            });

            function filterProducts() {
                const price = parseInt(priceDropdown.value, 10);
                const designer = designerDropdown.value.toLowerCase();

                productCards.forEach(card => {
                    const cardPrice = parseInt(card.getAttribute('data-price'), 10);
                    const cardDesigner = card.getAttribute('data-designer');

                    if ((!isNaN(price) && cardPrice > price) || (designer && cardDesigner !== designer)) {
                        card.style.display = 'none';
                    } else {
                        card.style.display = 'block';
                    }
                });
            }

            function filterProductsByCategory(category) {
                productCards.forEach(card => {
                    if (card.getAttribute('data-category') === category) {
                        card.style.display = 'block';
                    } else {
                        card.style.display = 'none';
                    }
                });
            }
        });
    </script>
</body>
</html>
