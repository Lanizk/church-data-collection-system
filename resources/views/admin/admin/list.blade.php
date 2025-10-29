@extends('layout.app1')

@section('title', 'Admin List')

@section('main')

@include('_message')

<!-- Page Header -->
<div class="page-header-modern">
    <div class="d-flex justify-content-between align-items-center">
        <div>
            <h4 class="page-title">Admin List</h4>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb-modern">
                    <li class="breadcrumb-item"><a href="/">Home</a></li>
                    <li class="breadcrumb-item active">Admin List</li>
                </ol>
            </nav>
        </div>
        <div>
            <a href="/admin/admin/add" class="btn-modern btn-primary">
                <i class="bi bi-plus-circle"></i>
                Add Admin
            </a>
        </div>
    </div>
</div>

<!-- Stats Cards -->
<div class="row g-3 mb-4">
    <div class="col-xl-3 col-md-6">
        <div class="stat-card-small">
            <div class="stat-icon-small blue">
                <i class="bi bi-shield-check"></i>
            </div>
            <div>
                <div class="stat-value-small">{{ $admins->count() }}</div>
                <div class="stat-label-small">Total Admins</div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6">
        <div class="stat-card-small">
            <div class="stat-icon-small green">
                <i class="bi bi-person-check"></i>
            </div>
            <div>
                <div class="stat-value-small">{{ $admins->where('status', 'active')->count() ?? $admins->count() }}</div>
                <div class="stat-label-small">Active Admins</div>
            </div>
        </div>
    </div>
</div>

<!-- Admin Table Card -->
<div class="table-card">
    <div class="table-card-header">
        <div>
            <h5 class="table-card-title">Administrator Accounts</h5>
            <p class="table-card-subtitle">Manage system administrators and their permissions</p>
        </div>
        <div class="table-search">
            <i class="bi bi-search"></i>
            <input type="text" id="searchInput" placeholder="Search admins...">
        </div>
    </div>

    <div class="table-responsive">
        <table class="modern-table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Admin Details</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Created By</th>
                    <th class="text-center">Actions</th>
                </tr>
            </thead>
            <tbody id="adminTableBody">
                @forelse($admins as $admin)
                <tr>
                    <td class="td-id">{{ $admin->id }}</td>
                    <td>
                        <div class="user-cell">
                            <div class="user-avatar-small">
                                {{ strtoupper(substr($admin->name, 0, 2)) }}
                            </div>
                            <div>
                                <div class="user-name-small">{{ $admin->name }}</div>
                                <div class="user-role-small">Administrator</div>
                            </div>
                        </div>
                    </td>
                    <td>
                        <span class="email-text">{{ $admin->email }}</span>
                    </td>
                    <td>
                        <span class="phone-text">{{ $admin->telephone }}</span>
                    </td>
                    <td>
                        <span class="created-by-text">{{ $admin->created_by }}</span>
                    </td>
                    <td>
                        <div class="action-buttons">
                            <a href="{{ url('admin/admin/edit/' . $admin->id) }}" 
                               class="btn-action btn-edit" 
                               title="Edit">
                                <i class="bi bi-pencil"></i>
                            </a>
                            <a href="{{ url('admin/admin/delete/' . $admin->id) }}" 
                               class="btn-action btn-delete" 
                               title="Delete"
                               onclick="return confirm('Are you sure you want to delete this admin?')">
                                <i class="bi bi-trash"></i>
                            </a>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="text-center py-5">
                        <div class="empty-state">
                            <i class="bi bi-inbox"></i>
                            <p>No administrators found</p>
                            <a href="/admin/admin/add" class="btn-modern btn-primary btn-sm">
                                Add First Admin
                            </a>
                        </div>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <!-- Pagination -->
    @if($admins->hasPages())
    <div class="table-card-footer">
        <div class="pagination-info">
            Showing {{ $admins->firstItem() }} to {{ $admins->lastItem() }} of {{ $admins->total() }} entries
        </div>
        <div class="pagination-modern">
            {{ $admins->links() }}
        </div>
    </div>
    @endif
</div>

@endsection

@push('scripts')
<script>
    // Search functionality
    document.getElementById('searchInput').addEventListener('keyup', function() {
        const searchValue = this.value.toLowerCase();
        const tableRows = document.querySelectorAll('#adminTableBody tr');
        
        tableRows.forEach(row => {
            const text = row.textContent.toLowerCase();
            row.style.display = text.includes(searchValue) ? '' : 'none';
        });
    });
</script>
@endpush