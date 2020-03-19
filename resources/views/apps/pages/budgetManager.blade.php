@extends('apps.layouts.main')
@section('header.title')
Better Work Indonesia | Budget Manager
@endsection
@section('header.plugins')
<link rel="stylesheet" href="{{ asset('public/bower_components/admin-lte/plugins/datatables-bs4/css/dataTables.bootstrap4.css') }}">
@endsection
@section('content')
<section class="content-header">
	<div class="container-fluid">
      	<div class="row mb-2">
       		<div class="col-sm-6">
          		<h1>Budget Manager</h1>
       		</div>
       	</div>
    </div>
</section>
<section class="content">
	<div class="row">
		<div class="col-12">
			<div class="card card-info card-outline">
				<div class="card-header">
					<button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#salary">
                  		Create Budget
                	</button>
					<div class="modal fade" id="salary">
				        <div class="modal-dialog modal-lg">
				          	<div class="modal-content">
								{!! Form::open(array('route' => 'budget.store','method'=>'POST')) !!}
								@csrf
				            	<div class="modal-header">
				             		<h4 class="modal-title">New Budget</h4>
				              		<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				                		<span aria-hidden="true">&times;</span>
				              		</button>
				            	</div>
				            	<div class="modal-body">
				              		<label class="col-sm-12 col-form-label">Budget Name</label>
                        			{!! Form::text('budget_title', null, array('placeholder' => 'Budget Name','class' => 'form-control')) !!}
                        			<label class="col-sm-12 col-form-label">Start Date</label>
                        			{!! Form::date('budget_start', '', array('id' => 'datepicker','class' => 'form-control')) !!}
									<label class="col-sm-12 col-form-label">End Date</label>
                        			{!! Form::date('budget_end', '', array('id' => 'datepicker','class' => 'form-control')) !!}
								</div>
				            	<div class="modal-footer">
				              		<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				              		<button type="submit" class="btn btn-primary">Submit</button>
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
								<th>Budget Title</th>
								<th>Start Date</th>
								<th>End Date</th>
								<th>Status</th>
								<th>Created By</th>
								<th>Updated By</th>
								<th>Approved By</th>
								<th></th>
							</tr>
						</thead>
						<tbody>
							@foreach($data as $key=>$value)
							<tr>
								<td>{{ $key+1 }}</td>
								<td>{{ $value->budget_title }}</td>
								<td>{{date("d F Y",strtotime($value->budget_start)) }}</td>
								<td>{{date("d F Y",strtotime($value->budget_end)) }}</td>
								<td>{{ $value->Statuses->name }}</td>
								<td>{{ $value->Creator->first_name }} {{ $value->Creator->last_name }}</td>
								<td>
									@isset($value->updated_by)
									{{ $value->Editor->first_name }} {{ $value->Editor->last_name }}
									@endisset
								</td>
								<td>
									@isset($value->approved_by)
									{{ $value->Approval->first_name }} {{ $value->Approval->last_name }}
									@endisset
								</td>
								<td>
									<!--<a button id="search" type="submit" class="btn btn-xs btn-info" href="{{ route('budgetDetail.create',$value->id) }}">
										<i class="fa fa-search"></i>
									</a>-->
									<a button id="search" type="submit" class="btn btn-xs btn-info" href="{{ route('budgetDetail.edit',$value->id) }}">
										<i class="fa fa-edit"></i>
									</a>
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
<script>
    function ConfirmApprove()
    {
    var x = confirm("Payroll Approve?");
    if (x)
        return true;
    else
        return false;
    }
</script>
<script>
    function ConfirmReject()
    {
    var x = confirm("Payroll Reject?");
    if (x)
        return true;
    else
        return false;
    }
</script>
@endsection