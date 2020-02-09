@extends('apps.layouts.main')
@section('header.title')
Better Work Indonesia | Human Resources
@endsection
@section('header.plugins')
	
@endsection
@section('content')
<section class="content-header">
	<div class="container-fluid">
      	<div class="row mb-2">
       		<div class="col-sm-6">
          		<h1>Human Resources Dashboard</h1>
       		</div>
       	</div>
    </div>
</section>
<section class="content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-6">
				<div class="card card-danger card-outline">
					<div class="card-body box-profile">
						<div class="text-center">
							<p><strong>Employee On Leave Today</strong></p>
							<table class="table table-head-fixed text-nowrap">
								<thead>
									<tr>
										<th>ID</th>
										<th>Employee Name</th>
										<th>Active On</th>
									</tr>
								</thead>
								<tbody>
									@foreach($onLeave as $leave)
									<tr>
										<td>{{ $leave->Employees->employee_no }}</td>
										<td>{{ $leave->Employees->first_name }} {{ $leave->Employees->last_name }}</td>
										<td>{{date("d F Y H:i",strtotime($leave->leave_end)) }}</td>
									</tr>
									@endforeach
								</tbody>
							</table>
						</div>
                	</div>
                </div>
			</div>
			<div class="col-md-6">
				<div class="card card-primary card-outline">
					<div class="card-body box-profile">
						<div class="text-center">
							<p><strong>Employee Birthday Today</strong></p>
							<table class="table table-head-fixed text-nowrap">
								<thead>
									<tr>
										<th>ID</th>
										<th>Employee Name</th>
										<th>Birthday</th>
									</tr>
								</thead>
								<tbody>
									@foreach($onBirthday as $date)
									<tr>
										<td>{{ $date->Employees->employee_no }}</td>
										<td>{{ $date->Employees->first_name }} {{ $date->Employees->last_name }}</td>
										<td>{{date("d F Y H:i",strtotime($date->date_of_birth)) }}</td>
									</tr>
									@endforeach
								</tbody>
							</table>
						</div>
                	</div>
                </div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-3">
				<div class="card card-primary card-outline">
					<div class="card-body box-profile">
						<div class="text-center">
							<p><strong>Employee by Gender</strong></p>
							
						</div>
                	</div>
                </div>
			</div>
			<div class="col-md-3">
				<div class="card card-primary card-outline">
					<div class="card-body box-profile">
						<div class="text-center">
							<p><strong>Employee by Age</strong></p>
							
						</div>
                	</div>
                </div>
			</div>
			<div class="col-md-3">
				<div class="card card-primary card-outline">
					<div class="card-body box-profile">
						<div class="text-center">
							<p><strong>Employee by Services</strong></p>
							
						</div>
                	</div>
                </div>
			</div>
			<div class="col-md-3">
				<div class="card card-primary card-outline">
					<div class="card-body box-profile">
						<div class="text-center">
							<p><strong>Employee by Education</strong></p>
							
						</div>
                	</div>
                </div>
			</div>
		</div>
	</div>
</section>
@endsection