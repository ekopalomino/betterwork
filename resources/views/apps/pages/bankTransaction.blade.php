@extends('apps.layouts.main')
@section('header.title')
Better Work Indonesia | Bank Statement
@endsection
@section('content')
<section class="content-header">
	<div class="container-fluid">
      	<div class="row mb-2">
       		<div class="col-sm-6">
          		<h1>Bank Statement</h1>
       		</div>
       	</div>
    </div>
</section>
<section class="content">
	<div class="row">
		<div class="col-12">
			<div class="callout callout-info">
				<h5><i class="fas fa-info"></i> Note:</h5>
				Use <a class="btn btn-danger btn-xs" href="{{ asset('public/payroll.xlsx') }}">This</a> excel file to upload bank statement.
            </div>
			<div class="card card-info card-outline">
				<div class="card-header">
					
					<button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#salary">
                  		Add New
                	</button>
					
					<div class="modal fade" id="salary">
				        <div class="modal-dialog modal-lg">
				          	<div class="modal-content">
								
				            	<div class="modal-header">
				             		<h4 class="modal-title">New Bank Statement File</h4>
				              		<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				                		<span aria-hidden="true">&times;</span>
				              		</button>
				            	</div>
				            	<div class="modal-body">
									<label for="inputName">Bank Statement Name</label>
			    					<div class="input-group">
									   	{!! Form::text('bank_name', null, array('placeholder' => 'Bank Name','class' => 'form-control')) !!}
	                      			</div>
				              		<label for="inputName">Bank Statement File</label>
			    					<div class="input-group">
									   	{!! Form::file('salary', null, array('placeholder' => 'Employee Photo','class' => 'form-control')) !!}
	                      			</div>
                        		</div>
				            	<div class="modal-footer">
				              		<button type="button" class="btn btn-sm btn-default" data-dismiss="modal">Close</button>
				              		<button type="submit" class="btn btn-sm btn-primary">Import</button>
				            	</div>
								
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
								<th>Transaction Date</th>
								<th>Account No</th>
								<th>Account Name</th>
								<th>Payee</th>
								<th>Description</th>
								<th>Amount</th>
								<th>Status</th>
								<th></th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</section>
@endsection