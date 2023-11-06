@extends('components/layout') {{-- Pastikan ini sesuai dengan nama layout Anda --}}
@section('title','Rakamin - Rekening')
@section('head','Rekening')
@section('content')

        <div class="container py-5">

        <div class="content-wrapper">
          <!-- User Profile Content -->
          <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Tambah Rekening</div>

                <div class="card-body">

                    <form method="POST" action="{{ url('/edit_rekening/{id}') }}">
                        @csrf
                        @method('PATCH')
                        {{-- <div class="form-group">
                            <label for="rekening_number">Nomor Rekening</label>
                            <input type="text" name="rekening_number" class="form-control" readonly>
                        </div>

                        <div class="form-group">
                            <label for="rekening_type">Tipe Rekening</label>
                            <select name="rekening_type" class="form-control" readonly>
                                <!-- Isi pilihan tipe rekening sesuai dengan data yang tersedia -->
                                <option value="1">Rekening Utama</option>
                                <option value="2">Rekening Tabungan</option>
                                <option value="3">Rekening Investasi</option>
                                <!-- Tambahkan pilihan lainnya sesuai kebutuhan -->
                            </select>
                        </div> --}}

                        <div class="form-group">
                            <label for="rekening_description">Deskripsi Rekening</label>
                            <input type="text" name="rekening_description" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="rekening_alias">Alias Rekening</label>
                            <input type="text" name="rekening_alias" class="form-control">
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

@section('script')

<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Menambahkan event listener ke tombol "Hapus"
        const deleteButtons = document.querySelectorAll('.delete-button');

        deleteButtons.forEach(button => {
            button.addEventListener('click', function () {
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
                        const form = document.getElementById('delete-form-' + rekeningId);
                        form.submit();
                    }
                });
            });
        });
    });
</script>

@endsection
