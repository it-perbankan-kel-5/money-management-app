@extends('components.auth_layout')
@section('auth')
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

            <form method="POST" action="{{ url('/login/signin') }}" class="pt-3">
              @csrf
              <div class="form-group">
                <label for="exampleInputEmail">Email</label>
                <div class="input-group">
                  <div class="input-group-prepend bg-transparent">
                    <span class="input-group-text bg-transparent border-right-0">
                      <i class="ti-user text-primary"></i>
                    </span>
                  </div>
                  <input type="email" class="form-control form-control-lg border-left-0" name="email" id="email" placeholder="email" required>
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
                  <input type="password" class="form-control form-control-lg border-left-0" name="password" id="password" placeholder="Password" required>
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
                {{-- <a class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn" href="/dashboard">LOGIN</a> --}}
                <button type="submit" class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn">LOGIN</button>
              </div>

              <div class="text-center mt-4 font-weight-light">
                Don't have an account? <a href="/register" class="text-primary">Sign Up</a>
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