@extends('layout.app1')

@section('title', 'Add Accountant')

@section('main')	
    
@include('_message') 

<!-- Page Header -->
<div class="page-header mb-4">
    <div class="row align-items-center">
        <div class="col-md-6">
            <h3 class="page-title mb-2">Add Accountant</h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 bg-transparent p-0">
                    <li class="breadcrumb-item"><a href="/admin/dashboard" class="text-decoration-none">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="/admin/accountant/list" class="text-decoration-none">Accountants</a></li>
                    <li class="breadcrumb-item active">Add Accountant</li>
                </ol>
            </nav>
        </div>
        <div class="col-md-6 text-end">
            <a href="/admin/accountant/list" class="btn btn-outline-secondary">
                <i class="bi bi-arrow-left me-2"></i>Back to List
            </a>
        </div>
    </div>
</div>

<!-- Form Card -->
<div class="card border-0 shadow-sm">
    <div class="card-header bg-white border-bottom py-3">
        <div class="d-flex align-items-center">
            <div class="icon-wrapper me-3">
                <i class="bi bi-calculator text-primary" style="font-size: 1.5rem;"></i>
            </div>
            <div>
                <h5 class="mb-1 fw-bold">Accountant Registration Form</h5>
                <p class="text-muted mb-0 small">Please fill in all required information to add a new accountant</p>
            </div>
        </div>
    </div>
    
    <div class="card-body p-4">
        <form method="POST" action="/admin/accountant/add" id="accountantForm">
            @csrf
            
            <!-- Personal Information Section -->
            <div class="mb-4">
                <h6 class="text-uppercase text-muted mb-3 fw-semibold" style="font-size: 0.85rem; letter-spacing: 0.5px;">
                    <i class="bi bi-person-circle me-2"></i>Personal Information
                </h6>
                
                <div class="row g-3">
                    <div class="col-md-6">
                        <label class="form-label fw-semibold">
                            Full Name <span class="text-danger">*</span>
                        </label>
                        <div class="input-group">
                            <span class="input-group-text bg-light border-end-0">
                                <i class="bi bi-person"></i>
                            </span>
                            <input 
                                class="form-control border-start-0 ps-0" 
                                name="name" 
                                type="text" 
                                placeholder="Enter full name"
                                required
                            >
                        </div>
                        <small class="text-muted">Enter the accountant's full legal name</small>
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
                                placeholder="+254 700 000 000"
                                required
                            >
                        </div>
                        <small class="text-muted">Contact number for official communication</small>
                    </div>
                </div>
            </div>
            
            <!-- Account Credentials Section -->
            <div class="mb-4">
                <h6 class="text-uppercase text-muted mb-3 fw-semibold" style="font-size: 0.85rem; letter-spacing: 0.5px;">
                    <i class="bi bi-shield-lock me-2"></i>Account Credentials
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
                                placeholder="accountant@example.com"
                                required
                            >
                        </div>
                        <small class="text-muted">This will be used for login and notifications</small>
                    </div>
                    
                    <div class="col-md-6">
                        <label class="form-label fw-semibold">
                            Password <span class="text-danger">*</span>
                        </label>
                        <div class="input-group">
                            <span class="input-group-text bg-light border-end-0">
                                <i class="bi bi-lock"></i>
                            </span>
                            <input 
                                class="form-control border-start-0 ps-0" 
                                name="password" 
                                type="password" 
                                placeholder="Enter secure password"
                                id="passwordInput"
                                required
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
                        <small class="text-muted">Minimum 8 characters with uppercase, lowercase, and number</small>
                    </div>
                </div>
            </div>
            
            <!-- Assignment Section -->
            <div class="mb-4">
                <h6 class="text-uppercase text-muted mb-3 fw-semibold" style="font-size: 0.85rem; letter-spacing: 0.5px;">
                    <i class="bi bi-building me-2"></i>Parish Assignment
                </h6>
                
                <div class="row g-3">
                    <div class="col-md-12">
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
                                placeholder="Enter parish identification number"
                                min="1"
                                required
                            >
                        </div>
                        <small class="text-muted">Unique identifier for the parish this accountant will manage</small>
                    </div>
                </div>
            </div>
            
            <!-- Information Alert -->
            <div class="alert alert-info border-0 d-flex align-items-start" role="alert">
                <i class="bi bi-info-circle-fill me-3 mt-1" style="font-size: 1.25rem;"></i>
                <div>
                    <strong>Note:</strong> The new accountant will receive login credentials via email. 
                    They will be required to change their password on first login for security purposes. 
                    Access will be limited to the assigned parish number.
                </div>
            </div>
            
            <!-- Form Actions -->
            <div class="d-flex justify-content-between align-items-center pt-3 border-top">
                <button type="reset" class="btn btn-light px-4">
                    <i class="bi bi-x-circle me-2"></i>Reset Form
                </button>
                <div>
                    <a href="/admin/accountant/list" class="btn btn-outline-secondary me-2">
                        Cancel
                    </a>
                    <button type="submit" class="btn btn-primary px-5">
                        <i class="bi bi-check-circle me-2"></i>Create Accountant
                    </button>
                </div>
            </div>
            
        </form>
    </div>
</div>

<!-- Help Card -->
<div class="card border-0 shadow-sm mt-3">
    <div class="card-body">
        <h6 class="fw-bold mb-3">
            <i class="bi bi-question-circle text-primary me-2"></i>Need Help?
        </h6>
        <div class="row g-3">
            <div class="col-md-4">
                <div class="help-item">
                    <i class="bi bi-shield-check text-success mb-2" style="font-size: 1.5rem;"></i>
                    <h6 class="small fw-semibold">Security</h6>
                    <p class="small text-muted mb-0">Passwords must contain uppercase, lowercase, and numbers for maximum security.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="help-item">
                    <i class="bi bi-building text-primary mb-2" style="font-size: 1.5rem;"></i>
                    <h6 class="small fw-semibold">Parish Assignment</h6>
                    <p class="small text-muted mb-0">Each accountant is assigned to a specific parish for financial management.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="help-item">
                    <i class="bi bi-envelope-check text-warning mb-2" style="font-size: 1.5rem;"></i>
                    <h6 class="small fw-semibold">Email Notification</h6>
                    <p class="small text-muted mb-0">Accountants receive automatic email with their credentials upon creation.</p>
                </div>
            </div>
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
    background-color: #cfe2ff;
}

small.text-muted {
    font-size: 0.8rem;
    display: block;
    margin-top: 0.25rem;
}

/* Help Items */
.help-item {
    text-align: center;
    padding: 1rem;
}

.help-item i {
    display: block;
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
document.getElementById('accountantForm').addEventListener('submit', function(e) {
    const password = document.getElementById('passwordInput').value;
    const parishNumber = document.querySelector('input[name="parish_number"]').value;
    
    // Password strength validation
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

// Real-time password strength indicator
document.getElementById('passwordInput').addEventListener('input', function() {
    const password = this.value;
    const hasUpperCase = /[A-Z]/.test(password);
    const hasLowerCase = /[a-z]/.test(password);
    const hasNumbers = /\d/.test(password);
    const hasMinLength = password.length >= 8;
    
    let strength = 0;
    if (hasMinLength) strength++;
    if (hasUpperCase) strength++;
    if (hasLowerCase) strength++;
    if (hasNumbers) strength++;
    
    // You can add a visual indicator here if desired
    console.log('Password strength:', strength + '/4');
});
</script>

@endsection