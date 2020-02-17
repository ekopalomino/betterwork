@extends('apps.layouts.main')
@section('header.title')
Better Work Indonesia | Bank Account
@endsection
@section('header.plugins')
<link rel="stylesheet" href="{{ asset('public/bower_components/admin-lte/plugins/datatables-bs4/css/dataTables.bootstrap4.css') }}">
@endsection
@section('content')
<section class="content-header">
	<div class="container-fluid">
      	<div class="row mb-2">
       		<div class="col-sm-6">
          		<h1>Bank Account</h1>
       		</div>
       	</div>
    </div>
</section>
<section class="content">
	<div class="row">
		<div class="col-12">
			<div class="card card-info card-outline">
				<div class="card-header">
              		<button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#modal-default">
                  		Add New
                	</button>
                	<div class="modal fade" id="modal-default">
				        <div class="modal-dialog">
				          	<div class="modal-content">
							{!! Form::open(array('route' => 'bankAcc.store','method'=>'POST')) !!}
							@csrf
				            	<div class="modal-header">
				             		<h4 class="modal-title">New Account</h4>
				              		<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				                		<span aria-hidden="true">&times;</span>
				              		</button>
				            	</div>
				            	<div class="modal-body">
				              		<label for="inputEmail" class="col-sm-12 col-form-label">Bank Name</label>
                        			{!! Form::text('bank_name', null, array('placeholder' => 'Bank Name','class' => 'form-control')) !!}
                        			<label for="inputEmail" class="col-sm-12 col-form-label">Bank Account</label>
                        			{!! Form::text('account_no', null, array('placeholder' => 'Account No','class' => 'form-control')) !!}
				            	</div>
				            	<div class="modal-footer justify-content-between">
				              		<button type="button" class="btn btn-sm btn-default" data-dismiss="modal">Close</button>
				              		<button type="submit" class="btn btn-sm btn-primary">Save changes</button>
				            	</div>
							{!! Form::close() !!}
				          	</div>
				        </div>
				    </div>
            	</div>
            	<div class="card-body">
            		<table id="example2" class="table table-bordered table-hover">
            			<thead>
            				<tr>
            					<th>No</th>
            					<th>Bank Name</th>
								<th>Account No</th>
            					<th>Created By</th>
								<th>Created At</th>
            					<th></th>
            				</tr>
            			</thead>
            			<tbody>
							@foreach($data as $key=>$bank)
            				<tr>
            					<td>{{ $key+1 }}</td>
            					<td>{{ $bank->bank_name }}</td>
            					<td>{{ $bank->account_no }}</td>
            					<td></td>
								<td>{{date("d F Y H:i",strtotime($bank->created_at)) }}</td>
								<td></td>
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
<script src="{{ asset('public/bower_components/admin-lte/plugins/datatables-bs4/js/dataTables.bootstrap4.js') }}"></script><script>
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