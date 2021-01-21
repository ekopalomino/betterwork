@extends('apps.layouts.main')
@section('header.title')
Better Work Indonesia | Holiday
@endsection
@section('header.plugins')
<link rel="stylesheet" href="{{ asset('bower_components/admin-lte/plugins/datatables-bs4/css/dataTables.bootstrap4.css') }}">
@endsection
@section('content')
<section class="content-header">
	<div class="container-fluid">
      	<div class="row mb-2">
       		<div class="col-sm-6">
          		<h1>Holiday</h1>
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
				             		<h4 class="modal-title">New Holiday</h4>
				              		<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				                		<span aria-hidden="true">&times;</span>
				              		</button>
				            	</div>
				            	<div class="modal-body">
									{!! Form::open(array('route' => 'holiday.store','method'=>'POST')) !!}
									@csrf

				              		<label class="col-sm-12 col-form-label">Holiday Name</label>
                        				{!! Form::text('name', null, array('placeholder' => 'Holiday Name','class' => 'form-control')) !!}
                        			<label class="col-sm-12 col-form-label">Start Date</label>
										{!! Form::date('holiday_start', '', array('id' => 'datepicker','class' => 'form-control')) !!}
									<label class="col-sm-12 col-form-label">End Date</label>
										{!! Form::date('holiday_end', '', array('id' => 'datepicker','class' => 'form-control')) !!}
									<label class="col-sm-12 col-form-label">Leave Status</label>
										<select name="leave_status" class="form-control">
											<option value="0">Please Select</option>
											<option value="c6d904f6-8eb5-4085-81ce-f6e69aa8162e">No Reduction</option>
											<option value="085a1099-2a05-4fd7-8019-242c2ac87a0f">Reduction</option>
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
            					<th>Holiday Name</th>
								<th>Start Date</th>
								<th>End Date</th>
								<th>Leave Status</th>
            					<th>Created At</th>
            					<th></th>
            				</tr>
            			</thead>
            			<tbody>
							@foreach($data as $key=>$value)
            				<tr>
            					<td>{{ $key+1 }}</td>
            					<td>{{ $value->holiday_name }}</td>
								<td>{{date("d F Y",strtotime($value->holiday_start)) }}</td>
								<td>{{date("d F Y",strtotime($value->holiday_end)) }}</td>
            					<td>{{ $value->Statuses->name }}</td>
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
<script src="{{ asset('bower_components/admin-lte/plugins/datatables/jquery.dataTables.js') }}"></script>
<script src="{{ asset('bower_components/admin-lte/plugins/datatables-bs4/js/dataTables.bootstrap4.js') }}"></script><script>
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