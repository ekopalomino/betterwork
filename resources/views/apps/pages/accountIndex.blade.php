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
				<div class="card-header">
					<div class="btn-group">
						<button type="button" class="btn btn-sm btn-danger dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Manage</button>
						<div class="dropdown-menu" role="menu">
							<a class="dropdown-item" href="{{ route('spend.create') }}">Spend Money</a>
							<a class="dropdown-item" href="{{ route('receive.create') }}">Receive Money</a>
							<a class="dropdown-item" href="#">Transfer Money</a>
						</div>
					</div>
					<div class="btn-group">
						<button type="button" class="btn btn-sm btn-danger dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Find</button>
						<div class="dropdown-menu" role="menu">
							<a class="dropdown-item" href="{{ route('account.index') }}">Account Transaction</a>
							<a class="dropdown-item" href="{{ route('bankStatement.index') }}">Bank Statement</a>
						</div>
					</div>
					<div class="btn-group">
						<button type="button" class="btn btn-sm btn-danger dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Reconcile</button>
						<div class="dropdown-menu" role="menu">
							<a class="dropdown-item" href="#">Account Transaction</a>
							<a class="dropdown-item" href="#">Bank Statement</a>
						</div>
					</div>
				</div>
				<div class="card-body">
					<div class="row">
						<div class="col-12">
							<table class="table">
								<thead>
									<tr>
										<th>Transaction Date</th>
										<th>Account ID</th>
										<th>Account Name</th>
										<th>Payee</th>
										<th>Description</th>
										<th>Spend</th>
										<th>Receive</th>
										<th>Status</th>
										<th></th>
									</tr>
								</thead>
								<tbody>
									@foreach($data as $key=>$value)
									<tr>
										<td>{{date("d F Y",strtotime($value->transaction_date)) }}</td>
										<td>
											@if(!empty($value->account_id))
											{{ $value->Accounts->account_id }}
											@else
											{{ $value->Banks->account_no }}
											@endif
										</td>
										<td>
											@if(!empty($value->account_id))
											{{ $value->Accounts->account_name }}
											@else
											{{ $value->Banks->bank_name }}
											@endif
										</td>
										<td>{{ $value->payee }}</td>
										<td>{{ $value->description }}</td>
										<td>
											@if(($value->trans_type) == 'Debit')
											{{ number_format($value->amount,2,',','.')}}
											@else
											0
											@endif
										</td>
										<td>
											@if(($value->trans_type) == 'Credit')
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
										<td>
											<a class="btn btn-xs btn-success" href="{{ route('account.show',['id'=>$value->id]) }} " title="Show Transaction" ><i class="fa fa-search"></i></a>
										</td>
									</tr>
									@endforeach
								</tbody>
							</table>
						</div>
					</div>
					<div class="row">
						<div class="col-12 text-center">
							<nav aria-label="Page navigation">				
								{{ $data->links() }}
							</nav>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
@endsection