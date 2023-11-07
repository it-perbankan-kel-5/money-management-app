@extends('components/layout')
@section('title', 'Rakamin - Dashboard')
@section('head', 'Dashboard')
@section('content')
    <div class="row">
        <div class="col-md-12 grid-margin">
            <div class="row">
                <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                    @if (session()->has('user_token'))
                        <p>Token yang tersimpan dalam session: {{ session('user_token') }}</p>
                    @else
                        <p>Token tidak ditemukan dalam session.</p>
                    @endif
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

                            <canvas id="order-chart"></canvas>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <p class="card-title">Transaction History</p>
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
                                        <td><img src="{{ asset('assets/images/dashboard/arrow-down.svg') }}" alt="">
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">12345678908</th>
                                        <td>Bank BRI</td>
                                        <td>August 22, 2023</td>
                                        <td>Rp250.000</td>
                                        <td><img src="{{ asset('assets/images/dashboard/arrow-up.svg') }}" alt="">
                                    </tr>
                                    <tr>
                                        <th scope="row">12345678907</th>
                                        <td>Bank BTN</td>
                                        <td>August 25, 2023</td>
                                        <td>Rp300.000</td>
                                        <td><img src="{{ asset('assets/images/dashboard/arrow-up.svg') }}" alt="">
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4 grid-margin">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    {{--TODO - CEK LAGI BUAT FE--}}
                    {{-- <div class="card-body">
                        <h3 class="card-title">Budget Limit</h3>
                        <p class="card-text">Limit on 1 Month</p>
                        <div class="d-flex justify-content-between">
                            <p class="text-muted" id="blCurrent"></p>
                            <p class="text-muted" id="blTarget"></p>
                        </div>
                        @php($rate = ($budget_analytic['total_current_amount'] / $budget_analytic['total_target_amount']) * 100)
                        <div class="progress" style="height: 15px">
                            <div class="progress-bar" role="progressbar" style="width: {{round($rate)}}%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="{{round($rate)}}">
                            </div>
                        </div>
                    </div> --}}
                </div>
            </div>
            <div class="card-body">
                <h4 class="card-title">Saving Plan
                </h4>

                <div class="list-wrapper">
                    <ul class="d-flex flex-column-reverse todo-list">
                        {{--TODO - CEK LAGI BUAT FE--}}
                        {{-- @foreach($saving_plan as $sp)
                            <li>
                                <div class="card-check">
                                    <label class="card-check-label">
                                        <h5>
                                            <input class="checkbox" type="checkbox">
                                            {{$sp['name']}}
                                            <i class="input-helper"></i>
                                        </h5>
                                        <p class="card-text">Current: Rp {{$sp['current_amount']}}</p>
                                        @php($rateSp = ($sp['current_amount'] / $sp['target_amount']) * 100)
                                        <div class="progress" style="height: 10px">
                                            <div class="progress-bar" role="progressbar" style="width: {{round($rateSp)}}%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="{{round($rateSp)}}"/>
                                        </div>
                                    </label>
                                </div>
                                <i class="remove ti-close"></i>
                            </li>
                        @endforeach --}}
                    </ul>
                </div>
                <div class="add-items d-flex">
                    <input type="text" class="form-control todo-list-input" placeholder="Add new task">
                    <button class="add btn btn-icon text-primary todo-list-add-btn bg-transparent">
                        <i class="fas fa-circle-plus"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>
    <div class="theme-setting-wrapper">
        <div id="settings-trigger"><i class="ti-settings"></i></div>
        <div id="theme-settings" class="settings-panel">
            <i class="settings-close ti-close"></i>
            <p class="settings-heading">SIDEBAR SKINS</p>
            <div class="sidebar-bg-options selected" id="sidebar-light-theme">
                <div class="img-ss rounded-circle bg-light border mr-3"></div>Light
            </div>
            <div class="sidebar-bg-options" id="sidebar-dark-theme">
                <div class="img-ss rounded-circle bg-dark border mr-3"></div>Dark
            </div>
            <p class="settings-heading mt-2">HEADER SKINS</p>
            <div class="color-tiles mx-0 px-4">
                <div class="tiles success"></div>
                <div class="tiles warning"></div>
                <div class="tiles danger"></div>
                <div class="tiles info"></div>
                <div class="tiles dark"></div>
                <div class="tiles default"></div>
            </div>
        </div>
    </div>

    <script>
        // Fungsi untuk mengubah angka menjadi format Rupiah
        function formatRupiah(angka) {
            var reverse = angka.toString().split('').reverse().join(''),
                ribuan = reverse.match(/\d{1,3}/g);
            ribuan = ribuan.join('.').split('').reverse().join('');
            return 'Rp. ' + ribuan + ',00';
        }

        // Angka yang ingin diubah menjadi format Rupiah
        const balance = {{$income}};
        const income = {{$expense}};
        @foreach($rekening as $rek)
            const outcome = {{$rek['balance']}};
        @endforeach
        const blCurrent = {{$budget_analytic['total_current_amount']}};
        const blTarget = {{$budget_analytic['total_target_amount']}};

        // Mengubah angka menjadi format Rupiah dan menaruhnya pada elemen paragraf
        document.getElementById('balance').innerHTML = formatRupiah(balance);
        document.getElementById('income').innerHTML = formatRupiah(income);
        document.getElementById('outcome').innerHTML = formatRupiah(outcome);
        document.getElementById('blCurrent').innerHTML = formatRupiah(blCurrent);
        document.getElementById('blTarget').innerHTML = formatRupiah(blTarget);
    </script>

    <!-- TODO - Proses data analytic -->
    <br>
    {{json_encode($analytic_income, JSON_PRETTY_PRINT)}}
    <br>
    {{json_encode($analytic_expense, JSON_PRETTY_PRINT)}}

    <!-- TODO - Proses data analytic -->
    <br>
    {{json_encode($history, JSON_PRETTY_PRINT)}}

@endsection
