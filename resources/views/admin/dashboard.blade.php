@extends('layout.app1')

@section('main')

<!-- Welcome Card -->
<div class="welcome-card">
    <div class="row align-items-center">
        <div class="col-md-8">
            <h4>Welcome back, {{ Auth::user()->name ?? 'Admin' }}! 👋</h4>
            <p>Here's what's happening with your church today.</p>
        </div>
    </div>
</div>

<!-- Stats Grid -->
<div class="row g-3 mb-4">
    <div class="col-xl-3 col-md-6">
        <div class="stat-card">
            <div class="stat-card-header">
                <div class="stat-icon blue">
                    <i class="bi bi-building"></i>
                </div>
                <span class="stat-trend up">
                    <i class="bi bi-arrow-up"></i>
                    +2
                </span>
            </div>
            <div class="stat-value">20</div>
            <div class="stat-label">Active Parishes</div>
        </div>
    </div>
    
    <div class="col-xl-3 col-md-6">
        <div class="stat-card">
            <div class="stat-card-header">
                <div class="stat-icon green">
                    <i class="bi bi-people-fill"></i>
                </div>
                <span class="stat-trend up">
                    <i class="bi bi-arrow-up"></i>
                    +8%
                </span>
            </div>
            <div class="stat-value">400</div>
            <div class="stat-label">Total Members</div>
        </div>
    </div>
    
    <div class="col-xl-3 col-md-6">
        <div class="stat-card">
            <div class="stat-card-header">
                <div class="stat-icon purple">
                    <i class="bi bi-cash-stack"></i>
                </div>
                <span class="stat-trend up">
                    <i class="bi bi-arrow-up"></i>
                    +12%
                </span>
            </div>
            <div class="stat-value">$350</div>
            <div class="stat-label">Weekly Funds</div>
        </div>
    </div>
    
    <div class="col-xl-3 col-md-6">
        <div class="stat-card">
            <div class="stat-card-header">
                <div class="stat-icon orange">
                    <i class="bi bi-graph-up-arrow"></i>
                </div>
                <span class="stat-trend up">
                    <i class="bi bi-arrow-up"></i>
                    Steady
                </span>
            </div>
            <div class="stat-value">$6,060</div>
            <div class="stat-label">Total Donations</div>
        </div>
    </div>
</div>

<!-- Charts Row -->
<div class="row g-3 mb-4">
    <div class="col-xl-8">
        <div class="chart-card">
            <div class="chart-header">
                <h5 class="chart-title">Activity Overview</h5>
                <select class="chart-filter">
                    <option>Last 7 days</option>
                    <option>Last 30 days</option>
                    <option>Last 3 months</option>
                    <option>This year</option>
                </select>
            </div>
            <canvas id="activityChart"></canvas>
        </div>
    </div>
    
    <div class="col-xl-4">
        <div class="chart-card">
            <div class="chart-header">
                <h5 class="chart-title">Growth Target</h5>
            </div>
            <canvas id="targetChart" height="100"></canvas>
            <div class="mt-3">
                <div class="d-flex justify-content-between mb-2">
                    <span style="color: #6c757d; font-size: 0.85rem;">Target:</span>
                    <span style="font-weight: 600;">500</span>
                </div>
                <div class="d-flex justify-content-between mb-2">
                    <span style="color: #6c757d; font-size: 0.85rem;">Current:</span>
                    <span style="font-weight: 600; color: #3b82f6;">400</span>
                </div>
                <div class="d-flex justify-content-between">
                    <span style="color: #6c757d; font-size: 0.85rem;">Remaining:</span>
                    <span style="font-weight: 600; color: #f59e0b;">100</span>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Quick Actions -->
<div class="quick-actions">
    <h5>Quick Actions</h5>
    <div class="row g-3">
        <div class="col-lg-3 col-md-6">
            <a href="#" class="action-btn">
                <i class="bi bi-person-plus-fill"></i>
                <span>Add Member</span>
            </a>
        </div>
        <div class="col-lg-3 col-md-6">
            <a href="#" class="action-btn">
                <i class="bi bi-file-earmark-text-fill"></i>
                <span>Generate Report</span>
            </a>
        </div>
        <div class="col-lg-3 col-md-6">
            <a href="#" class="action-btn">
                <i class="bi bi-calendar-event-fill"></i>
                <span>Schedule Event</span>
            </a>
        </div>
        <div class="col-lg-3 col-md-6">
            <a href="#" class="action-btn">
                <i class="bi bi-envelope-fill"></i>
                <span>Send Message</span>
            </a>
        </div>
    </div>
</div>

@endsection

@push('scripts')
<script>
    // Activity Chart
    const activityCtx = document.getElementById('activityChart').getContext('2d');
    new Chart(activityCtx, {
        type: 'line',
        data: {
            labels: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'],
            datasets: [{
                label: 'Attendance',
                data: [65, 78, 90, 81, 86, 105, 98],
                borderColor: '#3b82f6',
                backgroundColor: 'rgba(59, 130, 246, 0.1)',
                tension: 0.4,
                fill: true,
                borderWidth: 2
            },
            {
                label: 'Contributions',
                data: [45, 55, 70, 65, 75, 85, 80],
                borderColor: '#10b981',
                backgroundColor: 'rgba(16, 185, 129, 0.1)',
                tension: 0.4,
                fill: true,
                borderWidth: 2
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: true,
            plugins: {
                legend: {
                    display: true,
                    position: 'top',
                    labels: {
                        usePointStyle: true,
                        padding: 15,
                        font: {
                            size: 12
                        }
                    }
                }
            },
            scales: {
                y: {
                    beginAtZero: true,
                    grid: {
                        color: 'rgba(0, 0, 0, 0.05)'
                    }
                },
                x: {
                    grid: {
                        display: false
                    }
                }
            }
        }
    });

    // Target Doughnut Chart
    const targetCtx = document.getElementById('targetChart').getContext('2d');
    new Chart(targetCtx, {
        type: 'doughnut',
        data: {
            labels: ['Achieved', 'Remaining'],
            datasets: [{
                data: [400, 100],
                backgroundColor: ['#3b82f6', '#e5e7eb'],
                borderWidth: 0,
                cutout: '70%'
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: true,
            plugins: {
                legend: {
                    display: true,
                    position: 'bottom',
                    labels: {
                        usePointStyle: true,
                        padding: 15,
                        font: {
                            size: 12
                        }
                    }
                }
            }
        }
    });
</script>
@endpush