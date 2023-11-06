@extends('components/layout')
@section('title', 'Rakamin - Profile')
@section('head', 'User Profile')
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
                                <a href="{{ url('/edit_profile') }}" style="color: inherit;">
                                    <i class="far fa-edit my-4"></i>
                                </a>
                                <button type="button" class="btn btn-primary btn-icon-text d-block mt-5 ml-2"
                                    data-toggle="modal" data-target="#exampleModal" data-whatever="">Change Password
                                </button>
                            </div>
                            <div class="col-md-8">
                                <div class="card-body p-5">
                                    <h6 class="align-center">Profile</h6>
                                    <hr class="mt-0 mb-4">
                                    <div class="row pt-1">
                                        <div class="col-6 mb-3">
                                            <h6>First Name</h6>
                                            <p class="text-muted">{{ $data['first_name'] }}</p>
                                        </div>
                                        <div class="col-6 mb-3">
                                            <h6>Last Name</h6>
                                            <p class="text-muted">{{ $data['last_name'] }}</p>
                                        </div>
                                    </div>
                                    <hr class="mt-1 mb-2">
                                    <div class="row pt-1">
                                        <div class="col-6 mb-3">
                                            <h6>Email</h6>
                                            <p class="text-muted">{{ $data['email'] }}</p>
                                        </div>
                                        <div class="col-6 mb-3">
                                            <h6>Phone</h6>
                                            <p class="text-muted">{{ $data['phone_number'] }}</p>
                                        </div>
                                    </div>
                                    <hr class="mt-1 mb-2">
                                    <div class="row pt-1">
                                        <div class="col-12 mb-3">
                                            <h6>Address</h6>
                                            <p class="text-muted">{{ $data['address'] }}</p>
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

    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Change Password</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="{{ url('/profile/change_password') }}">
                        @csrf
                        @method('PATCH')
                        <div class="form-group">
                            <label for="current-password" class="col-form-label">Current Password:</label>
                            <input type="password" class="form-control" name="current_password" required>
                        </div>
                        <div class="form-group">
                            <label for="new-password" class="col-form-label">New Password:</label>
                            <input type="password" class="form-control" name="new_password" required>
                        </div>
                        <div class="form-group">
                            <label for="confirm-password" class="col-form-label">Confirm New Password:</label>
                            <input type="password" class="form-control" name="new_password_confirm" required>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save Changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
