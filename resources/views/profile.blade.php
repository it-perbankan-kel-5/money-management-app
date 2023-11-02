@extends('components/layout') {{-- Pastikan ini sesuai dengan nama layout Anda --}}
@section('title','Rakamin - Profile')
@section('head','User Profile')
@section('content')
<div class="row"></div>
<div class="main-panel">
        <div class="content-wrapper">
          <!-- User Profile Content -->
          <div class="row">
            <div class="col-md-4">
              <!-- User Profile Image -->

              <div class="card">
                <img src="{{ asset("assets/images/faces/face28.jpg") }}" alt="User Profile" class="card-img-top">
                <div class="card-body text-center">
                  <h5 class="card-title">John Doe</h5>
                  <p class="card-text">Web Developer</p>
                </div>
              </div>
            </div>
            <div class="col-md-8">
              <!-- User Profile Details -->
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">User Profile</h4>

                @if(!empty($data_profile))
{{--                    <h1>data ada</h1>--}}
{{--                  @foreach(session()->get('data') as $data)--}}
                  <table class="table">
                      <tr>
                          <td>Name:</td>
                          <td>{{ $data_profile['first_name'] }} {{ $data_profile['last_name'] }}</td>
                      </tr>
                      <tr>
                          <td>Email:</td>
                          <td>{{ $data_profile['email'] }}</td>
                      </tr>
                      <tr>
                          <td>Phone:</td>
                          <td>{{ $data_profile['phone_number'] }}</td>
                      </tr>
                      <tr>
                          <td>Address:</td>
                          <td>{{ $data_profile['address'] }}</td>
                      </tr>
                  </table>
{{--                  @endforeach--}}
{{--                    @else--}}
{{--                        <h2>gaada</h2>--}}
                    @endif
                </div>
              </div>
            </div>
          </div>
        </div>
</div>
@endsection {{-- Pastikan ini sesuai dengan nama section yang digunakan --}}
