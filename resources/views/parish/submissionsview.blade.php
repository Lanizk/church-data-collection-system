@extends('layout.app1')

@section('title', 'Parish Submissions')

@section('main')

@include('_message')

<!-- Page Header -->
<div class="page-header-modern">
    <div class="d-flex justify-content-between align-items-center">
        <div>
            <h4 class="page-title">Parish Submissions</h4>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb-modern">
                    <li class="breadcrumb-item"><a href="/">Home</a></li>
                    <li class="breadcrumb-item"><a href="/admin/parish">Parish</a></li>
                    <li class="breadcrumb-item active">Submissions</li>
                </ol>
            </nav>
        </div>
        <div>
            <a href="/admin/parish/add" class="btn-modern btn-primary">
                <i class="bi bi-plus-circle"></i>
                New Submission
            </a>
        </div>
    </div>
</div>

<!-- Stats Cards -->
<div class="row g-3 mb-4">
    <div class="col-xl-3 col-md-6">
        <div class="stat-card-small">
            <div class="stat-icon-small blue">
                <i class="bi bi-people"></i>
            </div>
            <div>
                <div class="stat-value-small">{{ $populationData->sum('count') }}</div>
                <div class="stat-label-small">Total Population</div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6">
        <div class="stat-card-small">
            <div class="stat-icon-small green">
                <i class="bi bi-cash-stack"></i>
            </div>
            <div>
                <div class="stat-value-small">KES {{ number_format($fundData->sum('amount'), 2) }}</div>
                <div class="stat-label-small">Total Funds</div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6">
        <div class="stat-card-small">
            <div class="stat-icon-small purple">
                <i class="bi bi-calendar-check"></i>
            </div>
            <div>
                <div class="stat-value-small">{{ $populationData->count() }}</div>
                <div class="stat-label-small">Population Entries</div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6">
        <div class="stat-card-small">
            <div class="stat-icon-small orange">
                <i class="bi bi-wallet2"></i>
            </div>
            <div>
                <div class="stat-value-small">{{ $fundData->count() }}</div>
                <div class="stat-label-small">Fund Entries</div>
            </div>
        </div>
    </div>
</div>

<!-- Population Submissions Table -->
<div class="table-card mb-4">
    <div class="table-card-header">
        <div>
            <h5 class="table-card-title">
                <i class="bi bi-people me-2"></i>
                Population Submissions
            </h5>
            <p class="table-card-subtitle">Track population data across all categories</p>
        </div>
        <div class="table-search">
            <i class="bi bi-search"></i>
            <input type="text" id="searchPopulation" placeholder="Search population...">
        </div>
    </div>

    <div class="table-responsive">
        <table class="modern-table">
            <thead>
                <tr>
                    <th>Date</th>
                    <th>Category</th>
                    <th>Count</th>
                    <th class="text-end">Status</th>
                </tr>
            </thead>
            <tbody id="populationTableBody">
                @forelse($populationData as $submission)
                <tr>
                    <td>
                        <div class="d-flex align-items-center">
                            <i class="bi bi-calendar3 text-muted me-2"></i>
                            <span>{{ $submission->created_at->format('d-M-Y') }}</span>
                        </div>
                    </td>
                    <td>
                        <div class="user-cell">
                            <div class="user-avatar-small">
                                {{ strtoupper(substr($submission->category->name, 0, 2)) }}
                            </div>
                            <div>
                                <div class="user-name-small">{{ $submission->category->name }}</div>
                                <div class="user-role-small">Population Category</div>
                            </div>
                        </div>
                    </td>
                    <td>
                        <span class="badge-modern badge-info">
                            <i class="bi bi-person"></i>
                            {{ number_format($submission->count) }}
                        </span>
                    </td>
                    <td class="text-end">
                        <span class="badge-modern badge-success">
                            <i class="bi bi-check-circle"></i>
                            Submitted
                        </span>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="4" class="text-center py-5">
                        <div class="empty-state">
                            <i class="bi bi-inbox"></i>
                            <p>No population submissions found</p>
                            <a href="/admin/parish/add" class="btn-modern btn-primary btn-sm">
                                Add First Submission
                            </a>
                        </div>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    @if($populationData->hasPages())
    <div class="table-card-footer">
        <div class="pagination-info">
            Showing {{ $populationData->firstItem() }} to {{ $populationData->lastItem() }} of {{ $populationData->total() }} entries
        </div>
        <div class="pagination-modern">
            {{ $populationData->links() }}
        </div>
    </div>
    @endif
</div>

<!-- Fund Submissions Table -->
<div class="table-card">
    <div class="table-card-header">
        <div>
            <h5 class="table-card-title">
                <i class="bi bi-cash-stack me-2"></i>
                Fund Submissions
            </h5>
            <p class="table-card-subtitle">Track financial contributions across all categories</p>
        </div>
        <div class="table-search">
            <i class="bi bi-search"></i>
            <input type="text" id="searchFunds" placeholder="Search funds...">
        </div>
    </div>

    <div class="table-responsive">
        <table class="modern-table">
            <thead>
                <tr>
                    <th>Date</th>
                    <th>Category</th>
                    <th>Amount</th>
                    <th class="text-end">Status</th>
                </tr>
            </thead>
            <tbody id="fundTableBody">
                @forelse($fundData as $submission)
                <tr>
                    <td>
                        <div class="d-flex align-items-center">
                            <i class="bi bi-calendar3 text-muted me-2"></i>
                            <span>{{ $submission->created_at->format('d-M-Y') }}</span>
                        </div>
                    </td>
                    <td>
                        <div class="user-cell">
                            <div class="user-avatar-small">
                                {{ strtoupper(substr($submission->category->name, 0, 2)) }}
                            </div>
                            <div>
                                <div class="user-name-small">{{ $submission->category->name }}</div>
                                <div class="user-role-small">Fund Category</div>
                            </div>
                        </div>
                    </td>
                    <td>
                        <span class="badge-modern badge-success">
                            <i class="bi bi-currency-exchange"></i>
                            KES {{ number_format($submission->amount, 2) }}
                        </span>
                    </td>
                    <td class="text-end">
                        <span class="badge-modern badge-success">
                            <i class="bi bi-check-circle"></i>
                            Submitted
                        </span>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="4" class="text-center py-5">
                        <div class="empty-state">
                            <i class="bi bi-inbox"></i>
                            <p>No fund submissions found</p>
                            <a href="/admin/parish/add" class="btn-modern btn-primary btn-sm">
                                Add First Submission
                            </a>
                        </div>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    @if($fundData->hasPages())
    <div class="table-card-footer">
        <div class="pagination-info">
            Showing {{ $fundData->firstItem() }} to {{ $fundData->lastItem() }} of {{ $fundData->total() }} entries
        </div>
        <div class="pagination-modern">
            {{ $fundData->links() }}
        </div>
    </div>
    @endif
</div>

@endsection

@push('scripts')
<script>
    // Search functionality for population table
    document.getElementById('searchPopulation').addEventListener('keyup', function() {
        const searchValue = this.value.toLowerCase();
        const tableRows = document.querySelectorAll('#populationTableBody tr');
        
        tableRows.forEach(row => {
            const text = row.textContent.toLowerCase();
            row.style.display = text.includes(searchValue) ? '' : 'none';
        });
    });

    // Search functionality for fund table
    document.getElementById('searchFunds').addEventListener('keyup', function() {
        const searchValue = this.value.toLowerCase();
        const tableRows = document.querySelectorAll('#fundTableBody tr');
        
        tableRows.forEach(row => {
            const text = row.textContent.toLowerCase();
            row.style.display = text.includes(searchValue) ? '' : 'none';
        });
    });
</script>
@endpush