@extends('apps.layouts.main')
@section('header.title')
Better Work Indonesia | Create New Appraisal Target
@endsection
@section('header.plugins')
<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
@endsection
@section('content')
<section class="content-header">
	<div class="container-fluid">
      	<div class="row mb-2">
       		<div class="col-sm-6">
          		<h1>Create New Appraisal Target</h1>
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
					<div class="col-md-6">
						<div class="form-group">
                            <button type="button" href="#" value="{{ action('Apps\UserMenuController@targetCreate',['id'=>$detail->id]) }}" class="btn btn-primary modalLg" data-toggle="modal" data-target="#modalLg">
		                  		Add New
		                	</button>
                        </div>
                    </div>
                </div>
                <div class="row">
                	<div class="col-md-12">
                		<table id="salary" class="table table-bordered table-hover">
                			<thead>
                				<tr>
                					<th>Target</th>
                					<th style="width: 150px;">Job Weight</th>
                					<th style="width: 100px;"></th>
                				</tr>
                			</thead>
                			<tbody>
                				@foreach($detail->Target as $item)
                				<tr>
                					<td>{{ $item->target }}</td>
                					<td style="width: 150px;">{{ $item->job_weight }}</td>
                					<td style="width: 100px;"></td>
                				</tr>
                				@endforeach
                			</tbody>
                		</table>
                	</div>
                </div>
		    </div>
		</div>
		@endforeach
		<a button type="button" href="{{ route('myDevelopment.create',$data->id) }}" class="btn btn-info">Add Development Objectives</a>
	</div>
</section>
@endsection