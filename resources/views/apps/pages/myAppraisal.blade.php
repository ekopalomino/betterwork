@extends('apps.layouts.main')
@section('header.title')
Better Work Indonesia | My Appraisal
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
	<div class="card card-primary card-outline">
		<div class="card-header">
			<a class="btn btn-primary" href="{{ route('myAppraisal.create') }}">
                Add New
              </a>
		</div>
		<div class="card-body p-0">
			<table class="table table-striped projects">
				<thead>
         	<tr>
           	<th style="width: 1%">No</th>
            <th style="width: 20%">Appraisal Type</th>
            <th>Appraisal Period</th>
            <th>Direct Supervisor</th>
            <th style="width: 8%">Status</th>
            <th style="width: 20%"></th>
          </tr>
        </thead>
        <tbody>
          @foreach($data as $key=>$value)
        	<tr>
        		<td>{{ $key+1 }}</td>
            <td>{{ $value->Types->name }}</td>
            <td>{{date("Y",strtotime($value->appraisal_period)) }}</td>
            <td><img src="http://betterwork.iteos.tech/public/employees/{{ $value->Supervisor->picture }}" class="img-circle elevation-2" title="{{$value->Supervisor->first_name}} 
{{$value->Supervisor->last_name}}" style="width: 50px; height: 50px;"></td>
            <td></td>
            <td>{{ $value->Statuses->name }}</td>
            <td>
                <div class="btn-group">
					<button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						Action
					</button>
					<div class="dropdown-menu" role="menu">
						<a class="dropdown-item" href="{{ route('myAppraisal.detail',$value->id) }}">Add Target</a>
						<a class="dropdown-item" href="{{ route('myDevelopment.create',$value->id) }}">Add Training</a>
						<a class="dropdown-item" href="{{ route('myAppraisal.edit',$value->id) }}">Update</a>
						<a class="dropdown-item" href="{{ route('myAppraisal.show',$value->id) }}">View Appraisal</a>
					</div>
                </div>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</section>
@endsection
