@extends('components/layout')
@section('tittle','Rakamin - Dashboard')
@section('head','Budgeting')
@section('content')
<div class="row"></div>
<div class="row">
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
      {{-- @foreach($data as $item)
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
      @endforeach --}}
{{--    <div class="col-md-6 mb-4 stretch-card transparent">--}}
{{--      <div class="card card-tale">--}}
{{--        <div class="card-body">--}}
{{--          <p class="mb-4">Budget Transportation</p>--}}
{{--          <p class="fs-30 mb-2">RP. 250.000-,</p>--}}
{{--          <p>Rp. 250.000-, Remaining</p>--}}
{{--        </div>--}}
{{--      </div>--}}
{{--    </div>--}}
{{--    <div class="col-md-6 mb-4 stretch-card transparent">--}}
{{--      <div class="card card-dark-blue">--}}
{{--        <div class="card-body">--}}
{{--          <p class="mb-4">Budget Transportation</p>--}}
{{--          <p class="fs-30 mb-2">RP. 250.000-,</p>--}}
{{--          <p>Rp. 250.000-, Remaining</p>--}}
{{--        </div>--}}
{{--      </div>--}}
{{--    </div>--}}
  </div>
</div>

{{-- Data analytic --}}
    {{json_encode($analytic, JSON_PRETTY_PRINT)}}

{{-- Add Budget --}}
<a href="/addbudgeting"><div id="add-trigger" class=""><i class="icon-add"></i></div></a>

@endsection
