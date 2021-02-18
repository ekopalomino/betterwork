@extends('apps.layouts.main')
@section('header.title')
Better Work Indonesia | Employee Reimbursment Approval
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
				<h1>Employee Reimbursment Approval</h1>
			</div>
		</div>
	</div>
</section>
<section class="content">
	<div class="row">
		<div class="col-12">
			<div class="card card-info card-outline">
				<div class="card-body">
					<table id="example2" class="table table-bordered table-hover">
						<thead>
							<tr>
								<th>No</th>
								<th>Employee Name</th>
								<th>Transaction Date</th>
								<th>Type</th>
								<th>Amount</th>
								<th>Notes</th>
								<th>Status</th>
								<th></th>
							</tr>
						</thead>
						<tbody>
							@foreach($data as $key => $value)
							<tr>
								<td>{{ $key+1 }}</td>
								<td>{{ $value->Employees->first_name }} {{ $value->Employees->last_name }}</td>
								<td>@if(!empty($value->transaction_date)){{date("d F Y",strtotime($value->transaction_date)) }}@endif</td>
								<td>{{ $value->Type->reimburs_name }}</td>
								<td>{{ number_format($value->amount,0,',','.')}}</td>
								<td>{{ $value->notes }}</td>
								<td>
									@if(($value->status_id) == 'b0a0c17d-e56a-41a7-bfb0-bd8bdc60a7be')
									<span class="badge badge-info">{{ $value->Statuses->name }}</span>
									@elseif(($value->status_id) == 'ca52a2ce-5c37-48ce-a7f2-0fd5311860c2')
									<span class="badge badge-success">{{ $value->Statuses->name }}</span>
									@else
									<span class="badge badge-danger">{{ $value->Statuses->name }}</span>
									@endif
								</td>
								<td>
									@can('Process Payroll')
									@if(($value->status_id) == 'b0a0c17d-e56a-41a7-bfb0-bd8bdc60a7be')
									{!! Form::open(['method' => 'POST','route' => ['reimburs.approve', $value->id],'style'=>'display:inline','onsubmit' => 'return ConfirmApprove()']) !!}
                                    {!! Form::button('<i class="fas fa-check"></i>',['type'=>'submit','class' => 'btn btn-xs btn-success','title'=>'Approve']) !!}
                                    {!! Form::close() !!}
                                    {!! Form::open(['method' => 'POST','route' => ['reimburs.reject', $value->id],'style'=>'display:inline','onsubmit' => 'return ConfirmReject()']) !!}
                                    {!! Form::button('<i class="fas fa-times"></i>',['type'=>'submit','class' => 'btn btn-xs btn-danger','title'=>'Reject']) !!}
                                    {!! Form::close() !!}
									@endif
									@endcan
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
      "autoWidth": false,
    });
    $('#reservation').daterangepicker()
  });
</script>
<script>
    function ConfirmApprove()
    {
    var x = confirm("Request Approve?");
    if (x)
        return true;
    else
        return false;
    }
</script>
<script>
    function ConfirmReject()
    {
    var x = confirm("Request Reject?");
    if (x)
        return true;
    else
        return false;
    }
</script>
@endsection