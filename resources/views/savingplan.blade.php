@extends('components/layout') {{-- Pastikan ini sesuai dengan nama layout Anda --}}
@section('title', 'Rakamin - Saving Plan')
@section('head', 'Saving Plan')
@section('content')

    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        Saving Plan
                        <button class="add btn btn-icon text-primary bg-transparent">
                            <a href="/addsavingplan"><i class="fas fa-circle-plus"></i></a>
                        </button>
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Nama</th>
                                    <th>Deskripsi</th>
                                    <th>Current Amount</th>
                                    <th>Target Amount</th>
                                    <th>Target Date</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                {{-- @foreach ($data as $savingplan) --}}
                                    {{-- <tr>
                                        <td>{{ $savingplan['name'] }}</td>
                                        <td>{{ $savingplan['description'] }}</td>
                                        <td>{{ $savingplan['current_amount'] }}</td>
                                        <td>{{ $savingplan['target_amount'] }}</td>
                                        <td>{{ $savingplan['target_date'] }}</td>
                                        <td>
                                            <!-- Tambahkan tombol/tindakan untuk mengedit atau menghapus savingplan -->
                                            <a href="{{ url('/edit_savingplan/' . $savingplan['id']) }}" class="btn btn-warning btn-sm">
                                                <i class="text-light far fa-edit"></i>
                                            </a>
                                            <a href="{{ url('/savingplan/delete/' . $savingplan['id']) }}" class="btn btn-danger btn-sm">
                                                <i class="text-light far fa-trash-alt"></i>
                                            </a>
                                            <button class="btn btn-danger delete-button"
                                                data-id="{{ $savingplan['id'] }}">Hapus</button>
                                            <form action="{{ url('/savingplan/delete/' . $savingplan['id']) }}"
                                                method="POST" class="d-none" id="delete-form-{{ $savingplan['id'] }}">
                                                @csrf
                                                @method('DELETE')
                                            </form>
                                        </td>
                                    </tr> --}}
                                {{-- @endforeach --}}
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

{{-- @section('script')

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
