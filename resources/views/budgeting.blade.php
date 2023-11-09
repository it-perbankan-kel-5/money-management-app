@extends('components/layout')
@section('title', 'Rakamin - Budgetin')
@section('head', 'Budgetin')
@section('content')
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        Budgetin
                        <button class="add btn btn-icon text-primary bg-transparent">
                            <a href="/budgeting/create"><i class="fas fa-circle-plus"></i></a>
                        </button>
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>  
                                    <th>Nama</th>
                                    <th>Deskripsi</th>
                                    <th>Current Budget</th>
                                    <th>Limit Budget</th>
                                    <th>Limit Type</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $budgetin)
                                    <tr>
                                        <td>{{ $budgetin['name'] }}</td>
                                        <td>{{ $budgetin['description'] }}</td>
                                        <td>{{ $budgetin['current_amount'] }}</td>
                                        <td>{{ $budgetin['limit_target'] }}</td>
                                        <td>{{ $budgetin['type'] }}</td>
                                        <td>
                                            
                                            <a href="{{ url('/budgeting/edit/'. $budgetin->id) }}"
                                                class="btn btn-warning btn-sm">
                                                <i class="text-light far fa-edit"></i>
                                            </a>

                                            {{-- <button class="btn btn-warning btn-sm edit-button"
                                                data-id="{{ $budgetin['id'] }}">
                                                <i class="fas fa-coins"></i>
                                            </button> --}}


                                            <button class="btn btn-danger btn-sm delete-button"
                                                data-id="{{ $budgetin['id'] }}">
                                                <i class="text-light far fa-trash-alt"></i>
                                            </button>
                                            <form action="{{ url('/budgeting/delete/{id}' . $budgetin['id']) }}"
                                                method="POST" class="d-none" id="delete-form-{{ $budgetin['id'] }}">
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
                        title: 'Konfirmasi Hapus Budgetin',
                        text: 'Apakah Anda yakin ingin menghapus budgetin ini?',
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























{{-- @extends('components/layout')
@section('tittle','Rakamin - Dashboard')
@section('head','Budgeting')
@section('content')

  <div class="col-md-12 grid-margin stretch-card">
    <div class="card position-relative">
      <div class="card-body">
      <div class="col-12 col-xl-8 mb-4 mb-xl-0">
        <h3 class="font-weight-bold">Current Budget</h3>
      </div>
        <div id="budgetinchart" class="carousel slide detailed-report-carousel position-static pt-2" data-ride="carousel">
          <div class="carousel-inner">
            <div class="carousel-item active">
              <div class="row">
                <div class="col-md-12 col-xl-9">
                  <div class="row">
                    <div class="col-md-6 mt-2">
                      <canvas id="budgetin-chart"></canvas>
                      <div id="budgetin-legend"></div>
                    </div>
                    <div class="col-md-12 col-xl-6 d-flex flex-column justify-content-start">
                      <div class="ml-xl-4 mt-3">
                      <p class="card-title">All of the remaining budget</p>
                      <p class="card-title">in this month is Rp. 500.000-,</p>

                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="col-md-6 grid-margin transparent">
  <div class="row">
      @foreach($data as $item)
          <div class="col-md-6 mb-4 stretch-card transparent">
              <div class="card card-tale">
                  <div class="card-body">
                      <p class="mb-4">Budget {{$item['type']}}</p>
                      <p>Current: </p>
                      <p class="fs-30 mb-2">Rp. {{$item['current_amount']}}-,</p>
                      <p>Limit: </p>
                      <p>Rp. {{$item['limit_target']}}-,</p>
                  </div>
              </div>
          </div>
      @endforeach
   <div class="col-md-6 mb-4 stretch-card transparent">
     <div class="card card-tale">
       <div class="card-body">
         <p class="mb-4">Budget Transportation</p>
         <p class="fs-30 mb-2">RP. 250.000-,</p>
         <p>Rp. 250.000-, Remaining</p>
       </div>
     </div>
   </div>
   <div class="col-md-6 mb-4 stretch-card transparent">
     <div class="card card-dark-blue">
       <div class="card-body">
         <p class="mb-4">Budget Transportation</p>
         <p class="fs-30 mb-2">RP. 250.000-,</p>
         <p>Rp. 250.000-, Remaining</p>
       </div>
     </div>
   </div>
  </div>
</div> --}}

{{-- Data analytic --}}
    {{-- {{json_encode($analytic, JSON_PRETTY_PRINT)}} --}}

{{-- Add Budget --}}
{{-- <a href="/addbudgeting"><div id="add-trigger" class=""><i class="icon-add"></i></div></a> --}}

{{-- @endsection --}}
