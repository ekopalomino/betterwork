@extends('apps.layouts.main')
@section('header.title')
Better Work Indonesia | Account Statement
@endsection
@section('content')
<section class="content-header">
	<div class="container-fluid">
      	<div class="row mb-2">
       		<div class="col-sm-6">
          		<h1>Account Statement</h1>
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
                  		Add New
                	</button>
					<div class="modal fade" id="salary">
				        <div class="modal-dialog modal-lg">
				          	<div class="modal-content">
								{!! Form::open(array('route' => 'accountPeriod.store','method'=>'POST')) !!}
								@csrf
				            	<div class="modal-header">
				             		<h4 class="modal-title">New Statement Period</h4>
				              		<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				                		<span aria-hidden="true">&times;</span>
				              		</button>
				            	</div>
				            	<div class="modal-body">
									<label for="inputName">Account Statement Period</label>
			    					<div class="input-group">
									   	{!! Form::date('period', '', array('id' => 'datepicker','class' => 'form-control')) !!}
	                      			</div>
                        		</div>
				            	<div class="modal-footer">
				              		<button type="button" class="btn btn-sm btn-default" data-dismiss="modal">Close</button>
				              		<button type="submit" class="btn btn-sm btn-primary">Import</button>
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
								<th>Statement Period</th>
								<th>Balance</th>
								<th>Status</th>
								<th></th>
							</tr>
						</thead>
						<tbody>
							@foreach($data as $key=>$value)
							<tr>
								<td>{{ $key+1 }}</td>
								<td>{{date("F Y",strtotime($value->account_period)) }}</td>
								<td></td>
								<td>
									@if(($value->status_id) == 'fe6f8153-a433-4a4d-a23d-201811778733')
										<span class="badge bg-danger">{{ $value->Statuses->name }}</span>
									@else
										<span class="badge badge-success">{{ $value->Statuses->name }}</span>
									@endif
								</td>
								<td>
									<a button id="search" type="submit" class="btn btn-xs btn-info" href="{{ route('accTransaction.index',$value->id) }}">
										<i class="fa fa-search"></i>
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