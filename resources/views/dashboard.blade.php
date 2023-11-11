@extends('components/layout')
@section('title', 'Rakamin - Dashboard')
@section('head', 'Dashboard')
@section('content')
    <div class="row">
        <div class="col-md-12 grid-margin">
            <div class="row">
                <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                    <h3 class="font-weight">Welcome back, <strong>{{ $user['first_name'] }}</strong></h3>
                    {{-- @if (session()->has('user_token'))
                        <p>Token yang tersimpan dalam session: {{ session('user_token') }}</p>
                    @else
                        <p>Token tidak ditemukan dalam session.</p>
                    @endif --}}
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-8 grid-margin">
            <div class="col-md-12 grid-margin">
                <div class="row">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-4 mb-5 stretch-card transparent">
                                <div class="card card-tale" style="opacity: 65%; background-color: #6771CA">
                                    <div class="card-body">
                                        <p class="mb-4 text-light">Balance</p>
                                        <p class="fs-25 mb-2 text-light" id="balance"></p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 mb-5 stretch-card transparent">
                                <div class="card card-green" style="opacity: 65%; background-color: #008000">
                                    <div class="card-body">
                                        <p class="mb-4 text-light">Income</p>
                                        <p class="fs-25 mb-2 text-light" id="income"></p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 mb-5 stretch-card transparent">
                                <div class="card card-red" style="opacity: 65%; background-color: #FF0000">
                                    <div class="card-body">
                                        <p class="mb-4 text-light">Outcome</p>
                                        <p class="fs-25 mb-2 text-light" id="outcome"></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <p class="card-title">Analytic</p>
                            <br>
                            <canvas id="order-chart"></canvas>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Transaction Table --}}
            <div class="row">
                <div class="col-md-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <p class="card-title">Transaction History</p>
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col">ID Transaction</th>
                                            <th scope="col">Bank</th>
                                            <th scope="col">Date</th>
                                            <th scope="col">Amount</th>
                                            <th scope="col">Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <th scope="row">12345678909</th>
                                            <td>Bank BNI</td>
                                            <td>August 20, 2023</td>
                                            <td>Rp350.000</td>
                                            <td><img src="{{ asset('assets/images/dashboard/arrow-down.svg') }}"
                                                    alt="">
                                            </td>
                                        </tr>
                                        <tr>
                                            <th scope="row">12345678908</th>
                                            <td>Bank BRI</td>
                                            <td>August 22, 2023</td>
                                            <td>Rp250.000</td>
                                            <td><img src="{{ asset('assets/images/dashboard/arrow-up.svg') }}"
                                                    alt="">
                                        </tr>
                                        <tr>
                                            <th scope="row">12345678907</th>
                                            <td>Bank BTN</td>
                                            <td>August 25, 2023</td>
                                            <td>Rp300.000</td>
                                            <td><img src="{{ asset('assets/images/dashboard/arrow-up.svg') }}"
                                                    alt="">
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4 grid-margin">
            <div class="col-md-12 grid-margin stretch-card">
                
                <div class="card">
                    {{-- TODO - CEK LAGI BUAT FE --}}
                    <div class="card-body">
                        <h3 class="card-title">Budget Limit</h3>
                        <p class="card-text">Limit on 1 Month</p>
                        <div class="d-flex justify-content-between">
                            <p class="text-muted" id="blCurrent"></p>
                            <p class="text-muted" id="blLimit"></p>
                        </div>
                        @php($rate = ($budget_analytic['total_current_amount'] / $budget_analytic['total_target_amount']) * 100)
                        <div class="progress" style="height: 15px">
                            <div class="progress-bar" role="progressbar" style="width: {{ round($rate) }}%"
                                aria-valuenow="100" aria-valuemin="0" aria-valuemax="{{ round($rate) }}">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Saving Plan</h4>

                    <div class="row">
                        @forelse ($saving_plan ?? [] as $sp)
                            <div class="card-container col-md-12 mb-2">
                                <div class="card col-md-12 mb-2 card-inverse-light">
                                    <div class="card-body text-black">
                                        <h5>{{ $sp['name'] ?? 'N/A' }}</h5>
                                        <div class="d-flex justify-content-between">
                                            <p class="text-muted">
                                                Rp. {{ number_format($sp['current_amount'] ?? 0, 0, ',', '.') }}
                                            </p>
                                            <p class="text-muted">
                                                Rp. {{ number_format($sp['target_amount'] ?? 0, 0, ',', '.') }}
                                            </p>
                                        </div>
                                        @php($rateSp = ($sp['current_amount'] ?? 0) > 0 ? ($sp['current_amount'] / $sp['target_amount']) * 100 : 0)
                                        <div class="progress progress-xl">
                                            <div class="progress-bar bg-info" role="progressbar"
                                                style="width:{{ round($rateSp) }}%" aria-valuenow="{{ round($rateSp) }}"
                                                aria-valuemin="0" aria-valuemax="100">
                                                {{ round($rateSp) }}%
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <div class="col-md-12 text-center my-2">No saving plan available</div>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('script')
    <script src="{{ asset('assets/js/dashboard.js') }} "></script>

    <script>
        // Fungsi untuk mengubah angka menjadi format Rupiah
        function formatRupiah(angka) {
            var reverse = angka.toString().split('').reverse().join(''),
                ribuan = reverse.match(/\d{1,3}/g);
            ribuan = ribuan.join('.').split('').reverse().join('');
            return 'Rp. ' + ribuan + ',00';
        }

        // Angka yang ingin diubah menjadi format Rupiah
        const balance = {{ $income }};
        const income = {{ $expense }};
        @foreach ($rekening as $rek)
            const outcome = {{ $rek['balance'] }};
        @endforeach
        const blCurrent = {{ $budget_analytic['total_current_amount'] }};
        const blLimit = {{ $budget_analytic['total_target_amount'] }};

        // Mengubah angka menjadi format Rupiah dan menaruhnya pada elemen paragraf
        document.getElementById('balance').innerHTML = formatRupiah(balance);
        document.getElementById('income').innerHTML = formatRupiah(income);
        document.getElementById('outcome').innerHTML = formatRupiah(outcome);
        document.getElementById('blCurrent').innerHTML = formatRupiah(blCurrent);
        document.getElementById('blLimit').innerHTML = formatRupiah(blLimit);
    </script>
@endsection
