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
			<section class="content">
				<div class="row">
					<div class="col-12">
						<div class="invoice p-3 mb-3">
							<div class="row">
								<div class="col-12">
									<h4>
										<img src="{{ asset('public/assets/img/logo.png') }}" style="opacity: .8">
										<small class="float-right">Salary Slip: {{date("F Y",strtotime($data->payroll_period)) }}</small>
									</h4>
								</div>
							</div>
							<div class="row invoice-info">
								<div class="col-sm-4 invoice-col">
									<address>
										<strong>{{$data->first_name}} {{$data->last_name}}</strong><br>
										<strong>{{$data->employee_no}}</strong><br>
											{{$data->grade}}
									</address>	
								</div>
							</div>
							<div class="row">
								<div class="col-6">
									<p class="lead">Allowance</p>
									<div class="table-responsive">
										<table class="table">
											<tr>
												<th style="width:50%">Basic Salary:</th>
												<td>Rp {{ number_format($data->nett_salary,0,',','.')}}</td>
											</tr>
											<tr>
												<th style="width:50%">Iuran Ketenagakerjaan:</th>
												<td>Rp {{ number_format($iuran,0,',','.')}}</td>
											</tr>
											<tr>
												<th style="width:50%">Iuran BPJS Kesehatan:</th>
												<td>Rp {{ number_format($data->bpjs,0,',','.')}}</td>
											</tr>
											<tr>
												<th style="width:50%">Income Tax :</th>
												<td>Rp {{ number_format($data->income_tax,0,',','.')}}</td>
											</tr>
											<tr>
												<th style="width:50%">Leave Balance:</th>
												<td>Rp {{ number_format($data->leave_balance,0,',','.')}}</td>
											</tr>
											<tr>
												<th style="width:50%">Annual Staff Reward:</th>
												<td>Rp {{ number_format($data->rewards,0,',','.')}}</td>
											</tr>
										</table>
									</div>
								</div>
								<div class="col-6">
									<p class="lead">Deduction</p>
									<div class="table-responsive">
										<table class="table">
											<tr>
												<th style="width:50%">Iuran Ketenagakerjaan:</th>
												<td>Rp {{ number_format($iuran,0,',','.')}}</td>
											</tr>
											<tr>
												<th style="width:50%">Iuran BPJS Kesehatan:</th>
												<td>Rp {{ number_format($data->bpjs,0,',','.')}}</td>
											</tr>
											<tr>
												<th style="width:50%">Income Tax:</th>
												<td>Rp {{ number_format($data->income_tax,0,',','.')}}</td>
											</tr>
											<tr>
												<th style="width:50%">Other Deduction:</th>
												<td>Rp 0</td>
											</tr>
										</table>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-6">
									<div class="table-responsive">
										<table class="table">
											<tr>
												<th style="width:50%">Total Allowance:</th>
												<td>Rp {{ number_format($income,0,',','.')}}</td>
											</tr>
										</table>
									</div>
								</div>
								<div class="col-6">
									<div class="table-responsive">
										<table class="table">
											<tr>
												<th style="width:50%">Total Deduction:</th>
												<td>Rp {{ number_format($outcome,0,',','.')}}</td>
											</tr>
										</table>
									</div>
									<div class="table-responsive">
										<table class="table">
											<tr>
												<th style="width:50%">Take Home Pay:</th>
												<td><strong>Rp {{ number_format($nett,0,',','.')}}</strong></td>
											</tr>
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
		