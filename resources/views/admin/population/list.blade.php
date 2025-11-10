@extends('layout.app1')

@section('title', 'Population List')

@section('main')

@include('_message')

<!-- Page Header -->
<div class="page-header-modern">
    <div class="d-flex justify-content-between align-items-center">
        <div>
            <h4 class="page-title">Population List</h4>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb-modern">
                    <li class="breadcrumb-item"><a href="/">Home</a></li>
                    <li class="breadcrumb-item active">Population List</li>
                </ol>
            </nav>
        </div>
        <div>
            <a href="/admin/population/add" class="btn-modern btn-primary">
                <i class="bi bi-plus-circle"></i>
                Add Population Category
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
                <div class="stat-value-small">{{ $populations->count() }}</div>
                <div class="stat-label-small">Total Categories</div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6">
        <div class="stat-card-small">
            <div class="stat-icon-small green">
                <i class="bi bi-check-circle"></i>
            </div>
            <div>
                <div class="stat-value-small">{{ $populations->where('status', 'active')->count() ?? $populations->count() }}</div>
                <div class="stat-label-small">Active Categories</div>
            </div>
        </div>
    </div>
</div>

<!-- Population Table Card -->
<div class="table-card">
    <div class="table-card-header">
        <div>
            <h5 class="table-card-title">Population Categories</h5>
            <p class="table-card-subtitle">Manage population categories and classifications</p>
        </div>
        <div class="table-search">
            <i class="bi bi-search"></i>
            <input type="text" id="searchInput" placeholder="Search categories...">
        </div>
    </div>

    <div class="table-responsive">
        <table class="modern-table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Category Name</th>
                    <th>Created By</th>
                    <th class="text-center">Actions</th>
                </tr>
            </thead>
            <tbody id="populationTableBody">
                @forelse($populations as $population)
                <tr>
                    <td class="td-id">{{ $population->id }}</td>
                    <td>
                        <div class="user-cell">
                            <div class="user-avatar-small">
                                {{ strtoupper(substr($population->name, 0, 2)) }}
                            </div>
                            <div>
                                <div class="user-name-small">{{ $population->name }}</div>
                                <div class="user-role-small">Population Category</div>
                            </div>
                        </div>
                    </td>
                    <td>
                        <span class="created-by-text">{{ $population->created_by ?? 'System' }}</span>
                    </td>
                    <td>
                        <div class="action-buttons">
                            <a href="{{ url('admin/population/edit/' . $population->id) }}" 
                               class="btn-action btn-edit" 
                               title="Edit">
                                <i class="bi bi-pencil"></i>
                            </a>
                            <a href="{{ url('admin/population/delete/' . $population->id) }}" 
                               class="btn-action btn-delete" 
                               title="Delete"
                               onclick="return confirm('Are you sure you want to delete this population category?')">
                                <i class="bi bi-trash"></i>
                            </a>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="4" class="text-center py-5">
                        <div class="empty-state">
                            <i class="bi bi-inbox"></i>
                            <p>No population categories found</p>
                            <a href="/admin/population/add" class="btn-modern btn-primary btn-sm">
                                Add First Category
                            </a>
                        </div>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <!-- Pagination -->
    @if($populations->hasPages())
    <div class="table-card-footer">
        <div class="pagination-info">
            Showing {{ $populations->firstItem() }} to {{ $populations->lastItem() }} of {{ $populations->total() }} entries
        </div>
        <div class="pagination-modern">
            {{ $populations->links() }}
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
        const tableRows = document.querySelectorAll('#populationTableBody tr');
        
        tableRows.forEach(row => {
            const text = row.textContent.toLowerCase();
            row.style.display = text.includes(searchValue) ? '' : 'none';
        });
    });
</script>
@endpush