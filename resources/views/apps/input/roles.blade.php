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
				{!! Form::open(array('route' => 'role.store','method'=>'POST', 'class' => 'form-horizontal')) !!}
				@csrf
					<div class="card-body">
						<div class="row">
							<div class="col-6">
								<label><strong>Role Name</strong></label>
								{!! Form::text('name', null, array('placeholder' => 'Role Name','class' => 'form-control')) !!}
							</div>
						</div>
						<br>
						<div class="row">
							<div class="col-12">
								<div class="card-body table-responsive p-0" style="height: 525px;">
									<table class="table table-bordered table-head-fixed text-nowrap">
										<thead>
											<tr>
												<th>No</th>
												<th>Menu / Function </th>
												<th>Access Menu</th>
												<th>Create Data</th>
												<th>Edit Data</th>
												<th>Delete Data</th>
												<th>Approve / Reject</th>
											</tr>
										</thead>
										<tbody>
											<tr style="text-align:center">
												<td style="font-size:16px;" colspan="2"><strong>Configuration Menu</strong></td>
												<td><input type="checkbox" value="1" name="permission[]" /></td>
												<td><input type="checkbox" value="1" name="permission[]" disabled /></td>
												<td><input type="checkbox" value="1" name="permission[]" disabled /></td>
												<td><input type="checkbox" value="1" name="permission[]" disabled /></td>
												<td><input type="checkbox" value="1" name="permission[]" disabled /></td>
											</tr>
											<tr>
												<td><strong>1.1</strong></td>
												<td>User Management Menu</td>
												<td><input type="checkbox" value="1" name="permission[]" /></td>
												<td></td>
												<td></td>
												<td></td>
												<td></td>
											</tr>
											<tr>
												<td><strong>1.1.1</strong></td>
												<td>HR Configuration Menu</td>
												<td><input type="checkbox" value="1" name="permission[]" /></td>
												<td></td>
												<td></td>
												<td></td>
												<td></td>
											</tr>
										</tbody>
									</table>
								</div>
							</div>
						</div>
											
							<!--<div class="col-2">
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
															<input type="checkbox" value="1" name="permission[]" />
														</td>
													</tr>
													<tr>
														<td>Access Human Resources</td>
														<td>
															<input type="checkbox" value="2" name="permission[]" />
														</td>
													</tr>
													<tr>
														<td>Access Accounting</td>
														<td>
															<input type="checkbox" value="4" name="permission[]" />
														</td>
													</tr>
													<tr>
														<td>Access Grievance</td>
														<td>
															<input type="checkbox" value="3" name="permission[]" />
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
															<input type="checkbox" value="33" name="permission[]" />
														</td>
													</tr>
													<tr>
														<td>Create User</td>
														<td>
															<input type="checkbox" value="5" name="permission[]" />
														</td>
													</tr>
													<tr>
														<td>Edit User</td>
														<td>
															<input type="checkbox" value="6" name="permission[]" />
														</td>
													</tr>
													<tr>
														<td>Suspend / Delete User</td>
														<td>
															<input type="checkbox" value="7" name="permission[]" />
														</td>
													</tr>
													<tr>
														<td>Create Access Role</td>
														<td>
															<input type="checkbox" value="8" name="permission[]" />
														</td>
													</tr>
													<tr>
														<td>Edit Access Role</td>
														<td>
															<input type="checkbox" value="9" name="permission[]" />
														</td>
													</tr>
													<tr>
														<td>Create HR Master Data</td>
														<td>
															<input type="checkbox" value="10" name="permission[]" />
														</td>
													</tr>
													<tr>
														<td>Edit HR Master Data</td>
														<td>
															<input type="checkbox" value="11" name="permission[]" />
														</td>
													</tr>
													<tr>
														<td>Delete HR Master Data</td>
														<td>
															<input type="checkbox" value="12" name="permission[]" />
														</td>
													</tr>
													<tr>
														<td>Create Accounting Master Data</td>
														<td>
															<input type="checkbox" value="13" name="permission[]" />
														</td>
													</tr>
													<tr>
														<td>Edit Accounting Master Data</td>
														<td>
															<input type="checkbox" value="14" name="permission[]" />
														</td>
													</tr>
													<tr>
														<td>Delete Accounting Master Data</td>
														<td>
															<input type="checkbox" value="15" name="permission[]" />
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
															<input type="checkbox" value="16" name="permission[]" />
														</td>
													</tr>
													<tr>
														<td>Edit Employee</td>
														<td>
															<input type="checkbox" value="17" name="permission[]" />
														</td>
													</tr>
													<tr>
														<td>Suspend / Delete Employee</td>
														<td>
															<input type="checkbox" value="18" name="permission[]" />
														</td>
													</tr>
													<tr>
														<td>Access Employee Attendance</td>
														<td>
															<input type="checkbox" value="34" name="permission[]" />
														</td>
													</tr>
													<tr>
														<td>Approve / Reject Leave Request</td>
														<td>
															<input type="checkbox" value="19" name="permission[]" />
														</td>
													</tr>
													<tr>
														<td>Create Payroll</td>
														<td>
															<input type="checkbox" value="20" name="permission[]" />
														</td>
													</tr>
													<tr>
														<td>Edit Payroll</td>
														<td>
															<input type="checkbox" value="21" name="permission[]" />
														</td>
													</tr>
													<tr>
														<td>Approve / Reject Payroll</td>
														<td>
															<input type="checkbox" value="22" name="permission[]" />
														</td>
													</tr>
													<tr>
														<td>Create Reimburs</td>
														<td>
															<input type="checkbox" value="23" name="permission[]" />
														</td>
													</tr>
													<tr>
														<td>Edit Reimburs</td>
														<td>
															<input type="checkbox" value="24" name="permission[]" />
														</td>
													</tr>
													<tr>
														<td>Delete Reimburs</td>
														<td>
															<input type="checkbox" value="25" name="permission[]" />
														</td>
													</tr>
													<tr>
														<td>Approve / Reject Reimburs</td>
														<td>
															<input type="checkbox" value="26" name="permission[]" />
														</td>
													</tr>
													<tr>
														<td>Create Appraisal</td>
														<td>
															<input type="checkbox" value="27" name="permission[]" />
														</td>
													</tr>
													<tr>
														<td>Edit Appraisal</td>
														<td>
															<input type="checkbox" value="28" name="permission[]" />
														</td>
													</tr>
													<tr>
														<td>Approve / Reject Appraisal</td>
														<td>
															<input type="checkbox" value="29" name="permission[]" />
														</td>
													</tr>
													<tr>
														<td>Create Training</td>
														<td>
															<input type="checkbox" value="30" name="permission[]" />
														</td>
													</tr>
													<tr>
														<td>Edit Training</td>
														<td>
															<input type="checkbox" value="31" name="permission[]" />
														</td>
													</tr>
													<tr>
														<td>Approve / Reject Training</td>
														<td>
															<input type="checkbox" value="32" name="permission[]" />
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
							</div>-->
						
	                  	<button type="submit" class="btn btn-info">Submit</button>
	                  	<a button type="button" class="btn btn-danger float-right" href="{{ route('role.index') }}">Cancel</a>
	                </div>
	            {!! Form::close() !!}
	        </div>
        </div>
    </div>
</section>
@endsection