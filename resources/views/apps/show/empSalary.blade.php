@extends('apps.layouts.main')
@section('header.title')
Better Work Indonesia | Employee Payroll Slip
@endsection
@section('content')
<section class="content-header">
	<div class="container-fluid">
      	<div class="row mb-2">
       		<div class="col-sm-6">
          		<h1>Employee Payroll Slip</h1>
       		</div>
       	</div>
    </div>
</section>
<section class="content">
	<div class="container-fluid">
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
	</div>
</section>
@endsection