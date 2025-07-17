@extends('layout.app')

@section('title', 'Add Parish')


@section('content')	
    
@include('_message') 


<div class="pd-20 card-box mb-30">
					<div class="clearfix">
						<div class="pull-left">
							<h4 class="text-blue h4">Form grid</h4>
							<p class="mb-30">All bootstrap element classies</p>
						</div>
						<div class="pull-right">
							<a href="#form-grid-form" class="btn btn-primary btn-sm scroll-click" rel="content-y"  data-toggle="collapse" role="button"><i class="fa fa-code"></i> Source Code</a>
						</div>
					</div>
					<form>
                        @csrf
						<div class="row">
							<div class="col-md-4 col-sm-12">
								<div class="form-group">
									<label>col-md-4</label>
									<input type="text" class="form-control">
								</div>
							</div>
							<div class="col-md-4 col-sm-12">
								<div class="form-group">
									<label>col-md-4</label>
									<input type="text" class="form-control">
								</div>
							</div>
							<div class="col-md-4 col-sm-12">
								<div class="form-group">
									<label>col-md-4</label>
									<input type="text" class="form-control">
								</div>
							</div>
						</div>
</form>


@endsection