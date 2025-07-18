@extends('layout.app')

@section('title', 'Add Parish')


@section('content')	
    
@include('_message') 


<div class="card-box mb-30">
	<div class="pd-20">
		<h4 class="text-blue h4">Population Submissions</h4>
	</div>
	<div class="pb-20">
		<table class="table hover multiple-select-row data-table-export nowrap">
			<thead>
				<tr>
					<th>Date</th>
					<th>Category</th>
					<th>Count</th>
				</tr>
			</thead>
			<tbody>
				@foreach($populationData as $submission)
				<tr>
					<td>{{ $submission->created_at->format('d-M-Y') }}</td>
					<td>{{ $submission->category->name }}</td>
					<td>{{ $submission->count }}</td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>
</div>

<div class="card-box mb-30">
	<div class="pd-20">
		<h4 class="text-blue h4">Fund Submissions</h4>
	</div>
	<div class="pb-20">
		<table class="table hover multiple-select-row data-table-export nowrap">
			<thead>
				<tr>
					<th>Date</th>
					<th>Category</th>
					<th>Amount (KES)</th>
				</tr>
			</thead>
			<tbody>
				@foreach($fundData as $submission)
				<tr>
					<td>{{ $submission->created_at->format('d-M-Y') }}</td>
					<td>{{ $submission->category->name }}</td>
					<td>KES {{ number_format($submission->amount, 2) }}</td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>
</div>

@endsection