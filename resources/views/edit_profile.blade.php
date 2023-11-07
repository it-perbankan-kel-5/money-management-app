@extends('components/layout')
@section('title', 'Rakamin - Edit Profile')
@section('head', 'Edit Profile')
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
                                    alt="Avatar" class="img-fluid my-5" style="width: 90px;" />
                                <h5>{{ $data['first_name'] }}</h5>
                                {{-- <a class="text-primary" href="edit_profile.blade.php"><i class="far fa-edit"></i></a> --}}
                            </div>
                            <div class="col-md-8">
                                <div class="card-body p-5">
                                    <h6 class="align-center">Profile</h6>
                                    <hr class="mt-0 mb-4">

                                    <form method="POST" action="{{ url('/edit_profile/update') }}">
                                        @csrf
                                        @method('PATCH')
                                        <div class="row pt-1">
                                            <div class="col-6 mb-3">
                                                <h6>First Name</h6>
                                                <input type="text" class="form-control" name="fname"
                                                    value="{{ $data['first_name'] }}">
                                            </div>
                                            <div class="col-6 mb-3">
                                                <h6>Last Name</h6>
                                                <input type="text" class="form-control" name="lname"
                                                    value="{{ $data['last_name'] }}">
                                            </div>
                                        </div>
                                        <div class="row pt-1">
                                            <div class="col-6 mb-3">
                                                <h6>Email</h6>
                                                <input type="email" class="form-control" name="email"
                                                    value="{{ $data['email'] }}">
                                            </div>
                                            <div class="col-6 mb-3">
                                                <h6>Phone</h6>
                                                <input type="number" class="form-control" name="phone_number"
                                                    value="{{ $data['phone_number'] }}">
                                            </div>
                                        </div>
                                        <div class="row pt-1">
                                            <div class="col-12 mb-3">
                                                <h6>Address</h6>
                                                <textarea class="form-control" name="address" rows="4">{{ $data['address'] }}</textarea>
                                            </div>
                                        </div>
                                        <div class="d-flex justify-content-center">
                                            <button type="submit" class="btn btn-primary text-light">Save</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
