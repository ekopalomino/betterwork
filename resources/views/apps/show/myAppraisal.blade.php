@extends('apps.layouts.main')
@section('header.title')
Better Work Indonesia | My Appraisal Data
@endsection
@section('header.plugins')
<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
@endsection
@section('content')
<section class="content-header">
	<div class="container-fluid">
      	<div class="row mb-2">
       		<div class="col-sm-6">
          		<h1>My Appraisal Data</h1>
       		</div>
       	</div>
    </div>
</section>
<section class="content">
	<div class="container-fluid">
		<div class="card card-primary card-outline">
			<div class="card-body">
				<p>Employee ID : {{$data->Parent->employee_no}}</p>
				<p>Employee Name : {{$data->Parent->first_name}} {{$data->Parent->last_name}}</p>
				<p>Employee Direct Supervisor : {{$data->Supervisor->first_name}} {{$data->Supervisor->last_name}}</p>
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
                					<th style="width: 110px;">Job Weight</th>
									<th>Realization</th>
									<th style="width: 110px;">Progress</th>
                				</tr>
                			</thead>
                			<tbody>
                				@foreach($detail->Target as $item)
                				<tr>
                					<td>{{ $item->target }}</td>
                					<td style="width: 110px;">{{ $item->job_weight }}</td>
									<td>{{ $item->target_real }}</td>
									<td style="width: 110px;">{{ $item->weight_real }}</td>
                				</tr>
                				@endforeach
                			</tbody>
                		</table>
                	</div>
                </div>
		    </div>
		</div>
		@endforeach
		<div class="card card-primary card-outline">
			<div class="card-body">
				<h5>Development Objectives</h5>
				<div class="row">
                	<div class="col-md-12">
                		<table id="salary" class="table table-bordered table-hover">
                			<thead>
                				<tr>
                					<th>Course Undertaken</th>
                					<th>Learning and Development Outcome</th>
									<th>Status</th>
                				</tr>
                			</thead>
                			<tbody>
                				@foreach($data->Courses as $item)
                				<tr>
                					<td>{{ $item->training_title }}</td>
                					<td>{{ $item->training_outcome }}</td>
									<td>{{ $item->Statuses->name }}</td>
                				</tr>
                				@endforeach
                			</tbody>
                		</table>
                	</div>
                </div>
			</div>
		</div>
	</div>
</section>
@endsection