@extends('components/layout') {{-- Pastikan ini sesuai dengan nama layout Anda --}}
@section('title', 'Rakamin - Saving Plan')
@section('head', 'Saving Plan')
@section('content')

    <div class="container py-5">

        <div class="content-wrapper">
            <!-- User Profile Content -->
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">Edit Saving Plan</div>

                        <div class="card-body">

                            @foreach ($data as $data)
                                <form method="POST" action="{{ url('/saving-plan/update/' . $data['id']) }}">
                                    @csrf
                                    @method('PATCH')

                                    <div class="form-group">
                                        <label for="saving_name">Nama</label>
                                        <input type="text" name="saving_name" class="form-control"
                                            value="{{ $data['name'] }}">
                                    </div>

                                    <div class="form-group">
                                        <label for="saving_description">Deskripsi</label>
                                        <input type="text" name="saving_description" class="form-control"
                                            value="{{ $data['description'] }}">
                                    </div>

                                    <div class="form-group">
                                        <label for="saving_target_amount">Target Amount</label>
                                        <input type="text" name="saving_target_amount" class="form-control"
                                            value="{{ $data['target_amount'] }}">
                                    </div>

                                    <div class="form-group">
                                        <label for="saving_target_date">Target Date</label>
                                        <input type="date" name="saving_target_date" class="form-control"
                                            value="{{ $data['target_date'] }}">
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

{{-- template ambil dari edit rekening --}}
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
