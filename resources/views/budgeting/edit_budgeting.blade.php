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
                                        <label for="budget_name">Nama</label>
                                        <input type="text" name="budget_name" class="form-control"
                                            value="{{ $data['name'] }}">
                                    </div>

                                    <div class="form-group">
                                        <label for="budgeting_description">Deskripsi</label>
                                        <input type="text" name="budget_description" class="form-control"
                                            value="{{ $data['description'] }}">
                                    </div>

                                    <div class="form-group">
                                        <label for="budgeting_limit_target">Limit Target</label>
                                        <input type="text" name="budget_limit_target" class="form-control"
                                            value="{{ $data['limit_target'] }}">
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