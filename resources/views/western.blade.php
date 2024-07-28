<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Western</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>

      .navbar {
        background-color: #b5c99a; /* Light brown background color */
        font-family: 'Montserrat', sans-serif;
            font-size: 16px;
            font-weight: bold;

      }
      .nav-item{
        margin-left:30px;
      }
      .btn-outline-secondary{
        background-color: #b5c99a ;
        color:black;
          }
          .navbar-brand{
            font-family:#b5c99a;
            font-weight: bold;
          }
          .container.my-5{
            width:auto;
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
.logout{
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
      transition: transform 0.3s ease-in-out; /* Smooth transition for motion effect */
    }
    .custom-card:hover img {
      transform: scale(1.1); /* Scale up the image on hover */
    }
    .card-bottom-overlay {
      position: absolute;
      bottom: 0;
      left: 0;
      width: 100%;
      background: rgba(0, 0, 0, 0.6); /* Semi-transparent black background */
      color: white;
      text-align: center;
      padding: 20px;
    }
        .space
        {
            height: 20px;
            width: 100%;
        }
        .emptytwo{
      height: 20px;
      width: 100%;
    }
    </style>
</head>
<body>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"></script>
    <nav class="navbar navbar-expand-lg">
      <diphpv class="container-fluid">
        <a class="navbar-brand" href="index.html"> <img src="{{ asset('assets/image/logo.png') }}" alt="Your Image Description"></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="index.html">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" href="designer.html">Designer</a>
            </li>
            @if(Auth::check() && (Auth::user()->role == 'admin' || Auth::user()->role == 'designer'))
            <li class="nav-item">
                <a class="nav-link" href="{{ route('uploads.index') }}">Upload</a>
            </li>
        @endif
            <!-- <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="women.html">Women</a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="men.html">Men</a>
            </li>
            <li class="nav-item">
                <a class="nav-link active" href="cultural.html">Cultural</a>
              </li>
              <li class="nav-item">
                <a class="nav-link active" href="western.html">Western</a>
              </li> -->
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="aboutus.html">About</a>
            </li>
          </ul>
          <form class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3">
            <div id="the-basics">
              <div class="input-group">
                <input name="searchField" id="searchField" type="search" class="form-control form-control-dark" style="width: 426px; ">
                <button class="btn btn-outline-secondary" type="button" id="button-addon2" >Search</button>
              </div>
            </div>
          </form>

          <button type="button" class="logout">Logout</button>
        </div>
      </div>
    </nav>
    <div class="space"> </div>
    <div class="row row-cols-1 row-cols-md-4 g-4">
      <div class="col-lg-3 col-md-6">
        <div class="card h-100 custom-card">
          <a href="popup.html">
            <img src="western1.png" class="card-img-top" alt="...">
        </a>
          <div class="card-bottom-overlay">
            <p class="card-text">Manish Malhotra<br/>Lehenga</p>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-md-6">
        <div class="card h-100 custom-card">
          <a href="popup.html">
            <img src="western2.png" class="card-img-top" alt="...">
        </a>
          <div class="card-bottom-overlay">
            <p class="card-text">Manish Malhotra<br/>Lehenga</p>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-md-6">
        <div class="card h-100 custom-card">
          <a href="popup.html">
            <img src="western3.png" class="card-img-top" alt="...">
        </a>
          <div class="card-bottom-overlay">
            <p class="card-text">Manish Malhotra<br/>Lehenga</p>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-md-6">
        <div class="card h-100 custom-card">
          <a href="popup.html">
            <img src="pic.jpg" class="card-img-top" alt="...">
        </a>
          <div class="card-bottom-overlay">
            <p class="card-text">Manish Malhotra<br/>Lehenga</p>
          </div>
        </div>
      </div>
    </div>
    <div class="emptytwo">


    </div>
    <div class="container-fluid p-0">
        <!-- Footer -->
        <footer class="text-center text-lg-start text-white" style="background-color: #1c2331">
                <!-- Left -->

                <!-- Right -->
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
                <!-- Right -->
            <!-- Section: Social media -->

            <!-- Section: Links  -->
            <section class="">
                <div class="container text-center text-md-start mt-5">
                    <!-- Grid row -->
                    <div class="row mt-3">
                        <!-- Grid column -->
                        <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">
                            <!-- Content -->
                            <h6 class="text-uppercase fw-bold">Yfasma</h6>
                            <hr class="mb-4 mt-0 d-inline-block mx-auto" style="width: 60px; background-color: #7c4dff; height: 2px"/>
                            <p>
                                Our website is based on providing our customers about their customs design dress according to their needs. mainly our website focused on events.
                            </p>
                        </div>
                        <!-- Grid column -->

                        <!-- Grid column -->
                        <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">
                            <!-- Links -->
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
                        <!-- Grid column -->

                        <!-- Grid column -->
                        <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">
                            <!-- Links -->
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
                        <!-- Grid column -->

                        <!-- Grid column -->
                        <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
                            <!-- Links -->
                            <h6 class="text-uppercase fw-bold">Contact</h6>
                            <hr class="mb-4 mt-0 d-inline-block mx-auto" style="width: 60px; background-color: #7c4dff; height: 2px"/>
                            <p><i class="fas fa-home mr-3"></i>Mid-Baneshor, Kathmandu, Nepal</p>
                            <p><i class="fas fa-envelope mr-3"></i>info@yfasma.com</p>
                            <p><i class="fas fa-phone mr-3"></i> + 977 551 2345</p>
                            <p><i class="fas fa-print mr-3"></i> + 977 551 2346</p>
                        </div>
                        <!-- Grid column -->
                    </div>
                    <!-- Grid row -->
                </div>
            </section>
            <!-- Section: Links  -->

            <!-- Copyright -->
            <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2)">
                © 2024 Copyright:
                <a class="text-white" href="https://mdbootstrap.com/">Yfasma</a>
            </div>
            <!-- Copyright -->
        </footer>
        <!-- Footer -->

    </div>
  </body>
</html>
