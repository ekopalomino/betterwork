@extends('apps.layouts.main')
@section('header.title')
Better Work Indonesia | Employee Appraisal
@endsection
@section('content')
<section class="content-header">
	<div class="container-fluid">
      	<div class="row mb-2">
       		<div class="col-sm-6">
          		<h1>Employee Appraisal Data</h1>
       		</div>
       	</div>
    </div>
</section>
<section class="content">
	<div class="card">
		<div class="card-body p-0">
			<table class="table table-striped projects">
				<thead>
         	<tr>
           	<th style="width: 1%">No</th>
            <th style="width: 20%">Appraisal Type</th>
            <th>Appraisal Period</th>
            <th>Direct Subordinate</th>
            <th style="width: 30%">Appraisal Progress</th>
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
            <td><img src="http://betterwork.local/public/employees/{{ $value->Parent->picture }}" class="img-circle elevation-2" title="{{$value->Parent->first_name}} {{$value->Parent->last_name}}" style="width: 50px; height: 50px;"></td>
            <td></td>
            <td>{{ $value->Statuses->name }}</td>
            <td>
                <div class="btn-group">
					<button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						Action
					</button>
					<div class="dropdown-menu" role="menu">
						<a class="dropdown-item" href="{{ route('appraisal.show',$value->id) }}">View Appraisal</a>
						<a class="dropdown-item" href="{{ route('appraisal.edit',$value->id) }}">Edit Appraisal</a>
						<a class="dropdown-item" href="{{ route('myAppraisal.show',$value->id) }}">Close Appraisal</a>
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