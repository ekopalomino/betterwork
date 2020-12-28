@extends('apps.layouts.main')
@section('header.title')
Better Work Indonesia | Employee Leave Detail
@endsection
@section('header.plugins')
<link rel="stylesheet" href="{{ asset('public/bower_components/admin-lte/plugins/datatables-bs4/css/dataTables.bootstrap4.css') }}">
@endsection
@section('content')
<section class="content-header">
	<div class="container-fluid">
      	<div class="row mb-2">
       		<div class="col-sm-6">
          		<h1>Employee Leave Detail</h1>
       		</div>
			<div class="col-sm-6">
				<ol class="breadcrumb float-sm-right">
					<li class="breadcrumb-item"><a href="{{ route('employeeLeave.index') }}">Employee Leave</a></li>
					<li class="breadcrumb-item active">Leave Data</li>
				</ol>
			</div>
       	</div>
    </div>
</section>
<section class="content">
	<div class="container-fluid">
		<div class="card card-primary card-outline">
			<div class="card-body">
				<table id="example1" class="table table-bordered table-hover">
					<thead>
						<tr>
							<th>Start Date</th>
							<th>End Date</th>
							<th>Schedule In</th>
							<th>Schedule Out</th>
							<th>Leave Type</th>
							<th>Usage</th>
							<th>Remaining</th>
						</tr>
					</thead>
					<tbody>
						@foreach($data->Details => $detail)
						<tr>
							<td>{{date("d F Y",strtotime($detail->leave_start)) }}</td>
							<td>{{date("d F Y",strtotime($detail->leave_end)) }}</td>
							<td>{{date("d F Y H:i",strtotime($detail->schedule_in)) }}</td>
							<td>{{date("d F Y H:i",strtotime($detail->schedule_out)) }}</td>
							<td></td>
							<td>{{ $detail->leave_usage }}</td>
							<td>{{ $detail->leave_remaining }}</td>
						</tr>
						@endforeach
					</tbody>
				</table>			
		    </div>
		</div>
	</div>
</section>
@endsection
@section('footer.scripts')
<script src="{{ asset('public/bower_components/admin-lte/plugins/datatables/jquery.dataTables.js') }}"></script>
<script src="{{ asset('public/bower_components/admin-lte/plugins/datatables-bs4/js/dataTables.bootstrap4.js') }}"></script>
<script>
  $(function () {
    $("#example1").DataTable();
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
    });
  });
</script>
@endsection