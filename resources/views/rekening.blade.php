@extends('components/layout') {{-- Pastikan ini sesuai dengan nama layout Anda --}}
@section('title','Rakamin - Rekening')
@section('head','Rekening')
@section('content')
<div class="row"></div>
<div class="main-panel">
        <div class="content-wrapper">
          <!-- User Profile Content -->
          <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Tambah Rekening</div>

                <div class="card-body">
                    {{-- @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif

                    @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                    @endif --}}

                    <form method="POST" action="{{ url('/rekening/add') }}">
                        @csrf

                        <div class="form-group">
                            <label for="rekening_number">Nomor Rekening</label>
                            <input type="text" name="rekening_number" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label for="rekening_type">Tipe Rekening</label>
                            <select name="rekening_type" class="form-control" required>
                                <!-- Isi pilihan tipe rekening sesuai dengan data yang tersedia -->
                                <option value="1">Rekening Utama</option>
                                <option value="2">Rekening Tabungan</option>
                                <option value="3">Rekening Investasi</option>
                                <!-- Tambahkan pilihan lainnya sesuai kebutuhan -->
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

                        <button type="submit" class="btn btn-primary">Tambah Rekening</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
        </div>
</div>
@endsection {{-- Pastikan ini sesuai dengan nama section yang digunakan --}}
