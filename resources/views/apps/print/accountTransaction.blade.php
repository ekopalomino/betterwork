<!DOCTYPE html> 
<html lang="en">
<head>
	<meta charset="utf-8">
  	<meta name="viewport" content="width=device-width, initial-scale=1">
  	<meta http-equiv="x-ua-compatible" content="ie=edge">
  	<link rel="stylesheet" href="{{ asset('bower_components/admin-lte/plugins/fontawesome-free/css/all.min.css') }}">
  	<link rel="stylesheet" href="{{ asset('bower_components/admin-lte/dist/css/adminlte.min.css') }}">
  	<link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
  	<link rel="stylesheet" href="{{ asset('bower_components/admin-lte/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css') }}">
  	<link rel="stylesheet" href="{{ asset('bower_components/admin-lte/plugins/toastr/toastr.min.css') }}">
</head>
<body class="hold-transition sidebar-mini">
	<div class="wrapper">
		<div class="content-wrapper">
			<section class="content">
				<div class="row">
					<div class="col-12">
						<div class="invoice p-3 mb-3">
							<div class="row">
								<div class="col-12">
									<h4>
										<img src="{{ asset('assets/img/logo.png') }}" style="opacity: .8">
										<small class="float-right">Transaction Detail: {{date("F Y",strtotime($data->transaction_date)) }}</small>
									</h4>
								</div>
							</div>
							<div class="row invoice-info">
								<div class="col-sm-4 invoice-col">
									<address>
										<strong>Payee : {{ $data->payee }} </strong><br>
										<strong>Transaction Date : {{date("d F Y",strtotime($data->transaction_date)) }}</strong><br>
										<strong>Reference No :{{$data->reference_no}}</strong><br>
										<strong>Status : @if(($data->status_id) == 'f6e41f5d-0f6e-4eca-a141-b6c7ce34cae6')<font color="green">{{$data->Statuses->name}}</font>@else<font color="red">{{$data->Statuses->name}}</font>
										@endif</strong><br>
										<strong>Amounts Are : @if(($data->tax_reference) == '1')Tax Inclusive @elseif(($data->tax_reference) == '2')Tax Exclusive @else No Tax @endif</strong>
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
								@foreach($data->Child as $child)
								<tr>
									<td>{{ $child->description }}</td>
									<td>{{ $child->quantity }}</td>
									<td>{{ number_format($child->unit_price,2,',','.')}}</td>
									<td>
										@if(!empty($child->account_name))
										{{ $child->Accounts->account_name }}
										@endif
									</td>
									<td>{{ $child->tax_rate }}</td>
									<td>{{ number_format($child->amount,2,',','.')}}</td>
								</tr>
								@endforeach
							</tbody>
						</table>
					</div>
					<div class="row">
						<div class="col-6">
						</div>
						<div class="col-6" style="text-align:right;">
							<td><strong style="font-size:16px;">Tax : {{ number_format($child->tax_amount,2,',','.')}}</strong></td><br>
							<td><strong style="font-size:20px;">Total : {{ number_format($data->total,2,',','.')}}</strong></td>
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
										@isset($data->created_by)<p style="text-align:center;">({{$data->Creator->first_name}} {{$data->Creator->last_name}})</p>@endisset
									</td>
									<td>
										<p>&nbsp;</p>
										<p>&nbsp;</p>
										<p>&nbsp;</p>
										<p>&nbsp;</p>
										@isset($data->checked_by)<p style="text-align:center;">({{$data->Checker->first_name}} {{$data->Checker->last_name}})</p>@endisset
									</td>
									<td>
										<p>&nbsp;</p>
										<p>&nbsp;</p>
										<p>&nbsp;</p>
										<p>&nbsp;</p>
										@isset($data->approved_by)<p style="text-align:center;">({{$data->Approval->first_name}} {{$data->Approval->last_name}})</p>@endisset
									</td>
									<td>
										<p>&nbsp;</p>
										<p>&nbsp;</p>
										<p>&nbsp;</p>
										<p>&nbsp;</p>
										@isset($data->posted_by)<p style="text-align:center;">({{$data->Posted->first_name}} {{$data->Posted->last_name}})</p>@endisset
									</td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>
			</section>
		</div>
	</div>
	<script src="{{ asset('bower_components/admin-lte/plugins/jquery/jquery.min.js') }}"></script>
	<script src="{{ asset('bower_components/admin-lte/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
	<script src="{{ asset('bower_components/admin-lte/dist/js/adminlte.min.js') }}"></script>
	<script type="text/javascript"> 
		window.addEventListener("load", window.print());
	</script>
</body>
</html>
		