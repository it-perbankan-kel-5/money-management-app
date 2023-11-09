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
                                    <input type="text" name="saving_name" class="form-control" value="{{ old('saving_name') }}" required>
                                </div>

                                <div class="form-group">
                                    <label for="rekening_id">Tipe Rekening</label>
                                    <select name="rekening_id" class="form-control" value="{{ old('rekening_id') }}" required>
                                        <!-- Isi pilihan tipe rekening sesuai dengan data yang tersedia -->
                                        @foreach ($data as $category)
                                            <option value="{{ $category['id'] }}">{{ $category['no_rekening'] }} - {{ $category['rekening_type'] }} - {{ $category['description'] }}</option>
                                        @endforeach
                                        <!-- Tambahkan pilihan lainnya sesuai kebutuhan -->
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="saving_description">Deskripsi</label>
                                    <input type="text" name="saving_description" class="form-control" value="{{ old('saving_description') }}" required>
                                </div>

                                <div class="form-group">
                                    <label for="saving_target_amount">Target Amount</label>
                                    <input type="number" name="saving_target_amount" class="form-control" value="{{ old('saving_target_amount') }}" required>
                                </div>

                                <div class="form-group">
                                    <label for="saving_target_date">Target Date</label>
                                    <input type="date" name="saving_target_date" class="form-control" value="{{ old('saving_target_date') }}" required>
                                </div>

                                <div class="form-group">
                                    <label for="saving_target_date">Reminder</label>
                                    <input type="date" name="reminder_date" class="form-control" value="{{ old('reminder_date') }}" required>
                                </div>

                                <div class="form-group d-flex justify-content-center">
                                    <button type="button" class="btn btn-secondary mr-2"
                                        onclick="history.back()">Close</button>
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
