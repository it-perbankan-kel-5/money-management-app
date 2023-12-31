@extends('components/layout') {{-- Pastikan ini sesuai dengan nama layout Anda --}}
@section('title', 'Rakamin - Rekening')
@section('head', 'Rekening')
@section('content')

    <div class="container py-5">

        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Daftar Rekening
                        <button class="add btn btn-icon text-primary bg-transparent">
                            <a href="/rekening/create"><i class="fas fa-circle-plus"></i></a>
                        </button>
                    </div>

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Nomor Rekening</th>
                                        <th>Tipe Rekening</th>
                                        <th>Deskripsi Rekening</th>
                                        <th>Alias Rekening</th>
                                        <th>Balance</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data as $rekening)
                                        <tr>
                                            <td>{{ $rekening['no_rekening'] }}</td>
                                            <td>{{ $rekening['rekening_type'] }}</td>
                                            <td>{{ $rekening['description'] }}</td>
                                            <td>{{ $rekening['alias'] }}</td>
                                            <td>{{ $rekening['balance'] }}</td>
                                            <td>
                                                <!-- Tambahkan tombol/tindakan untuk mengedit atau menghapus rekening -->
                                                <a href="{{ url('/rekening/edit/' . $rekening['id']) }}"
                                                    class="btn btn-warning btn-sm">
                                                    <i class="text-light far fa-edit"></i>
                                                </a>

                                                <button class="btn btn-danger btn-sm delete-button"
                                                    data-id="{{ $rekening['id'] }}">
                                                    <i class=" text-light far fa-trash-alt"></i>
                                                </button>

                                                <form action="{{ url('/rekening/delete/' . $rekening['id']) }}"
                                                    method="POST" class="d-none" id="delete-form-{{ $rekening['id'] }}">
                                                    @csrf
                                                    @method('DELETE')
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

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

@endsection
