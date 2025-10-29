@extends('layout.app1')

@section('title', 'Edit Parish')

@section('main')	
    
@include('_message') 

<!-- Page Header -->
<div class="page-header mb-4">
    <div class="row align-items-center">
        <div class="col-md-6">
            <h3 class="page-title mb-2">Edit Parish</h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 bg-transparent p-0">
                    <li class="breadcrumb-item"><a href="/admin/dashboard" class="text-decoration-none">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="/admin/parish/list" class="text-decoration-none">Parishes</a></li>
                    <li class="breadcrumb-item active">Edit Parish</li>
                </ol>
            </nav>
        </div>
        <div class="col-md-6 text-end">
            <a href="/admin/parish/list" class="btn btn-outline-secondary">
                <i class="bi bi-arrow-left me-2"></i>Back to List
            </a>
        </div>
    </div>
</div>

<!-- Parish Info Card -->
<div class="card border-0 shadow-sm mb-3">
    <div class="card-body p-3">
        <div class="d-flex align-items-center">
            <div class="avatar-wrapper me-3">
                <div class="avatar-circle">
                    {{ strtoupper(substr($parish->name, 0, 2)) }}
                </div>
            </div>
            <div>
                <h6 class="mb-1 fw-bold">{{ $parish->name }}</h6>
                <p class="text-muted mb-0 small">
                    <span class="badge bg-primary me-2">
                        <i class="bi bi-hash"></i>{{ $parish->parish_number }}
                    </span>
                    <i class="bi bi-envelope me-2"></i>{{ $parish->email }}
                    <span class="mx-2">•</span>
                    <i class="bi bi-telephone me-2"></i>{{ $parish->telephone }}
                </p>
            </div>
            <div class="ms-auto">
                <span class="badge bg-success">Active Parish</span>
            </div>
        </div>
    </div>
</div>

<!-- Form Card -->
<div class="card border-0 shadow-sm">
    <div class="card-header bg-white border-bottom py-3">
        <div class="d-flex align-items-center">
            <div class="icon-wrapper me-3">
                <i class="bi bi-pencil-square text-primary" style="font-size: 1.5rem;"></i>
            </div>
            <div>
                <h5 class="mb-1 fw-bold">Update Parish Information</h5>
                <p class="text-muted mb-0 small">Modify parish details and credentials</p>
            </div>
        </div>
    </div>
    
    <div class="card-body p-4">
        <form method="POST" action="{{ url('admin/parish/edit/' . $parish->id) }}" id="parishEditForm">
            @csrf
            
            <!-- Parish Information Section -->
            <div class="mb-4">
                <h6 class="text-uppercase text-muted mb-3 fw-semibold" style="font-size: 0.85rem; letter-spacing: 0.5px;">
                    <i class="bi bi-building me-2"></i>Parish Information
                </h6>
                
                <div class="row g-3">
                    <div class="col-md-6">
                        <label class="form-label fw-semibold">
                            Parish Name <span class="text-danger">*</span>
                        </label>
                        <div class="input-group">
                            <span class="input-group-text bg-light border-end-0">
                                <i class="bi bi-building"></i>
                            </span>
                            <input 
                                class="form-control border-start-0 ps-0" 
                                name="name" 
                                type="text" 
                                value="{{ old('name', $parish->name) }}"
                                placeholder="Enter parish name"
                                required
                            >
                        </div>
                        <small class="text-muted">Official name of the parish</small>
                    </div>
                    
                    <div class="col-md-6">
                        <label class="form-label fw-semibold">
                            Parish Number <span class="text-danger">*</span>
                        </label>
                        <div class="input-group">
                            <span class="input-group-text bg-light border-end-0">
                                <i class="bi bi-hash"></i>
                            </span>
                            <input 
                                class="form-control border-start-0 ps-0" 
                                name="parish_number" 
                                type="number" 
                                value="{{ old('parish_number', $parish->parish_number) }}"
                                placeholder="Enter unique parish number"
                                min="1"
                                required
                            >
                        </div>
                        <small class="text-muted">Unique identifier for this parish</small>
                    </div>
                </div>
            </div>
            
            <!-- Contact Information Section -->
            <div class="mb-4">
                <h6 class="text-uppercase text-muted mb-3 fw-semibold" style="font-size: 0.85rem; letter-spacing: 0.5px;">
                    <i class="bi bi-telephone-fill me-2"></i>Contact Information
                </h6>
                
                <div class="row g-3">
                    <div class="col-md-6">
                        <label class="form-label fw-semibold">
                            Email Address <span class="text-danger">*</span>
                        </label>
                        <div class="input-group">
                            <span class="input-group-text bg-light border-end-0">
                                <i class="bi bi-envelope"></i>
                            </span>
                            <input 
                                class="form-control border-start-0 ps-0" 
                                name="email" 
                                type="email" 
                                value="{{ old('email', $parish->email) }}"
                                placeholder="parish@example.com"
                                required
                            >
                        </div>
                        <small class="text-muted">Primary email for parish communications</small>
                    </div>
                    
                    <div class="col-md-6">
                        <label class="form-label fw-semibold">
                            Telephone <span class="text-danger">*</span>
                        </label>
                        <div class="input-group">
                            <span class="input-group-text bg-light border-end-0">
                                <i class="bi bi-telephone"></i>
                            </span>
                            <input 
                                class="form-control border-start-0 ps-0" 
                                name="telephone" 
                                type="tel" 
                                value="{{ old('telephone', $parish->telephone) }}"
                                placeholder="+254 700 000 000"
                                required
                            >
                        </div>
                        <small class="text-muted">Contact number for the parish office</small>
                    </div>
                </div>
            </div>
            
            <!-- Account Credentials Section -->
            <div class="mb-4">
                <h6 class="text-uppercase text-muted mb-3 fw-semibold" style="font-size: 0.85rem; letter-spacing: 0.5px;">
                    <i class="bi bi-shield-lock me-2"></i>Account Credentials
                </h6>
                
                <div class="row g-3">
                    <div class="col-md-12">
                        <label class="form-label fw-semibold">
                            New Password <span class="text-muted">(Optional)</span>
                        </label>
                        <div class="input-group">
                            <span class="input-group-text bg-light border-end-0">
                                <i class="bi bi-lock"></i>
                            </span>
                            <input 
                                class="form-control border-start-0 ps-0" 
                                name="password" 
                                type="password" 
                                placeholder="Leave blank to keep current password"
                                id="passwordInput"
                            >
                            <button 
                                class="btn btn-outline-secondary" 
                                type="button" 
                                id="togglePassword"
                                onclick="togglePasswordVisibility()"
                            >
                                <i class="bi bi-eye" id="eyeIcon"></i>
                            </button>
                        </div>
                        <small class="text-muted">Only fill if changing password (min. 8 characters)</small>
                    </div>
                </div>
            </div>
            
            <!-- Alert Box -->
            <div class="alert alert-warning border-0 d-flex align-items-start" role="alert">
                <i class="bi bi-exclamation-triangle-fill me-3 mt-1"></i>
                <div>
                    <strong>Important:</strong> If you change the email address or password, all parish administrators 
                    will need to use the new credentials for their next login. An email notification will be sent 
                    to inform them of the changes. Changing the parish number may affect data associations.
                </div>
            </div>
            
            <!-- Activity Information -->
            <div class="row g-3 mb-4">
                <div class="col-md-4">
                    <div class="info-box">
                        <small class="text-muted d-block mb-1">Parish Registered</small>
                        <strong>{{ $parish->created_at->format('M d, Y - h:i A') }}</strong>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="info-box">
                        <small class="text-muted d-block mb-1">Last Updated</small>
                        <strong>{{ $parish->updated_at->format('M d, Y - h:i A') }}</strong>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="info-box">
                        <small class="text-muted d-block mb-1">Created By</small>
                        <strong>{{ $parish->created_by ?? 'System Admin' }}</strong>
                    </div>
                </div>
            </div>
            
            <!-- Form Actions -->
            <div class="d-flex justify-content-between align-items-center pt-3 border-top">
                <button type="reset" class="btn btn-light px-4" onclick="return confirm('Are you sure you want to reset all changes?')">
                    <i class="bi bi-arrow-counterclockwise me-2"></i>Reset Changes
                </button>
                <div>
                    <a href="/admin/parish/list" class="btn btn-outline-secondary me-2">
                        <i class="bi bi-x-circle me-2"></i>Cancel
                    </a>
                    <button type="submit" class="btn btn-primary px-5">
                        <i class="bi bi-check-circle me-2"></i>Update Parish
                    </button>
                </div>
            </div>
            
        </form>
    </div>
</div>

<!-- Parish Statistics Card -->
<div class="card border-0 shadow-sm mt-3">
    <div class="card-header bg-white border-bottom">
        <h6 class="mb-0 fw-bold">
            <i class="bi bi-bar-chart text-primary me-2"></i>Parish Statistics
        </h6>
    </div>
    <div class="card-body">
        <div class="row g-3">
            <div class="col-md-3">
                <div class="stat-box text-center">
                    <div class="stat-icon-sm bg-primary mb-2">
                        <i class="bi bi-people-fill"></i>
                    </div>
                    <h4 class="mb-1">{{ $parish->members_count ?? 0 }}</h4>
                    <small class="text-muted">Total Members</small>
                </div>
            </div>
            <div class="col-md-3">
                <div class="stat-box text-center">
                    <div class="stat-icon-sm bg-success mb-2">
                        <i class="bi bi-cash-stack"></i>
                    </div>
                    <h4 class="mb-1">${{ number_format($parish->total_contributions ?? 0, 2) }}</h4>
                    <small class="text-muted">Total Contributions</small>
                </div>
            </div>
            <div class="col-md-3">
                <div class="stat-box text-center">
                    <div class="stat-icon-sm bg-warning mb-2">
                        <i class="bi bi-calendar-event"></i>
                    </div>
                    <h4 class="mb-1">{{ $parish->events_count ?? 0 }}</h4>
                    <small class="text-muted">Events Held</small>
                </div>
            </div>
            <div class="col-md-3">
                <div class="stat-box text-center">
                    <div class="stat-icon-sm bg-info mb-2">
                        <i class="bi bi-journal-text"></i>
                    </div>
                    <h4 class="mb-1">{{ $parish->reports_count ?? 0 }}</h4>
                    <small class="text-muted">Reports Submitted</small>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Danger Zone Card -->
<div class="card border-danger shadow-sm mt-3">
    <div class="card-header bg-danger bg-opacity-10 border-bottom border-danger">
        <h6 class="mb-0 text-danger fw-bold">
            <i class="bi bi-exclamation-octagon me-2"></i>Danger Zone
        </h6>
    </div>
    <div class="card-body">
        <div class="d-flex justify-content-between align-items-center">
            <div>
                <h6 class="mb-1">Delete this parish</h6>
                <p class="text-muted mb-0 small">Once deleted, this action cannot be undone. All parish data including members, contributions, and records will be permanently removed.</p>
            </div>
            <button type="button" class="btn btn-outline-danger" onclick="confirmDelete()">
                <i class="bi bi-trash me-2"></i>Delete Parish
            </button>
        </div>
    </div>
</div>

<style>
/* Form Styles */
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

.card {
    border-radius: 12px;
    overflow: hidden;
}

.card-header {
    background: linear-gradient(135deg, #f8f9fa 0%, #ffffff 100%);
}

.icon-wrapper {
    width: 50px;
    height: 50px;
    background: rgba(13, 110, 253, 0.1);
    border-radius: 10px;
    display: flex;
    align-items: center;
    justify-content: center;
}

/* Avatar Styles */
.avatar-wrapper {
    flex-shrink: 0;
}

.avatar-circle {
    width: 60px;
    height: 60px;
    border-radius: 50%;
    background: linear-gradient(135deg, #7c3aed 0%, #6d28d9 100%);
    color: white;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1.25rem;
    font-weight: 700;
}

/* Info Box */
.info-box {
    background: #f8f9fa;
    padding: 1rem;
    border-radius: 8px;
    border-left: 3px solid #0d6efd;
}

/* Stat Box */
.stat-box {
    padding: 1rem;
    background: #f8f9fa;
    border-radius: 8px;
}

.stat-icon-sm {
    width: 45px;
    height: 45px;
    margin: 0 auto;
    border-radius: 10px;
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    font-size: 1.25rem;
}

.stat-icon-sm.bg-primary {
    background: linear-gradient(135deg, #0d6efd, #0a58ca);
}

.stat-icon-sm.bg-success {
    background: linear-gradient(135deg, #198754, #157347);
}

.stat-icon-sm.bg-warning {
    background: linear-gradient(135deg, #ffc107, #e0a800);
}

.stat-icon-sm.bg-info {
    background: linear-gradient(135deg, #0dcaf0, #0aa2c0);
}

.form-label {
    font-size: 0.9rem;
    color: #495057;
    margin-bottom: 0.5rem;
}

.input-group-text {
    background-color: #f8f9fa;
    border: 1px solid #dee2e6;
    color: #6c757d;
}

.form-control {
    border: 1px solid #dee2e6;
    padding: 0.625rem 0.75rem;
    font-size: 0.95rem;
    transition: all 0.2s;
}

.form-control:focus {
    border-color: #0d6efd;
    box-shadow: 0 0 0 0.2rem rgba(13, 110, 253, 0.15);
}

.input-group .form-control.border-start-0:focus {
    border-left-color: transparent;
}

.input-group:focus-within .input-group-text.border-end-0 {
    border-right-color: #0d6efd;
}

.btn {
    padding: 0.5rem 1.5rem;
    font-weight: 500;
    border-radius: 8px;
    transition: all 0.2s;
}

.btn-primary {
    background: linear-gradient(135deg, #0d6efd 0%, #0a58ca 100%);
    border: none;
}

.btn-primary:hover {
    transform: translateY(-1px);
    box-shadow: 0 4px 12px rgba(13, 110, 253, 0.3);
}

.alert {
    border-radius: 10px;
    padding: 1rem 1.25rem;
}

.alert-warning {
    background-color: #fff3cd;
}

small.text-muted {
    font-size: 0.8rem;
    display: block;
    margin-top: 0.25rem;
}

.badge {
    padding: 0.5rem 1rem;
    font-weight: 600;
    font-size: 0.75rem;
}

/* Responsive */
@media (max-width: 768px) {
    .page-title {
        font-size: 1.5rem;
    }
    
    .card-body {
        padding: 1.5rem !important;
    }
    
    .d-flex.justify-content-between {
        flex-direction: column;
        gap: 1rem;
    }
    
    .d-flex.justify-content-between > div {
        width: 100%;
        display: flex;
        flex-direction: column;
        gap: 0.5rem;
    }
    
    .btn {
        width: 100%;
    }
    
    .avatar-circle {
        width: 50px;
        height: 50px;
        font-size: 1rem;
    }
}
</style>

<script>
function togglePasswordVisibility() {
    const passwordInput = document.getElementById('passwordInput');
    const eyeIcon = document.getElementById('eyeIcon');
    
    if (passwordInput.type === 'password') {
        passwordInput.type = 'text';
        eyeIcon.classList.remove('bi-eye');
        eyeIcon.classList.add('bi-eye-slash');
    } else {
        passwordInput.type = 'password';
        eyeIcon.classList.remove('bi-eye-slash');
        eyeIcon.classList.add('bi-eye');
    }
}

// Form validation
document.getElementById('parishEditForm').addEventListener('submit', function(e) {
    const password = document.getElementById('passwordInput').value;
    const parishNumber = document.querySelector('input[name="parish_number"]').value;
    
    // Only validate if password is being changed
    if (password.length > 0) {
        const minLength = 8;
        const hasUpperCase = /[A-Z]/.test(password);
        const hasLowerCase = /[a-z]/.test(password);
        const hasNumbers = /\d/.test(password);
        
        if (password.length < minLength) {
            e.preventDefault();
            alert('Password must be at least 8 characters long.');
            return false;
        }
        
        if (!hasUpperCase || !hasLowerCase || !hasNumbers) {
            e.preventDefault();
            alert('Password must contain uppercase, lowercase, and numeric characters.');
            return false;
        }
    }
    
    // Parish number validation
    if (parishNumber < 1) {
        e.preventDefault();
        alert('Parish number must be a positive number.');
        return false;
    }
});

// Parish number validation on input
document.querySelector('input[name="parish_number"]').addEventListener('input', function() {
    if (this.value < 0) {
        this.value = 0;
    }
});

function confirmDelete() {
    if (confirm('⚠️ WARNING: Are you sure you want to delete this parish?\n\nThis action cannot be undone and will permanently remove:\n• Parish account and data\n• All members associated with this parish\n• Financial records and contributions\n• Events and reports\n• Historical data\n\nType "DELETE" to confirm.')) {
        const confirmation = prompt('Type "DELETE" to confirm deletion:');
        if (confirmation === 'DELETE') {
            window.location.href = "{{ url('admin/parish/delete/' . $parish->id) }}";
        } else {
            alert('Deletion cancelled. The text did not match.');
        }
    }
}
</script>

@endsection