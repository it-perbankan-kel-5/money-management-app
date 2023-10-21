<!DOCTYPE html>
<html lang="en">

<head>

  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Rakamin Banking</title>

  <link rel="shortcut icon" href="{{ asset("assets/images/logo.png") }}" />
  
  <!-- plugins:css -->
  <link rel="stylesheet" href="{{ asset("assets/vendors/feather/feather.css") }}">
  <link rel="stylesheet" href="{{ asset("assets/vendors/ti-icons/css/themify-icons.css") }}">
  <link rel="stylesheet" href="{{ asset("assets/vendors/css/vendor.bundle.base.css") }}">
  <!-- endinject -->

  <!-- Plugin css for this page -->
  <link rel="stylesheet" href="{{ asset("assets/vendors/datatables.net-bs4/dataTables.bootstrap4.css") }}">
  <link rel="stylesheet" href="{{ asset("assets/vendors/ti-icons/css/themify-icons.css") }}">
  <link rel="stylesheet" type="text/css" href="{{ asset("assets/js/select.dataTables.min.css") }}">
  <!-- End plugin css for this page -->

  <!-- inject:css -->
  <link rel="stylesheet" href="{{ asset("assets/css/vertical-layout-light/style.css") }}">
  <!-- endinject -->
</head>

<body>

<div class="container-scroller">
  <div class="container-fluid page-body-wrapper full-page-wrapper">
    <div class="content-wrapper d-flex align-items-stretch auth auth-img-bg">
      <div class="row flex-grow">
        <div class="col-lg-6 d-flex flex-row scale">
          <!-- Add content for the left half here -->
          <img src="{{ asset("assets/images/logo-login.png") }}" alt="logo">
        </div>
        <div class="col-lg-6 d-flex align-items-center justify-content-center">
          <div class="auth-form-transparent text-left p-3">
            <div class="brand-logo">
              <img src="{{ asset("assets/images/logo.png") }}" alt="logo" class="img-fluid">
            </div>
            <h3 class="text1">Welcome to FlexiFunds Apps</h3>
            <h5 class="font-weight-light">Happy to see you again!</h5>

            <form method="POST" action="" class="pt-3">
              <div class="form-group">
                <label for="exampleInputEmail">Username</label>
                <div class="input-group">
                  <div class="input-group-prepend bg-transparent">
                    <span class="input-group-text bg-transparent border-right-0">
                      <i class="ti-user text-primary"></i>
                    </span>
                  </div>
                  <input type="text" class="form-control form-control-lg border-left-0" id="exampleInputEmail" placeholder="Username" required>
                </div>
              </div>

              <div class="form-group">
                <label for="exampleInputPassword">Password</label>
                <div class="input-group">
                  <div class="input-group-prepend bg-transparent">
                    <span class="input-group-text bg-transparent border-right-0">
                      <i class="ti-lock text-primary"></i>
                    </span>
                  </div>
                  <input type="password" class="form-control form-control-lg border-left-0" id="exampleInputPassword" placeholder="Password" required>
                </div>
              </div>

              <div class="my-2 d-flex justify-content-between align-items-center">
                <div class="form-check">
                  <label class="form-check-label text-muted">
                    <input type="checkbox" class="form-check-input">
                    Keep me signed in
                    <i class="input-helper"></i>
                  </label>
                </div>
                <a href="#" class="auth-link text-danger">Forgot password?</a>
              </div>

              <div class="my-3">
                <a class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn" href="../../index.html">LOGIN</a>
              </div>

              <div class="text-center mt-4 font-weight-light">
                Don't have an account? <a href="/register" class="text-primary">Create</a>
              </div>
            </form>

          </div>
        </div>
      </div>
      <!-- content-wrapper ends -->
    </div>
    <!-- container-fluid ends -->
  </div>
  <!-- container-scroller ends -->
</div>

</body>

      
  <!-- plugins:js -->
  <script src="{{ asset("assets/vendors/js/vendor.bundle.base.js") }} "></script>
  <!-- endinject -->

  <!-- Plugin js for this page -->
  <script src="{{ asset("assets/vendors/chart.js/Chart.min.js") }} "></script>
  <script src="{{ asset("assets/vendors/datatables.net/jquery.dataTables.js") }} "></script>
  <script src="{{ asset("assets/vendors/datatables.net-bs4/dataTables.bootstrap4.js") }} "></script>
  <script src="{{ asset("assets/js/dataTables.select.min.js") }} "></script>
  <!-- End plugin js for this page -->

  <!-- inject:js -->
  <script src="{{ asset("assets/js/off-canvas.js>") }}"></script>
  <script src="{{ asset("assets/js/hoverable-collapse.js") }}"></script>
  <script src="{{ asset("assets/js/template.js") }}"></script>
  <script src="{{ asset("assets/js/settings.js") }}"></script>
  <script src="{{ asset("assets/js/todolist.js") }}"></script>
  <!-- endinject -->

  <!-- Custom js for this page-->
  <script src="{{ asset("assets/js/dashboard.js") }} "></script>
  <script src="{{ asset("assets/js/Chart.roundedBarCharts.js") }} "></script>
  <!-- End custom js for this page-->

</body>

</html>