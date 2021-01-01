@extends('apps.layouts.main')
@section('header.title')
Better Work Indonesia | Update Appraisal Target
@endsection
@section('header.plugins')
<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
@endsection
@section('content')
<section class="content-header">
	<div class="container-fluid">
      	<div class="row mb-2">
       		<div class="col-sm-6">
          		<h1>Update Appraisal Target</h1>
       		</div>
       	</div>
    </div>
</section>
<section class="content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12">
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
		    </div>
		</div>
		@foreach($data->Details as $detail)
		<div class="card card-primary card-outline">
			<div class="card-body">
				<h5>Key Performance Indicator : {{$detail->indicator}}</h5>
				<div class="row">
                	<div class="col-md-12">
                		<table id="salary" class="table table-bordered table-hover">
                			<thead>
                				<tr>
                					<th>Target</th>
                					<th>Job Weight</th>
									<th>Progress</th>
									<th></th>
                				</tr>
                			</thead>
                			<tbody>
                				@foreach($detail->Target as $item)
                				<tr>
                					<td>{{ $item->target }}</td>
                					<td>{{ $item->job_weight }}</td>
									<td>
										@foreach($item->Child as $real)
										<ul>
											<li>{{ $real->data_details }}</li>
										</ul>
										@endforeach
									</td>
									<td>
										<button type="button" href="#" value="{{ action('Apps\UserMenuController@targetEdit',['id'=>$item->id]) }}" class="btn btn-xs btn-success modalLg" data-toggle="modal" data-target="#modalLg">
											<i class="fa fa-edit"></i>
										</button>
									</td>
                				</tr>
                				@endforeach
                			</tbody>
                		</table>
                	</div>
                </div>
		    </div>
		</div>
		@endforeach
	</div>
</section>
@endsection