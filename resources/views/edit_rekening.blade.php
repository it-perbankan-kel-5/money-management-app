@extends('components/layout') {{-- Pastikan ini sesuai dengan nama layout Anda --}}
@section('title', 'Rakamin - Rekening')
@section('head', 'Rekening')
@section('content')

    <div class="container py-5">

        <div class="content-wrapper">
            <!-- User Profile Content -->
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">Tambah Rekening</div>

                        <div class="card-body">

                            <form method="POST" action="{{ url('/update_rekening/' . $data['id']) }}">
                                @csrf
                                @method('PATCH')

                                <div class="form-group">
                                    <label for="rekening_number">Nomor Rekening</label>
                                    <input type="text" name="rekening_number" class="form-control"
                                        value="{{ $data['no_rekening'] }}" readonly>
                                </div>

                                <div class="form-group">
                                    <label for="rekening_type">Tipe Rekening</label>
                                    <input type="text" name="rekening_type" class="form-control"
                                        value="{{ $data['rekening_type'] }}" readonly>
                                </div>

                                <div class="form-group">
                                    <label for="rekening_description">Deskripsi Rekening</label>
                                    <input type="text" name="rekening_description" class="form-control"
                                        value="{{ $data['description'] }}">
                                </div>

                                <div class="form-group">
                                    <label for="rekening_alias">Alias Rekening</label>
                                    <input type="text" name="rekening_alias" class="form-control"
                                        value="{{ $data['alias'] }}">
                                </div>

                                <button type="submit" class="btn btn-primary">Save</button>
                            </form>
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
