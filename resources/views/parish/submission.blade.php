@extends('layout.app')

@section('title', 'Add Parish')


@section('content')	
    
@include('_message') 

<div class="pd-20 card-box mb-30">
    <div class="clearfix">
        <div class="pull-left">
            <h4 class="text-blue h4">Parish Submission Form</h4>
            <p class="mb-30">Fill in population and fund details</p>
        </div>
        <div class="pull-right">
            <a href="#" class="btn btn-primary btn-sm"><i class="fa fa-eye"></i> Review</a>
        </div>
    </div>

    <form method="POST" action="{{ route('parish.submit.store') }}">
        @csrf

        {{-- Population Section --}}
        <div class="mb-4">
            <h5 class="text-secondary">Population Details</h5>
            <div class="row">
                @foreach($populationCategories as $category)
                <div class="col-md-4 col-sm-12">
                    <div class="form-group">
                        <label>{{ $category->name }}</label>
                        <input type="number" name="population[{{ $category->id }}]" value="0" class="form-control population-input" min="0">
                    </div>
                </div>
                @endforeach
                <div class="col-md-4 col-sm-12 mt-3">
                    <label class="font-weight-bold">Total Population</label>
                    <div class="form-control bg-light" id="population-total">0</div>
                </div>
            </div>
        </div>

        {{-- Fund Section --}}
        <div class="mb-4">
            <h5 class="text-secondary">Fund Contributions (KES)</h5>
            <div class="row">
                @foreach($fundCategories as $category)
                <div class="col-md-4 col-sm-12">
                    <div class="form-group">
                        <label>{{ $category->name }}</label>
                        <input type="number" name="funds[{{ $category->id }}]" value="0" class="form-control fund-input" min="0" step="0.01">
                    </div>
                </div>
                @endforeach
                <div class="col-md-4 col-sm-12 mt-3">
                    <label class="font-weight-bold">Total Funds (KES)</label>
                    <div class="form-control bg-light" id="funds-total">0.00</div>
                </div>
            </div>
        </div>

        <div class="text-right">
            <button type="submit" class="btn btn-success">Submit</button>
        </div>
    </form>




<script>
    function calculateTotals() {
        let popTotal = 0;
        document.querySelectorAll('.population-input').forEach(input => {
            popTotal += parseInt(input.value) || 0;
        });
        document.getElementById('population-total').textContent = popTotal;

        let fundTotal = 0;
        document.querySelectorAll('.fund-input').forEach(input => {
            fundTotal += parseFloat(input.value) || 0;
        });
        document.getElementById('funds-total').textContent = fundTotal.toFixed(2);
    }

    document.querySelectorAll('.population-input, .fund-input').forEach(input => {
        input.addEventListener('input', calculateTotals);
    });

    calculateTotals(); // Run once on load
</script>
</div>

@endsection