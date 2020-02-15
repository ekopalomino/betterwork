@extends('apps.layouts.main')
@section('header.title')
Better Work Indonesia | Employee Payroll Data
@endsection
@section('content')
<section class="content-header">
	<div class="container-fluid">
      	<div class="row mb-2">
       		<div class="col-sm-6">
          		<h1>Employee Payroll Data</h1>
       		</div>
       	</div>
    </div>
</section>
<section class="content">
	<div class="row">
		<div class="col-12">
			<div class="card card-primary card-outline">
				<div class="card-body">
					<table class="table table-head-fixed text-nowrap">
						<thead>
							<tr>
								<th>No</th>
								<th>ID No</th>
								<th>Employee Name</th>
								<th>Position</th>
								<th>Take Home Pay</th>
								<th>Leave Balance</th>
								<th>Rewards</th>
								<th>Expense</th>
								<th>Allowance</th>
								<th>Income Tax</th>
								<th></th>
							</tr>
						</thead>
						<tbody>
							@foreach($data as $key=>$value)
							<tr>
								<td>{{ $key+1 }}</td>
								<td>{{ $value->employee_no }}</td>
								<td>{{ $value->first_name }} {{ $value->last_name }}</td>
								<td>{{ $value->grade }}</td>
								<td>{{ number_format($value->receive_payroll,0,',','.')}}</td>
								<td>{{ number_format($value->leave_balance,0,',','.')}}</td>
								<td>{{ number_format($value->rewards,0,',','.')}}</td>
								<td>{{ number_format($value->expense,0,',','.')}}</td>
								<td>{{ number_format(($value->jkk)+($value->jkm)+($value->bpjs)+($value->jht)+($value->jp),0,',','.')}}</td>
								<td>{{ number_format($value->income_tax,0,',','.')}}</td>
								<td>
									<a class="btn btn-xs btn-success" href="{{ route('salarySlips.show',['empNo'=>$value->employee_no]) }} " title="Read Article" ><i class="fa fa-search"></i></a>
								</td>
							</tr>
							@endforeach
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</section>
@endsection