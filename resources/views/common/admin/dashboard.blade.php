@extends('common.admin.layout.base')

@section('title') Dashboard @stop

@section('styles')
  @parent
  <link rel="stylesheet" href="{{ asset('assets/plugins/chart/css/jquery-jvectormap.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/plugins/data-tables/css/dataTables.bootstrap.min.css') }}" />
  <link rel="stylesheet" href="{{ asset('assets/plugins/data-tables/css/responsive.bootstrap.min.css') }}">

@stop

@section('content')

  <div class="main-content-container container-fluid px-4">
    <!-- Page Header -->
    <div class="page-header row  py-4">
      <div class="col-12  text-center text-sm-left mb-0">
        <span class="text-uppercase page-subtitle">Dashboard</span>
        <h3 class="page-title">Dashboard Overview</h3>
        <div class="col-md-12">
          <div class="note_txt">
            @if (Helper::getDemomode() == 1)
              <p>** Demo Mode : {{ __('admin.demomode') }}</p>
              <span class="pull-left">(*personal information hidden in demo)</span>
            @endif

          </div>
        </div>
      </div>
    </div>
    <!-- End Page Header -->
    <!-- Small Stats Blocks -->

    @permission('dashboard-menus')
      <div class="row mt-10">
        <div class="col-lg-3 col-md-6 col-sm-6 offset-lg-9">
          <small>Graph by Country</small>
          <select class="form-control country">
            @foreach (Helper::getCountryList() as $key => $country)
              <option value={{ $key }}>{{ $country }}</option>
            @endforeach
          </select>
        </div>
      </div>
      <div class="row">

        <div class="col-lg-4 col-md-4 col-sm-4">
          <div class="card dashboard_card">
            <div class="card-header card-header-warning card-header-icon">
              <div class="card-icon">
                <i class="material-icons">person</i>
              </div>
              <p class="card-category stats-small__label text-uppercase">No. of Users</p>
              <h3 class="card-title user_data">0</h3>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-4">
          <div class="card dashboard_card">
            <div class="card-header card-header-success card-header-icon">
              <div class="card-icon">
                <i class="material-icons">motorcycle</i>
              </div>
              <p class="card-category stats-small__label text-uppercase"><b>No. of Providers</b></p>
              <h3 class="card-title provider_data">0</h3>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-4">
          <div class="card dashboard_card">
            <div class="card-header card-header-success card-header-icon">
              <div class="card-icon">
                <i class="material-icons">money</i>
              </div>
              <p class="card-category stats-small__label text-uppercase"><b>Admin Commission</b></p>
              <h3 class="card-title admin_commission">0</h3>
            </div>
          </div>
        </div>



      </div>
    @endpermission

    <!-- End Small Stats Blocks -->
    <div class="row">
      <!-- Rides Stats -->
      <div class="col-lg-6 col-md-12 col-sm-12 mb-4">
        <div class="card card-small">
          <div class="card-header border-bottom">
            <h6 class="m-0">Total Services </h6>
          </div>
          <div class="card-body pt-0">
            <canvas id="canvas1"></canvas>
          </div>
        </div>

      </div>
      <!-- End Ride Stats -->
      <!-- Xuber Stats -->





    </div>
  </div>
@stop
@section('scripts')
  @parent
  <script src="{{ asset('assets/plugins/data-tables/js/buttons.js') }}"></script>
  <script src="{{ asset('assets/plugins/data-tables/js/jquery.dataTables.min.js') }}"></script>
  <script src="{{ asset('assets/plugins/data-tables/js/dataTables.bootstrap.min.js') }}"></script>
  <script src="{{ asset('assets/plugins/data-tables/js/dataTables.responsive.min.js') }}"></script>
  <script src="{{ asset('assets/plugins/data-tables/js/dataTables.buttons.min.js') }}"></script>
  <script src="{{ asset('assets/plugins/data-tables/js/jszip.min.js') }}"></script>
  <script src="{{ asset('assets/plugins/data-tables/js/pdfmake.min.js') }}"></script>
  <script src="{{ asset('assets/plugins/data-tables/js/vfs_fonts.js') }}"></script>
  <script src="{{ asset('assets/plugins/data-tables/js/buttons.html5.min.js') }}"></script>
  <!-- <script src="{{ asset('assets/plugins/chart/js/jquery-jvectormap.min.js') }}"></script>
      <script src="{{ asset('assets/plugins/chart/js/jquery-jvectormap-world-mill.js') }}"></script>
      <script src="{{ asset('assets/plugins/chart/js/chart.min.js') }}"></script> -->
  <!-- <script src="{{ asset('assets/plugins/chart/js/export.min.js') }}"></script>
      <script src="{{ asset('assets/plugins/chart/js/light.js') }}"></script> -->
  <script src="https://www.chartjs.org/dist/2.8.0/Chart.min.js"></script>
  <script src="https://www.chartjs.org/samples/latest/utils.js"></script>

  <script src="{{ asset('assets/plugins/chart/js/jquery-jvectormap.min.js') }}"></script>
  <script src="{{ asset('assets/plugins/chart/js/jquery-jvectormap-world-mill.js') }}"></script>

  <script type="text/javascript">
    var overalldata = [];
    /* Admin Data  */
    var country_id = localStorage.getItem("mycountry");
    $('.country option[value="' + country_id + '"]').prop('selected', true);

    function dashboarddata(id) {
      $.ajax({
        type: "GET",
        url: getBaseUrl() + "/admin/dashboard/" + id,
        'beforeSend': function(request) {
          showLoader();
        },
        headers: {
          Authorization: "Bearer " + getToken("admin")
        },
        success: function(data) {
          var total_data = data.responseData;
          if (total_data) {
            var adminCredit = total_data.admin ? parseFloat(total_data.admin).toFixed(2) : 0;
            var adminDiscount = total_data.admin_discount ? parseFloat(total_data.admin_discount)
              .toFixed(2) : 0;
            var adminTax = total_data.admin_tax ? parseFloat(total_data.admin_tax).toFixed(2) : 0;
            var adminCommission = total_data.admin_commission ? parseFloat(total_data
              .admin_commission).toFixed(2) : 0;
            var providerCredit = total_data.provider_credit[0].total_credit && total_data
              .provider_credit[0].total_credit != null ? parseFloat(total_data.provider_credit[0]
                .total_credit).toFixed(2) : 0;
            var providerDebit = total_data.provider_debit[0].total_debit && total_data
              .provider_debit[0].total_debit != null ? parseFloat(total_data.provider_debit[0]
                .total_debit).toFixed(2) : 0;
            var fleetCredit = total_data.fleet_credit[0].total_credit && total_data.fleet_credit[0]
              .total_credit != null ? parseFloat(total_data.fleet_credit[0].total_credit).toFixed(
                2) : 0;
            var fleetDebit = total_data.fleet_debit[0].total_debit && total_data.fleet_debit[0]
              .total_debit != null ? parseFloat(total_data.fleet_debit[0].total_debit).toFixed(
                2) : 0;
            var currency = total_data.currency && total_data.currency.currency != null ? total_data
              .currency.currency : "$";

            $('.user_data').text((total_data.userdata ? total_data.userdata : 0));
            $('.provider_data').text((total_data.providerdata ? total_data.providerdata : 0));
            $('.fleet_data').text((total_data.fleetdata ? total_data.fleetdata : 0));
            $('.admin_credit').text(currency + adminCredit);
            $('.provider_credit').text(currency + providerCredit);
            $('.provider_debit').text(currency + providerDebit);
            $('.fleet_credit').text(currency + fleetCredit);
            $('.fleet_debit').text(currency + fleetDebit);
            $('.commission').text(currency + adminCommission);
            $('.admin_commission').text(currency + adminCommission);
            $('.discount').text(currency + adminDiscount);
            $('.tax_amount').text(currency + adminTax);
          }
          hideLoader();
        }
      });

    }

    /* end   */




    $('.country').change(function() {
      var country_id = $('.country').val();
      localStorage.setItem("mycountry", country_id);

      location.reload();
    });




    //https://www.chartjs.org/samples/latest/charts/pie.html



    var GetServiceData = function(id) {
      $.ajax({
        url: getBaseUrl() + "/admin/service/Servicedashboard/" + id,
        type: "GET",
        'beforeSend': function(request) {
          showLoader();
        },
        headers: {
          Authorization: "Bearer " + getToken("admin")
        },
        success: function(data) {
          var cancel_data = data.responseData.cancelled_data;
          var complete_data = data.responseData.completed_data;
          var max = data.responseData.max;
          overalldata[2] = data.responseData.overall;
          config = {
            type: 'line',
            data: {
              labels: ['Jan',
                'Feb',
                'Mar',
                'Apr',
                'May',
                'Jun',
                'July',
                'Aug',
                'Sept',
                'Oct',
                'Nov',
                'Dec'
              ],
              datasets: [{
                label: 'Completed Services',
                data: complete_data,
                backgroundColor: window.chartColors.green,
                borderColor: window.chartColors.green,
                fill: false,
                pointHoverRadius: 10,
              }, {
                label: 'Cancelled Services',
                data: cancel_data,
                backgroundColor: window.chartColors.red,
                borderColor: window.chartColors.red,
                fill: false,
                pointHitRadius: 20,
              }]
            },
            options: {
              responsive: true,
              legend: {
                position: 'bottom',
              },
              hover: {
                mode: 'index'
              },
              scales: {
                xAxes: [{
                  display: true,
                  scaleLabel: {
                    display: true,
                    labelString: 'Month'
                  }
                }],
                yAxes: [{
                  display: true,
                  scaleLabel: {
                    display: true,
                    labelString: 'Value'
                  },
                  ticks: {
                    min: 0,
                    max: max,

                    // forces step size to be 5 units
                    stepSize: (Math.round(max / 100) * 100) / 10
                  }
                }]
              },
              title: {
                display: true,
                text: ''
              }
            }
          }
          var ctx = document.getElementById('canvas1').getContext('2d');
          window.myLine = new Chart(ctx, config);
          hideLoader();

        }

      })
    };








    //$(".country").trigger('change');

    dashboarddata(country_id);
    GetServiceData(country_id);
  </script>

@stop
