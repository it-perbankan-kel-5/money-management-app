@extends('components/layout')
@section('title', 'Rakamin - Saving Plan')
@section('head', 'Saving Plan')
@section('content')
    <div class="row"></div>
    <div class="main-panel">
        <div class="content-wrapper">
            <!-- User Profile Content -->
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header bg-inverse-primary"><strong>Tambah Saving Plan</strong></div>
                        <div class="card-body">

                            <form method="POST" action="{{ url('/saving-plan/store') }}">
                                @csrf

                                <div class="form-group">
                                    <label for="saving_name">Nama</label>
                                    <input type="text" name="saving_name" class="form-control" required>
                                </div>

                                <div class="form-group">
                                    <label for="saving_description">Deskripsi</label>
                                    <input type="text" name="saving_description" class="form-control" required>
                                </div>

                                <div class="form-group">
                                    <label for="saving_target_amount">Target Amount</label>
                                    <input type="number" name="saving_target_amount" class="form-control" required>
                                </div>

                                <div class="form-group">
                                    <label for="saving_target_date">Target Date</label>
                                    <input type="date" name="saving_target_date" class="form-control" required>
                                </div>
                                <div class="form-group d-flex justify-content-center">
                                    <button type="button" class="btn btn-secondary mr-2" onclick="history.back()">Close</button>
                                    <button type="submit" class="btn btn-primary">Tambah</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
