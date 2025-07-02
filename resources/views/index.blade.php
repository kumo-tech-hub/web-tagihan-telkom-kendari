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
                                        <h6 class="font-extrabold mb-0">111</h6>
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
                                        <h6 class="font-extrabold mb-0">183.000</h6>
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
                                        <h6 class="font-extrabold mb-0">80.000</h6>
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
                                        <h6 class="font-extrabold mb-0">112</h6>
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
                                <h4>Profile Visit</h4>
                                <!-- Filter Icon/Button -->
                                <button class="btn btn-outline-secondary btn-sm d-flex align-items-center" type="button" title="Filter by Quarter/Year" data-bs-toggle="modal" data-bs-target="#filterModal">
                                    <i class="bi bi-funnel"></i>
                                    <span class="ms-1">Filter</span>
                                </button>
                            </div>
                            <div class="card-body">
                                <div id="chart-profile-visit"></div>
                            </div>
                        </div>
                    </div>

                    <!-- Pie/Donut Chart -->
                    <div class="col-12 col-lg-4">
                        <div class="card">
                            <div class="card-header d-flex justify-content-between align-items-center">
                                <h4>Visitors Profile</h4>
                                <!-- Filter Icon/Button (optional, can be removed if not needed) -->
                                <button class="btn btn-outline-secondary btn-sm d-flex align-items-center" type="button" title="Filter by Quarter/Year" data-bs-toggle="modal" data-bs-target="#filterModal">
                                    <i class="bi bi-funnel"></i>
                                </button>
                            </div>
                            <div class="card-body">
                                <div id="chart-visitors-profile"></div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Filter Modal (Bootstrap) -->
                <div class="modal fade" id="filterModal" tabindex="-1" aria-labelledby="filterModalLabel" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="filterModalLabel">Filter Chart</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <div class="modal-body">
                        <form>
                          <div class="mb-3">
                            <label for="filterQuarter" class="form-label">Quarter</label>
                            <select class="form-select" id="filterQuarter" name="quarter">
                              <option value="">All</option>
                              <option value="Q1">Q1</option>
                              <option value="Q2">Q2</option>
                              <option value="Q3">Q3</option>
                              <option value="Q4">Q4</option>
                            </select>
                          </div>
                          <div class="mb-3">
                            <label for="filterYear" class="form-label">Year</label>
                            <input type="number" class="form-control" id="filterYear" name="year" min="2020" max="2100" value="{{ date('Y') }}">
                          </div>
                        </form>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Apply Filter</button>
                      </div>
                    </div>
                  </div>
                </div>
                </div>
            </div>
        </section>
    </div>
@endsection