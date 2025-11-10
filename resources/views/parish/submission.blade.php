@extends('layout.app1')

@section('title', 'Add Parish')

@section('main')

@include('_message')

<!-- Page Header -->
<div class="page-header-modern">
    <div class="d-flex justify-content-between align-items-center">
        <div>
            <h4 class="page-title">Parish Submission Form</h4>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb-modern">
                    <li class="breadcrumb-item"><a href="/">Home</a></li>
                    <li class="breadcrumb-item"><a href="/admin/parish">Parish List</a></li>
                    <li class="breadcrumb-item active">Add Parish</li>
                </ol>
            </nav>
        </div>
        <div>
            <a href="#" class="btn-modern btn-secondary">
                <i class="bi bi-eye"></i>
                Review
            </a>
        </div>
    </div>
</div>

<!-- Form Card -->
<div class="table-card">
    <div class="table-card-header">
        <div>
            <h5 class="table-card-title">Parish Details</h5>
            <p class="table-card-subtitle">Fill in population and fund contribution details</p>
        </div>
    </div>

    <form method="POST" action="{{ route('parish.submit.store') }}">
        @csrf

        <div class="p-4">
            {{-- Population Section --}}
            <div class="mb-5">
                <div class="d-flex align-items-center mb-4">
                    <div class="stat-icon-small blue me-3">
                        <i class="bi bi-people"></i>
                    </div>
                    <div>
                        <h5 class="mb-0">Population Details</h5>
                        <p class="text-muted small mb-0">Enter the number of people in each category</p>
                    </div>
                </div>

                <div class="row g-3">
                    @foreach($populationCategories as $category)
                    <div class="col-md-4 col-sm-6">
                        <div class="input-card">
                            <div class="input-card-icon">
                                <i class="bi bi-person-fill"></i>
                            </div>
                            <div class="input-card-content">
                                <label class="input-card-label">{{ $category->name }}</label>
                                <input 
                                    type="number" 
                                    name="population[{{ $category->id }}]" 
                                    value="0" 
                                    class="input-card-field population-input" 
                                    min="0"
                                    placeholder="0">
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>

                <!-- Population Total Card -->
                <div class="stat-card-small mt-4">
                    <div class="stat-icon-small purple">
                        <i class="bi bi-calculator"></i>
                    </div>
                    <div>
                        <div class="stat-label-small">Total Population</div>
                        <div class="stat-value-small" id="population-total">0</div>
                    </div>
                </div>
            </div>

            {{-- Divider --}}
            <hr class="my-5">

            {{-- Fund Section --}}
            <div class="mb-4">
                <div class="d-flex align-items-center mb-4">
                    <div class="stat-icon-small green me-3">
                        <i class="bi bi-cash-stack"></i>
                    </div>
                    <div>
                        <h5 class="mb-0">Fund Contributions</h5>
                        <p class="text-muted small mb-0">Enter contribution amounts in KES</p>
                    </div>
                </div>

                <div class="row g-3">
                    @foreach($fundCategories as $category)
                    <div class="col-md-4 col-sm-6">
                        <div class="input-card">
                            <div class="input-card-icon money">
                                <i class="bi bi-currency-exchange"></i>
                            </div>
                            <div class="input-card-content">
                                <label class="input-card-label">{{ $category->name }}</label>
                                <div class="input-with-prefix">
                                    <span class="input-prefix">KES</span>
                                    <input 
                                        type="number" 
                                        name="funds[{{ $category->id }}]" 
                                        value="0" 
                                        class="input-card-field fund-input" 
                                        min="0" 
                                        step="0.01"
                                        placeholder="0.00">
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>

                <!-- Fund Total Card -->
                <div class="stat-card-small mt-4">
                    <div class="stat-icon-small orange">
                        <i class="bi bi-wallet2"></i>
                    </div>
                    <div>
                        <div class="stat-label-small">Total Contributions</div>
                        <div class="stat-value-small">KES <span id="funds-total">0.00</span></div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Form Footer -->
        <div class="table-card-footer">
            <div></div>
            <div class="d-flex gap-2">
                <a href="/admin/parish" class="btn-modern btn-secondary">
                    <i class="bi bi-x-circle"></i>
                    Cancel
                </a>
                <button type="submit" class="btn-modern btn-primary">
                    <i class="bi bi-check-circle"></i>
                    Submit Parish Data
                </button>
            </div>
        </div>
    </form>
</div>

@endsection

@push('styles')
<style>
    /* Enhanced Input Cards */
    .input-card {
        background: linear-gradient(135deg, #f8fafc 0%, #ffffff 100%);
        border: 2px solid #e2e8f0;
        border-radius: 16px;
        padding: 20px;
        transition: all 0.3s ease;
        position: relative;
        overflow: hidden;
    }

    .input-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 4px;
        background: linear-gradient(90deg, #667eea 0%, #764ba2 100%);
        transform: scaleX(0);
        transition: transform 0.3s ease;
    }

    .input-card:hover {
        border-color: #667eea;
        box-shadow: 0 8px 24px rgba(102, 126, 234, 0.15);
        transform: translateY(-2px);
    }

    .input-card:hover::before {
        transform: scaleX(1);
    }

    .input-card:focus-within {
        border-color: #667eea;
        box-shadow: 0 0 0 4px rgba(102, 126, 234, 0.1);
    }

    .input-card:focus-within::before {
        transform: scaleX(1);
    }

    .input-card-icon {
        width: 48px;
        height: 48px;
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        font-size: 20px;
        margin-bottom: 12px;
        transition: all 0.3s ease;
    }

    .input-card-icon.money {
        background: linear-gradient(135deg, #10b981 0%, #059669 100%);
    }

    .input-card:hover .input-card-icon {
        transform: scale(1.1) rotate(5deg);
    }

    .input-card-content {
        flex: 1;
    }

    .input-card-label {
        display: block;
        font-weight: 600;
        color: #334155;
        margin-bottom: 8px;
        font-size: 0.9rem;
        letter-spacing: 0.3px;
    }

    .input-card-field {
        width: 100%;
        padding: 14px 16px;
        border: 2px solid #e2e8f0;
        border-radius: 10px;
        font-size: 1.1rem;
        font-weight: 600;
        color: #1e293b;
        background: white;
        transition: all 0.3s ease;
    }

    .input-card-field:focus {
        outline: none;
        border-color: #667eea;
        background: #f8fafc;
        box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
    }

    .input-card-field::placeholder {
        color: #cbd5e1;
        font-weight: 400;
    }

    /* Input with prefix styling */
    .input-with-prefix {
        position: relative;
        display: flex;
        align-items: center;
    }

    .input-prefix {
        position: absolute;
        left: 16px;
        font-weight: 700;
        color: #10b981;
        font-size: 0.9rem;
        z-index: 1;
        pointer-events: none;
    }

    .input-with-prefix .input-card-field {
        padding-left: 55px;
    }

    /* Number input arrows styling */
    .input-card-field::-webkit-inner-spin-button,
    .input-card-field::-webkit-outer-spin-button {
        opacity: 1;
        height: 40px;
    }
</style>
@endpush

@push('scripts')
<script>
    function calculateTotals() {
        // Calculate population total
        let popTotal = 0;
        document.querySelectorAll('.population-input').forEach(input => {
            popTotal += parseInt(input.value) || 0;
        });
        document.getElementById('population-total').textContent = popTotal.toLocaleString();

        // Calculate fund total
        let fundTotal = 0;
        document.querySelectorAll('.fund-input').forEach(input => {
            fundTotal += parseFloat(input.value) || 0;
        });
        document.getElementById('funds-total').textContent = fundTotal.toLocaleString('en-US', {
            minimumFractionDigits: 2,
            maximumFractionDigits: 2
        });
    }

    // Add event listeners
    document.querySelectorAll('.population-input, .fund-input').forEach(input => {
        input.addEventListener('input', calculateTotals);
    });

    // Run once on load
    calculateTotals();
</script>
@endpush