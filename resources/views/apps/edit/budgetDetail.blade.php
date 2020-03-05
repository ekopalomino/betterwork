@extends('apps.layouts.main')
@section('header.title')
Better Work Indonesia | Budget Detail
@endsection
@section('header.plugins')
<link rel="stylesheet" href="{{ asset('public/bower_components/admin-lte/plugins/datatables-bs4/css/dataTables.bootstrap4.css') }}">
@endsection
@section('content')
<section class="content-header">
	<div class="container-fluid">
      	<div class="row mb-2">
       		<div class="col-sm-6">
          		<h1>Budget Detail</h1>
       		</div>
			<div class="col-sm-6">
				<ol class="breadcrumb float-sm-right">
					<li class="breadcrumb-item"><a href="{{ route('budget.index') }}">Budget Manager</a></li>
					<li class="breadcrumb-item active">{{$parent->budget_title}}</li>
				</ol>
			</div>
       	</div>
    </div>
</section>
<section class="content">
	<div class="row">
		<div class="col-12">
			<div class="card card-danger card-outline">
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
					<table id="budget" class="table table-head-fixed text-nowrap" width="100%">
						<thead>
							<tr>
								<th>
									<button type="button" class="btn btn-xs btn-danger" data-toggle="modal" data-target="#modal-lg">
										Budget Option
									</button>
								</th>
								@foreach($budgetRange as $month)
								<th>{{date("M-y",strtotime($month)) }}</th>
								@endforeach
							</tr>
						</thead>
						<!--<tbody>
							<tr>
								<td>Tes</td>
								<td>{!! Form::number('amount', null, array('class' => 'form-control')) !!}</td>
								<td>{!! Form::number('amount', null, array('class' => 'form-control')) !!}</td>
							</tr>
						</tbody>-->
						<tbody>
							{!! Form::model($parent, ['method' => 'POST','route' => ['budgetDetail.update', $parent->id]]) !!}
							@csrf
							{!! Form::hidden('budget_id', $parent->id, array('class' => 'form-control')) !!}
							<tr>
								<td><strong>Revenue</strong></td>
							</tr>
							@foreach($groupedIncome as $index=>$detail)
							<tr>
								<td>{{ $index }}</td>
								@foreach($detail as $data)
								<td>{!! Form::text('account_name[]', $data['account_name'], array('id'=>'account','class' => 'form-control','hidden')) !!}{!! Form::number('amount[]', $data['budget_amount'], array('class' => 'form-control')) !!}{!! Form::date('budget_period[]', $data['budget_period'], array('class' => 'form-control','hidden')) !!}</td>
								@endforeach
							</tr>
							@endforeach
							<tr>
								<td><strong>Total Revenue</strong></td>
								@foreach($budgetRange as $month)
								<td></td>
								@endforeach
							</tr>
							<tr>
								<td><strong>Expense</strong></td>
							</tr>
							@foreach($groupedExpense as $index=>$detail)
							<tr>
								<td>{{ $index }}</td>
								@foreach($detail as $data)
								<td>{!! Form::text('account_name[]', $data['account_name'], array('id'=>'account','class' => 'form-control','hidden')) !!}{!! Form::number('amount[]', $data['budget_amount'], array('class' => 'form-control')) !!}{!! Form::date('budget_period[]', $data['budget_period'], array('class' => 'form-control','hidden')) !!}</td>
								@endforeach
							</tr>
							@endforeach
							<tr>
								<td><strong>Total Expense</strong></td>
								@foreach($budgetRange as $month)
								<td></td>
								@endforeach
							</tr>
						</tbody>
					</table>
					<!--<div class="modal fade" id="modal-lg">
						<div class="modal-dialog modal-lg">
							<div class="modal-content">
								<div class="modal-header">
									<h4 class="modal-title">Budget Option</h4>
									<button type="button" class="close" data-dismiss="modal" aria-label="Close">
										<span aria-hidden="true">&times;</span>
									</button>
								</div>
								<div class="modal-body">
									{!! Form::open(array('route' => 'user.store','method'=>'POST', 'class' => 'form-horizontal')) !!}
									@csrf
									<div class="form-group row">
										<div class="col-sm-10">
											<div class="custom-control custom-radio">
												<input class="custom-control-input" type="radio" id="customRadio1" name="customRadio">
												<label for="customRadio1" class="custom-control-label">Same Amount Every Month</label>
											</div>
										</div>
									</div>
									<div class="form-group row">
										<div class="col-sm-10">
											<div class="custom-control custom-radio">
												<input class="custom-control-input" type="radio" id="customRadio1" name="customRadio">
												<label for="customRadio1" class="custom-control-label">Same Amount Every Month</label>
											</div>
										</div>
									</div>
									<div class="form-group row">
										<div class="col-sm-10">
											<div class="custom-control custom-radio">
												<input class="custom-control-input" type="radio" id="customRadio1" name="customRadio">
												<label for="customRadio1" class="custom-control-label">Same Amount Every Month</label>
											</div>
										</div>
									</div>
								</div>
								<div class="modal-footer justify-content-between">
									<button type="close" class="btn btn-default" data-dismiss="modal">Close</button>
									<button id="register" type="submit" class="btn btn-primary">Save changes</button>
								</div>
								{!! Form::close() !!}
							</div>
						</div>
					</div>-->
					<br>
					<div class="col-3">
						<button type="submit" class="btn btn-sm btn-primary">Save Change</button>
						<a button type="button" class="btn btn-sm btn-danger" href="{{ route('budget.index') }}">Cancel</a>
					</div>
					{!! Form::close() !!}
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
$(document).ready(function () {
$('#budget').DataTable({
"scrollX": true,
"scrollY": 200,
});
$('.dataTables_length').addClass('bs-select');
});
</script>
@endsection