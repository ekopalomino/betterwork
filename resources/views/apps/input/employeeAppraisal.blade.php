@extends('apps.layouts.main')
@section('header.title')
Better Work Indonesia | Employee Appraisal Data
@endsection
@section('header.plugins')
<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
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
									<th style="width:50px;"></th>
								</tr>
                			</thead>
                			<tbody>
                				@foreach($detail->Target as $item)
                				<tr>
                					<td>{{ $item->target }}</td>
                					<td style="width: 110px;">{{ $item->job_weight }}</td>
									<td style="width:50px;">
										<button type="button" href="#" value="{{ action('Apps\HumanResourcesController@targetChange',['id'=>$item->id]) }}" class="btn btn-xs btn-success modalLg" data-toggle="modal" data-target="#modalLg">
											<i class="fa fa-edit"></i>
										</button>
										{!! Form::open(['method' => 'POST','route' => ['appraisalTarget.destroy', $item->id],'style'=>'dropdown-item','onsubmit' => 'return ConfirmSuspend()']) !!}
										{!! Form::button('<i class="fa fa-times-circle"></i>',['type'=>'submit','class' => 'btn btn-xs btn-danger']) !!}
										{!! Form::close() !!}
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
		<div class="card card-primary card-outline">
			<div class="card-body">
				<h5>Soft Goal 
					<button type="button" href="#" value="{{ action('Apps\HumanResourcesController@softGoalCreate',['id'=>$item->id]) }}" class="btn btn-xs btn-success modalLg" data-toggle="modal" data-target="#modalLg">
						<i class="fa fa-edit"></i>
					</button>
				</h5>
				<div class="row">
                	<div class="col-md-12">
                		<table id="salary" class="table table-bordered table-hover">
                			<thead>
                				<tr>
                					<th>Required Competency(s)</th>
                					<th>Notes/Comment</th>
									<th style="width:50px;"></th>
								</tr>
                			</thead>
                			<tbody>
								@foreach($data->Goals as $goal)
                				<tr>
                					<td>{{ $goal->Competent->name }}</td>
									<td>{{ $goal->notes }}</td>
									<td style="width:50px;">
										<button type="button" href="#" value="{{ action('Apps\HumanResourcesController@softGoalEdit',['id'=>$goal->id]) }}" class="btn btn-xs btn-success modalLg" data-toggle="modal" data-target="#modalLg">
											<i class="fa fa-edit"></i>
										</button>
										{!! Form::open(['method' => 'POST','route' => ['softGoal.destroy', $goal->id],'style'=>'dropdown-item','onsubmit' => 'return ConfirmSuspend()']) !!}
										{!! Form::button('<i class="fa fa-times-circle"></i>',['type'=>'submit','class' => 'btn btn-xs btn-danger']) !!}
										{!! Form::close() !!}
									</td>
                				</tr>
								@endforeach
                			</tbody>
                		</table>
                	</div>
                </div>
			</div>
		</div>
		<div class="card card-primary card-outline">
			<div class="card-body">
				<h5>Additional Role
					<button type="button" href="#" value="{{ action('Apps\HumanResourcesController@additionalRoleCreate',['id'=>$item->id]) }}" class="btn btn-xs btn-success modalLg" data-toggle="modal" data-target="#modalLg">
						<i class="fa fa-edit"></i>
					</button>
				</h5>
				<div class="row">
                	<div class="col-md-12">
                		<table id="salary" class="table table-bordered table-hover">
                			<thead>
                				<tr>
                					<th>Task</th>
                					<th>Job Detail</th>
									<th style="width:50px;"></th>
								</tr>
                			</thead>
                			<tbody>
								@foreach($data->Roles as $role)
                				<tr>
                					<td>{{ $role->task }}</td>
									<td>{{ $role->details }}</td>
									<td style="width:50px;">
										<button type="button" href="#" value="{{ action('Apps\HumanResourcesController@additionalRoleEdit',['id'=>$role->id]) }}" class="btn btn-xs btn-success modalLg" data-toggle="modal" data-target="#modalLg">
											<i class="fa fa-edit"></i>
										</button>
										{!! Form::open(['method' => 'POST','route' => ['additionalRole.destroy', $role->id],'style'=>'dropdown-item','onsubmit' => 'return ConfirmSuspend()']) !!}
										{!! Form::button('<i class="fa fa-times-circle"></i>',['type'=>'submit','class' => 'btn btn-xs btn-danger']) !!}
										{!! Form::close() !!}
									</td>
                				</tr>
								@endforeach
                			</tbody>
                		</table>
                	</div>
                </div>
			</div>
		</div>
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
									<th style="width:50px;"></th>
                				</tr>
                			</thead>
                			<tbody>
                				@foreach($data->Courses as $item)
                				<tr>
                					<td>{{ $item->training_title }}</td>
                					<td>{{ $item->training_outcome }}</td>
									<td>{{ $item->Statuses->name }}</td>
									<td style="width:50px;">
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
	</div>
</section>
@endsection
@section('footer.scripts')
<script>
    function ConfirmSuspend()
    {
    var x = confirm("Data Delete?");
    if (x)
        return true;
    else
        return false;
    }
</script>
@endsection