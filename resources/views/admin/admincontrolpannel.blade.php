<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Control Panel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        * {
            font-family: "Times New Roman", Times, serif;
            font-size: 18px;
        }
        .navbar {
            background-color: #b5c99a; /* Light brown background color */
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
        .logout {
            background-color: #1c2331;
            color: white;
            font-weight: 200;
        }

    </style>
  </head>
  <body>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.7.1/dist/chart.min.js"></script>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg">
      <div class="container-fluid">
        <a class="navbar-brand" href="#">Yfasma</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="admin.html">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="admin_control_pannel.html">Admin Panel</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="user_detail.html">User Detail</a>
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
          <button type="button" class="logout">Logout</button>
        </div>
      </div>
    </nav>

    <!-- Admin Control Panel -->
    <div class="container my-5">
      <!-- User Management Section -->
      <div class="row">
        <div class="col-md-12">
          <div class="card mb-4">
            <div class="card-body">
              <h5 class="card-title">User Management</h5>
              <table class="table table-striped">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Contact</th>
                    <th scope="col">Actions</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <th scope="row">1</th>
                    <td>Madhusudan Timalsina</td>
                    <td>Madhusudan.timalsina@apexcollege.edu.np</td>
                    <td>+977 1234567890</td>
                    <td>
                      <button class="btn btn-sm btn-primary" style="background-color: black;">Edit</button>
                      <button class="btn btn-sm btn-danger">Delete</button>
                    </td>
                  </tr>
                  <tr>
                    <th scope="row">2</td>
                    <td>Rojila Uprety</td>
                    <td>rojila.upprety@apexcollege.edu.np</td>
                    <td>+977 0987654321</td>
                    <td>
                      <button class="btn btn-sm btn-primary" style="background-color: black;">Edit</button>
                      <button class="btn btn-sm btn-danger">Delete</button>
                    </td>
                  </tr>
                  <tr>
                    <th scope="row">3</td>
                    <td>Sami Shrestha</td>
                    <td>sami.shrestha@apexcollege.edu.np</td>
                    <td>+977 1122334455</td>
                    <td>
                      <button class="btn btn-sm btn-primary" style="background-color: black;">Edit</button>
                      <button class="btn btn-sm btn-danger">Delete</td>
                  </tr>
                  <!-- Add more users as needed -->
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>

      <!-- Designer Management Section -->
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Designer Management</h5>
              <table class="table table-striped">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Contact</th>
                    <th scope="col">Actions</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <th scope="row">1</th>
                    <td>Designer One</td>
                    <td>designer.one@example.com</td>
                    <td>+977 9988776655</td>
                    <td>
                      <button class="btn btn-sm btn-primary" style="background-color: black;">Edit</button>
                      <button class="btn btn-sm btn-danger">Delete</button>
                    </td>
                  </tr>
                  <tr>
                    <th scope="row">2</td>
                    <td>Designer Two</td>
                    <td>designer.two@example.com</td>
                    <td>+977 8877665544</td>
                    <td>
                      <button class="btn btn-sm btn-primary" style="background-color: black;">Edit</button>
                      <button class="btn btn-sm btn-danger">Delete</button>
                    </td>
                  </tr>
                  <tr>
                    <th scope="row">3</td>
                    <td>Designer Three</td>
                    <td>designer.three@example.com</td>
                    <td>+977 7766554433</td>
                    <td>
                      <button class="btn btn-sm btn-primary" style="background-color: black;">Edit</button>
                      <button class="btn btn-sm btn-danger">Delete</td>
                  </tr>
                  <!-- Add more designers as needed -->
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Footer -->
    <div class="container-fluid p-0">
      <footer class="text-center text-lg-start text-white" style="background-color: #1c2331">
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

          <section class="">
              <div class="container text-center text-md-start mt-5">
                  <div class="row mt-3">
                      <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">
                          <h6 class="text-uppercase fw-bold">Yfasma</h6>
                          <hr class="mb-4 mt-0 d-inline-block mx-auto" style="width: 60px; background-color: #7c4dff; height: 2px"/>
                          <p>
                              Our website is based on providing our customers with custom-designed dresses according to their needs. Mainly our website focuses on events.
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
  </body>
</html>
