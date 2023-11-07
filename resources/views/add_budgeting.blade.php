@extends('components/layout')
@section('tittle','Rakamin - Dashboard')
@section('head','Dashboard')
@section('content')
@inject('rekening','App\Http\Controllers\BudgetingController')
            <form method="POST" action="{{ url('') }}" class="pt-3">
              @csrf

                <!-- TODO - pidahin rekening ke select field dengan value id rekening -->
                {{json_encode($rekening::get_rekening_utama(), JSON_PRETTY_PRINT)}}

              <div class="form-group">
                <label for="exampleInputEmail">Budget Name</label>
                <div class="input-group">
                  <div class="input-group-prepend bg-transparent">
                    <span class="input-group-text bg-transparent border-right-0">
                      <i class="ti-user text-primary"></i>
                    </span>
                  </div>
                  <input type="text" class="form-control form-control-lg border-left-0" name="budget_name" placeholder="Budget Name" required>
                </div>
              </div>

              <div class="form-group">
                <label for="exampleInputEmail">Budget Description</label>
                <div class="input-group">
                  <div class="input-group-prepend bg-transparent">
                    <span class="input-group-text bg-transparent border-right-0">
                      <i class="ti-user text-primary"></i>
                    </span>
                  </div>
                  <input type="text" class="form-control form-control-lg border-left-0" name="budget_description" placeholder="Budget Description" required>
                </div>
              </div>

              <div class="form-group">
                <label for="exampleInputEmail">Budget Limit Target</label>
                <div class="input-group">
                  <div class="input-group-prepend bg-transparent">
                    <span class="input-group-text bg-transparent border-right-0">
                      <i class="ti-user text-primary"></i>
                    </span>
                  </div>
                  <input type="number" class="form-control form-control-lg border-left-0" name="budget_limit_target" placeholder="Budget Limit Targetr" required>
                </div>
              </div>

              <button type="submit" class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn">Add</button>

            </form>

          </div>
        </div>
      </div>
      <!-- content-wrapper ends -->
    </div>
    <!-- container-fluid ends -->
  </div>
  <!-- container-scroller ends -->
</div>
@endsection
