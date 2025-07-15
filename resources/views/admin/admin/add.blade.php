@extends('layout.app')

@section('title', 'Add Admin')


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
									<li class="breadcrumb-item"><a href="index.html">Admin</a></li>
									<li class="breadcrumb-item active" aria-current="page">Add Admin</li>
								</ol>
							</nav>
						</div>
						
					</div>
				</div>


    
    <div class="pd-20 card-box mb-30">
					<div class="clearfix">
						<div class="pull-left">
							<h4 class="text-blue h4">Admin Add Form</h4>
                            <p class="mb-30">All admin details added here</p>
							
						</div>
						
					</div>
					<form   method="POST"  action="/admin/admin/add">
						@csrf
						<div class="form-group row">
							<label class="col-sm-12 col-md-2 col-form-label">Admin Name</label>
							<div class="col-sm-12 col-md-10">
								<input class="form-control" name="name" type="text" placeholder="Johnny Brown">
							</div>
						</div>
						
						<div class="form-group row">
							<label class="col-sm-12 col-md-2 col-form-label">Email</label>
							<div class="col-sm-12 col-md-10">
								<input class="form-control" name="email" value="bootstrap@example.com" type="email">
							</div>
						</div>
						
						<div class="form-group row">
							<label class="col-sm-12 col-md-2 col-form-label">Telephone</label>
							<div class="col-sm-12 col-md-10">
								<input class="form-control" name="telephone" value="1-(111)-111-1111" type="tel">
							</div>
						</div>
						<div class="form-group row">
							<label class="col-sm-12 col-md-2 col-form-label">Password</label>
							<div class="col-sm-12 col-md-10">
								<input class="form-control" name="password" value="password" type="password">
							</div>
						</div>
						
						
                      <div class="d-flex justify-content-end mt-3">
							<button type="submit" class="btn btn-primary btn-lg">Submit</button>
						</div>
						
						
					</form>
					
				<!-- Default Basic Forms End -->

                
@endsection