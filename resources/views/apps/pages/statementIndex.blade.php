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
			<div class="col-sm-6">
				<ol class="breadcrumb float-sm-right">
					<li class="breadcrumb-item"><a href="{{ route('bank.index') }}">Bank Account</a></li>
					<li class="breadcrumb-item active">Bank Statement</li>
				</ol>
			</div>
       	</div>
    </div>
</section>
<section class="content">
	<div class="row">
		<div class="col-12">
			<div class="card card-info card-outline">
				<div class="card-body">
					<table class="table">
					
						<thead>
							<tr>
								<th>Transaction Date</th>
								<th>Account Name</th>
								<th>Payee</th>
								<th>Description</th>
								<th>Debit</th>
								<th>Credit</th>
								<th>Status</th>
							</tr>
						</thead>
						<tbody>
							@foreach($data as $key=>$value)
							<tr>
								<td>{{date("d F Y",strtotime($value->transaction_date)) }}</td>
								<td></td>
								<td>{{ $value->payee }}</td>
								<td>{{ $value->description }}</td>
								<td>
									@if(($value->type) == 'Debit')
									{{ number_format($value->amount,2,',','.')}}
									@else
									0
									@endif
								</td>
								<td>
									@if(($value->type) == 'Credit')
									{{ number_format($value->amount,2,',','.')}}
									@else
									0
									@endif
								</td>
								<td>
									@if(($value->status_id) == 'e6cb9165-131e-406c-81c8-c2ba9a2c567e')
									<font color="red">{{ $value->Statuses->name }}</font>
									@else
									<font color="green">{{ $value->Statuses->name }}</font>
									@endif
								</td>
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