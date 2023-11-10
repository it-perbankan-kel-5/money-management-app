@extends('components/layout')
@section('title', 'Add - Rekening')
@section('head', 'Rekening')
@section('content')
    <div class="row"></div>
    <div class="main-panel">
        <div class="content-wrapper">
            <!-- User Profile Content -->
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header bg-inverse-primary"><strong>Tambah Rekening</strong></div>
                        <div class="card-body">

                            <form method="POST" action="{{ url('/rekening/store') }}">
                                @csrf

                                <div class="form-group">
                                    <label for="rekening_number">Nomor Rekening</label>
                                    <input type="text" name="rekening_number" class="form-control" required>
                                </div>

                                <div class="form-group">
                                    <label for="rekening_type">Tipe Rekening</label>
                                    <select name="rekening_type" class="form-control" required>
                                        <option value="1">Rekening Utama</option>
                                        <option value="2">Rekening Tabungan</option>
                                        <option value="3">Rekening Investasi</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="rekening_description">Deskripsi Rekening</label>
                                    <input type="text" name="rekening_description" class="form-control">
                                </div>

                                <div class="form-group">
                                    <label for="rekening_alias">Alias Rekening</label>
                                    <input type="text" name="rekening_alias" class="form-control">
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
