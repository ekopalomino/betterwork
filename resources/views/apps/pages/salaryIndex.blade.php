@extends('apps.layouts.main')
@section('header.title')
Better Work Indonesia | Salary Process
@endsection
@section('header.plugins')
<link rel="stylesheet" href="{{ asset('public/bower_components/admin-lte/plugins/datatables-bs4/css/dataTables.bootstrap4.css') }}">
@endsection
@section('content')
<section class="content-header">
	<div class="container-fluid">
      	<div class="row mb-2">
       		<div class="col-sm-6">
          		<h1>Employee Salary Process</h1>
       		</div>
       	</div>
    </div>
</section>
<section class="content">
	<div class="row">
		<div class="col-12">
			<div class="card card-primary card-outline">
				<div class="card-header">
					<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#salary">
                  		Add New
                	</button>
					<div class="modal fade" id="salary">
				        <div class="modal-dialog modal-lg">
				          	<div class="modal-content">
								{!! Form::open(array('route' => 'salary.store','method'=>'POST', 'files' => 'true')) !!}
								@csrf
				            	<div class="modal-header">
				             		<h4 class="modal-title">New Salary File</h4>
				              		<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				                		<span aria-hidden="true">&times;</span>
				              		</button>
				            	</div>
				            	<div class="modal-body">
				              		<label for="inputName">Salary File</label>
			    					<div class="input-group">
									   	{!! Form::file('salary', null, array('placeholder' => 'Employee Photo','class' => 'form-control')) !!}
	                      			</div>
                        		</div>
				            	<div class="modal-footer justify-content-between">
				              		<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				              		<button type="submit" class="btn btn-primary">Import</button>
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
								<th>Period</th>
								<th>Total Salary</th>
								<th>Payment To Employee</th>
								<th>Payment To BPJS TK</th>
								<th>Payment To BPJS Health</th>
								<th>Payment To Tax</th>
								<th>Status</th>
								<th>Created By</th>
								<th></th>
							</tr>
						</thead>
						<tbody>
							@foreach($data as $key=>$value)
							<tr>
								<td>{{ $key+1 }}</td>
								<td></td>
								<td>{{ number_format($value->Total,0,',','.')}}</td>
								<td>{{ number_format($value->Salary,0,',','.')}}</td>
								<td>{{ number_format($value->tk,0,',','.')}}</td>
								<td>{{ number_format($value->bpjs,0,',','.')}}</td>
								<td>{{ number_format($value->tax,0,',','.')}}</td>
								<td>{{ $value->Statuses->name }}</td>
								<td></td>
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
<script src="{{ asset('public/bower_components/admin-lte/plugins/datatables-bs4/js/dataTables.bootstrap4.js') }}"></script>
<script type="text/javascript">
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