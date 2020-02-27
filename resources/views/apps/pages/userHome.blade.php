@extends('apps.layouts.main')
@section('header.title')
Better Work Indonesia | User Dashboard
@endsection
@section('content')
<section class="content-header">
	<div class="container-fluid">
      	<div class="row mb-2">
       		<div class="col-sm-6">
          		<h1>User Dashboard</h1>
       		</div>
       	</div>
    </div>
</section>
<section class="content">
	<div class="container-fluid">
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
		<div class="row">
			<div class="col-md-3">
				<div class="card card-primary card-outline">
					<div class="card-body box-profile">
						<div class="text-center">
							<img class="profile-user-img img-fluid img-circle"
                       			src="http://betterwork.iteos.tech/public/employees/{{$getBasicProfile->picture}}"
                       			alt="User profile picture">
                  			<!--<img class="profile-user-img img-fluid img-circle"
                       			src="http://betterwork.local/public/employees/{{$getBasicProfile->picture}}"
                       			alt="User profile picture">-->
                		</div>
                		<h3 class="profile-username text-center">{{{ isset(Auth::user()->name) ? Auth::user()->name : Auth::user()->email }}}</h3>
                		<p class="text-muted text-center">
						{{$getCurPos->grade}}
						</p>
                		<ul class="list-group list-group-unbordered mb-3">
                  			<li class="list-group-item">
                    			<b>Days In Company</b> <a class="float-right">{{$totalDays}}</a>
                  			</li>
                  			<li class="list-group-item">
                    			<b>This Year Leave (Days)</b> <a class="float-right">{{$getBasicProfile->leave_amount}}</a>
                  			</li>
                  			<li class="list-group-item">
                    			<b>This Year Leave Taken (Days)</b> <a class="float-right">{{$getBasicProfile->leave_usage}}</a>
                  			</li>
                		</ul>
                	</div>
                </div>
                <div class="card card-danger">
                	<div class="card-header">
                		<h3 class="card-title"><i class="fas fa-user-clock"></i> Attendance</h3>
              		</div>
              		<div class="card-body">
              			<div class="row">
	              			<div class="col-md-4">
								@if(($getAttendance) == null)
									<a class="btn" data-toggle="modal" data-target="#clock-in"><img src="https://img.icons8.com/flat_round/64/000000/youtube-play.png">Clock In</a>
								@endif
								@if(($getAttendance) != null)
									@if(($getAttendance->status_id) != 'f4f23f41-0588-4111-a881-a043cf355831')
										<a class="btn" data-toggle="modal" data-target="#clock-in"><img src="https://img.icons8.com/flat_round/64/000000/youtube-play.png">Clock In</a>
									@else
										<a class="btn" data-toggle="modal" data-target="#clock-out"><img src="https://img.icons8.com/dotty/80/000000/home-button.png">Clock Out</a>
									@endif
								@endif
								<div class="modal fade" id="clock-in">
									<div class="modal-dialog modal-lg">
										<div class="modal-content">
											<div class="modal-header">
												<h4 class="modal-title">Today Task Planning</h4>
													<button type="button" class="close" data-dismiss="modal" aria-label="Close">
														<span aria-hidden="true">&times;</span>
													</button>
											</div>
											<div class="modal-body">
												{!! Form::open(array('route' => 'attendanceIn.store','method'=>'POST')) !!}
												@csrf
												<div class="form-group">
													<label for="inputEmail" class="col-sm-2 col-form-label">Task List</label>
													{!! Form::textarea('notes', null, array('placeholder' => 'Plan Task For Today','class' => 'form-control')) !!}
												</div>
											</div>
											<div class="modal-footer justify-content-between">
												<button type="close" class="btn btn-default" data-dismiss="modal">Close</button>
												<button type="submit" class="btn btn-primary">Clock In</button>
											</div>
											{!! Form::close() !!}
										</div>
									</div>
								</div>
								<div class="modal fade" id="clock-out">
									<div class="modal-dialog modal-lg">
										<div class="modal-content">
											<div class="modal-header">
												<h4 class="modal-title">Today Task Outcome</h4>
													<button type="button" class="close" data-dismiss="modal" aria-label="Close">
														<span aria-hidden="true">&times;</span>
													</button>
											</div>
											<div class="modal-body">
												{!! Form::open(array('route' => 'attendanceOut.store','method'=>'POST')) !!}
												@csrf
												<div class="form-group">
													<label for="inputEmail" class="col-sm-2 col-form-label">Task List</label>
													@if(($getAttendance) != null)
													@foreach($getAttendance->Activity as $activity)
														{!! Form::textarea('notes', $activity->notes, array('placeholder' => 'Today Task Outcome','class' => 'form-control')) !!}
													@endforeach
													@else
														{!! Form::textarea('notes', null, array('placeholder' => 'Today Task Outcome','class' => 'form-control')) !!}
													@endif
												</div>
											</div>
											<div class="modal-footer justify-content-between">
												<button type="close" class="btn btn-default" data-dismiss="modal">Close</button>
												<button id="register" type="submit" class="btn btn-primary">Clock Out</button>
											</div>
											{!! Form::close() !!}
										</div>
									</div>
								</div>
	              			</div>
	              			<div class="col-md-8">
							@if(($getAttendance) != null)
								@foreach($getAttendance->Activity as $act)
									<p> In : @if(!empty($act->clock_in)){{date("d F Y H:i",strtotime($act->clock_in)) }}@endif</p>
									<p> Out : @if(!empty($act->clock_out)){{date("d F Y H:i",strtotime($act->clock_out)) }}@endif</p>
								@endforeach
								@if(!empty($getAttendance->working_hour))<p> Worked For <span class="badge badge-danger">{{$getAttendance->working_hour}}</span> Hour Today</p>@endif
							@else
								<p> In : </p>
								<p> Out : </p>
								<p> Worked For <span class="badge badge-danger">...</span> Hour Today</p>
							@endif
	              			</div>
							<div class="col-md-12">
								<p>Today Task :</p>
								@if(($getAttendance) != null)
								<textarea class="form-control" rows="10" readonly>@foreach($getAttendance->Activity as $act){{$act->notes}}@endforeach</textarea>
								@else
								<textarea class="form-control" rows="10" readonly></textarea>
								@endif
								<br>
								@if(($getAttendance) != null)
								@if($getAttendance->status_id == 'f4f23f41-0588-4111-a881-a043cf355831')
								<a class="btn btn-sm btn-danger" data-toggle="modal" data-target="#edit-task">Edit Task</a>
								@endif
								@endif
								<div class="modal fade" id="edit-task">
									<div class="modal-dialog modal-lg">
										<div class="modal-content">
											<div class="modal-header">
												<h4 class="modal-title">Today Task Edit</h4>
													<button type="button" class="close" data-dismiss="modal" aria-label="Close">
														<span aria-hidden="true">&times;</span>
													</button>
											</div>
											<div class="modal-body">
												{!! Form::open(array('route' => 'attendanceTask.update','method'=>'POST', 'class' => 'form-horizontal')) !!}
												@csrf
												<div class="form-group row">
													<label for="inputEmail" class="col-sm-2 col-form-label">Task List</label>
													@if(($getAttendance) != null)
													{!! Form::textarea('notes', $act->notes , array('placeholder' => 'Attendance Note','class' => 'form-control')) !!}
													@else
													{!! Form::textarea('notes', null , array('placeholder' => 'Attendance Note','class' => 'form-control')) !!}
													@endif
												</div>
											</div>
											<div class="modal-footer justify-content-between">
												<button type="close" class="btn btn-default" data-dismiss="modal">Close</button>
												<button type="submit" class="btn btn-primary">Save Change</button>
											</div>
											{!! Form::close() !!}
										</div>
									</div>
								</div>
							</div>
	              		</div>
              		</div>
              	</div>
            </div>
            <div class="col-md-9">
            	<div class="card">
            		<div class="card-header p-2">
                		<ul class="nav nav-pills">
                  			<li class="nav-item"><a class="nav-link active" href="#overview" data-toggle="tab">Overview</a></li>
                        <li class="nav-item"><a class="nav-link" href="#organization" data-toggle="tab">Organization</a></li>
                        <li class="nav-item"><a class="nav-link" href="#family" data-toggle="tab">Family</a></li>
                  			<li class="nav-item"><a class="nav-link" href="#salary" data-toggle="tab">Salary Slips</a></li>
                        <li class="nav-item"><a class="nav-link" href="#historical" data-toggle="tab">Service History</a></li>
                  			<li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab">Change Password</a></li>
                		</ul>
              		</div>
              		<div class="card-body">
              			<div class="tab-content">
              				<div class="active tab-pane" id="overview">
								<strong><i class="fas fa-calendar-check mr-1"></i> Birthday</strong>
								<p class="text-muted">{{date("d F Y",strtotime($getBasicProfile->date_of_birth)) }}</p>
								<strong><i class="fas fa-book mr-1"></i> Education</strong>
              					<p class="text-muted">
								@if(!empty($getLastEdu))
                  					{{$getLastEdu->grade}} in {{$getLastEdu->major}} from {{$getLastEdu->institution_name}}
								@endif
								</p>
                				<hr>
                				<strong><i class="fas fa-map-marker-alt mr-1"></i> Home Address</strong>
                				<p class="text-muted">{{ $getBasicProfile->address }}</p>
                				<hr>
                				<strong><i class="fas fa-pencil-alt mr-1"></i> Training & Certification</strong>
                				<p class="text-muted">
								@if(!empty($getTraining))
								@foreach($getTraining as $training)
                  					<span class="tag tag-danger">{{$training->training_title}}</span>
                  				@endforeach
								@endif
                				</p>
                				<hr>
								<strong><i class="fas fa-pencil-alt mr-1"></i> Contract Download</strong>
              				</div>

							<div class="tab-pane" id="organization">
								<strong><i class="fas fa-id-badge mr-1"></i> Employee ID</strong>
								<p class="text-muted">
									{{ $getBasicProfile->employee_no }}
								</p>
								<strong><i class="fas fa-calendar-check mr-1"></i> Join Date</strong>
								<p class="text-muted">
									{{date("d F Y",strtotime($getBasicProfile->from)) }}
								</p>
								<strong><i class="fas fa-file-signature mr-1"></i> Employment Type</strong>
								<p class="text-muted">
									{{ $getBasicProfile->Contracts->name }}
								</p>
								<strong><i class="fas fa-clipboard-check mr-1"></i> Current Position</strong>
								<p class="text-muted">
									{{ $getCurPos->grade}}
								</p>
								<strong><i class="fas fa-user-tie mr-1"></i> Direct Supervisor</strong>
								<p class="text-muted">
									@isset($getCurPos->report_to)
										{{ $getCurPos->Reporting->first_name}} {{ $getCurPos->Reporting->last_name}}
									@endisset
								</p>
								<strong><i class="fas fa-user-friends mr-1"></i> Direct Subordinate</strong>
								<table class="table table-bordered">
									<thead>
										<tr>
											<th style="width: 10px">#</th>
											<th>Avatar</th>
											<th>Name</th>
											<th>Position</th>
										</tr>
									</thead>
									<tbody>
										@foreach($getSubordinate as $key=>$value)
										<tr>
											<td>{{ $key+1 }}</td>
											<td>
												<img src="http://betterwork.iteos.tech/public/employees/{{ $value->Parent->picture }}" class="img-circle elevation-2" alt="User Image" style="width: 50px; height: 50px;">
											</td>
											<!--<td>
												<img src="http://betterwork.local/public/employees/{{ $value->Parent->picture }}" class="img-circle elevation-2" alt="User Image" style="width: 50px; height: 50px;">
											</td>-->
											<td>{{ $value->Parent->first_name}} {{ $value->Parent->last_name}}</td>
											<td>{{ $value->grade }}</td>
										</tr>
										@endforeach
									</tbody>
								</table>
							</div>
							<div class="tab-pane" id="family">
								<table class="table table-bordered">
									<thead>
										<tr>
											<th>Name</th>
											<th>Relation</th>
											<th>Address</th>
											<th>Phone</th>
											<th>Mobile</th>
										</tr>
									</thead>
									<tbody>
										@foreach($getBasicProfile->Child as $family)
										<tr>
											<td>{{ $family->first_name }} {{ $family->last_name }}</td>
											<td>
												@if($family->relation == '1')
													Husband
												@elseif($family->relation == '2')
													Wife
												@elseif($family->relation == '3')
													Parent
												@else
													Sibling
												@endif
											</td>
											<td>{{ $family->address }}</td>
											<td>{{ $family->phone }}</td>
											<td>{{ $family->mobile }}</td>
										</tr>
										@endforeach
									</tbody>
								</table>
							</div>

                      <div class="tab-pane" id="organization">
                        <strong><i class="fas fa-id-badge mr-1"></i> Employee ID</strong>
                        <p class="text-muted">
                            {{ $getEmployee->employee_no }}
                        </p>
                        <strong><i class="fas fa-calendar-check mr-1"></i> Join Date</strong>
                        <p class="text-muted">
                            {{date("d F Y",strtotime($getBasicProfile->from)) }}
                        </p>
                        <strong><i class="fas fa-file-signature mr-1"></i> Employment Type</strong>
                        <p class="text-muted">
                            {{ $getEmployee->Contracts->name }}
                        </p>
                        <strong><i class="fas fa-clipboard-check mr-1"></i> Current Position</strong>
                        <p class="text-muted">
                            {{ $getServices->grade}}
                        </p>
                        <strong><i class="fas fa-user-tie mr-1"></i> Direct Supervisor</strong>
                        <p class="text-muted">
                          @isset($getServices->report_to)
                          {{ $getServices->Reporting->first_name}} {{ $getServices->Reporting->last_name}}
                          @endisset
                        </p>
                        <strong><i class="fas fa-user-friends mr-1"></i> Direct Subordinate</strong>
                        <table class="table table-bordered">
                          <thead>
                            <tr>
                              <th style="width: 10px">#</th>
                              <th>Avatar</th>
                              <th>Name</th>
                              <th>Position</th>
                            </tr>
                          </thead>
                          <tbody>
                            @foreach($getSubordinate as $key=>$value)
                            <tr>
                              <td>{{ $key+1 }}</td>
                              <td>
								<img src="http://betterwork.iteos.tech/public/employees/{{ $value->Parent->picture }}" class="img-circle elevation-2" alt="User Image" style="width: 50px; height: 50px;">
								</td>
							<!--<td>
								<img src="http://betterwork.local/public/employees/{{ $value->Parent->picture }}" class="img-circle elevation-2" alt="User Image" style="width: 50px; height: 50px;">
								</td>-->
                              <td>{{ $value->Parent->first_name}} {{ $value->Parent->last_name}}</td>
                              <td>{{ $value->grade }}</td>
                            </tr>
                            @endforeach
                          </tbody>
                        </table>
                      </div>
                      <div class="tab-pane" id="family">
                        <table class="table table-bordered">
                          <thead>
                            <tr>
                              <th style="width: 10px">#</th>
                              <th>Name</th>
                              <th>Relation</th>
                              <th>Address</th>
                              <th>Phone</th>
                              <th>Mobile</th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                            </tr>
                          </tbody>
                        </table>
                      </div>

              				<div class="tab-pane" id="salary">
              					<table class="table table-bordered">
              						<thead>
              							<tr>
              								<th style="width: 10px">#</th>
              								<th>Period</th>
              								<th>Slip</th>
              							</tr>
              						</thead>
              						<tbody>
										@if(!empty($getSalary))
										@foreach($getSalary as $key => $value)
              							<tr>
              								<td>{{ $key+1 }}</td>
              								<td>{{date("F Y",strtotime($value->payroll_period)) }}</td>
              								<td>
												<a href="{{ route('mySalary.export',['empNo'=>$value->employee_no]) }}" class="btn btn-sm btn-app"><i class="fas fa-file-pdf"></i> Save as PDF</a>
												<a href="{{ route('mySalary.print',['empNo'=>$value->employee_no]) }}" target="blank" class="btn btn-sm btn-app"><i class="fas fa-print"></i> Print</a>
											</td>
              							</tr>
										@endforeach
										@else
										<tr>
											<td></td>
											<td></td>
										</tr>
										@endif
									</tbody>
              					</table>
              				</div>
							<div class="tab-pane" id="historical">
								<table class="table table-bordered">
									<thead>
										<tr>
											<th>Position</th>
											<th>From</th>
											<th>To</th>
											<th>Supervisor</th>
										</tr>
									</thead>
									<tbody>
										@foreach($getEmployee->Services as $service)
										<tr>
											<td>{{$service->grade}}</td>
											<td>{{date("d F Y",strtotime($service->from)) }}</td>
											<td>
												@if(!empty($service->to))
													{{date("d F Y",strtotime($service->to)) }}
												@endif
											</td>
											<td>
												@if(!empty($service->report_to))
												{{ $service->Reporting->first_name }} {{ $service->Reporting->last_name }}
												@endif
											</td>
										</tr>
										@endforeach
									</tbody>
								</table>
							</div>
              				<div class="tab-pane" id="settings">
								{!! Form::open(array('route' => 'userPassword.update','method'=>'POST', 'class' => 'form-horizontal')) !!}
								@csrf
              					<div class="form-group row">
									<label for="inputEmail" class="col-sm-2 col-form-label">New Password</label>
									{!! Form::password('password', array('placeholder' => 'Password','class' => 'form-control')) !!}
                        		</div>
								<div class="form-group row">
									<label for="inputEmail" class="col-sm-2 col-form-label">Confirm New Password</label>
									{!! Form::password('confirm-password', array('placeholder' => 'Confirm Password','class' => 'form-control')) !!}
								</div>
								<div class="form-group row">
									<button type="submit" class="btn btn-danger">Reset</button>
								</div>
								{!! Form::close() !!}
							</div>
                      	</div>
                    </div>
              	</div>
				<div class="row">
					<div class="col-md-6">
						<div class="card card-info">
							<div class="card-header">
								<h3 class="card-title"><i class="fab fa-blogger"></i> Bulletin Board</h3>
							</div>
							<div class="card-body">
								<div class="card-body table-responsive p-0" style="height: 300px;">
									<table class="table table-head-fixed text-nowrap">
										<thead>
											<tr>
												<th style="width: 10px;">No</th>
												<th>Title</th>
												<th style="width: 10px;"></th>
											</tr>
										</thead>
										<tbody>
											@foreach($getBulletin as $key=>$bulletin)
											<tr>
												<td style="width: 10px;">{{$key+1}}</td>
												<td><strong>{{$bulletin->title}}</strong></td>
												<td style="width: 10px;">
													<a class="btn btn-xs btn-success" href="{{ route('myBulletin.show',$bulletin->id) }} " title="Read Article" ><i class="fa fa-search"></i></a>
												</td>
											</tr>
											@endforeach
										</tbody>
									</table>
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-6">
						<div class="card card-success">
							<div class="card-header">
								<h3 class="card-title"><i class="fas fa-birthday-cake"></i> This Month Birthday</h3>
							</div>
							<div class="card-body">
								<div class="card-body table-responsive p-0" style="height: 300px;">
									<table class="table table-head-fixed text-nowrap">
										<thead>
											<tr>
												<th style="width: 10px;">Date</th>
												<th>Employee Name</th>
											</tr>
										</thead>
										<tbody>
											@foreach($getBirthday as $key=>$birthday)
											<tr>
												<td>{{date("d F Y",strtotime($getBirthday->date_of_birth)) }}</td>
												<td><strong>{{$getBirthday->first_name}} {{$getBirthday->last_name}}</strong></td>
											</tr>
											@endforeach
										</tbody>
									</table>
								</div>
							</div>
						</div>
					</div>
				</div>
            </div>
        </div>
    </div>
</section>
@endsection
