@extends('templates.main')

@section('content')
    <div class="row">
        <div class="col-lg-4">
            <div class="card card-chart">
                <div class="card-header">
                    <h5 class="card-category" style="font-size: 20px; font-weight: bold;">Total Visits</h5>
                    <?php
                        $total = DB::table('visits')->select('*')->distinct('idNumber', 'studentName')->get()->count();
                    ?>
                    <h3 class="card-title"><i class="tim-icons icon-bell-55 text-primary"></i>{{ $total }}</h3>
                </div>
                <div class="card-body">
                    <div class="chart-area">
                        {{-- <canvas id="chartLinePurple"></canvas> --}}
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card card-chart">
                <div class="card-header">
                    <h2 class="card-category" style="font-size: 20px; font-weight: bold;">Daily Visits</h2>
                    <input type="text" name="searchDate" style="display: none;" value="date('Y-m-d')">
                    <h3 class="card-title"><i class="tim-icons icon-delivery-fast text-info"></i>{{ $visits }}</h3>
                </div>
                <div class="card-body">
                    <div class="chart-area">
                        {{-- <canvas id="CountryChart"></canvas> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')
    <script src="{{ asset('black') }}/js/plugins/chartjs.min.js"></script>
    <script>
        $(document).ready(function() {
          demo.initDashboardPageCharts();
        });
        $(document).ready(function(){
        loadstation();
        });

    function loadstation(){
        $("#station_data").load("dashboard.blade.php");
        setTimeout(loadstation, 2000);
}
    </script>
@endpush
