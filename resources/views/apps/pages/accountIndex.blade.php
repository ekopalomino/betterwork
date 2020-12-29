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
					@isset($bank->id)
					<div class="btn-group">

						<button type="button" class="btn btn-sm btn-danger dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">New</button>
						<div class="dropdown-menu" role="menu">
							<a class="dropdown-item" href="{{ route('spend.create') }}">Spend Money</a>
							<a class="dropdown-item" href="{{ route('receive.create',$bank->id) }}">Receive Money</a>
						</div>
					</div>
					<div class="btn-group">
						<button type="button" class="btn btn-sm btn-danger dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Find</button>
						<div class="dropdown-menu" role="menu">
							<a class="dropdown-item" href="{{ route('accountTransaction.index',$bank->id) }}">Account Transaction</a>
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
					@endisset
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
										<th>Item</th>
										<th>Spent</th>
										<th>Receive</th>
										<th>Balance</th>
										<th>Status</th>
										<th></th>
									</tr>
								</thead>
								<tbody>
									@foreach($data as $key=>$value)
									<tr>
										<td>{{date("d F Y",strtotime($value->transaction_date)) }}</td>
										<td>
											@foreach($value->Child as $child)
											<li>{{ $child->Accounts->account_id }}</li>
											@endforeach
										</td>
										<td>
											@foreach($value->Child as $child)
											<li>{{ $child->Accounts->account_name }}</li>
											@endforeach
										</td>
										<td>{{ $value->payee }}</td>
										<td>
											@foreach($value->Child as $child)
											<li>{{ $child->item }}</li>
											@endforeach
										</td>
										<td>
											@foreach($value->Child as $child)
											@if(($child->trans_type) == 'Debit')
											<li>{{ number_format($child->amount,2,',','.')}}</li>
											@else
											@endif
											@endforeach
										</td>
										<td>
											@foreach($value->Child as $child)
											@if(($child->trans_type) == 'Credit')
											<li>{{ number_format($child->amount,2,',','.')}}</li>
											@else
											@endif
											@endforeach
										</td>
										<td>{{ number_format($value->balance,2,',','.')}}</td>
										<td>
											@if(($value->status_id) == '1f2967a5-9a88-4d44-a66b-5339c771aca0')
											<font color="red">{{ $value->Statuses->name }}</font>
											@elseif(($value->status_id) == 'edcb2ad8-df07-4854-8260-383aaec4a061')
											<font color="red">{{ $value->Statuses->name }}</font>
											@elseif(($value->status_id) == 'e6cb9165-131e-406c-81c8-c2ba9a2c567e')
											<font color="red">{{ $value->Statuses->name }}</font>
											@else
											<font color="green">{{ $value->Statuses->name }}</font>
											@endif
										</td>
										<td>
											<a class="btn btn-xs btn-success" href="{{ route('account.show',['bank'=>$bank->id,'id'=>$value->id]) }} " title="Show Transaction" ><i class="fa fa-search"></i></a>
											@if(($value->status_id)== '1f2967a5-9a88-4d44-a66b-5339c771aca0')<a class="btn btn-xs btn-warning" href="{{ route('accTransaction.edit',['id'=>$value->id]) }} " title="Edit Transaction" ><i class="fa fa-edit"></i></a>@endif
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