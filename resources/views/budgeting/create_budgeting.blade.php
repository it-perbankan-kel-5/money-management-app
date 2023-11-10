@extends('components/layout')
@section('title', 'Rakamin - Budgeting')
@section('head', 'Budgeting')
@section('content')
    <div class="row"></div>
    <div class="main-panel">
        <div class="content-wrapper">
            <!-- User Profile Content -->
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header bg-inverse-primary text-light"><strong>Tambah Budgeting</strong></div>
                        <div class="card-body">

                            <form method="POST" action="{{ url('/budgeting/store') }}">
                                @csrf

                                <div class="form-group">
                                    <label for="budgetin_name">Nama</label>
                                    <input type="text" name="budget_name" class="form-control"
                                        value="{{ old('budget_name') }}" required>
                                </div>

                                <div class="form-group">
                                    <label for="rekening_id">Tipe Rekening</label>
                                    <select name="rekening_id" class="form-control" value="{{ old('rekening_id') }}"
                                        required>
                                        <!-- Isi pilihan tipe rekening sesuai dengan data yang tersedia -->
                                        @foreach ($data as $category)
                                            <option value="{{ $category['id'] }}">{{ $category['no_rekening'] }} -
                                                {{ $category['rekening_type'] }}
                                                - {{ $category['description'] }}</option>
                                        @endforeach
                                        <!-- Tambahkan pilihan lainnya sesuai kebutuhan -->
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="budgetin_description">Deskripsi</label>
                                    <input type="text" name="budget_description" class="form-control"
                                        value="{{ old('budget_description') }}" required>
                                </div>


                                <div class="form-group">
                                    <label for="budgetin_target_date">Limit Budget</label>
                                    <input type="number" name="budget_limit_target" class="form-control"
                                        value="{{ old('budget_limit_target') }}" required>
                                </div>

                                <div class="form-group">
                                    <label for="rekening_id">Limit Type</label>
                                    <select name="budget_limit_type_id" class="form-control"
                                        value="{{ old('rekening_id') }}" required>
                                        <!-- Isi pilihan tipe rekening sesuai dengan data yang tersedia -->
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

@section('script')

    {{-- <script>
        // Function to format a number as Rupiah currency
        function formatAsRupiah(amount) {
            return new Intl.NumberFormat('id-ID', {
                style: 'currency',
                currency: 'IDR'
            }).format(amount);
        }

        // Get the input element
        const inputElement = document.getElementById('saving_target_amount');

        // Add an event listener to the input element to format the value
        inputElement.addEventListener('input', function() {
            // Remove non-digit characters and parse the input as a number
            const inputValue = parseFloat(this.value.replace(/[^\d.]/g, ''));

            // Check if the input is a valid number
            if (!isNaN(inputValue)) {
                // Format the input value as Rupiah and update the input field
                this.value = formatAsRupiah(inputValue);
            }
        });
    </script> --}}

@endsection
