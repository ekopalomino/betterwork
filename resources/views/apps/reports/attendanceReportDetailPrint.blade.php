<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
  	<meta name="viewport" content="width=device-width, initial-scale=1">
  	<meta http-equiv="x-ua-compatible" content="ie=edge">
  	<link rel="stylesheet" href="{{ asset('public/bower_components/admin-lte/plugins/fontawesome-free/css/all.min.css') }}">
  	<link rel="stylesheet" href="{{ asset('public/bower_components/admin-lte/dist/css/adminlte.min.css') }}">
  	<link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
  	<link rel="stylesheet" href="{{ asset('public/bower_components/admin-lte/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css') }}">
  	<link rel="stylesheet" href="{{ asset('public/bower_components/admin-lte/plugins/toastr/toastr.min.css') }}">
</head>
<body class="hold-transition sidebar-mini">
	<div class="wrapper">
		<div class="content-wrapper">
			<section class="content-header">
				<div class="container-fluid">
					<div class="row mb-2">
						<div class="col-sm-6">
							<h1>Employee Attendance Report</h1>
						</div>
					</div>
				</div>
			</section>
			<section class="content">
				<div class="row">
					<div class="col-12">
						<div class="card card-success card-outline">
							<div class="card-body">
								<div class="row">
									<div class="col-md-6">
										<div class="card card-info card-outline">
											<div class="card-body box-profile">
												<div class="text-center">
													<p><strong>Employee Summary</strong></p>
												</div>
													<p>Employee ID : {{$employee->employee_no}}</p>
													<p>Employee Name : {{$employee->first_name}} {{$employee->last_name}}</p>
													<p>Attendance Range : {{date("d F Y",strtotime($start)) }} - {{date("d F Y",strtotime($end)) }}</p>
													<p>Total Working Hours : {{$total}}</p>
											
											</div>
										</div>
									</div>
								</div>		
								<div class="row">
									<div class="card-body table-responsive">
										<table class="table table-bordered">
											<thead>
												<tr>
													<th>No</th>
													<th>Attendance Date</th>
													<th>In</th>
													<th>Out</th>
													<th>Working Hours</th>
													<th style="width:100px;">Notes</th>
												</tr>
											</thead>
											<tbody>
												@foreach($data as $key=>$value)
												<tr>
													<td>{{ $key+1 }}</td>
													<td>{{date("d F Y",strtotime($value->created_at)) }}</td>
													<td>{{date("H:i",strtotime($value->clock_in)) }}</td>
													<td>
														@if(!empty($value->clock_out))
														{{date("H:i",strtotime($value->clock_out)) }}
														@endif
													</td>
													<td>{{ $value->working_hour }}</td>
													<td style="width:100px;">{!!html_entity_decode($value->notes)!!}</td>
												</tr>
												@endforeach
											</tbody>
										</table>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>
		</div>
	</div>
	<script src="{{ asset('public/bower_components/admin-lte/plugins/jquery/jquery.min.js') }}"></script>
	<script src="{{ asset('public/bower_components/admin-lte/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
	<script src="{{ asset('public/bower_components/admin-lte/dist/js/adminlte.min.js') }}"></script>
	<script type="text/javascript"> 
		window.addEventListener("load", window.print());
	</script>
</body>
</html>
		