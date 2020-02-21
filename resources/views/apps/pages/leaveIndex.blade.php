@extends('apps.layouts.main')
@section('header.title')
Better Work Indonesia | Employee Leave Data
@endsection
@section('header.plugins')
<link rel="stylesheet" href="{{ asset('public/bower_components/admin-lte/plugins/datatables-bs4/css/dataTables.bootstrap4.css') }}">
@endsection
@section('content')
<section class="content-header">
	<div class="container-fluid">
    <div class="row mb-2">
    	<div class="col-sm-6">
     		<h1>Employee Leave Data</h1>
    	</div>
    </div>
  </div>
</section>
<section class="content">
	<div class="row">
		<div class="col-md-12">
			<div class="card card-info card-outline">
				
				<div class="card-body">
				  <table id="example1" class="table table-bordered table-hover">
					<thead>
					  <tr>
						<th>No</th>
						<th>Employee ID</th>
						<th>Employee Name</th>
						<th>Leave Allowance</th>
						<th>Leave Remaining</th>
						<th></th>
					  </tr>
					</thead>
					<tbody>
					  @foreach($data as $key=>$value)
					  <tr>
						<td>{{ $key+1 }}</td>
						<td>{{ $value->Employees->employee_no }}</td>
						<td>{{ $value->Employees->first_name }} {{ $value->Employees->last_name }}</td>
						<td>{{ $value->leave_amount }}</td>
						<td>
							@if(!empty($value->leave_remaining))
							{{ $value->leave_remaining }}
							@else
							{{ $value->leave_amount }}
							@endif
						</td>
						<td>
							<a class="btn btn-xs btn-info" href="{{ route('employeeLeaveCard.index',$value->id) }} " title="Read Article" ><i class="fa fa-search"></i></a>
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