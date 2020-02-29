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
					<li class="breadcrumb-item"><a href="{{ route('bank.index') }}">Bank Account</a></li>
					<li class="breadcrumb-item active">Account Transaction</li>
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
					<div class="row">
						@foreach($data as $value)
						<div class="col-12">
							<table class="table">
								<thead>
									<tr>
										<th colspan="2">ID{{ $value->id}} {{ $value->payee }}</th>
										<th style="text-align:right;font-weight:200;">{{date("d F Y",strtotime($value->transaction_date)) }}</th>
									</tr>
									<tr>
										<th>Account</th>
										<th>Debit</th>
										<th>Credit</th>
									</tr>
								</thead>
								<tbody>
									@foreach($value->Child as $child)
									<tr>
										<td>{{ $value->Child->Banks->bank_name }}</td>
										<td>{{ $value->Child->amount }}</td>
										<td>{{ $child }}</td>
									</tr>
									@endforeach
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