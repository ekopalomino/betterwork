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
				<form class="form-horizontal">
					<div class="card-body">
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
															<input type="checkbox" value="1" name="permission[]" />
														</td>
													</tr>
													<tr>
														<td>Access Human Resources</td>
														<td>
															<input type="checkbox" value="1" name="permission[]" />
														</td>
													</tr>
													<tr>
														<td>Access Accounting</td>
														<td>
															<input type="checkbox" value="1" name="permission[]" />
														</td>
													</tr>
													<tr>
														<td>Access Grievance</td>
														<td>
															<input type="checkbox" value="1" name="permission[]" />
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
															<input type="checkbox" value="1" name="permission[]" />
														</td>
													</tr>
													<tr>
														<td>Create User</td>
														<td>
															<input type="checkbox" value="1" name="permission[]" />
														</td>
													</tr>
													<tr>
														<td>Edit User</td>
														<td>
															<input type="checkbox" value="1" name="permission[]" />
														</td>
													</tr>
													<tr>
														<td>Suspend / Delete User</td>
														<td>
															<input type="checkbox" value="1" name="permission[]" />
														</td>
													</tr>
													<tr>
														<td>Create Access Role</td>
														<td>
															<input type="checkbox" value="1" name="permission[]" />
														</td>
													</tr>
													<tr>
														<td>Edit Access Role</td>
														<td>
															<input type="checkbox" value="1" name="permission[]" />
														</td>
													</tr>
													<tr>
														<td>Create HR Master Data</td>
														<td>
															<input type="checkbox" value="1" name="permission[]" />
														</td>
													</tr>
													<tr>
														<td>Edit HR Master Data</td>
														<td>
															<input type="checkbox" value="1" name="permission[]" />
														</td>
													</tr>
													<tr>
														<td>Delete HR Master Data</td>
														<td>
															<input type="checkbox" value="1" name="permission[]" />
														</td>
													</tr>
													<tr>
														<td>Create Accounting Master Data</td>
														<td>
															<input type="checkbox" value="1" name="permission[]" />
														</td>
													</tr>
													<tr>
														<td>Edit Accounting Master Data</td>
														<td>
															<input type="checkbox" value="1" name="permission[]" />
														</td>
													</tr>
													<tr>
														<td>Delete Accounting Master Data</td>
														<td>
															<input type="checkbox" value="1" name="permission[]" />
														</td>
													</tr>
												</tbody>
											</table>	
									</div>
								</div>
							</div>
							<div class="col-3>
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
															<input type="checkbox" value="1" name="permission[]" />
														</td>
													</tr>
													<tr>
														<td>Edit Employee</td>
														<td>
															<input type="checkbox" value="1" name="permission[]" />
														</td>
													</tr>
													<tr>
														<td>Suspend / Delete Employee</td>
														<td>
															<input type="checkbox" value="1" name="permission[]" />
														</td>
													</tr>
													<tr>
														<td>Approve / Reject Leave Request</td>
														<td>
															<input type="checkbox" value="1" name="permission[]" />
														</td>
													</tr>
													<tr>
														<td>Create Payroll</td>
														<td>
															<input type="checkbox" value="1" name="permission[]" />
														</td>
													</tr>
													<tr>
														<td>Edit Payroll</td>
														<td>
															<input type="checkbox" value="1" name="permission[]" />
														</td>
													</tr>
													<tr>
														<td>Approve / Reject Payroll</td>
														<td>
															<input type="checkbox" value="1" name="permission[]" />
														</td>
													</tr>
													<tr>
														<td>Create Appraisal</td>
														<td>
															<input type="checkbox" value="1" name="permission[]" />
														</td>
													</tr>
													<tr>
														<td>Edit Appraisal</td>
														<td>
															<input type="checkbox" value="1" name="permission[]" />
														</td>
													</tr>
													<tr>
														<td>Approve / Reject Appraisal</td>
														<td>
															<input type="checkbox" value="1" name="permission[]" />
														</td>
													</tr>
													<tr>
														<td>Create Training</td>
														<td>
															<input type="checkbox" value="1" name="permission[]" />
														</td>
													</tr>
													<tr>
														<td>Edit Training</td>
														<td>
															<input type="checkbox" value="1" name="permission[]" />
														</td>
													</tr>
													<tr>
														<td>Approve / Reject Training</td>
														<td>
															<input type="checkbox" value="1" name="permission[]" />
														</td>
													</tr>
												</tbody>
											</table>	
										
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
	                  	<button type="submit" class="btn btn-default float-right">Cancel</button>
	                </div>
	            </form>
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