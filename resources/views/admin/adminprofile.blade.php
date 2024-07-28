<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>DashBoard</title>
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
      }
    </style>
  </head>
  <body>
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
              <a class="nav-link active" aria-current="page" href="admin.html">Dashboard</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="admin_control_pannel.html">Admin Panel</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="user.html">User Detail</a>
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
          <button type="button" class="logout"><a href="login.html" style="text-decoration: none; color: white;">Log Out</a></button>
        </div>
      </div>
    </nav>
    <!-- Admin Panel -->
    <div class="container my-5">
      <div class="row">
        <div class="col-md-3">
          <div class="card text-white bg-primary">
            <div class="card-body">
              <h5 class="card-title">Total Users</h5>
              <p class="card-text">1,234</p>
            </div>
          </div>
        </div>
        <div class="col-md-3">
          <div class="card text-white bg-success">
            <div class="card-body">
              <h5 class="card-title">Active Users</h5>
              <p class="card-text">567</p>
            </div>
          </div>
        </div>
        <div class="col-md-3">
          <div class="card text-white bg-warning">
            <div class="card-body">
              <h5 class="card-title">Total Sales</h5>
              <p class="card-text">$12,345</p>
            </div>
          </div>
        </div>
        <div class="col-md-3">
          <div class="card text-white bg-info">
            <div class="card-body">
              <h5 class="card-title">Growth</h5>
              <p class="card-text">8%</p>
            </div>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-md-6">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Active Users Pie Chart</h5>
              <canvas id="activeUsersChart"></canvas>
            </div>
          </div>
        </div>
        <div class="col-md-6">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">User Management</h5>
              <table class="table table-striped">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Edit</th>
                    <th scope="col">Delete</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <th scope="row">1</th>
                    <td>Madhusudan Timalsina</td>
                    <td>Madhusudan.timalsina@apexcollege.edu.np</td>
                    <td>
                      <button class="btn btn-sm btn-primary">Edit</button>
                    </td>
                    <td>
                      <button class="btn btn-sm btn-danger">Delete</button>
                    </td>
                  </tr>
                  <tr>
                    <th scope="row">2</th>
                    <td>Rojila Uprety</td>
                    <td>rojila.upprety@apexcollege.edu.np</td>
                    <td>
                      <button class="btn btn-sm btn-primary">Edit</button>
                    </td>
                    <td>
                      <button class="btn btn-sm btn-danger">Delete</button>
                    </td>
                  </tr>
                  <tr>
                    <th scope="row">3</th>
                    <td>Sami Shrestha</td>
                    <td>sami.shrestha@apexcollege.edu.np</td>
                    <td>
                      <button class="btn btn-sm btn-primary">Edit</button>
                    </td>
                    <td>
                      <button class="btn btn-sm btn-danger">Delete</button>
                    </td>
                  </tr>
                  <tr>
                    <th scope="row">4</th>
                    <td>Bharat Khanal</td>
                    <td>bharat.khanal@apexcollege.edu.np</td>
                    <td>
                      <button class="btn btn-sm btn-primary">Edit</button>
                    </td>
                    <td>
                      <button class="btn btn-sm btn-danger">Delete</button>
                    </td>
                  </tr>
                  <tr>
                    <th scope="row">5</th>
                    <td>Roshan Bhandari</td>
                    <td>roshan.bhandari@apexcollege.edu.np</td>
                    <td>
                      <button class="btn btn-sm btn-primary">Edit</button>
                    </td>
                    <td>
                      <button class="btn btn-sm btn-danger">Delete</button>
                    </td>
                  </tr>
                  <!-- Add more users as needed -->
                </tbody>
              </table>            </div>
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
                  Our website is based on providing our customers about their custom design dress according to their needs. Mainly our website is focused on events.
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
        <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2)">
          © 2024 Copyright:
          <a class="text-white" href="https://mdbootstrap.com/">Yfasma</a>
        </div>
      </footer>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.7.1/dist/chart.min.js"></script>
    <script>
      // Pie Chart for Active Users
      const ctx = document.getElementById('activeUsersChart').getContext('2d');
      const activeUsersChart = new Chart(ctx, {
        type: 'pie',
        data: {
          labels: ['Active', 'Inactive'],
          datasets: [{
            label: 'Users',
            data: [800, 667], // Example data
            backgroundColor: ['#28a745', '#dc3545'],
          }]
        },
        options: {
          responsive: true,
        }
      });
    </script>
  </body>
</html>
