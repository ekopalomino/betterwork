@extends('apps.layouts.main')
@section('header.title')
Better Work Indonesia | Bank Statement Reconciliation
@endsection
@section('header.plugins')
<link rel="stylesheet" href="{{ asset('bower_components/admin-lte/plugins/datatables-bs4/css/dataTables.bootstrap4.css') }}">
@endsection
@section('content')
<section class="content">
	<div class="row">
		{!! Form::model($filter, ['method' => 'POST','route' => ['statToAcc.store', $filter->id]]) !!}
		@csrf
		<div class="col-12">
			<table id="example1" class="table table-bordered table-hover">
				<thead>
					<tr>
						<th>Transaction Date</th>
						<th>Account Name</th>
						<th>Payee</th>
						<th>Description</th>
						<th>Amount</th>
						<th>Type</th>
						<th>Status</th>
						<th>Reconcile</th>
					</tr>
				</thead>
				<tbody>
					@foreach($data as $value)
					<tr>
						<td>{{date("d F Y",strtotime($value->transaction_date)) }}</td>
						<td>
							@foreach($value->Child as $child)
							{{ $child->Accounts->account_name }}
							@endforeach
						</td>
						<td>{{ $value->payee }}</td>
						<td>
							@foreach($value->Child as $child)
							{{ $child->description }}
							@endforeach
						</td>
						<td>
							@foreach($value->Child as $child)
							{{ number_format($child->amount,0,',','.')}}
							@endforeach
						</td>
						<td>
							@foreach($value->Child as $child)
							{{ $child->trans_type }}
							@endforeach
						</td>
						<td>{{ $value->Statuses->name }}</td>
						<td>
							<input type="checkbox" value="1" name="is_same" />
						</td>
					</tr>
					@endforeach
				</tbody>
			</table>
			{!! Form::hidden('statement_id', $filter->id, array('class' => 'form-control')) !!}
			{!! Form::hidden('account_id', $value->id, array('class' => 'form-control')) !!}
			<button type="submit" class="btn btn-sm btn-info">Submit</button>
	        <a button type="button" class="btn btn-sm btn-danger" href="{{ route('role.index') }}">Cancel</a>
        </div>
		{!! Form::close() !!}
    </div>
</section>
@endsection
