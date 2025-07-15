@extends('layout.app')

@section('title', 'AdminList')


@section('content')

@include('_message') 

<div class="pd-ltr-20 xs-pd-20-10">
			<div class="min-height-200px">
				<div class="page-header">
					<div class="row">
						<div class="col-md-6 col-sm-12">
							<div class="title">
								<h4>Admin List</h4>
							</div>
							<nav aria-label="breadcrumb" role="navigation">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="index.html">Home</a></li>
									<li class="breadcrumb-item active" aria-current="page">Admin List</li>
								</ol>
							</nav>
						</div>
						<div class="col-md-6 col-sm-12 text-right">
							<div class="dropdown">
								<a class="btn btn-primary dropdown-toggle" href="#" role="button" data-toggle="dropdown">
									Add Admin
								</a>
								<div class="dropdown-menu dropdown-menu-right">
									<a class="dropdown-item" href="/admin/admin/add">Add Admin</a>
									
								</div>
							</div>
						</div>
					</div>
                <div>
</div>
</div>
                

                <div class="pd-20 card-box mb-30">
					<div class="clearfix mb-20">
						<div class="pull-left">
							<h4 class="text-blue h4">Admin List</h4>
							
						</div>
						
					</div>
					<table class="table table-striped">
						<thead>
							<tr>
								<th scope="col">#</th>
								<th scope="col">Admin Name</th>
								<th scope="col">Email</th>
								
								<th scope="col">Phone No</th>
								<th scope="col">Created By</th>
								<th scope="col">Actions</th>
							</tr>
						</thead>
						<tbody>
							@foreach($admins as $admin)
							<tr>
					<td>{{ $admin ->id }}</td>
                    <td>{{ $admin->name }}</td>
                    <td>{{ $admin->email }}</td>
                    
                    <td>{{ $admin->telephone }}</td>
                    <td>{{ $admin->created_by }}</td>
                    <td>
					<a href="{{url('admin/admin/edit/' . $admin->id)}}" class="btn btn-outline-success">Edit</a>
					<a href="{{url('admin/admin/delete/' . $admin->id)}}" class="btn btn-outline-danger">Delete</button>
								
					<td>
							</tr>
							@endforeach
						</tbody>
					</table>
					<div class="collapse collapse-box" id="striped-table">
						<div class="code-box">
							<div class="clearfix">
								<a href="javascript:;" class="btn btn-primary btn-sm code-copy pull-left"  data-clipboard-target="#striped-table-code"><i class="fa fa-clipboard"></i> Copy Code</a>
								<a href="#striped-table" class="btn btn-primary btn-sm pull-right" rel="content-y"  data-toggle="collapse" role="button"><i class="fa fa-eye-slash"></i> Hide Code</a>
							</div>
							<pre><code class="xml copy-pre" id="striped-table-code">
<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">#</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">1</th>
    </tr>
  </tbody>
</table>
							</code></pre>
						</div>
					</div>
				</div>
                




</div>
</div>
@endsection


							


