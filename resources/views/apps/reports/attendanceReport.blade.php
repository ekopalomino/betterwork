@extends('apps.layouts.main')
@section('header.title')
Better Work Indonesia | Employee Attendance Report
@endsection
@section('header.plugins')
<link rel="stylesheet" href="{{ asset('public/bower_components/admin-lte/plugins/datatables-bs4/css/dataTables.bootstrap4.css') }}">
<link rel="stylesheet" href="{{ asset('public/bower_components/admin-lte/plugins/daterangepicker/daterangepicker.css') }}">
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
						<div class="col-md-3">
							<div class="card card-info card-outline">
								<div class="card-body box-profile">
									<div class="text-center">
										<p><strong>Employee Summary</strong></p>
									</div>
										<p>Employee ID : {{$empID}}</p>
										<p>Employee Name : </p>
										<p>Attendance Range : </p>
										<p>Total Working Hours : </p>
								
								</div>
							</div>
						</div>
					</div>		
					<div class="row">
						<div class="col-12">
							<table id="example2" class="table table-bordered table-hover">
								<thead>
									<tr>
										<th>No</th>
										<th>Employee ID</th>
										<th>Employee Name</th>
										<th>Attendance Date</th>
										<th>In</th>
										<th>Out</th>
										<th>Working Hours</th>
										<th style="width:500px;">Notes</th>
									</tr>
								</thead>
								<tbody>
									@foreach($data as $key=>$value)
									<tr>
										<td>{{ $key+1 }}</td>
										<td>{{ $value->employee_no }}</td>
										<td>{{ $value->first_name }} {{ $value->last_name }}</td>
										<td>{{date("d F Y",strtotime($value->created_at)) }}</td>
										<td>{{date("H:i",strtotime($value->clock_in)) }}</td>
										<td>
											@if(!empty($value->clock_out))
											{{date("H:i",strtotime($value->clock_out)) }}
											@endif
										</td>
										<td>{{ $value->working_hour }}</td>
										<td style="width:500px;">{{ $value->notes }}</td>
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
@endsection
@section('footer.scripts')
<script src="{{ asset('public/bower_components/admin-lte/plugins/datatables/jquery.dataTables.js') }}"></script>
<script src="{{ asset('public/bower_components/admin-lte/plugins/datatables-bs4/js/dataTables.bootstrap4.js') }}"></script>
<script src="{{ asset('public/bower_components/admin-lte/plugins/moment/moment.min.js') }}"></script>
<script src="{{ asset('public/bower_components/admin-lte/plugins/daterangepicker/daterangepicker.js') }}"></script>
<script>
  $(function () {
    $("#example1").DataTable();
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": true,
    });
    $('#reservation').daterangepicker()
  });
</script>
@endsection