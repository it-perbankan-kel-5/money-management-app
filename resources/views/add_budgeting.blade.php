@extends('components/layout')
@section('title', 'Rakamin - Budgetin')
@section('head', 'Budgetin')
@section('content')
    <div class="row"></div>
    <div class="main-panel">
        <div class="content-wrapper">
            <!-- User Profile Content -->
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header bg-inverse-primary"><strong>Tambah Budgetin</strong></div>
                        <div class="card-body">

                            <form method="POST" action="{{ url('/budgeting/store') }}">
                                @csrf

                              <!-- TODO - pidahin rekening ke select field dengan value id rekening -->
                                {{-- {{json_encode($rekening::get_rekening_utama(), JSON_PRETTY_PRINT)}} --}}

                                <div class="form-group">
                                    <label for="budgetin_name">Nama</label>
                                    <input type="text" name="budget_name" class="form-control" value="{{ old('budgeting_name') }}" required>
                                </div>

                                <div class="form-group">
                                  <label for="rekening_id">Tipe Rekening</label>
                                  <select name="rekening_id" class="form-control" value="0000384756" required>
                                    {{-- <option value="0000384756">Rekeningtest</option> --}}
                                      <!-- Isi pilihan tipe rekening sesuai dengan data yang tersedia -->
                                      @foreach ($data as $category)
                                          <option value="{{ $category['id'] }}">{{ $category['no_rekening'] }} - {{ $category['rekening_type'] }} - {{ $category['description'] }}</option>
                                      @endforeach
                                      <!-- Tambahkan pilihan lainnya sesuai kebutuhan -->
                                  </select>
                              </div>
                                
                                <div class="form-group">
                                  <label for="budgetin_description">Deskripsi</label>
                                  <input type="text" name="budget_description" class="form-control" required>
                                </div>
                                

                                <div class="form-group">
                                  <label for="budgetin_target_date">Limit Budget</label>
                                  <input type="number" name="budget_limit_target" class="form-control" required>
                                </div>

                                <div class="form-group">
                                    <label for="rekening_id">Limit Type</label>
                                    <select name="budget_limit_type_id" class="form-control" value="{{ old('rekening_id') }}" required>
                                        <!-- Isi pilihan tipe rekening sesuai dengan data yang tersedia -->
                                        {{-- @foreach ($data as $category)
                                            <option value="{{ $category['id'] }}">{{ $category['no_rekening'] }} - {{ $category['rekening_type'] }} - {{ $category['description'] }}</option>
                                        @endforeach --}}
                                        <option value="1">Healthcare</option>
                                        <option value="2">Entertainment</option>
                                        <option value="3">Transportation</option>
                                        <option value="4">Utilities</option>
                                        <option value="5">Education</option>
                                        <option value="6">Personal Care</option>
                                        <option value="7">Food</option>
                                        <option value="8">Shopping</option>
                                        <option value="9">Other</option>
                                        <!-- Tambahkan pilihan lainnya sesuai kebutuhan -->
                                    </select>
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
