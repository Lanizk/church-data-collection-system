@extends('layout.app')

@section('title', 'Edit Parish')


@section('content')

@include('_message') 
    

<div class="page-header">
					<div class="row">
						<div class="col-md-6 col-sm-12">
							<div class="title">
								<h4>Form</h4>
							</div>
							<nav aria-label="breadcrumb" role="navigation">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="index.html">Parish</a></li>
									<li class="breadcrumb-item active" aria-current="page">Edit Parish</li>
								</ol>
							</nav>
						</div>
						
					</div>
				</div>


    
    <div class="pd-20 card-box mb-30">
					<div class="clearfix">
						<div class="pull-left">
							<h4 class="text-blue h4">Parish Edit Form</h4>
                            <p class="mb-30">All parish details edited here</p>
							
						</div>
						
					</div>
					<form   method="POST"  action="{{ url('admin/parish/edit/' . $accounts->id) }}">
						@csrf
						<div class="form-group row">
							<label class="col-sm-12 col-md-2 col-form-label">Parish Name</label>
							<div class="col-sm-12 col-md-10">
								<input class="form-control" name="name" type="text"  value="{{ old('name', $parish->name) }}">
							</div>
						</div>
						
						<div class="form-group row">
							<label class="col-sm-12 col-md-2 col-form-label">Email</label>
							<div class="col-sm-12 col-md-10">
								<input class="form-control" name="email"  value="{{ old('email', $parish->email) }}" type="email">
							</div>
						</div>
						
						<div class="form-group row">
							<label class="col-sm-12 col-md-2 col-form-label">Telephone</label>
							<div class="col-sm-12 col-md-10">
								<input class="form-control" name="telephone"  value="{{ old('telephone', $parish->telephone) }}" type="tel">
							</div>
						</div>
						<div class="form-group row">
							<label class="col-sm-12 col-md-2 col-form-label">Password</label>
							<div class="col-sm-12 col-md-10">
								<input class="form-control" name="password"  placeholder="Enter new password" type="password">
							</div>
						</div>
						<div class="form-group row">
							<label class="col-sm-12 col-md-2 col-form-label">Number</label>
							<div class="col-sm-12 col-md-10">
								<input class="form-control" name="parish_number"  value="{{ old('parish_number', $parish->parish_number) }}" type="number">
							</div>
						</div>
						
                      <div class="d-flex justify-content-end mt-3">
							<button type="submit" class="btn btn-primary btn-lg">Submit</button>
						</div>
						
						
					</form>
					
				<!-- Default Basic Forms End -->

                
@endsection