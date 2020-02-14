@extends('apps.layouts.main')
@section('header.title')
Better Work Indonesia | Employee Attendance Report
@endsection
@section('content')
<section class="content-header">
	<div class="container-fluid">
		<div class="row mb-2">
			<div class="col-sm-6">
				<h1>Employee Attendance Report</h1>
			</div>
			<div class="col-sm-6">
				<ol class="breadcrumb float-sm-right">
					<li class="breadcrumb-item"><a href="{{ route('attReport.index') }}">Attendance Report</a></li>
					<li class="breadcrumb-item active">Employee Attendance Report</li>
				</ol>
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
						<div class="card-body table-responsive p-0" style="height: 400px;">
							<table class="table table-bordered table-head-fixed">
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
					<div class="row">
						<a href="{{ route('attReport.export',['ID'=>$employee->employee_no,'startDate'=>$start,'endDate'=>$end]) }}" class="btn btn-sm btn-app"><i class="fas fa-file-pdf"></i> Save as PDF</a>
						<a href="{{ route('attReport.print',['ID'=>$employee->employee_no,'startDate'=>$start,'endDate'=>$end]) }}" target="blank" class="btn btn-sm btn-app"><i class="fas fa-print"></i> Print</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
@endsection