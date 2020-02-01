@extends('apps.layouts.main')
@section('header.title')
Better Work Indonesia | Edit Employee
@endsection
@section('header.plugins')
<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
@endsection
@section('content')
<section class="content-header">
	<div class="container-fluid">
      	<div class="row mb-2">
       		<div class="col-sm-6">
          		<h1>Edit Employee</h1>
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
		<div class="card card-primary card-outline">
			<div class="card-body">
				<div class="row">
					<div class="col-1 col-sm-1">
		                <div class="nav flex-column nav-tabs h-100" id="vert-tabs-tab" role="tablist" aria-orientation="vertical">
		                	<a class="nav-link active" id="vert-tabs-profile-tab" data-toggle="pill" href="#vert-tabs-profile" role="tab" aria-controls="vert-tabs-profile" aria-selected="true">Profile</a>
		                	<a class="nav-link" id="vert-tabs-family-tab" data-toggle="pill" href="#vert-tabs-family" role="tab" aria-controls="vert-tabs-family" aria-selected="false">Family</a>
		                	<a class="nav-link" id="vert-tabs-education-tab" data-toggle="pill" href="#vert-tabs-education" role="tab" aria-controls="vert-tabs-education" aria-selected="false">Education</a>
		                	<a class="nav-link" id="vert-tabs-training-tab" data-toggle="pill" href="#vert-tabs-training" role="tab" aria-controls="vert-tabs-training" aria-selected="false">Training</a>
		                	<a class="nav-link" id="vert-tabs-services-tab" data-toggle="pill" href="#vert-tabs-services" role="tab" aria-controls="vert-tabs-services" aria-selected="false">Services</a>
		                </div>
		            </div>
		            <div class="col-11 col-sm-11">
		            	<div class="tab-content" id="vert-tabs-tabContent">
		            		<div class="tab-pane text-left fade show active" id="vert-tabs-profile" role="tabpanel" aria-labelledby="vert-tabs-profile-tab">
		            			{!! Form::model($data, ['method' => 'POST','route' => ['employee.update', $data->id]]) !!}
                  				@csrf
		            			<div class="form-group">
			    					<label for="employeeID">Employee ID</label>
			    					{!! Form::text('employee_id', null, array('placeholder' => 'Employee ID','class' => 'form-control')) !!}
			    				</div>
			    				<div class="form-group">
			    					<label for="firstName">First Name</label>
			    					{!! Form::text('first_name', null, array('placeholder' => 'First Name','class' => 'form-control')) !!}
			    				</div>
			    				<div class="form-group">
			    					<label for="lastName">Last Name</label>
			    					{!! Form::text('last_name', null, array('placeholder' => 'Last Name','class' => 'form-control')) !!}
			    				</div>
			    				<div class="form-group">
			    					<label for="placeOb">Place Of Birth</label>
			    					{!! Form::select('place_of_birth', $cities,old('place_of_birth'), array('class' => 'form-control')) !!}
			    				</div>
			    				<div class="form-group">
			    					<label for="dateOb">Date Of Birth</label>
			    					{!! Form::date('date_of_birth', old('date_of_birth'), array('id' => 'datepicker','class' => 'form-control')) !!}
			    				</div>
			    				<div class="form-group">
			    					<label for="idCard">ID Card (KTP)</label>
			    					{!! Form::text('id_card', null, array('placeholder' => 'ID Card (KTP)','class' => 'form-control')) !!}
			    				</div>
			    				<div class="form-group">
			    					<label for="sex">Sex</label>
			    					<select name="sex" class="form-control">
                          				<option value="0" {{ old('sex',$data->sex)=='0' ? 'selected' : ''  }}>Please Select</option>
						                <option value="1" {{ old('sex',$data->sex)=='1' ? 'selected' : ''  }}>Male</option>
						                <option value="2" {{ old('sex',$data->sex)=='2' ? 'selected' : ''  }}>Female</option>
						            </select>
			    				</div>
			    				<div class="form-group">
			    					<label for="maritalStatus">Marital Status</label>
			    					<select name="marital_status" class="form-control">
                          				<option value="0" {{ old('sex',$data->marital_status)=='0' ? 'selected' : ''  }}>Please Select</option>
						                <option value="1" {{ old('sex',$data->marital_status)=='1' ? 'selected' : ''  }}>Single</option>
						                <option value="2" {{ old('sex',$data->marital_status)=='2' ? 'selected' : ''  }}>Married</option>
						                <option value="3" {{ old('sex',$data->marital_status)=='3' ? 'selected' : ''  }}>Divorce</option>
						                <option value="4" {{ old('sex',$data->marital_status)=='4' ? 'selected' : ''  }}>Widower</option>
						            </select>
			    				</div>
			    				<div class="form-group">
			    					<label for="address">Address</label>
			    					{!! Form::textarea('address', null, array('id' => 'address','class' => 'form-control')) !!}
			    				</div>
			    				<div class="form-group">
			    					<label for="phone">Phone Number</label>
			    					{!! Form::text('phone', null, array('placeholder' => 'Phone Number','class' => 'form-control')) !!}
			    				</div>
			    				<div class="form-group">
			    					<label for="mobile">Mobile Number</label>
			    					{!! Form::text('mobile', null, array('placeholder' => 'Mobile Number','class' => 'form-control')) !!}
			    				</div>
			    				<div class="form-group">
			    					<label for="inputName">Email</label>
			    					{!! Form::text('email', null, array('placeholder' => 'Email','class' => 'form-control')) !!}
			    				</div>
			    				<div class="form-group">
			    					<label for="inputName">Photo</label>
			    					{!! Form::file('picture', null, array('placeholder' => 'Employee Photo','class' => 'form-control')) !!}
			    				</div>
			    				<div class="form-group">
			    					<button type="submit" class="btn btn-info">Submit</button>
	                  				<a button type="button" class="btn btn-danger" href="{{ route('employee.index') }}">Cancel</a>
	                  			</div>
	                  			{!! Form::close() !!}
			    			</div>
			    			<div class="tab-pane fade" id="vert-tabs-family" role="tabpanel" aria-labelledby="vert-tabs-family-tab">
			    				<div class="row">
			    					<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#family">
         								Add Family
         							</button>
         							<div class="modal fade" id="family">
         								<div class="modal-dialog modal-lg">
         									<div class="modal-content">
         										<div class="modal-header">
								             		<h4 class="modal-title">New Family Member</h4>
								              		<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								                		<span aria-hidden="true">&times;</span>
								              		</button>
								            	</div>
								            	<div class="modal-body">
								            		{!! Form::open(array('route' => 'family.store','method'=>'POST')) !!}
                  									@csrf
								            		<div class="form-group row">
								                      	<label for="inputEmail" class="col-sm-2 col-form-label">First Name</label>
								                        <div class="col-sm-10">
								                          {!! Form::text('first_name', null, array('placeholder' => 'Name','class' => 'form-control')) !!}
								                        </div>
								                    </div>
								                    <div class="form-group row">
								                      	<label for="inputEmail" class="col-sm-2 col-form-label">Last Name</label>
								                        <div class="col-sm-10">
								                          {!! Form::text('last_name', null, array('placeholder' => 'Name','class' => 'form-control')) !!}
								                        </div>
								                    </div>
								                    <div class="form-group row">
								                      	<label for="inputEmail" class="col-sm-2 col-form-label">Relations</label>
								                        <div class="col-sm-10">
								                          {!! Form::text('relations', null, array('placeholder' => 'Name','class' => 'form-control')) !!}
								                        </div>
								                    </div>
								                    <div class="form-group row">
								                      	<label for="inputEmail" class="col-sm-2 col-form-label">Address</label>
								                        <div class="col-sm-10">
								                          {!! Form::text('address', null, array('placeholder' => 'Name','class' => 'form-control')) !!}
								                        </div>
								                    </div>
								                    <div class="form-group row">
								                      	<label for="inputEmail" class="col-sm-2 col-form-label">Phone</label>
								                        <div class="col-sm-10">
								                          {!! Form::text('phone', null, array('placeholder' => 'Name','class' => 'form-control')) !!}
								                        </div>
								                    </div>
								                    <div class="form-group row">
								                      	<label for="inputEmail" class="col-sm-2 col-form-label">Mobile</label>
								                        <div class="col-sm-10">
								                          {!! Form::text('mobile', null, array('placeholder' => 'Name','class' => 'form-control')) !!}
								                        </div>
								                    </div>
								                </div>
								                <div class="modal-footer justify-content-between">
								              		<button type="close" class="btn btn-default" data-dismiss="modal">Close</button>
								              		<button id="register" type="submit" class="btn btn-primary">Save changes</button>
								            	</div>
								            	{!! Form::close() !!}
								            </div>
								        </div>
								    </div>
         						</div>
         						<br>
         						<div class="row">
				            		<table id="family" class="table table-bordered table-hover">
				            			<thead>
					            			<tr>
					            				<th>First Name</th>
					            				<th>Last Name</th>
					            				<th>Relationship</th>
					            				<th>Address</th>
					            				<th>Phone</th>
					            				<th>Mobile</th>
					            				<th></th>
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
					            				<td></td>
					            			</tr>
					            		</tbody>
					            	</table>
					            </div>
				            </div>
				            <div class="tab-pane fade" id="vert-tabs-education" role="tabpanel" aria-labelledby="vert-tabs-education-tab">
				            	<div class="row">
			    					<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#education">
         								Add Education
         							</button>
         							<div class="modal fade" id="education">
         								<div class="modal-dialog modal-lg">
         									<div class="modal-content">
         										<div class="modal-header">
								             		<h4 class="modal-title">New Education</h4>
								              		<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								                		<span aria-hidden="true">&times;</span>
								              		</button>
								            	</div>
								            	<div class="modal-body">
								            		<div class="form-group row">
								                      	<label for="inputEmail" class="col-sm-2 col-form-label">Insitution Name</label>
								                        <div class="col-sm-10">
								                          {!! Form::text('institution', null, array('placeholder' => 'Name','class' => 'form-control')) !!}
								                        </div>
								                    </div>
								                    <div class="form-group row">
								                      	<label for="inputEmail" class="col-sm-2 col-form-label">Grade</label>
								                        <div class="col-sm-10">
								                          {!! Form::text('grade', null, array('placeholder' => 'Name','class' => 'form-control')) !!}
								                        </div>
								                    </div>
								                    <div class="form-group row">
								                      	<label for="inputEmail" class="col-sm-2 col-form-label">Major</label>
								                        <div class="col-sm-10">
								                          {!! Form::text('major', null, array('placeholder' => 'Name','class' => 'form-control')) !!}
								                        </div>
								                    </div>
								                    <div class="form-group row">
								                      	<label for="inputEmail" class="col-sm-2 col-form-label">GPA</label>
								                        <div class="col-sm-10">
								                          {!! Form::text('gpa', null, array('placeholder' => 'Name','class' => 'form-control')) !!}
								                        </div>
								                    </div>
								                </div>
								                <div class="modal-footer justify-content-between">
								              		<button type="close" class="btn btn-default" data-dismiss="modal">Close</button>
								              		<button id="register" type="submit" class="btn btn-primary">Save changes</button>
								            	</div>
								            </div>
								        </div>
								    </div>
         						</div>
         						<br>
         						<div class="row">
				            		<table id="education" class="table table-bordered table-hover">
				            			<thead>
					            			<tr>
					            				<th>Insitution</th>
					            				<th>Grade</th>
					            				<th>Major</th>
					            				<th>GPA</th>
					            				<th></th>
					            			</tr>
					            		</thead>
					            		<tbody>
					            			<tr>
					            				<td></td>
					            				<td></td>
					            				<td></td>
					            				<td></td>
					            				<td></td>
					            			</tr>
					            		</tbody>
					            	</table>
					            </div>
				            </div>
				            <div class="tab-pane fade" id="vert-tabs-training" role="tabpanel" aria-labelledby="vert-tabs-training-tab">
				            	<div class="row">
			    					<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#training">
         								Add Training
         							</button>
         							<div class="modal fade" id="training">
         								<div class="modal-dialog modal-lg">
         									<div class="modal-content">
         										<div class="modal-header">
								             		<h4 class="modal-title">New Training</h4>
								              		<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								                		<span aria-hidden="true">&times;</span>
								              		</button>
								            	</div>
								            	<div class="modal-body">
								            		<div class="form-group row">
								                      	<label for="inputEmail" class="col-sm-2 col-form-label">Training Provider</label>
								                        <div class="col-sm-10">
								                          {!! Form::text('institution', null, array('placeholder' => 'Name','class' => 'form-control')) !!}
								                        </div>
								                    </div>
								                    <div class="form-group row">
								                      	<label for="inputEmail" class="col-sm-2 col-form-label">Training Title</label>
								                        <div class="col-sm-10">
								                          {!! Form::text('grade', null, array('placeholder' => 'Name','class' => 'form-control')) !!}
								                        </div>
								                    </div>
								                    <div class="form-group row">
								                      	<label for="inputEmail" class="col-sm-2 col-form-label">Location</label>
								                        <div class="col-sm-10">
								                          {!! Form::text('major', null, array('placeholder' => 'Name','class' => 'form-control')) !!}
								                        </div>
								                    </div>
								                    <div class="form-group row">
								                      	<label for="inputEmail" class="col-sm-2 col-form-label">From</label>
								                        <div class="col-sm-10">
								                          {!! Form::text('gpa', null, array('placeholder' => 'Name','class' => 'form-control')) !!}
								                        </div>
								                    </div>
								                    <div class="form-group row">
								                      	<label for="inputEmail" class="col-sm-2 col-form-label">To</label>
								                        <div class="col-sm-10">
								                          {!! Form::text('gpa', null, array('placeholder' => 'Name','class' => 'form-control')) !!}
								                        </div>
								                    </div>
								                    <div class="form-group row">
								                      	<label for="inputEmail" class="col-sm-2 col-form-label">Status</label>
								                        <div class="col-sm-10">
								                          {!! Form::text('gpa', null, array('placeholder' => 'Name','class' => 'form-control')) !!}
								                        </div>
								                    </div>
								                    <div class="form-group row">
								                      	<label for="inputEmail" class="col-sm-2 col-form-label">Documentation</label>
								                        <div class="col-sm-10">
								                          {!! Form::text('gpa', null, array('placeholder' => 'Name','class' => 'form-control')) !!}
								                        </div>
								                    </div>
								                </div>
								                <div class="modal-footer justify-content-between">
								              		<button type="close" class="btn btn-default" data-dismiss="modal">Close</button>
								              		<button id="register" type="submit" class="btn btn-primary">Save changes</button>
								            	</div>
								            </div>
								        </div>
								    </div>
         						</div>
         						<br>
         						<div class="row">
				            		<table id="example2" class="table table-bordered table-hover">
				            			<thead>
					            			<tr>
					            				<th>Training Provider</th>
					            				<th>Training Title</th>
					            				<th>Location</th>
					            				<th>From</th>
					            				<th>To</th>
					            				<th>Status</th>
					            				<th>Documentation</th>
					            				<th></th>
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
					            				<td></td>
					            				<td></td>
					            			</tr>
					            		</tbody>
					            	</table>
					            </div>
				            </div>
				            <div class="tab-pane fade" id="vert-tabs-services" role="tabpanel" aria-labelledby="vert-tabs-services-tab">
				            	<div class="row">
			    					<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#services">
         								Add Record
         							</button>
         							<div class="modal fade" id="services">
         								<div class="modal-dialog modal-lg">
         									<div class="modal-content">
         										<div class="modal-header">
								             		<h4 class="modal-title">New Record</h4>
								              		<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								                		<span aria-hidden="true">&times;</span>
								              		</button>
								            	</div>
								            	<div class="modal-body">
								            		<div class="form-group row">
								                      	<label for="inputEmail" class="col-sm-2 col-form-label">Position</label>
								                        <div class="col-sm-10">
								                          {!! Form::text('institution', null, array('placeholder' => 'Name','class' => 'form-control')) !!}
								                        </div>
								                    </div>
								                    <div class="form-group row">
								                      	<label for="inputEmail" class="col-sm-2 col-form-label">Report To</label>
								                        <div class="col-sm-10">
								                          {!! Form::text('grade', null, array('placeholder' => 'Name','class' => 'form-control')) !!}
								                        </div>
								                    </div>
								                    <div class="form-group row">
								                      	<label for="inputEmail" class="col-sm-2 col-form-label">Grade</label>
								                        <div class="col-sm-10">
								                          {!! Form::text('major', null, array('placeholder' => 'Name','class' => 'form-control')) !!}
								                        </div>
								                    </div>
								                    <div class="form-group row">
								                      	<label for="inputEmail" class="col-sm-2 col-form-label">From</label>
								                        <div class="col-sm-10">
								                          {!! Form::text('gpa', null, array('placeholder' => 'Name','class' => 'form-control')) !!}
								                        </div>
								                    </div>
								                    <div class="form-group row">
								                      	<label for="inputEmail" class="col-sm-2 col-form-label">To</label>
								                        <div class="col-sm-10">
								                          {!! Form::text('gpa', null, array('placeholder' => 'Name','class' => 'form-control')) !!}
								                        </div>
								                    </div>
								                    <div class="form-group row">
								                      	<label for="inputEmail" class="col-sm-2 col-form-label">Salary</label>
								                        <div class="col-sm-10">
								                          {!! Form::text('gpa', null, array('placeholder' => 'Name','class' => 'form-control')) !!}
								                        </div>
								                    </div>
								                    <div class="form-group row">
								                      	<label for="inputEmail" class="col-sm-2 col-form-label">Contract</label>
								                        <div class="col-sm-10">
								                          {!! Form::text('gpa', null, array('placeholder' => 'Name','class' => 'form-control')) !!}
								                        </div>
								                    </div>
								                </div>
								                <div class="modal-footer justify-content-between">
								              		<button type="close" class="btn btn-default" data-dismiss="modal">Close</button>
								              		<button id="register" type="submit" class="btn btn-primary">Save changes</button>
								            	</div>
								            </div>
								        </div>
								    </div>
         						</div>
         						<br>
         						<div class="row">
				            		<table id="example2" class="table table-bordered table-hover">
				            			<thead>
					            			<tr>
					            				<th>Position</th>
					            				<th>Report To</th>
					            				<th>Grade</th>
					            				<th>From</th>
					            				<th>To</th>
					            				<th>Salary</th>
					            				<th>Contract</th>
					            				<th></th>
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
					            				<td></td>
					            				<td></td>
					            			</tr>
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