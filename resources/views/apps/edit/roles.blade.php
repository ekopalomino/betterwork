@extends('apps.layouts.main')
@section('header.title')
Better Work Indonesia | Create Role
@endsection
@section('content')
<section class="content-header">
	<div class="container-fluid">
      	<div class="row mb-2">
       		<div class="col-sm-6">
          		<h1>Create Access Roles</h1>
       		</div>
       	</div>
    </div>
</section>
<section class="content">
	<div class="row">
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
		<div class="col-12">
			<div class="card card-info">
				<div class="card-header">
                	<h3 class="card-title">Permission List</h3>
              	</div>
				{!! Form::model($data, ['method' => 'POST','route' => ['role.update', $data->id]]) !!}
				@csrf
					<div class="card-body">
						<div class="row">
							<div class="col-6">
								<label><strong>Role Name</strong></label>
								{!! Form::text('name', null, array('placeholder' => 'Role Name','class' => 'form-control')) !!}
							</div>
						</div>
						<div class="row">
							<div class="col-2">
								<div class="card card-info">
									<div class="card-body">
										<label><strong>Main Menu</strong></label>
											<table id="example2" class="table table-bordered table-hover">
												<thead>
													<tr>
														<th style="width:120px">Permission</th>
														<th></th>
													</tr>
												</thead>
												<tbody>
													<tr>
														<td>Access Configuration</td>
														<td>
															<input type="checkbox" value="1" name="permission[]" 
															@foreach($roles as $rolePermissions)
		                                                        @if($rolePermissions->permission_id == '1')checked
		                                                        @endif
		                                                    @endforeach
															/>
														</td>
													</tr>
													<tr>
														<td>Access Human Resources</td>
														<td>
															<input type="checkbox" value="2" name="permission[]" 
															@foreach($roles as $rolePermissions)
		                                                        @if($rolePermissions->permission_id == '2')checked
		                                                        @endif
		                                                    @endforeach
															/>
														</td>
													</tr>
													<tr>
														<td>Access Accounting</td>
														<td>
															<input type="checkbox" value="4" name="permission[]" 
															@foreach($roles as $rolePermissions)
		                                                        @if($rolePermissions->permission_id == '4')checked
		                                                        @endif
		                                                    @endforeach
															/>
														</td>
													</tr>
													<tr>
														<td>Access Grievance</td>
														<td>
															<input type="checkbox" value="3" name="permission[]" 
															@foreach($roles as $rolePermissions)
		                                                        @if($rolePermissions->permission_id == '3')checked
		                                                        @endif
		                                                    @endforeach
															/>
														</td>
													</tr>
												</tbody>
											</table>	
									</div>
								</div>
							</div>
							<div class="col-2">
								<div class="card card-info">
									<div class="card-body">
										<label><strong>Configuration Menu</strong></label>
											<table id="example2" class="table table-bordered table-hover">
												<thead>
													<tr>
														<th style="width:120px">Permission</th>
														<th></th>
													</tr>
												</thead>
												<tbody>
													<tr>
														<td>Create Application Setting</td>
														<td>
															<input type="checkbox" value="33" name="permission[]" 
															@foreach($roles as $rolePermissions)
		                                                        @if($rolePermissions->permission_id == '33')checked
		                                                        @endif
		                                                    @endforeach
															/>
														</td>
													</tr>
													<tr>
														<td>Create User</td>
														<td>
															<input type="checkbox" value="5" name="permission[]" 
															@foreach($roles as $rolePermissions)
		                                                        @if($rolePermissions->permission_id == '5')checked
		                                                        @endif
		                                                    @endforeach
															/>
														</td>
													</tr>
													<tr>
														<td>Edit User</td>
														<td>
															<input type="checkbox" value="6" name="permission[]" 
															@foreach($roles as $rolePermissions)
		                                                        @if($rolePermissions->permission_id == '6')checked
		                                                        @endif
		                                                    @endforeach
															/>
														</td>
													</tr>
													<tr>
														<td>Suspend / Delete User</td>
														<td>
															<input type="checkbox" value="7" name="permission[]" 
															@foreach($roles as $rolePermissions)
		                                                        @if($rolePermissions->permission_id == '7')checked
		                                                        @endif
		                                                    @endforeach
															/>
														</td>
													</tr>
													<tr>
														<td>Create Access Role</td>
														<td>
															<input type="checkbox" value="8" name="permission[]" 
															@foreach($roles as $rolePermissions)
		                                                        @if($rolePermissions->permission_id == '8')checked
		                                                        @endif
		                                                    @endforeach
															/>
														</td>
													</tr>
													<tr>
														<td>Edit Access Role</td>
														<td>
															<input type="checkbox" value="9" name="permission[]" 
															@foreach($roles as $rolePermissions)
		                                                        @if($rolePermissions->permission_id == '9')checked
		                                                        @endif
		                                                    @endforeach
															/>
														</td>
													</tr>
													<tr>
														<td>Create HR Master Data</td>
														<td>
															<input type="checkbox" value="10" name="permission[]" 
															@foreach($roles as $rolePermissions)
		                                                        @if($rolePermissions->permission_id == '10')checked
		                                                        @endif
		                                                    @endforeach
															/>
														</td>
													</tr>
													<tr>
														<td>Edit HR Master Data</td>
														<td>
															<input type="checkbox" value="11" name="permission[]" 
															@foreach($roles as $rolePermissions)
		                                                        @if($rolePermissions->permission_id == '11')checked
		                                                        @endif
		                                                    @endforeach
															/>
														</td>
													</tr>
													<tr>
														<td>Delete HR Master Data</td>
														<td>
															<input type="checkbox" value="12" name="permission[]" 
															@foreach($roles as $rolePermissions)
		                                                        @if($rolePermissions->permission_id == '12')checked
		                                                        @endif
		                                                    @endforeach
															/>
														</td>
													</tr>
													<tr>
														<td>Create Accounting Master Data</td>
														<td>
															<input type="checkbox" value="13" name="permission[]" 
															@foreach($roles as $rolePermissions)
		                                                        @if($rolePermissions->permission_id == '13')checked
		                                                        @endif
		                                                    @endforeach
															/>
														</td>
													</tr>
													<tr>
														<td>Edit Accounting Master Data</td>
														<td>
															<input type="checkbox" value="14" name="permission[]" 
															@foreach($roles as $rolePermissions)
		                                                        @if($rolePermissions->permission_id == '14')checked
		                                                        @endif
		                                                    @endforeach
															/>
														</td>
													</tr>
													<tr>
														<td>Delete Accounting Master Data</td>
														<td>
															<input type="checkbox" value="15" name="permission[]" 
															@foreach($roles as $rolePermissions)
		                                                        @if($rolePermissions->permission_id == '15')checked
		                                                        @endif
		                                                    @endforeach
															/>
														</td>
													</tr>
												</tbody>
											</table>	
									</div>
								</div>
							</div>
							<div class="col-3">
								<div class="card card-info">
									<div class="card-body">
										<label><strong>Human Resource Menu</strong></label>
											<table id="example2" class="table table-bordered table-hover">
												<thead>
													<tr>
														<th style="width:120px">Permission</th>
														<th></th>
													</tr>
												</thead>
												<tbody>
													<tr>
														<td>Create Employee</td>
														<td>
															<input type="checkbox" value="16" name="permission[]" 
															@foreach($roles as $rolePermissions)
		                                                        @if($rolePermissions->permission_id == '16')checked
		                                                        @endif
		                                                    @endforeach
															/>
														</td>
													</tr>
													<tr>
														<td>Edit Employee</td>
														<td>
															<input type="checkbox" value="17" name="permission[]" 
															@foreach($roles as $rolePermissions)
		                                                        @if($rolePermissions->permission_id == '17')checked
		                                                        @endif
		                                                    @endforeach
															/>
														</td>
													</tr>
													<tr>
														<td>Suspend / Delete Employee</td>
														<td>
															<input type="checkbox" value="18" name="permission[]" 
															@foreach($roles as $rolePermissions)
		                                                        @if($rolePermissions->permission_id == '18')checked
		                                                        @endif
		                                                    @endforeach
															/>
														</td>
													</tr>
													<tr>
														<td>Access Employee Attendance</td>
														<td>
															<input type="checkbox" value="34" name="permission[]" 
															@foreach($roles as $rolePermissions)
		                                                        @if($rolePermissions->permission_id == '34')checked
		                                                        @endif
		                                                    @endforeach
															/>
														</td>
													</tr>
													<tr>
														<td>Approve / Reject Leave Request</td>
														<td>
															<input type="checkbox" value="19" name="permission[]" 
															@foreach($roles as $rolePermissions)
		                                                        @if($rolePermissions->permission_id == '19')checked
		                                                        @endif
		                                                    @endforeach
															/>
														</td>
													</tr>
													<tr>
														<td>Create Payroll</td>
														<td>
															<input type="checkbox" value="20" name="permission[]" 
															@foreach($roles as $rolePermissions)
		                                                        @if($rolePermissions->permission_id == '20')checked
		                                                        @endif
		                                                    @endforeach
															/>
														</td>
													</tr>
													<tr>
														<td>Edit Payroll</td>
														<td>
															<input type="checkbox" value="21" name="permission[]" 
															@foreach($roles as $rolePermissions)
		                                                        @if($rolePermissions->permission_id == '21')checked
		                                                        @endif
		                                                    @endforeach
															/>
														</td>
													</tr>
													<tr>
														<td>Approve / Reject Payroll</td>
														<td>
															<input type="checkbox" value="22" name="permission[]" 
															@foreach($roles as $rolePermissions)
		                                                        @if($rolePermissions->permission_id == '22')checked
		                                                        @endif
		                                                    @endforeach
															/>
														</td>
													</tr>
													<tr>
														<td>Create Reimburs</td>
														<td>
															<input type="checkbox" value="23" name="permission[]" 
															@foreach($roles as $rolePermissions)
		                                                        @if($rolePermissions->permission_id == '23')checked
		                                                        @endif
		                                                    @endforeach
															/>
														</td>
													</tr>
													<tr>
														<td>Edit Reimburs</td>
														<td>
															<input type="checkbox" value="24" name="permission[]" 
															@foreach($roles as $rolePermissions)
		                                                        @if($rolePermissions->permission_id == '24')checked
		                                                        @endif
		                                                    @endforeach
															/>
														</td>
													</tr>
													<tr>
														<td>Delete Reimburs</td>
														<td>
															<input type="checkbox" value="25" name="permission[]" 
															@foreach($roles as $rolePermissions)
		                                                        @if($rolePermissions->permission_id == '25')checked
		                                                        @endif
		                                                    @endforeach
															/>
														</td>
													</tr>
													<tr>
														<td>Approve / Reject Reimburs</td>
														<td>
															<input type="checkbox" value="26" name="permission[]" 
															@foreach($roles as $rolePermissions)
		                                                        @if($rolePermissions->permission_id == '26')checked
		                                                        @endif
		                                                    @endforeach
															/>
														</td>
													</tr>
													<tr>
														<td>Create Appraisal</td>
														<td>
															<input type="checkbox" value="27" name="permission[]" 
															@foreach($roles as $rolePermissions)
		                                                        @if($rolePermissions->permission_id == '27')checked
		                                                        @endif
		                                                    @endforeach
															/>
														</td>
													</tr>
													<tr>
														<td>Edit Appraisal</td>
														<td>
															<input type="checkbox" value="28" name="permission[]" 
															@foreach($roles as $rolePermissions)
		                                                        @if($rolePermissions->permission_id == '28')checked
		                                                        @endif
		                                                    @endforeach
															/>
														</td>
													</tr>
													<tr>
														<td>Approve / Reject Appraisal</td>
														<td>
															<input type="checkbox" value="29" name="permission[]" 
															@foreach($roles as $rolePermissions)
		                                                        @if($rolePermissions->permission_id == '29')checked
		                                                        @endif
		                                                    @endforeach
															/>
														</td>
													</tr>
													<tr>
														<td>Create Training</td>
														<td>
															<input type="checkbox" value="30" name="permission[]" 
															@foreach($roles as $rolePermissions)
		                                                        @if($rolePermissions->permission_id == '30')checked
		                                                        @endif
		                                                    @endforeach
															/>
														</td>
													</tr>
													<tr>
														<td>Edit Training</td>
														<td>
															<input type="checkbox" value="31" name="permission[]" 
															@foreach($roles as $rolePermissions)
		                                                        @if($rolePermissions->permission_id == '31')checked
		                                                        @endif
		                                                    @endforeach
															/>
														</td>
													</tr>
													<tr>
														<td>Approve / Reject Training</td>
														<td>
															<input type="checkbox" value="32" name="permission[]" 
															@foreach($roles as $rolePermissions)
		                                                        @if($rolePermissions->permission_id == '32')checked
		                                                        @endif
		                                                    @endforeach
															/>
														</td>
													</tr>
												</tbody>
											</table>	
										
									</div>
								</div>
							</div>
							<div class="col-3">
								<div class="card card-info">
									<div class="card-body">
										<label><strong>Accounting Menu</strong></label>
											<table id="example2" class="table table-bordered table-hover">
												<thead>
													<tr>
														<th style="width:120px">Permission</th>
														<th></th>
													</tr>
												</thead>
												<tbody>
													<tr>
														<td></td>
													</tr>
												</tbody>
											</table>	
										
									</div>
								</div>
							</div>
							<div class="col-2">
								<div class="card card-info">
									<div class="card-body">
										<label><strong>Grievance Menu</strong></label>
											<table id="example2" class="table table-bordered table-hover">
												<thead>
													<tr>
														<th style="width:120px">Permission</th>
														<th></th>
													</tr>
												</thead>
												<tbody>
													<tr>
														<td></td>
													</tr>
												</tbody>
											</table>	
										
									</div>
								</div>
							</div>
						</div>
						<button type="submit" class="btn btn-info">Submit</button>
	                  	<a button type="button" class="btn btn-danger float-right" href="{{ route('role.index') }}">Cancel</a>
	                </div>
	            {!! Form::close() !!}
	        </div>
        </div>
    </div>
</section>
@endsection
@section('footer.scripts')
<script src="{{ asset('public/bower_components/admin-lte/plugins/bootstrap-switch/js/bootstrap-switch.min.js') }}"></script>
<script>
	$(function () {
		$("input[data-bootstrap-switch]").each(function(){
      		$(this).bootstrapSwitch('state', $(this).prop('checked'));
    	});
	});
</script>