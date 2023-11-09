@extends('components/layout') {{-- Pastikan ini sesuai dengan nama layout Anda --}}
@section('title', 'Rakamin - Budgeting Plan')
@section('head', 'Budgeting Plan')
@section('content')

    <div class="container py-5">

        <div class="content-wrapper">
            <!-- User Profile Content -->
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">Edit Budgeting</div>

                        <div class="card-body">

                            @foreach ($data as $data)
                                <form method="POST" action="{{ url('/budgeting/update/' . $data['id']) }}">
                                    @csrf
                                    @method('PATCH')

                                    <div class="form-group">
                                        <label for="budgeting_name">Nama</label>
                                        <input type="text" name="budgeting_name" class="form-control"
                                            value="{{ $data['budgeting_name'] }}">
                                    </div>

                                    <div class="form-group">
                                        <label for="budgeting_description">Deskripsi</label>
                                        <input type="text" name="budgeting_description" class="form-control"
                                            value="{{ $data['budgeting_description'] }}">
                                    </div>

                                    <div class="form-group">
                                        <label for="budgeting_limit_target">Limit Target</label>
                                        <input type="text" name="budgeting_limit_target" class="form-control"
                                            value="{{ $data['budgeting_limit_target'] }}">
                                    </div>

                                    <div class="form-group">
                                        <label for="budgeting_target_date">Target Date</label>
                                        <input type="text" name="budgeting  _target_date" class="form-control"
                                            value="{{ $data['budgeting  _target_date'] }}">
                                    </div>

                                    <button type="submit" class="btn btn-primary">Save</button>
                                </form>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection