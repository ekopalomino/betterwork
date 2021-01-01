@extends('apps.layouts.main')
@section('header.title')
Better Work Indonesia | Trial Balance
@endsection
@section('content')
<section class="content-header">
	<div class="container-fluid">
      	<div class="row mb-2">
       		<div class="col-sm-6">
          		<h1>Trial Balance</h1>
       		</div>
			<div class="col-sm-6">
				<ol class="breadcrumb float-sm-right">
					<li class="breadcrumb-item"><a href="{{ route('journal.index') }}">Trial Balance</a></li>
					<li class="breadcrumb-item active">Trial Balance Show</li>
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
					<h3 style="text-align:center;">Trial Balance</h3><span>
					<h4 style="text-align:center;">Better Work Indonesia</h4><span>
					<br>
					<div class="row">
						
						<div class="col-12">
							<table class="table">
								<thead>
									<tr>
										<th>Account</th>
										<th>Debit</th>
										<th>Credit</th>
									</tr>
								</thead>
								<tbody>
									@foreach($data as $key => $value)
									<tr>
										<td>{{ $value->category_name }}</td>
										@if(($value->trans_type) == 'Debit')
										<td>{{ number_format($value->amount,2,',','.')}}</td>
											<td></td>
										@else
										<td></td>
											<td>{{ number_format($value->amount,2,',','.')}}</td>
										@endif
									</tr>
									@endforeach
									<tr>
										<td></td>
										<td></td>
										<td>total</td>
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