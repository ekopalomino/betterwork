@extends('apps.layouts.main')
@section('header.title')
Better Work Indonesia | Account Transaction
@endsection
@section('content')
<section class="content-header">
	<div class="container-fluid">
      	<div class="row mb-2">
       		<div class="col-sm-6">
          		<h1>Account Transaction</h1>
       		</div>
			<div class="col-sm-6">
				<ol class="breadcrumb float-sm-right">
					<li class="breadcrumb-item"><a href="{{ route('journal.index') }}">Journal Reports</a></li>
					<li class="breadcrumb-item active">Journal Show</li>
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
					<h3 style="text-align:center;">Journal Report</h3><span>
					<h4 style="text-align:center;">Better Work Indonesia</h4><span>
					<h4 style="text-align:center;">From {{date("d F Y",strtotime($dateStart)) }} to {{date("d F Y",strtotime($dateEnd)) }}</h4>
					<br>
					<div class="row">
						@foreach($data as $key=>$value)
						<div class="col-12">
							<table class="table">
								<thead>
									<tr>
										<th colspan="2">{{ $value->payee }} (posted by {{$value->Creator->first_name}} on {{date("d F Y",strtotime($value->created_at)) }})</th>
										<th style="text-align:right;font-weight:200;">{{date("d F Y",strtotime($value->transaction_date)) }}</th>
									</tr>
									<tr>
										<th>Account</th>
										<th style="width:150px;">Debit</th>
										<th style="width:150px;">Credit</th>
									</tr>
								</thead>
								<tbody>
									@foreach($value->Child as $Child)
									@if(($Child->trans_type) == 'Debit')
									<tr>
										<td>{{ $Child->Accounts->account_name }} ({{ $Child->Accounts->account_id }})</td>
										<td>{{ number_format($Child->amount,2,',','.')}}</td>
										<td></td>
									</tr>
									@else
									<tr>
										<td>{{ $Child->Accounts->account_name }} ({{ $Child->Accounts->account_id }})</td>
										<td></td>
										<td>{{ number_format($Child->amount,2,',','.')}}</td>
									</tr>
									@endif
									@endforeach
									<tr>
										<td></td>
										<td><strong>{{ number_format($value->total,2,',','.')}}</strong></td>
										<td><strong>{{ number_format($value->total,2,',','.')}}</strong></td>
									</tr>
								</tbody>	
							</table>
						</div>
						<br>
						@endforeach
					</div>
					
				</div>
			</div>
		</div>
	</div>
</section>
@endsection