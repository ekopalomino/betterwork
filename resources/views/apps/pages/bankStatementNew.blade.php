@extends('apps.layouts.main')
@section('header.title')
Better Work Indonesia | Bank Statement
@endsection
@section('content')
<section class="content-header">
	<div class="container-fluid">
      	<div class="row mb-2">
       		<div class="col-sm-6">
          		<h1>Bank Account</h1>
       		</div>
       	</div>
    </div>
</section>
<section class="content">
	<div class="row">
		<div class="col-12">
			@if (count($errors) > 0) 
		        <div class="alert alert-danger alert-dismissible">
		            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		            <h5><i class="icon fas fa-ban"></i> Alert!</h5>
		            <ul>
		                @foreach ($errors->all() as $error)
		                <li>{{ $error }}</li>
		                @endforeach
		            </ul>
		        </div>
		    @endif
			@foreach($banks as $bank)
			<div class="card card-info card-outline">
				<div class="card-header">
					<div class="btn-group">
						<button type="button" class="btn btn-sm btn-danger dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Manage</button>
						<div class="dropdown-menu" role="menu">
							<a class="dropdown-item" href="{{ route('spend.create') }}">Spend Money</a>
							<a class="dropdown-item" href="{{ route('receive.create') }}">Receive Money</a>
							<a class="dropdown-item" href="#">Transfer Money</a>
							<div class="dropdown-divider"></div>
							<a class="dropdown-item modalMd" href="#" title="Import Statement" value="{{ action('Apps\AccountingController@bankStatement',['id'=>$bank->id]) }}" data-toggle="modal" data-target="#modalMd">Import Statement</a>
						</div>
					</div>
					<div class="btn-group">
						<button type="button" class="btn btn-sm btn-danger dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Find</button>
						<div class="dropdown-menu" role="menu">
							<a class="dropdown-item" href="#">Account Transaction</a>
							<a class="dropdown-item" href="#">Bank Statement</a>
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
					<div class="col-12">
						<div class="row">
							<div class="col-3">
								<table>
									<tbody>
										<tr>
											<td style="font-size:18px;color:#048fc2;"><strong>{{ $bank->bank_name }}</strong></td>
										</tr>
									</tbody>
								</table>
								<table>
									<tbody>
										<tr>
											<td style="font-size:18px;color:#333;"><strong>15.000.000</strong></td>
										</tr>
										<tr>
											<td style="font-size:12px;color:#aaa;">Statement Balance</td>
										</tr>
										<tr>
											<td style="font-size:12px;color:#aaa;">Date</td>
										</tr>
									</tbody>
								</table>
							</div>
							<div class="col-9">
								Line Chart
							</div>
						</div>
						<div class="row">
							<div class="col-3">
								<table>
									<tbody>
										<tr>
											<td style="font-size:18px;color:#048fc2;"><strong>Account Transaction</strong></td>
										</tr>
									</tbody>
								</table>
								<table>
									<tbody>
										<tr>
											<td style="font-size:18px;color:#333;"><strong>15.000.000</strong></td>
										</tr>
										<tr>
											<td style="font-size:12px;color:#aaa;">Balance</td>
										</tr>
										<tr>
											<td style="font-size:12px;color:#aaa;">Date</td>
										</tr>
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>
			@endforeach
		</div>
	</div>
</section>
@endsection