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
			<div class="card card-info card-outline">
				<div class="card-header">
					<div class="btn-group">
						<button type="button" class="btn btn-sm btn-danger">Manage</button>
						<button type="button" class="btn btn-sm btn-danger dropdown-toggle dropdown-icon" data-toggle="dropdown">
							<span class="sr-only">Toggle Dropdown</span>
							<div class="dropdown-menu" role="menu">
								<a class="dropdown-item" href="{{ route('spend.create') }}">Spend Money</a>
								<a class="dropdown-item" href="#">Receive Money</a>
								<a class="dropdown-item" href="#">Transfer Money</a>
								<div class="dropdown-divider"></div>
								<a class="dropdown-item" href="#">Import Statement</a>
							</div>
						</button>
					</div>
					<div class="btn-group">
						<button type="button" class="btn btn-sm btn-danger">Find</button>
						<button type="button" class="btn btn-sm btn-danger dropdown-toggle dropdown-icon" data-toggle="dropdown">
							<span class="sr-only">Toggle Dropdown</span>
							<div class="dropdown-menu" role="menu">
								<a class="dropdown-item" href="#">Account Transaction</a>
								<a class="dropdown-item" href="#">Bank Statement</a>
							</div>
						</button>
					</div>
					<div class="btn-group">
						<button type="button" class="btn btn-sm btn-danger">Reconcile</button>
						<button type="button" class="btn btn-sm btn-danger dropdown-toggle dropdown-icon" data-toggle="dropdown">
							<span class="sr-only">Toggle Dropdown</span>
							<div class="dropdown-menu" role="menu">
								<a class="dropdown-item" href="#">Account Transaction</a>
								<a class="dropdown-item" href="#">Bank Statement</a>
							</div>
						</button>
					</div>
				</div>
				<div class="card-body">
					<div class="col-12">
						<div class="row">
							<div class="col-3">
								<table>
									<tbody>
										<tr>
											<td style="font-size:18px;color:#048fc2;"><strong>Bank Mandiri</strong></td>
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
		</div>
	</div>
</section>
@endsection