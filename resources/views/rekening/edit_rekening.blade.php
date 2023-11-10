@extends('components/layout') {{-- Pastikan ini sesuai dengan nama layout Anda --}}
@section('title', 'Rakamin - Rekening')
@section('head', 'Edit Rekening')
@section('content')

    <div class="container py-5">

        <div class="content-wrapper">
            <!-- User Profile Content -->
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header bg-inverse-primary"><strong>Edit Rekening</strong></div>

                        <div class="card-body">

                            @foreach ($data as $rekening)
                                <form method="POST" action="{{ url('/rekening/update/' . $rekening['id']) }}">
                                    @csrf
                                    @method('PATCH')

                                    <div class="form-group">
                                        <label for="rekening_number">Nomor Rekening</label>
                                        <input type="text" name="rekening_number" class="form-control"
                                            value="{{ $rekening['no_rekening'] }}" readonly>
                                    </div>

                                    <div class="form-group">
                                        <label for="rekening_type">Tipe Rekening</label>
                                        <input type="text" name="rekening_type" class="form-control"
                                            value="{{ $rekening['rekening_type'] }}" readonly>
                                    </div>

                                    <div class="form-group">
                                        <label for="rekening_description">Deskripsi Rekening</label>
                                        <input type="text" name="rekening_description" class="form-control"
                                            value="{{ $rekening['description'] }}">
                                    </div>

                                    <div class="form-group">
                                        <label for="rekening_alias">Alias Rekening</label>
                                        <input type="text" name="rekening_alias" class="form-control"
                                            value="{{ $rekening['alias'] }}">
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
{{-- 
@section('script')

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Menambahkan event listener ke tombol "Hapus"
            const deleteButtons = document.querySelectorAll('.delete-button');

            deleteButtons.forEach(button => {
                button.addEventListener('click', function() {
                    const rekeningId = this.getAttribute('data-id');
                    Swal.fire({
                        title: 'Konfirmasi Hapus Rekening',
                        text: 'Apakah Anda yakin ingin menghapus rekening ini?',
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#d33',
                        cancelButtonColor: '#3085d6',
                        confirmButtonText: 'Hapus',
                        cancelButtonText: 'Batal'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            // Submit form dengan metode POST
                            const form = document.getElementById('delete-form-' +
                                rekeningId);
                            form.submit();
                        }
                    });
                });
            });
        });
    </script>

@endsection --}}
