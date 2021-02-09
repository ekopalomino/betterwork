@extends('apps.layouts.main')
@section('header.title')
Better Work Indonesia | General Ledger
@endsection
@section('content')
<section class="content-header">
	<div class="container-fluid">
      	<div class="row mb-2">
       		<div class="col-sm-6">
          		<h1>General Ledger</h1>
       		</div>
			<div class="col-sm-6">
				<ol class="breadcrumb float-sm-right">
					<li class="breadcrumb-item"><a href="{{ route('trial.index') }}">General Ledger</a></li>
					<li class="breadcrumb-item active">General Ledger Show</li>
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
					<h3 style="text-align:center;">General Ledger</h3><span>
					<h4 style="text-align:center;">Better Work Indonesia</h4><span>
					<h4 style="text-align:center;">From {{date("d F Y",strtotime($dateStart)) }} to {{date("d F Y",strtotime($dateEnd)) }}</h4>
					<br>
					<div class="row">
						
						<div class="col-12">
							<table class="table">
								<thead>
									<tr>
										<th>Account ID</th>
										<th>Account</th>
										<th>Opening Balance</th>
										<th>Debit</th>
										<th>Credit</th>
										<th>Net Movement</th>
										<th>YTD Balance</th>
									</tr>
								</thead>
								<tbody>
									@foreach($data as $key => $value)
									<tr>
										<td>{{ $value->ID }}</td>
										<td>{{ $value->Name }}</td>
										<td>{{ number_format($value->Opening,2,',','.')}}</td>
										@if(($value->Type) == 'Debit')
										<td>{{ number_format($value->Total,2,',','.')}}</td>
										<td>{{ number_format(0,2,',','.')}}</td>
										@else
										<td>{{ number_format(0,2,',','.')}}</td>
										<td>{{ number_format($value->Total,2,',','.')}}</td>
										@endif
										<td>{{ number_format(($value->Opening)-($value->Total),2,',','.')}}</td>
										<td>{{ number_format(($value->Opening)-($value->Total),2,',','.')}}</td>
									</tr>
									@endforeach
									<tr>
										<td colspan="3"><strong>TOTAL</strong></td>
										<td><strong>{{ number_format($debit,2,',','.')}}</strong></td>
										<td><strong>{{ number_format($credit,2,',','.')}}</strong></td>
										<td></td>
										<td></td>
									</tr>
								</tbody>	
							</table>
						</div>
						<br>
						
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
@endsection