@extends('apps.layouts.main') 
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
						<th></th>
					</tr>
				</thead>
				<tbody>
					@foreach($data as $key=>$value)
					<tr>
						<td>{{date("d F Y",strtotime($value->transaction_date)) }}</td>
						<td>{{ $value->Accounts->account_name }}</td>
						<td>{{ $value->payee }}</td>
						<td>{{ $value->description }}</td>
						<td>{{ number_format($value->amount,0,',','.')}}</td>
						<td>
							@if(($value->type) == '3')
								Receive
							@endif
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
