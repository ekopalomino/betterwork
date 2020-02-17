@extends('apps.layouts.main')
@section('header.title')
Better Work Indonesia | My Reimbursment Request
@endsection
@section('header.plugins')
<link rel="stylesheet" href="{{ asset('public/bower_components/admin-lte/plugins/datatables-bs4/css/dataTables.bootstrap4.css') }}">
@endsection
@section('content')
<section class="content-header">
	<div class="container-fluid">
      	<div class="row mb-2">
       		<div class="col-sm-6">
          		<h1>My Reimbursment Request</h1>
       		</div>
       	</div>
    </div>
</section>
<section class="content">
	<div class="row">
		<div class="col-12">
			<div class="card card-info card-outline">
				<div class="card-header"> 
					<button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#modal-lg">
						Add New
					</button>
					<div class="modal fade" id="modal-lg">
						<div class="modal-dialog modal-lg">
							<div class="modal-content">
								<div class="modal-header">
									<h4 class="modal-title">New Request</h4>
										<button type="button" class="close" data-dismiss="modal" aria-label="Close">
											<span aria-hidden="true">&times;</span>
										</button>
								</div>
								<div class="modal-body">
									{!! Form::open(array('route' => 'myReimburs.store','method'=>'POST', 'class' => 'form-horizontal','files'=>'true')) !!}
									@csrf
									<label for="inputEmail" class="col-sm-12 col-form-label">Request Type</label>
										<div class="col-sm-12">
											{!! Form::select('request_type', [null=>'Please Select'] + $types,[], array('class' => 'form-control')) !!}
										</div>
									<label for="inputEmail" class="col-sm-12 col-form-label">Transaction Date</label>
										<div class="col-sm-12">
											{!! Form::date('transaction_date', '', array('id' => 'datepicker','class' => 'form-control')) !!}
										</div>
									<label for="inputEmail" class="col-sm-12 col-form-label">Amount</label>
										<div class="col-sm-12">
											{!! Form::number('amount', '', array('class' => 'form-control')) !!}
										</div>
									<label for="inputEmail" class="col-sm-12 col-form-label">Note</label>
										<div class="col-sm-12">
											{!! Form::textarea('notes', null, array('placeholder' => 'Reimburs Note','class' => 'form-control')) !!}
										</div>
									{!! Form::hidden('employee_id', $getEmployee->id, array('class' => 'form-control')) !!}
									<label for="inputEmail" class="col-sm-12 col-form-label">Receipt</label>
									<div class="col-sm-12">
										<div class="input-group">
											<div class="custom-file">
												<input type="file" class="custom-file-input" id="receipt" name="receipt">
												<label class="custom-file-label" for="receipt">Choose Receipt</label>
											</div>
										</div>
									</div>
									{!! Form::hidden('employee_id', $getEmployee->id, array('class' => 'form-control')) !!}
								</div>
								<div class="modal-footer justify-content-between">
									<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
									<button id="register" type="submit" class="btn btn-primary">Save changes</button>
								</div>
								{!! Form::close() !!}
							</div>
						</div>
					</div>
				</div>
				<div class="card-body">
					@if (count($errors) > 0) 
					<div class="alert alert-danger alert-dismissible">
						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
						<h5><i class="icon fas fa-ban"></i> Alert!</h5>
						<ul>
							@foreach ($errors->all() as $error)
							<li>{{ $error }}</li>
							@endforeach
						</ul>
					</div>
					@endif
					<table id="example1" class="table table-bordered table-hover">
						<thead>
							<tr>
								<th>No</th>
								<th>Type</th>
								<th>Transaction Date</th>
								<th>Amount</th>
								<th>Notes</th>
								<th>Status</th>
								<th>Created At</th>
								<th>Updated At</th>
							</tr>
						</thead>
						<tbody>
							@foreach($data as $key=>$value)
							<tr>
								<td>{{ $key+1 }}</td>
								<td>{{ $value->Type->reimburs_name }}</td>
								<td>@if(!empty($value->transaction_date)){{date("d F Y H:i",strtotime($value->transaction_date)) }}@endif</td>
								<td>{{ number_format($value->amount,2,',','.')}}</td>
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
								<td>{{date("d F Y H:i",strtotime($value->created_at)) }}</td>
								<td>{{date("d F Y H:i",strtotime($value->updated_at)) }}</td>
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
<script src="{{ asset('public/bower_components/admin-lte/plugins/bs-custom-file-input/bs-custom-file-input.min.js') }}"></script>
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
<script type="text/javascript">
$(document).ready(function () {
    bsCustomFileInput.init();
});
</script>
<script>
    function ConfirmDelete()
    {
    var x = confirm("Data Delete?");
    if (x)
        return true;
    else
        return false;
    }
</script>
@endsection