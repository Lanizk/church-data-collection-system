@extends('layout.app1')

@section('title', 'Accountant List')

@section('main')

@include('_message') 

<!-- Page Header -->
<div class="page-header mb-4">
    <div class="row align-items-center">
        <div class="col-md-6">
            <h3 class="page-title mb-2">Accountant Management</h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 bg-transparent p-0">
                    <li class="breadcrumb-item"><a href="/admin/dashboard" class="text-decoration-none">Dashboard</a></li>
                    <li class="breadcrumb-item active">Accountants</li>
                </ol>
            </nav>
        </div>
        <div class="col-md-6 text-end">
            <a href="/admin/accountant/add" class="btn btn-primary">
                <i class="bi bi-plus-circle me-2"></i>Add New Accountant
            </a>
        </div>
    </div>
</div>

<!-- Stats Cards -->
<div class="row g-3 mb-4">
    <div class="col-md-4">
        <div class="stat-card-small">
            <div class="d-flex align-items-center">
                <div class="stat-icon-small bg-primary">
                    <i class="bi bi-people-fill"></i>
                </div>
                <div class="ms-3">
                    <h3 class="mb-0">{{ count($accounts) }}</h3>
                    <p class="text-muted mb-0 small">Total Accountants</p>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="stat-card-small">
            <div class="d-flex align-items-center">
                <div class="stat-icon-small bg-success">
                    <i class="bi bi-check-circle-fill"></i>
                </div>
                <div class="ms-3">
                    <h3 class="mb-0">{{ count($accounts) }}</h3>
                    <p class="text-muted mb-0 small">Active Accounts</p>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="stat-card-small">
            <div class="d-flex align-items-center">
                <div class="stat-icon-small bg-info">
                    <i class="bi bi-calendar-check"></i>
                </div>
                <div class="ms-3">
                    <h3 class="mb-0">{{ count($accounts->where('created_at', '>=', now()->subMonth())) }}</h3>
                    <p class="text-muted mb-0 small">Added This Month</p>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Main Table Card -->
<div class="card border-0 shadow-sm">
    <div class="card-header bg-white border-bottom py-3">
        <div class="row align-items-center">
            <div class="col-md-6">
                <h5 class="mb-0 fw-bold">
                    <i class="bi bi-list-ul me-2 text-primary"></i>Accountant Directory
                </h5>
            </div>
            <div class="col-md-6">
                <div class="d-flex justify-content-end gap-2">
                    <div class="search-box">
                        <i class="bi bi-search"></i>
                        <input type="text" id="searchInput" class="form-control form-control-sm" placeholder="Search accountants...">
                    </div>
                    <div class="dropdown">
                        <button class="btn btn-sm btn-outline-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown">
                            <i class="bi bi-funnel me-1"></i>Filter
                        </button>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#" onclick="filterTable('all')">All Accountants</a></li>
                            <li><a class="dropdown-item" href="#" onclick="filterTable('recent')">Recently Added</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="#" onclick="filterTable('export')">Export List</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0" id="accountantTable">
                <thead class="table-light">
                    <tr>
                        <th class="px-4 py-3" style="width: 80px;">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="selectAll">
                            </div>
                        </th>
                        <th class="py-3">Accountant</th>
                        <th class="py-3">Contact Information</th>
                        <th class="py-3">Created By</th>
                        <th class="py-3">Date Added</th>
                        <th class="py-3 text-center">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($accounts as $account)
                    <tr>
                        <td class="px-4">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="{{ $account->id }}">
                            </div>
                        </td>
                        <td>
                            <div class="d-flex align-items-center">
                                <div class="avatar-sm me-3">
                                    {{ strtoupper(substr($account->name, 0, 2)) }}
                                </div>
                                <div>
                                    <h6 class="mb-0 fw-semibold">{{ $account->name }}</h6>
                                    <small class="text-muted">ID: #{{ str_pad($account->id, 4, '0', STR_PAD_LEFT) }}</small>
                                </div>
                            </div>
                        </td>
                        <td>
                            <div class="contact-info">
                                <div class="mb-1">
                                    <i class="bi bi-envelope text-muted me-2"></i>
                                    <span>{{ $account->email }}</span>
                                </div>
                                <div>
                                    <i class="bi bi-telephone text-muted me-2"></i>
                                    <span>{{ $account->telephone }}</span>
                                </div>
                            </div>
                        </td>
                        <td>
                            <span class="badge bg-light text-dark border">
                                <i class="bi bi-person-check me-1"></i>{{ $account->created_by }}
                            </span>
                        </td>
                        <td>
                            <div>
                                <small class="text-muted d-block">{{ $account->created_at->format('M d, Y') }}</small>
                                <small class="text-muted">{{ $account->created_at->format('h:i A') }}</small>
                            </div>
                        </td>
                        <td>
                            <div class="d-flex justify-content-center gap-2">
                                <a href="{{ url('admin/accountant/edit/' . $account->id) }}" 
                                   class="btn btn-sm btn-outline-primary" 
                                   data-bs-toggle="tooltip" 
                                   title="Edit Accountant">
                                    <i class="bi bi-pencil"></i>
                                </a>
                                <button type="button" 
                                        class="btn btn-sm btn-outline-danger" 
                                        onclick="confirmDelete({{ $account->id }}, '{{ $account->name }}')"
                                        data-bs-toggle="tooltip" 
                                        title="Delete Accountant">
                                    <i class="bi bi-trash"></i>
                                </button>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="text-center py-5">
                            <div class="empty-state">
                                <i class="bi bi-inbox display-4 text-muted"></i>
                                <h5 class="mt-3 text-muted">No Accountants Found</h5>
                                <p class="text-muted">Start by adding your first accountant to the system.</p>
                                <a href="/admin/accountant/add" class="btn btn-primary mt-2">
                                    <i class="bi bi-plus-circle me-2"></i>Add First Accountant
                                </a>
                            </div>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
    
    @if(count($accounts) > 0)
    <div class="card-footer bg-white border-top py-3">
        <div class="row align-items-center">
            <div class="col-md-6">
                <p class="text-muted mb-0 small">
                    Showing <strong>{{ count($accounts) }}</strong> accountant(s)
                </p>
            </div>
            <div class="col-md-6">
                <div class="d-flex justify-content-end">
                    <!-- Add pagination here if needed -->
                    {{-- {{ $accounts->links() }} --}}
                </div>
            </div>
        </div>
    </div>
    @endif
</div>

<!-- Bulk Actions Card (shows when items selected) -->
<div id="bulkActionsCard" class="card border-0 shadow-sm mt-3" style="display: none;">
    <div class="card-body py-3">
        <div class="d-flex justify-content-between align-items-center">
            <div>
                <strong id="selectedCount">0</strong> item(s) selected
            </div>
            <div class="btn-group">
                <button class="btn btn-sm btn-outline-danger" onclick="bulkDelete()">
                    <i class="bi bi-trash me-2"></i>Delete Selected
                </button>
                <button class="btn btn-sm btn-outline-secondary" onclick="clearSelection()">
                    <i class="bi bi-x me-2"></i>Clear Selection
                </button>
            </div>
        </div>
    </div>
</div>

<style>
/* Page Header */
.page-header {
    margin-bottom: 1.5rem;
}

.page-title {
    font-size: 1.75rem;
    font-weight: 700;
    color: #212529;
}

.breadcrumb-item + .breadcrumb-item::before {
    content: "›";
    font-size: 1.2rem;
}

/* Stat Cards */
.stat-card-small {
    background: white;
    border-radius: 10px;
    padding: 1.25rem;
    border: 1px solid #e9ecef;
    transition: all 0.2s;
}

.stat-card-small:hover {
    box-shadow: 0 4px 12px rgba(0,0,0,0.08);
    transform: translateY(-2px);
}

.stat-icon-small {
    width: 50px;
    height: 50px;
    border-radius: 10px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1.5rem;
    color: white;
}

.stat-icon-small.bg-primary {
    background: linear-gradient(135deg, #0d6efd, #0a58ca);
}

.stat-icon-small.bg-success {
    background: linear-gradient(135deg, #198754, #157347);
}

.stat-icon-small.bg-info {
    background: linear-gradient(135deg, #0dcaf0, #0aa2c0);
}

.stat-card-small h3 {
    font-size: 1.75rem;
    font-weight: 700;
    color: #212529;
}

/* Card Styles */
.card {
    border-radius: 12px;
    overflow: hidden;
}

/* Search Box */
.search-box {
    position: relative;
    width: 250px;
}

.search-box i {
    position: absolute;
    left: 12px;
    top: 50%;
    transform: translateY(-50%);
    color: #6c757d;
    font-size: 0.9rem;
}

.search-box input {
    padding-left: 2.5rem;
    border-radius: 8px;
    border: 1px solid #dee2e6;
}

.search-box input:focus {
    border-color: #0d6efd;
    box-shadow: 0 0 0 0.2rem rgba(13, 110, 253, 0.15);
}

/* Table Styles */
.table-hover tbody tr {
    transition: all 0.2s;
}

.table-hover tbody tr:hover {
    background-color: #f8f9fa;
}

.table thead th {
    font-weight: 600;
    font-size: 0.85rem;
    text-transform: uppercase;
    letter-spacing: 0.5px;
    color: #495057;
    border-bottom: 2px solid #dee2e6;
}

.table tbody td {
    padding: 1rem;
    vertical-align: middle;
    font-size: 0.9rem;
}

/* Avatar */
.avatar-sm {
    width: 45px;
    height: 45px;
    border-radius: 50%;
    background: linear-gradient(135deg, #0d6efd, #0a58ca);
    color: white;
    display: flex;
    align-items: center;
    justify-content: center;
    font-weight: 700;
    font-size: 0.9rem;
    flex-shrink: 0;
}

/* Contact Info */
.contact-info {
    font-size: 0.85rem;
}

.contact-info i {
    width: 16px;
}

/* Buttons */
.btn {
    border-radius: 8px;
    font-weight: 500;
    transition: all 0.2s;
}

.btn-sm {
    padding: 0.4rem 0.8rem;
    font-size: 0.85rem;
}

.btn-primary {
    background: linear-gradient(135deg, #0d6efd, #0a58ca);
    border: none;
}

.btn-primary:hover {
    transform: translateY(-1px);
    box-shadow: 0 4px 12px rgba(13, 110, 253, 0.3);
}

.btn-outline-primary:hover {
    background: #0d6efd;
    transform: translateY(-1px);
}

.btn-outline-danger:hover {
    background: #dc3545;
    transform: translateY(-1px);
}

/* Badge */
.badge {
    padding: 0.4rem 0.75rem;
    font-weight: 600;
    font-size: 0.75rem;
}

/* Empty State */
.empty-state {
    padding: 3rem 1rem;
}

/* Form Check */
.form-check-input {
    cursor: pointer;
    width: 1.1rem;
    height: 1.1rem;
}

.form-check-input:checked {
    background-color: #0d6efd;
    border-color: #0d6efd;
}

/* Responsive */
@media (max-width: 768px) {
    .search-box {
        width: 100%;
        margin-bottom: 0.5rem;
    }
    
    .page-header .col-md-6:last-child {
        margin-top: 1rem;
    }
    
    .table {
        font-size: 0.85rem;
    }
    
    .avatar-sm {
        width: 35px;
        height: 35px;
        font-size: 0.8rem;
    }
    
    .contact-info {
        font-size: 0.75rem;
    }
}
</style>

<script>
// Initialize tooltips
document.addEventListener('DOMContentLoaded', function() {
    const tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
    tooltipTriggerList.map(function (tooltipTriggerEl) {
        return new bootstrap.Tooltip(tooltipTriggerEl);
    });
});

// Search functionality
document.getElementById('searchInput').addEventListener('keyup', function() {
    const searchValue = this.value.toLowerCase();
    const tableRows = document.querySelectorAll('#accountantTable tbody tr');
    
    tableRows.forEach(row => {
        const text = row.textContent.toLowerCase();
        row.style.display = text.includes(searchValue) ? '' : 'none';
    });
});

// Select all checkbox
document.getElementById('selectAll').addEventListener('change', function() {
    const checkboxes = document.querySelectorAll('#accountantTable tbody input[type="checkbox"]');
    checkboxes.forEach(checkbox => {
        checkbox.checked = this.checked;
    });
    updateBulkActions();
});

// Individual checkbox change
document.querySelectorAll('#accountantTable tbody input[type="checkbox"]').forEach(checkbox => {
    checkbox.addEventListener('change', updateBulkActions);
});

// Update bulk actions visibility
function updateBulkActions() {
    const checkedBoxes = document.querySelectorAll('#accountantTable tbody input[type="checkbox"]:checked');
    const bulkCard = document.getElementById('bulkActionsCard');
    const selectedCount = document.getElementById('selectedCount');
    
    if (checkedBoxes.length > 0) {
        bulkCard.style.display = 'block';
        selectedCount.textContent = checkedBoxes.length;
    } else {
        bulkCard.style.display = 'none';
    }
}

// Clear selection
function clearSelection() {
    document.querySelectorAll('#accountantTable input[type="checkbox"]').forEach(checkbox => {
        checkbox.checked = false;
    });
    updateBulkActions();
}

// Delete confirmation
function confirmDelete(id, name) {
    if (confirm(`Are you sure you want to delete "${name}"?\n\nThis action cannot be undone.`)) {
        window.location.href = `/admin/accountant/delete/${id}`;
    }
}

// Bulk delete
function bulkDelete() {
    const checkedBoxes = document.querySelectorAll('#accountantTable tbody input[type="checkbox"]:checked');
    const ids = Array.from(checkedBoxes).map(cb => cb.value);
    
    if (confirm(`Are you sure you want to delete ${ids.length} accountant(s)?\n\nThis action cannot be undone.`)) {
        // Implement bulk delete logic here
        console.log('Deleting IDs:', ids);
        alert('Bulk delete functionality to be implemented');
    }
}

// Filter table
function filterTable(type) {
    const rows = document.querySelectorAll('#accountantTable tbody tr');
    
    switch(type) {
        case 'all':
            rows.forEach(row => row.style.display = '');
            break;
        case 'recent':
            // Show only recent entries (example implementation)
            alert('Filter: Recent accountants');
            break;
        case 'export':
            alert('Export functionality to be implemented');
            break;
    }
}
</script>

@endsection

