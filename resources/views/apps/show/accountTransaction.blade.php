@extends('apps.layouts.main')
@section('header.title')
Better Work Indonesia | Transaction Detail
@endsection
@section('content')
<section class="content-header">
	<div class="container-fluid">
      	<div class="row mb-2">
       		<div class="col-sm-6">
          		<h1>Transaction Detail</h1>
       		</div>
			<div class="col-sm-6">
				<ol class="breadcrumb float-sm-right">
					<li class="breadcrumb-item"><a href="{{ route('account.index') }}">Account Transaction</a></li>
					<li class="breadcrumb-item active">Transaction Detail</li>
				</ol>
			</div>
       	</div>
    </div>
</section>
<section class="content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-12">
				<div class="invoice p-3 mb-3">
					<div class="row">
						<div class="col-12">
							<h4>
								<img src="{{ asset('public/assets/img/logo.png') }}" style="opacity: .8">
								<small class="float-right">
									<button type="submit" class="btn btn-sm btn-info">Checked</button>
									<button type="submit" class="btn btn-sm btn-info">Approved</button>
									<button type="submit" class="btn btn-sm btn-info">Reconcile</button>
								</small>
							</h4>
						</div>
					</div>
					<div class="row invoice-info">
						<div class="col-sm-4 invoice-col">
							<address>
								<strong>To : {{ $data->payee }} </strong><br>
								<strong>Transaction Date : {{date("d F Y",strtotime($data->transaction_date)) }}</strong><br>
								<strong>Reference No :{{$data->reference_no}}</strong><br>
								<strong>Status : <font color="green">{{$data->Statuses->name}}</font></strong>
							</address>	
						</div>
					</div>
					<div class="row">
						<table class="table">
							<thead>
								<tr>
									<th>Description</th>
									<th>Quantity</th>
									<th>Unit Price</th>
									<th>Account</th>
									<th>Tax Rate</th>
									<th>Amount</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td>{{ $data->description }}</td>
									<td></td>
									<td>{{ number_format($data->amount,2,',','.')}}</td>
									<td>
										@if(!empty($data->account_id))
										{{ $data->Accounts->account_name }}
										@else
										{{ $data->Banks->bank_name }}
										@endif
									</td>
									<td></td>
									<td></td>
								</tr>
							</tbody>
						</table>
					</div>
					<div class="row">
						<div class="col-6">
						</div>
						<div class="col-6" style="text-align:right;">
							<td><strong style="font-size:20px;">Total : {{ number_format($data->amount,2,',','.')}}</strong></td>
						</div>
					</div>
					<br>
					<div class="row">
						<table class="table table-bordered">
							<thead>
								<tr>
									<th style="text-align:center;">Created By</th>
									<th style="text-align:center;">Checked By</th>
									<th style="text-align:center;">Approved By</th>
									<th style="text-align:center;">Posted By</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td>
										<p>&nbsp;</p>
										<p>&nbsp;</p>
										<p>&nbsp;</p>
										<p>&nbsp;</p>
									</td>
									<td>
										<p>&nbsp;</p>
										<p>&nbsp;</p>
										<p>&nbsp;</p>
										<p>&nbsp;</p>
									</td>
									<td>
										<p>&nbsp;</p>
										<p>&nbsp;</p>
										<p>&nbsp;</p>
										<p>&nbsp;</p>
									</td>
									<td>
										<p>&nbsp;</p>
										<p>&nbsp;</p>
										<p>&nbsp;</p>
										<p>&nbsp;</p>
									</td>
								</tr>
							</tbody>
						</table>
					</div>
					<div class="row">
						<a href="" class="btn btn-sm btn-app"><i class="fas fa-file-pdf"></i> Save as PDF</a>
						<a href="" target="blank" class="btn btn-sm btn-app"><i class="fas fa-print"></i> Print</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
@endsection