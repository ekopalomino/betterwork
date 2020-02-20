@extends('apps.layouts.main')
@section('header.title')
Better Work Indonesia | Update My Data
@endsection
@section('content')
<section class="content-header">
	<div class="container-fluid">
      	<div class="row mb-2">
       		<div class="col-sm-6">
          		<h1>Update My Data</h1>
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
		<div class="card card-danger card-outline">
			<div class="card-body">
				<div class="row">
					<div class="col-1 col-sm-1">
		                <div class="nav flex-column nav-tabs h-100" id="vert-tabs-tab" role="tablist" aria-orientation="vertical">
		                	<a class="nav-link active" id="vert-tabs-profile-tab" data-toggle="pill" href="#vert-tabs-profile" role="tab" aria-controls="vert-tabs-profile" aria-selected="true">Profile</a>
		                	<a class="nav-link" id="vert-tabs-family-tab" data-toggle="pill" href="#vert-tabs-family" role="tab" aria-controls="vert-tabs-family" aria-selected="false">Family</a>
		                	<a class="nav-link" id="vert-tabs-education-tab" data-toggle="pill" href="#vert-tabs-education" role="tab" aria-controls="vert-tabs-education" aria-selected="false">Education</a>
		                </div>
		            </div>
		            <div class="col-11 col-sm-11">
		            	<div class="tab-content" id="vert-tabs-tabContent">
		            		<div class="tab-pane text-left fade show active" id="vert-tabs-profile" role="tabpanel" aria-labelledby="vert-tabs-profile-tab">
		            			{!! Form::model($data, ['method' => 'POST','route' => ['employee.update', $data->id],'files'=> 'true']) !!}
                  				@csrf
		            			<div class="form-group">
			    					<label for="firstName">First Name</label>
			    					{!! Form::text('first_name', null, array('placeholder' => 'First Name','class' => 'form-control','readonly')) !!}
			    				</div>
			    				<div class="form-group">
			    					<label for="lastName">Last Name</label>
			    					{!! Form::text('last_name', null, array('placeholder' => 'Last Name','class' => 'form-control','readonly')) !!}
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
			    					<label for="sex">Tax Category</label>
			    					<select name="tax_category" class="form-control">
                          				<option value="0" {{ old('tax_category',$data->tax_category)=='0' ? 'selected' : ''  }}>Please Select</option>
						                <option value="1" {{ old('tax_category',$data->tax_category)=='1' ? 'selected' : ''  }}>S0</option>
						                <option value="2" {{ old('tax_category',$data->tax_category)=='2' ? 'selected' : ''  }}>S1</option>
						                <option value="3" {{ old('tax_category',$data->tax_category)=='3' ? 'selected' : ''  }}>S2</option>
						                <option value="4" {{ old('tax_category',$data->tax_category)=='4' ? 'selected' : ''  }}>S3</option>
						                <option value="5" {{ old('tax_category',$data->tax_category)=='5' ? 'selected' : ''  }}>M0</option>
						                <option value="6" {{ old('tax_category',$data->tax_category)=='6' ? 'selected' : ''  }}>M1</option>
						                <option value="7" {{ old('tax_category',$data->tax_category)=='7' ? 'selected' : ''  }}>M2</option>
						                <option value="8" {{ old('tax_category',$data->tax_category)=='8' ? 'selected' : ''  }}>M3</option>
						            </select>
			    				</div>
			    				<div class="form-group">
			    					<label for="idCard">Tax No</label>
			    					{!! Form::text('tax_no', null, array('placeholder' => 'Tax No','class' => 'form-control')) !!}
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
			    					{!! Form::text('email', null, array('placeholder' => 'Email','class' => 'form-control','readonly')) !!}
			    				</div>
			    				<div class="form-group">
			    					<label for="inputName">Photo</label>
			    					<div class="input-group">
									   	<div class="custom-file">
	                        				<input type="file" class="custom-file-input" id="picture" name="picture">
	                        				<label class="custom-file-label" for="picture">Choose Photo</label>
	                      				</div>
	                      			</div>
			    				</div>
			    				<div class="form-group">
			    					<button name="profile" type="submit" class="btn btn-sm btn-primary">Save changes</button>
	                  				<a button type="button" class="btn btn-sm btn-danger" href="{{ route('userHome.index') }}">Cancel</a>
	                  			</div>
	                  			{!! Form::close() !!}
			    			</div>
			    			<div class="tab-pane fade" id="vert-tabs-family" role="tabpanel" aria-labelledby="vert-tabs-family-tab">
			    				<div class="row">
			    					<button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#family">
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
								            		{!! Form::model($data, ['method' => 'POST','route' => ['employee.update', $data->id]]) !!}
                  									@csrf
                  									{!! Form::hidden('employee_id',$data->id) !!}
								            		<div class="form-group row">
								                      	<label for="inputEmail" class="col-sm-2 col-form-label">First Name</label>
								                        <div class="col-sm-10">
								                          	<input type="text" name="first_name" placeholder="First Name" class="form-control">
								                        </div>
								                    </div>
								                    <div class="form-group row">
								                      	<label for="inputEmail" class="col-sm-2 col-form-label">Last Name</label>
								                        <div class="col-sm-10">
								                          	<input type="text" name="last_name" placeholder="Last Name" class="form-control">
								                        </div>
								                    </div>
								                    <div class="form-group row">
								                      	<label for="inputEmail" class="col-sm-2 col-form-label">Relations</label>
								                        <div class="col-sm-10">
								                          	<select name="relations" class="form-control">
						                          				<option value="0">Please Select</option>
												                <option value="1">Husband</option>
												                <option value="2">Wife</option>
												                <option value="3">Parent</option>
												                <option value="4">Sibling</option>
												            </select>
								                        </div>
								                    </div>
								                    <div class="form-group row">
								                      	<label for="inputEmail" class="col-sm-2 col-form-label">Address</label>
								                        <div class="col-sm-10">
								                          	<input type="text" name="address" placeholder="Address" class="form-control">
								                        </div>
								                    </div>
								                    <div class="form-group row">
								                      	<label for="inputEmail" class="col-sm-2 col-form-label">Phone</label>
								                        <div class="col-sm-10">
								                          	<input type="text" name="phone" placeholder="Phone" class="form-control">
								                        </div>
								                    </div>
								                    <div class="form-group row">
								                      	<label for="inputEmail" class="col-sm-2 col-form-label">Mobile</label>
								                        <div class="col-sm-10">
								                          	<input type="text" name="mobile" placeholder="Mobile" class="form-control">
								                        </div>
								                    </div>
								                </div>
								                <div class="modal-footer">
								              		<button type="close" class="btn btn-default" data-dismiss="modal">Close</button>
								              		<button name="family" type="submit" class="btn btn-primary">Save changes</button>
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
					            			@foreach($data->Child as $child)
					            			<tr>
					            				<td>{{ $child->first_name}}</td>
					            				<td>{{ $child->last_name}}</td>
					            				<td>
					            					@if(($child->relations) == '1')
					            					Husband
					            					@elseif(($child->relations) == '2')
					            					Wife
					            					@elseif(($child->relations) == '3')
					            					Parent
					            					@elseif(($child->relations) == '4')
					            					Sibling
					            					@else
					            					No Relation
					            					@endif
					            				</td>
					            				<td>{{ $child->address}}</td>
					            				<td>{{ $child->phone}}</td>
					            				<td>{{ $child->mobile}}</td>
					            				<td>
					            					<a class="btn btn-xs btn-success modalLg" href="#" value="{{ action('Apps\HumanResourcesController@familyEdit',['id'=>$child->id]) }}" data-toggle="modal" data-target="#modalLg"><i class="fa fa-edit"></i></a>
					            				</td>
					            			</tr>
					            			@endforeach
					            		</tbody>
					            	</table>
					            </div>
				            </div>
				            <div class="tab-pane fade" id="vert-tabs-education" role="tabpanel" aria-labelledby="vert-tabs-education-tab">
				            	<div class="row">
			    					<button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#education">
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
								            		{!! Form::model($data, ['method' => 'POST','route' => ['employee.update', $data->id]]) !!}
                  									@csrf
                  									{!! Form::hidden('employee_id',$data->id) !!}
								            		<div class="form-group row">
								                      	<label for="inputEmail" class="col-sm-2 col-form-label">Insitution Name</label>
								                        <div class="col-sm-10">
								                          	<input type="text" name="institution_name" placeholder="Insitution Name" class="form-control">
								                        </div>
								                    </div>
								                    <div class="form-group row">
								                      	<label for="inputEmail" class="col-sm-2 col-form-label">Degree</label>
								                        <div class="col-sm-10"> 
								                        	{!! Form::select('degree', [null=>'Please Select'] + $degrees,[], array('class' => 'form-control')) !!}
								                        </div>
								                    </div>
													<div class="form-group row">
								                      	<label for="inputEmail" class="col-sm-2 col-form-label">Date of Graduate</label>
								                        <div class="col-sm-10"> 
								                        	{!! Form::date('date_of_graduate', '', array('id' => 'datepicker','class' => 'form-control')) !!}
								                        </div>
								                    </div>
								                    <div class="form-group row">
								                      	<label for="inputEmail" class="col-sm-2 col-form-label">Major</label>
								                        <div class="col-sm-10">
								                        	<input type="text" name="major" placeholder="Major" class="form-control">
								                        </div>
								                    </div>
								                    <div class="form-group row">
								                      	<label for="inputEmail" class="col-sm-2 col-form-label">GPA</label>
								                        <div class="col-sm-10">
								                        	<input type="text" name="gpa" placeholder="GPA" class="form-control">
								                        </div>
								                    </div>
								                </div>
								                <div class="modal-footer">
								              		<button type="close" class="btn btn-default" data-dismiss="modal">Close</button>
								              		<button name="education" type="submit" class="btn btn-primary">Save changes</button>
								            	</div>
								            	{!! Form::close() !!}
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
					            			@foreach($data->Educations as $value)
					            			<tr>
					            				<td>{{ $value->institution_name }}</td>
					            				<td>{{ $value->grade }}</td>
					            				<td>{{ $value->major }}</td>
					            				<td>{{ $value->gpa }}</td>
					            				<td>
					            					<a class="btn btn-xs btn-success modalLg" href="#" value="{{ action('Apps\HumanResourcesController@educationEdit',['id'=>$value->id]) }}" data-toggle="modal" data-target="#modalLg"><i class="fa fa-edit"></i></a>
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
		    </div>
		</div>
	</div>
</section>
@endsection
@section('footer.scripts')
<script src="{{ asset('public/bower_components/admin-lte/plugins/bs-custom-file-input/bs-custom-file-input.min.js') }}"></script>
<script type="text/javascript">
$(document).ready(function () {
  	bsCustomFileInput.init();
});
</script>
@endsection