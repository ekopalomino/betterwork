@extends('apps.layouts.main')
@section('header.title')
Better Work Indonesia | Manual Journal
@endsection
@section('content')
<section class="content-header">
	<div class="container-fluid">
      	<div class="row mb-2">
       		<div class="col-sm-6">
          		<h1>Manual Journal</h1>
       		</div>
       	</div>
    </div>
</section>
<section class="content">
	<div class="row">
		<div class="col-12">
			<div class="card card-info card-outline">
				<div class="card-header">
					<a class="btn btn-sm btn-danger" href="{{ route('manualJournal.create') }}">Add New</a>
				</div>
				<div class="card-body">
					<div class="row">
						<div class="col-12">
							<table class="table">
								<thead>
									<tr>
										<th>Narration</th>
										<th>Date</th>
										<th>Debit</th>
										<th>Credit</th>
										<th></th>
									</tr>
								</thead>
								<tbody>
								</tbody>
							</table>
						</div>
					</div>
					<div class="row">
						<div class="col-12 text-center">
							<nav aria-label="Page navigation">				
								
							</nav>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
@endsection