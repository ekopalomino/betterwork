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
					<li class="breadcrumb-item"><a href="{{ route('accountTransaction.index') }}">Account Transaction</a></li>
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
								<img src="{{ asset('assets/img/logo.png') }}" style="opacity: .8">
								<small class="float-right">
									@if(($data->status_id) == '1f2967a5-9a88-4d44-a66b-5339c771aca0')
									{!! Form::open(['method' => 'POST','route' => ['accTransaction.checked', $data->id],'style'=>'display:inline','onsubmit' => 'return ConfirmDelete()']) !!}
									{!! Form::button('Checked',['type'=>'submit','class' => 'btn btn-sm btn-info','title'=>'Checked']) !!}
									{!! Form::close() !!}
									@elseif(($data->status_id) == 'edcb2ad8-df07-4854-8260-383aaec4a061')
									{!! Form::open(['method' => 'POST','route' => ['accTransaction.approve', $data->id],'style'=>'display:inline','onsubmit' => 'return ConfirmDelete()']) !!}
									{!! Form::button('Approve',['type'=>'submit','class' => 'btn btn-sm btn-info','title'=>'Checked']) !!}
									{!! Form::close() !!}
									@elseif(($data->status_id) == 'ca52a2ce-5c37-48ce-a7f2-0fd5311860c2')
									{!! Form::open(['method' => 'POST','route' => ['accTransaction.posted', $data->id],'style'=>'display:inline','onsubmit' => 'return ConfirmDelete()']) !!}
									{!! Form::button('Posted',['type'=>'submit','class' => 'btn btn-sm btn-info','title'=>'Checked']) !!}
									{!! Form::close() !!}
									@elseif(($data->status_id) == 'e6cb9165-131e-406c-81c8-c2ba9a2c567e')
									{!! Form::open(['method' => 'POST','route' => ['accTransaction.reconcile', $data->id],'style'=>'display:inline','onsubmit' => 'return ConfirmDelete()']) !!}
									{!! Form::button('Reconcile',['type'=>'submit','class' => 'btn btn-sm btn-danger','title'=>'Checked']) !!}
									{!! Form::close() !!}
									@endif
								</small>
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