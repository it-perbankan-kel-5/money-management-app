@extends('components.auth_layout')
@section('auth')
<div class="container-scroller">
  <div class="container-fluid page-body-wrapper full-page-wrapper">
    <div class="content-wrapper d-flex align-items-stretch auth auth-img-bg">
      <div class="row flex-grow">
        <div class="col-lg-6 d-flex flex-row scale">
          <!-- Add content for the left half here -->
          <img src="{{ asset("assets/images/logo-login.svg") }}" alt="logo">
        </div>
        <div class="col-lg-6 d-flex align-items-center justify-content-center">
          <div class="auth-form-transparent text-left p-3">
            <div class="brand-logo">
              <img src="{{ asset("assets/images/flexifund.svg") }}" alt="logo" class="img-fluid">
            </div>
            <h3 class="text1">Sign Up!</h3>

            <form method="POST" action="{{ url('/register/signup') }}" class="pt-3">
              @csrf
              
              <div class="form-group row">
                <div class="col">
                <label for="first_name">First Name</label>
                  <div class="input-group">
                    <div class="input-group-prepend bg-transparent">
                    <span class="input-group-text bg-transparent border-right-0">
                      <i class="ti-user text-primary"></i>
                    </span>
                    </div>
                  <input type="text" class="form-control form-control-lg border-left-0" name="fname" placeholder="First Name" required>
                  </div>
                </div>

                <div class="col">
                <label for="last_name">Last Name</label>
                  <div class="input-group">
                    <div class="input-group-prepend bg-transparent">
                    <span class="input-group-text bg-transparent border-right-0">
                      <i class="ti-user text-primary"></i>
                    </span>
                    </div>
                  <input type="text" class="form-control form-control-lg border-left-0" name="lname" placeholder="Last Name" required>
                  </div>
                </div>
              </div>

              <div class="form-group">
                <label for="exampleInputEmail">Email</label>
                <div class="input-group">
                  <div class="input-group-prepend bg-transparent">
                    <span class="input-group-text bg-transparent border-right-0">
                      <i class="ti-user text-primary"></i>
                    </span>
                  </div>
                  <input type="email" class="form-control form-control-lg border-left-0" name="email" placeholder="Email" required>
                </div>
              </div>

              <div class="form-group">
                <label for="exampleInputEmail">Address</label>
                <div class="input-group">
                  <div class="input-group-prepend bg-transparent">
                    <span class="input-group-text bg-transparent border-right-0">
                      <i class="ti-user text-primary"></i>
                    </span>
                  </div>
                  <input type="text" class="form-control form-control-lg border-left-0" name="address" placeholder="Address" required>
                </div>
              </div>
              
              <div class="form-group">
                <label for="exampleInputEmail">Phone Number</label>
                <div class="input-group">
                  <div class="input-group-prepend bg-transparent">
                    <span class="input-group-text bg-transparent border-right-0">
                      <i class="ti-user text-primary"></i>
                    </span>
                  </div>
                  <input type="number" class="form-control form-control-lg border-left-0" name="phone_number" placeholder="Phone Number" required>
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
                  <input type="password" class="form-control form-control-lg border-left-0" name="password" placeholder="Password" required>
                </div>
              </div>
            
              <button type="submit" class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn">SIGN UP</button>

              <div class="text-center mt-4 font-weight-light">
                Already have an account? <a href="/login" class="text-primary">Sign In</a>
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
@endsection