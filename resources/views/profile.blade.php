@extends('components/layout')
@section('title','Rakamin - Profile')
@section('head','User Profile')
@section('content')
<section class="vh-90" style="background-color: #f4f5f7;">
  <div class="container py-5 h-90">
      <div class="row d-flex justify-content-center align-items-center h-90">
          <div class="col col-lg-9 mb-4 mb-lg-0">
              <div class="card mb-3" style="border-radius: .5rem;">
                  <div class="row g-0">
                      <div class="col-md-3 gradient-custom text-center text-white"
                          style="border-top-left-radius: .5rem; border-bottom-left-radius: .5rem;">
                          <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava1-bg.webp"
                              alt="Avatar" class="img-fluid my-5" style="width: 80px;" />
                          <h5>Atsumichi</h5>
                          <i class="far fa-edit mb-5"></i>
                      </div>
                      <div class="col-md-8">
                          <div class="card-body p-5">
                              <h6 class="align-center">Profile</h6>
                              <hr class="mt-0 mb-4">
                              <div class="row pt-1">
                                  <div class="col-6 mb-3">
                                      <h6>Firts Name</h6>
                                      <p class="text-muted">atsu</p>
                                  </div>
                                  <div class="col-6 mb-3">
                                      <h6>Last Name</h6>
                                      <p class="text-muted">michi</p>
                                  </div>
                              </div>
                              <hr class="mt-1 mb-2">
                              <div class="row pt-1">
                                  <div class="col-6 mb-3">
                                      <h6>Email</h6>
                                      <p class="text-muted">atsumichi@gmail.com</p>
                                    </div>
                                    <div class="col-6 mb-3">
                                      <h6>Phone</h6>
                                      <p class="text-muted">089123456789</p>
                                    </div>
                                </div>
                                <hr class="mt-1 mb-2">
                                <div class="row pt-1">
                                  <div class="col-12 mb-3">
                                      <h6>Address</h6>
                                      <p class="text-muted">Arab</p>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </div>
</section>
@endsection {{-- Pastikan ini sesuai dengan nama section yang digunakan --}}
