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
				        <div class="modal-dialog modal-lg">
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
				              		<label class="col-sm-12 col-form-label">Bank Name</label>
                        			{!! Form::text('bank_name', null, array('placeholder' => 'Bank Name','class' => 'form-control')) !!}
                        			<label class="col-sm-12 col-form-label">Bank Account</label>
                        			{!! Form::text('account_no', null, array('placeholder' => 'Account No','class' => 'form-control')) !!}
									<label class="col-sm-12 col-form-label">Chart of Account</label>
									{!! Form::select('chart_id', [null=>'Please Select'] + $accounts,[], array('class' => 'form-control')) !!}
									<label class="col-sm-12 col-form-label">Opening Balance</label>
                        			{!! Form::number('opening_balance', null, array('placeholder' => 'Opening Balance','class' => 'form-control')) !!}
									<label class="col-sm-12 col-form-label">Opening Date</label>
                        			{!! Form::date('opening_date', '', array('id' => 'datepicker','class' => 'form-control')) !!}
				            	</div>
				            	<div class="modal-footer">
				              		<button type="button" class="btn btn-sm btn-default" data-dismiss="modal">Close</button>
				              		<button type="submit" class="btn btn-sm btn-primary">Save changes</button>
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
								<td>
									<a class="btn btn-xs btn-info modalMd" href="#" value="{{ action('Apps\ConfigurationController@bankAccountEdit',['id'=>$bank->id]) }}" title="Edit Data" data-toggle="modal" 
									data-target="#modalMd"><i class="fa fa-search"></i></a>
									{!! Form::open(['method' => 'POST','route' => ['bankAcc.destroy', $bank->id],'style'=>'display:inline','onsubmit' => 'return ConfirmDelete()']) !!}
									{!! Form::button('<i class="fas fa-user-slash"></i>',['type'=>'submit','class' => 'btn btn-xs btn-danger']) !!}
									{!! Form::close() !!}
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
<script>
    function ConfirmDelete()
    {
    var x = confirm("Are You Sure? All The Accounting Transaction Will Be Deleted");
    if (x)
        return true;
    else
        return false;
    }
</script>
@endsection