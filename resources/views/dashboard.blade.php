@extends('components/layout')
@section('title', 'Rakamin - Dashboard')
@section('head', 'Dashboard')
@section('content')
    <div class="row">
        <div class="col-md-12 grid-margin">
            <div class="row">
                <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                    <h3 class="font-weight">Welcome back, <strong>Billie</strong></h3>
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
                                        <p class="fs-25 mb-2 text-light">Rp 100.000,-</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 mb-5 stretch-card transparent">
                                <div class="card card-green" style="opacity: 65%; background-color: #008000">
                                    <div class="card-body">
                                        <p class="mb-4 text-light">Income</p>
                                        <p class="fs-25 mb-2 text-light">Rp 200.000,-</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 mb-5 stretch-card transparent">
                                <div class="card card-red" style="opacity: 65%; background-color: #FF0000">
                                    <div class="card-body">
                                        <p class="mb-4 text-light">Outcome</p>
                                        <p class="fs-25 mb-2 text-light">Rp 50.000,-</p>
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
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">12345678908</th>
                                        <td>Bank BRI</td>
                                        <td>August 22, 2023</td>
                                        <td>Rp250.000</td>
                                        <td><img src="public/assets/images/dashboard/panah-up.png" alt=""></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">12345678907</th>
                                        <td>Bank BTN</td>
                                        <td>August 25, 2023</td>
                                        <td>Rp300.000</td>
                                        <td></td>
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
                    <div class="card-body">
                        <h3 class="card-title">Budget Limit</h3>
                        <p class="card-text">Limit on 1 Month</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="theme-setting-wrapper">
        <div id="settings-trigger"><i class="ti-settings"></i></div>
        <div id="theme-settings" class="settings-panel">
          <i class="settings-close ti-close"></i>
          <p class="settings-heading">SIDEBAR SKINS</p>
          <div class="sidebar-bg-options selected" id="sidebar-light-theme"><div class="img-ss rounded-circle bg-light border mr-3"></div>Light</div>
          <div class="sidebar-bg-options" id="sidebar-dark-theme"><div class="img-ss rounded-circle bg-dark border mr-3"></div>Dark</div>
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
@endsection
