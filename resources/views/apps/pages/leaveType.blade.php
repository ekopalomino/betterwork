@extends('apps.layouts.main')
@section('header.title')
Better Work Indonesia | Leave Type
@endsection
@section('header.plugins')
<link rel="stylesheet" href="{{ asset('public/bower_components/admin-lte/plugins/datatables-bs4/css/dataTables.bootstrap4.css') }}">
@endsection
@section('content')
<section class="content-header">
	<div class="container-fluid">
      	<div class="row mb-2">
       		<div class="col-sm-6">
          		<h1>Leave Type</h1>
       		</div>
       	</div>
    </div>
</section>
<section class="content">
	<div class="row">
		<div class="col-12">
			<div class="card card-info card-outline">
				<div class="card-header"> 

              		<button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#leave">
                  		Add New
                	</button>
                	<div class="modal fade" id="leave">
				        <div class="modal-dialog modal-lg">
				          	<div class="modal-content">
				            	<div class="modal-header">
				             		<h4 class="modal-title">New Type</h4>
				              		<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				                		<span aria-hidden="true">&times;</span>
				              		</button>
				            	</div>
				            	<div class="modal-body">
									{!! Form::open(array('route' => 'leaveType.store','method'=>'POST', 'class' => 'form-horizontal')) !!}
									@csrf

				              		<label class="col-sm-12 col-form-label">Leave Type Name</label>
                        				{!! Form::text('leave_name', null, array('placeholder' => 'Position Name','class' => 'form-control')) !!}
                        			<label class="col-sm-12 col-form-label">First Approval</label>
										<select name="contract_status" class="form-control">
											<option value="0">Please Select</option>
											<option value="1">Direct Supervisor</option>
											<option value="2">HR Officer</option>
											<option value="3">No Approval</option>
										</select>
									<label class="col-sm-12 col-form-label">Second Approval</label>
										<select name="contract_status" class="form-control">
											<option value="0">Please Select</option>
											<option value="1">Direct Supervisor</option>
											<option value="2">HR Officer</option>
											<option value="3">No Approval</option>
										</select>

				            	</div>
				            	<div class="modal-footer">
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
            					<th>Leave Type Name</th>

								<th>First Approval</th>
								<th>Second Approval</th>

								<th>Created By</th>
            					<th>Created At</th>
            					<th></th>
            				</tr>
            			</thead>
            			<tbody>
							@foreach($data as $key=>$value)
            				<tr>
            					<td>{{ $key+1 }}</td>
            					<td>{{ $value->leave_name }}</td>
								<td></td>
								<td></td>
            					<td>{{ $value->Author->name }}</td>
            					<td>{{date("d F Y H:i",strtotime($value->created_at)) }}</td>
								<td>
									<div class="btn-group">

										<button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

											Action
										</button>
										<div class="dropdown-menu" role="menu">
											<a class="dropdown-item modalMd" href="#" value="{{ action('Apps\ConfigurationController@leaveTypeEdit',['id'=>$value->id]) }}" data-toggle="modal" data-target="#modalMd">Edit Data</a>
											{!! Form::open(['method' => 'POST','route' => ['leaveType.destroy', $value->id],'style'=>'dropdown-item','onsubmit' => 'return ConfirmDelete()']) !!}
											{!! Form::button('<a>Delete Data</a>',['type'=>'submit','class' => 'dropdown-item']) !!}
											{!! Form::close() !!}
										</div>


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
    var x = confirm("Data Delete?");
    if (x)
        return true;
    else
        return false;
    }
</script>
@endsection