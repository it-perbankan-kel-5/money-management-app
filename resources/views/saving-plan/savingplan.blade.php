@extends('components/layout')
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
                            <a href="/saving-plan/create"><i class="fas fa-circle-plus"></i></a>
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
                                @foreach ($data as $savingplan)
                                    <tr>
                                        <td>{{ $savingplan['name'] }}</td>
                                        <td>{{ $savingplan['description'] }}</td>
                                        <td>{{ $savingplan['current_amount'] }}</td>
                                        <td>{{ $savingplan['target_amount'] }}</td>
                                        <td>{{ $savingplan['target_date'] }}</td>
                                        <td>

                                            <a href="{{ url('/saving-plan/edit/' . $savingplan['id']) }}"
                                                class="btn btn-warning btn-sm">
                                                <i class="text-light far fa-edit"></i>
                                            </a>

                                            <button class="btn btn-warning btn-sm edit-button"
                                                data-id="{{ $savingplan['id'] }}">
                                                <i class="fas fa-coins"></i>
                                            </button>


                                            <button class="btn btn-danger btn-sm delete-button"
                                                data-id="{{ $savingplan['id'] }}">
                                                <i class="text-light far fa-trash-alt"></i>
                                            </button>
                                            <form action="{{ url('/saving-plan/delete/' . $savingplan['id']) }}"
                                                method="POST" class="d-none" id="delete-form-{{ $savingplan['id'] }}">
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
@endsection

@section('script')

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Menambahkan event listener ke tombol "Hapus"
            const deleteButtons = document.querySelectorAll('.delete-button');

            deleteButtons.forEach(button => {
                button.addEventListener('click', function() {
                    const savingplanId = this.getAttribute('data-id');
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
                                savingplanId);
                            form.submit();
                        }
                    });
                });
            });
        });
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Menangkap semua tombol "Edit" dengan class "edit-button"
            const editButtons = document.querySelectorAll('.edit-button');

            // Menambahkan event listener untuk setiap tombol "Edit"
            editButtons.forEach(function(button) {
                button.addEventListener('click', function() {
                    // Mendapatkan id dari tombol yang diklik menggunakan atribut data-id
                    const savingPlanId = button.getAttribute('data-id');

                    Swal.fire({
                        title: "Add Amount",
                        input: "number",
                        inputAttributes: {
                            autocapitalize: "off"
                        },
                        showCancelButton: true,
                        confirmButtonText: "Submit",
                        showLoaderOnConfirm: true,
                        preConfirm: async (amount) => {
                            try {
                                // Mengirim data menggunakan form Laravel
                                const form = document.createElement('form');
                                form.method = 'POST';
                                form.action =
                                    `{{ url('/saving-plan/add-amount/${savingPlanId}') }}`;
                                form.innerHTML = `
                                @csrf
                                @method('PATCH')
                                <input type="number" name="amount" value="${amount}" hidden>
                            `;

                                document.body.appendChild(form);
                                form.submit();
                            } catch (error) {
                                Swal.showValidationMessage(`
                                Request failed: ${error}
                            `);
                            }
                        },
                        allowOutsideClick: () => !Swal.isLoading()
                    });
                });
            });
        });
    </script>

@endsection
