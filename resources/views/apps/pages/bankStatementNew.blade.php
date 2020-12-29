@extends('apps.layouts.main')
@section('header.title')
Better Work Indonesia | Bank Statement
@endsection
@section('header.plugins')
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
    google.charts.load('current', {'packages':['corechart']});
    google.charts.setOnLoadCallback(drawBalanceChart);
    function drawBalanceChart() {
        var balance = <?php echo $data; ?>;
        var data = google.visualization.arrayToDataTable(balance);
        var options = {
          curveType: 'function',
          legend: { position: 'bottom' }
        };
        var chart = new google.visualization.LineChart(document.getElementById('balance_chart'));
        chart.draw(data, options);
    }
</script>
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
							@isset($bank->id)
							<a class="dropdown-item" href="{{ route('spend.create',$bank->id) }}">Spend Money</a>
							<a class="dropdown-item" href="{{ route('receive.create',$bank->id) }}">Receive Money</a>
							<a class="dropdown-item" href="#">Transfer Money</a>
							@endisset
							<div class="dropdown-divider"></div>
							<a class="dropdown-item modalLg" href="#" title="Import Statement" value="{{ action('Apps\AccountingController@bankStatement',['id'=>$bank->id]) }}" data-toggle="modal" data-target="#modalLg">Import Statement</a>
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
				</div>
				<div class="card-body">
					<div class="col-12">
						<div class="row">
							<div class="col-2">
								<table>
									<tbody>
										<tr>
											<td style="font-size:18px;color:#048fc2;"><strong>{{ $bank->bank_name }}</strong></td>
										</tr>
									</tbody>
								</table>
								<table>
									@isset($balances)
									<tbody>
										<tr>
											<td style="font-size:18px;color:#333;"><strong>Rp {{ number_format($balances->balance,2,',','.')}}</strong></td>
										</tr>
										<tr>
											<td style="font-size:12px;color:#aaa;">Statement Balance</td>
										</tr>
										<tr>
											<td style="font-size:12px;color:#aaa;">{{date("d F Y",strtotime($balances->updated_at)) }}</td>
										</tr>
									</tbody>
									@endisset
								</table>
							</div>
							<div class="col-10">
								<div id="balance_chart" style="width: 100%; height: 250px"></div>
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