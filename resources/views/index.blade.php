@extends('templates.master')

@section('page_title', 'Dashboard')
@section('content')

    <div class="page-content">
        <section class="row">
            <div class="col-12">
                <div class="row">
                    <!-- Succeeded Card -->
                    <div class="col-6 col-lg-3 col-md-6">
                        <div class="card">
                            <div class="card-body px-3 py-4-5">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="stats-icon purple">
                                            <i class="iconly-boldTicket-Star"></i>
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <h6 class="text-muted font-semibold">Succeeded</h6>
                                        <h6 class="font-extrabold mb-0" id="succeeded-count">{{ $succeeded }}</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Upcoming Card -->
                    <div class="col-6 col-lg-3 col-md-6">
                        <div class="card">
                            <div class="card-body px-3 py-4-5">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="stats-icon blue">
                                            <i class="iconly-boldTime-Circle"></i>
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <h6 class="text-muted font-semibold">Upcoming</h6>
                                        <h6 class="font-extrabold mb-0" id="upcoming-count">{{ $upcoming }}</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Failed Card -->
                    <div class="col-6 col-lg-3 col-md-6">
                        <div class="card">
                            <div class="card-body px-3 py-4-5">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="stats-icon red">
                                            <i class="iconly-boldClose-Square"></i>
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <h6 class="text-muted font-semibold">Failed</h6>
                                        <h6 class="font-extrabold mb-0" id="failed-count">{{ $failed }}</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- User Card -->
                    <div class="col-6 col-lg-3 col-md-6">
                        <div class="card">
                            <div class="card-body px-3 py-4-5">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="stats-icon green">
                                            <i class="iconly-boldProfile"></i>
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <h6 class="text-muted font-semibold">Users</h6>
                                        <h6 class="font-extrabold mb-0">{{ $users }}</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Charts Section -->
                <div class="row">
                    <!-- Filter & Bar Chart -->
                    <div class="col-12 col-lg-8">
                        <div class="card">
                            <div class="card-header d-flex justify-content-between align-items-center">
                                <h4>Contract Status Report</h4>
                                <button class="btn btn-outline-secondary btn-sm d-flex align-items-center" type="button" title="Filter by Quarter/Year" data-bs-toggle="modal" data-bs-target="#filterModal">
                                    <i class="bi bi-funnel"></i>
                                    <span class="ms-1">Filter</span>
                                </button>
                            </div>
                            <div class="card-body">
                                <div id="bar-chart"></div>
                            </div>
                        </div>
                    </div>

                    <!-- Pie/Donut Chart -->
                    <div class="col-12 col-lg-4">
                        <div class="card">
                            <div class="card-header d-flex justify-content-between align-items-center">
                                <h4>Contract Distribution</h4>
                                <button class="btn btn-outline-secondary btn-sm d-flex align-items-center" type="button" title="Filter by Quarter/Year" data-bs-toggle="modal" data-bs-target="#filterModal">
                                    <i class="bi bi-funnel"></i>
                                </button>
                            </div>
                            <div class="card-body">
                                <div id="pie-chart"></div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Filter Modal -->
                <div class="modal fade" id="filterModal" tabindex="-1" aria-labelledby="filterModalLabel" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="filterModalLabel">Filter Chart</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <div class="modal-body">
                        <form id="filterForm">
                          <div class="mb-3">
                            <label for="filterQuarter" class="form-label">Quarter</label>
                            <select class="form-select" id="filterQuarter" name="quarter">
                              <option value="">All Quarters</option>
                              <option value="Q1" {{ $quarter == 'Q1' ? 'selected' : '' }}>Q1 (Jan-Mar)</option>
                              <option value="Q2" {{ $quarter == 'Q2' ? 'selected' : '' }}>Q2 (Apr-Jun)</option>
                              <option value="Q3" {{ $quarter == 'Q3' ? 'selected' : '' }}>Q3 (Jul-Sep)</option>
                              <option value="Q4" {{ $quarter == 'Q4' ? 'selected' : '' }}>Q4 (Oct-Dec)</option>
                            </select>
                          </div>
                          <div class="mb-3">
                            <label for="filterYear" class="form-label">Year</label>
                            <input type="number" class="form-control" id="filterYear" name="year" min="2020" max="2100" value="{{ $year }}">
                          </div>
                        </form>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" onclick="applyFilter()">Apply Filter</button>
                      </div>
                    </div>
                  </div>
                </div>
            </div>
        </section>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <script>
        // Initial chart data from server
        let chartData = @json($chartData);
        
        // Bar Chart
        let barChart;
        let pieChart;
        
        function initializeCharts() {
            // Bar Chart Options
            const barOptions = {
                series: [{
                    name: 'Succeeded',
                    data: chartData.map(item => item.succeeded || 0),
                    color: '#435ebe'
                }, {
                    name: 'Upcoming',
                    data: chartData.map(item => item.upcoming || 0),
                    color: '#55c6e8'
                }, {
                    name: 'Failed',
                    data: chartData.map(item => item.failed || 0),
                    color: '#ff7976'
                }],
                chart: {
                    type: 'bar',
                    height: 350
                },
                plotOptions: {
                    bar: {
                        horizontal: false,
                        columnWidth: '55%',
                        endingShape: 'rounded'
                    },
                },
                dataLabels: {
                    enabled: false
                },
                stroke: {
                    show: true,
                    width: 2,
                    colors: ['transparent']
                },
                xaxis: {
                    categories: chartData.map(item => item.month || item.quarter || ''),
                },
                yaxis: {
                    title: {
                        text: 'Number of Contracts'
                    }
                },
                fill: {
                    opacity: 1
                },
                tooltip: {
                    y: {
                        formatter: function (val) {
                            return val + " contracts"
                        }
                    }
                },
                legend: {
                    position: 'top',
                    horizontalAlign: 'left'
                }
            };

            // Pie Chart Options
            const totalSucceeded = chartData.reduce((sum, item) => sum + (item.succeeded || 0), 0);
            const totalUpcoming = chartData.reduce((sum, item) => sum + (item.upcoming || 0), 0);
            const totalFailed = chartData.reduce((sum, item) => sum + (item.failed || 0), 0);

            const pieOptions = {
                series: [totalSucceeded, totalUpcoming, totalFailed],
                chart: {
                    type: 'donut',
                    height: 350
                },
                labels: ['Succeeded', 'Upcoming', 'Failed'],
                colors: ['#435ebe', '#55c6e8', '#ff7976'],
                legend: {
                    position: 'bottom'
                },
                plotOptions: {
                    pie: {
                        donut: {
                            size: '65%',
                            labels: {
                                show: true,
                                total: {
                                    showAlways: true,
                                    show: true,
                                    label: 'Total',
                                    formatter: function (w) {
                                        return w.globals.seriesTotals.reduce((a, b) => a + b, 0)
                                    }
                                }
                            }
                        }
                    }
                },
                tooltip: {
                    y: {
                        formatter: function (val) {
                            return val + " contracts"
                        }
                    }
                }
            };

            // Initialize charts
            barChart = new ApexCharts(document.querySelector("#bar-chart"), barOptions);
            pieChart = new ApexCharts(document.querySelector("#pie-chart"), pieOptions);
            
            barChart.render();
            pieChart.render();
        }

        function updateCharts(newData) {
            chartData = newData;
            
            // Update bar chart
            barChart.updateOptions({
                series: [{
                    name: 'Succeeded',
                    data: chartData.map(item => item.succeeded || 0)
                }, {
                    name: 'Upcoming',
                    data: chartData.map(item => item.upcoming || 0)
                }, {
                    name: 'Failed',
                    data: chartData.map(item => item.failed || 0)
                }],
                xaxis: {
                    categories: chartData.map(item => item.month || item.quarter || '')
                }
            });

            // Update pie chart
            const totalSucceeded = chartData.reduce((sum, item) => sum + (item.succeeded || 0), 0);
            const totalUpcoming = chartData.reduce((sum, item) => sum + (item.upcoming || 0), 0);
            const totalFailed = chartData.reduce((sum, item) => sum + (item.failed || 0), 0);

            pieChart.updateSeries([totalSucceeded, totalUpcoming, totalFailed]);

            // Update summary cards
            document.getElementById('succeeded-count').textContent = totalSucceeded;
            document.getElementById('upcoming-count').textContent = totalUpcoming;
            document.getElementById('failed-count').textContent = totalFailed;
        }

        function applyFilter() {
            const quarter = document.getElementById('filterQuarter').value;
            const year = document.getElementById('filterYear').value;
            
            // Show loading
            document.getElementById('bar-chart').innerHTML = '<div class="text-center">Loading...</div>';
            document.getElementById('pie-chart').innerHTML = '<div class="text-center">Loading...</div>';
            
            // Fetch filtered data
            fetch(`{{ route('dashboard.filter') }}?quarter=${quarter}&year=${year}`)
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        updateCharts(data.chartData);
                        
                        // Close modal
                        const modal = bootstrap.Modal.getInstance(document.getElementById('filterModal'));
                        modal.hide();
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    alert('Error loading data. Please try again.');
                });
        }

        // Initialize charts when page loads
        document.addEventListener('DOMContentLoaded', function() {
            initializeCharts();
        });
    </script>
@endsection