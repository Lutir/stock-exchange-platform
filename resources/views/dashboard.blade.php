@extends('layouts.app', ['activePage' => 'dashboard', 'titlePage' => __('Dashboard')])

@section('content')
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-4 col-md-6 col-sm-6">
          <div class="card card-stats">
            <div class="card-header card-header-warning card-header-icon">
              <div class="card-icon">
                <i class="material-icons">content_copy</i>
              </div>
              <p class="card-category">Your Stocks Count</p>
              <h3 class="card-title">{{ $data['stockCount'] }}
                <small></small>
              </h3>
            </div>
            <div class="card-footer">
              <div class="stats">
                <a href="#pablo">View my stocks</a>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-6 col-sm-6">
          <div class="card card-stats">
            <div class="card-header card-header-success card-header-icon">
              <div class="card-icon">
                <i class="material-icons">store</i>
              </div>
              <p class="card-category">Current Account Balance</p>
              <h3 class="card-title">${{ $data['userAccounts'] }}</h3>
            </div>
            <div class="card-footer">
              <div class="stats">
                <i class="material-icons">date_range</i> View my profile
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-6 col-sm-6">
          <div class="card card-stats">
            <div class="card-header card-header-danger card-header-icon">
              <div class="card-icon">
                <i class="material-icons">info_outline</i>
              </div>
              <p class="card-category">Total Active Stocks</p>
              <h3 class="card-title">100</h3>
            </div>
            <div class="card-footer">
              <div class="stats">
                <i class="material-icons">local_offer</i> 
              </div>
            </div>
          </div>
        </div>
      </div>
      <hr>
      <div class="row">
        <h2>
          Trending Stocks
        </h2>
        <div class="row">
        @for($i = 0; $i< count($data['stocks']); $i++)
          <div class="col-lg-4 col-md-6 col-sm-6">
          <div class="card">
            <div class="card-header card-header-primary card-header-icon">
              
              <br>
              <h3 class="text-center" style="color:#000">{{ $data['stocks'][$i]['name'] }}</h3>
              <h4 class="card-title text-center">${{ $data['stocks'][$i]['price'] }}</h4>
            </div>
            <div class="card-footer">
              <div class="stats">
              </div>
            </div>
          </div>
        </div>
        @endfor
        </div>
      </div>
      
    </div>
  </div>
@endsection

@push('js')
  <script>
    $(document).ready(function() {
      // Javascript method's body can be found in assets/js/demos.js
      md.initDashboardPageCharts();
    });
  </script>
@endpush