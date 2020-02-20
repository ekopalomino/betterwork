@extends('apps.layouts.main')
@section('header.title')
Better Work Indonesia | Help
@endsection
@section('content')
<section class="content-header">
	<div class="container-fluid">
      	<div class="row mb-2">
       		<div class="col-sm-6">
          		<h1>Help Content</h1>
       		</div>
       	</div>
    </div>
</section>
<section class="content">
	<div class="row">
		<div class="col-6">
			<div class="card card-info card-outline">
				<div class="card-header">
					<h4>User Menu</h4>
				</div>
				<div class="card-body">
					<div class="row">
						<div class="col-6">
							<ul>
								<li><a href="{{ route('resetPass.index') }}">Reset your password</a></li>
								<li><a href="{{ route('updateProfile.index') }}">Update your profile</a></li>
								<li>User Attendance</li>
								<li>User Leave Request</li>
								<li>User Grievance</li>
							</ul>
						</div>
						<div class="col-6">
							<ul>
								<li>User Appraisal</li>
								<li>User Reimbursment</li>
								<li>User Training</li>
								<li>User Data</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-6">
			<div class="card card-info card-outline">
				<div class="card-header">
					<h4>Configuration</h4>
				</div>
				<div class="card-body">
					<ul>
						<li>Application Setting</li>
						<li>User Management</li>
						<li>URL page which problem occured</li>
						<li>Screenshot of the problem</li>
					</ul>
				</div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-6">
			<div class="card card-info card-outline">
				<div class="card-header">
					<h4>Human Resources</h4>
				</div>
				<div class="card-body">
					<ul>
						<li>Your user access role</li>
						<li>Action taken before problem occured</li>
						<li>URL page which problem occured</li>
						<li>Screenshot of the problem</li>
					</ul>
				</div>
			</div>
		</div>
		<div class="col-6">
			<div class="card card-info card-outline">
				<div class="card-header">
					<h4>Grievance</h4>
				</div>
				<div class="card-body">
					<ul>
						<li>Your user access role</li>
						<li>Action taken before problem occured</li>
						<li>URL page which problem occured</li>
						<li>Screenshot of the problem</li>
					</ul>
				</div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-6">
			<div class="card card-info card-outline">
				<div class="card-header">
					<h4>Accounting</h4>
				</div>
				<div class="card-body">
					<ul>
						<li>Your user access role</li>
						<li>Action taken before problem occured</li>
						<li>URL page which problem occured</li>
						<li>Screenshot of the problem</li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</section>
@endsection