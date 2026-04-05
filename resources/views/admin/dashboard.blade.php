@extends('admin.layout.main')

@section('title', 'Dashboard')

@section('content')
<div class="row mb-4 animate__animated animate__fadeIn">
    <div class="col-md-12">
        <h3 class="fw-bold mb-1">Welcome back, Admin! 👋</h3>
        <p class="text-muted">Here's what's happening at South End School today.</p>
    </div>
</div>

<!-- Stats Widgets -->
<!-- <div class="row g-4 mb-5">
    <div class="col-xl-3 col-sm-6">
        <div class="premium-card p-4">
            <div class="d-flex align-items-center justify-content-between mb-3">
                <div class="bg-primary bg-opacity-10 p-3 rounded-4">
                    <i class="fa fa-users fs-4 text-primary"></i>
                </div>
                <div class="text-end">
                    <span class="badge bg-success bg-opacity-10 text-success fw-bold">+12%</span>
                </div>
            </div>
            <h4 class="fw-bold mb-1">1,240</h4>
            <p class="text-muted small mb-0 fw-medium">Total Students</p>
        </div>
    </div>
    
    <div class="col-xl-3 col-sm-6">
        <div class="premium-card p-4">
            <div class="d-flex align-items-center justify-content-between mb-3">
                <div class="bg-info bg-opacity-10 p-3 rounded-4">
                    <i class="fa fa-chalkboard-teacher fs-4 text-info"></i>
                </div>
                <div class="text-end">
                    <span class="badge bg-info bg-opacity-10 text-info fw-bold">Active</span>
                </div>
            </div>
            <h4 class="fw-bold mb-1">85</h4>
            <p class="text-muted small mb-0 fw-medium">Total Teachers</p>
        </div>
    </div>
    
    <div class="col-xl-3 col-sm-6">
        <div class="premium-card p-4">
            <div class="d-flex align-items-center justify-content-between mb-3">
                <div class="bg-warning bg-opacity-10 p-3 rounded-4">
                    <i class="fa fa-envelope-open-text fs-4 text-warning"></i>
                </div>
                <div class="text-end">
                    <span class="badge bg-danger bg-opacity-10 text-danger fw-bold">New</span>
                </div>
            </div>
            <h4 class="fw-bold mb-1">24</h4>
            <p class="text-muted small mb-0 fw-medium">New Inquiries</p>
        </div>
    </div>
    
    <div class="col-xl-3 col-sm-6">
        <div class="premium-card p-4">
            <div class="d-flex align-items-center justify-content-between mb-3">
                <div class="bg-success bg-opacity-10 p-3 rounded-4">
                    <i class="fa fa-wallet fs-4 text-success"></i>
                </div>
                <div class="text-end">
                    <span class="badge bg-success bg-opacity-10 text-success fw-bold">Paid</span>
                </div>
            </div>
            <h4 class="fw-bold mb-1">₹4.2L</h4>
            <p class="text-muted small mb-0 fw-medium">Monthly Fees Collected</p>
        </div>
    </div>
</div> -->

<!-- <div class="row g-4">
    <div class="col-xl-8">
        <div class="premium-card p-4 h-100">
            <div class="d-flex align-items-center justify-content-between mb-4">
                <h5 class="fw-bold mb-0">Student Attendance Analytics</h5>
                <select class="form-select form-select-sm border-0 bg-light rounded-pill px-3" style="width: 140px;">
                    <option>Last 7 Days</option>
                    <option>This Month</option>
                    <option>Last Year</option>
                </select>
            </div>
            <div id="attendance-chart"></div>
        </div>
    </div> -->

    <!-- Recent Activities -->
    <!-- <div class="col-xl-4">
        <div class="premium-card p-4 h-100">
            <h5 class="fw-bold mb-4">Recent Activities</h5>
            <div class="activity-timeline">
                <div class="d-flex gap-3 mb-4">
                    <div class="flex-shrink-0">
                        <div class="bg-primary p-2 rounded-circle" style="width: 10px; height: 10px; margin-top: 5px;"></div>
                    </div>
                    <div>
                        <p class="mb-1 small fw-bold">Notice Board Updated</p>
                        <p class="mb-0 text-muted" style="font-size: 11px;">10:30 AM - by Principal</p>
                    </div>
                </div>
                <div class="d-flex gap-3 mb-4">
                    <div class="flex-shrink-0">
                        <div class="bg-success p-2 rounded-circle" style="width: 10px; height: 10px; margin-top: 5px;"></div>
                    </div>
                    <div>
                        <p class="mb-1 small fw-bold">Fee payment received: Rahul Dev</p>
                        <p class="mb-0 text-muted" style="font-size: 11px;">09:15 AM - Online Transaction</p>
                    </div>
                </div>
                <div class="d-flex gap-3 mb-4">
                    <div class="flex-shrink-0">
                        <div class="bg-warning p-2 rounded-circle" style="width: 10px; height: 10px; margin-top: 5px;"></div>
                    </div>
                    <div>
                        <p class="mb-1 small fw-bold">New Teacher Interview Scheduled</p>
                        <p class="mb-0 text-muted" style="font-size: 11px;">Yesterday - HR Department</p>
                    </div>
                </div>
            </div>
            <button class="btn btn-light w-100 rounded-pill fw-bold small py-2 mt-auto">View All Activity</button>
        </div>
    </div>
</div> -->
@endsection

@push('scripts')
<script>
    var options = {
        series: [{
            name: 'Primary Section',
            data: [94, 95, 98, 92, 99, 94, 96]
        }, {
            name: 'Secondary Section',
            data: [82, 88, 85, 91, 87, 85, 90]
        }],
        chart: {
            height: 350,
            type: 'area',
            toolbar: { show: false },
            fontFamily: 'Outfit, sans-serif'
        },
        dataLabels: { enabled: false },
        stroke: { curve: 'smooth', width: 3 },
        colors: ['#4361ee', '#4cc9f0'],
        fill: {
            type: 'gradient',
            gradient: {
                shadeIntensity: 1,
                opacityFrom: 0.4,
                opacityTo: 0.1,
                stops: [0, 90, 100]
            }
        },
        xaxis: {
            categories: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'],
            axisBorder: { show: false },
            axisTicks: { show: false }
        },
        grid: {
            borderColor: '#f1f1f1',
            strokeDashArray: 4
        }
    };

    var chart = new ApexCharts(document.querySelector("#attendance-chart"), options);
    chart.render();
</script>
@endpush
