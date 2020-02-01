@extends('apps.layouts.main')
@section('header.title')
Better Work Indonesia | Create New Employee
@endsection
@section('header.plugins')
<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
@endsection
@section('content')
<section class="content-header">
	<div class="container-fluid">
      	<div class="row mb-2">
       		<div class="col-sm-6">
          		<h1>Create New Employee</h1>
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
		                	<a class="nav-link active" id="vert-tabs-profile-tab" data-toggle="pill" href="#vert-tabs-home" role="tab" aria-controls="vert-tabs-profile" aria-selected="true">Profile</a>
		                	<a class="nav-link" id="vert-tabs-family-tab" data-toggle="pill" href="#vert-tabs-family" role="tab" aria-controls="vert-tabs-family" aria-selected="false">Family</a>
		                	<a class="nav-link" id="vert-tabs-education-tab" data-toggle="pill" href="#vert-tabs-education" role="tab" aria-controls="vert-tabs-education" aria-selected="false">Education</a>
		                	<a class="nav-link" id="vert-tabs-training-tab" data-toggle="pill" href="#vert-tabs-training" role="tab" aria-controls="vert-tabs-training" aria-selected="false">Training</a>
		                	<a class="nav-link" id="vert-tabs-services-tab" data-toggle="pill" href="#vert-tabs-services" role="tab" aria-controls="vert-tabs-services" aria-selected="false">Services</a>
		                </div>
		            </div>
		            <div class="col-11 col-sm-11">
		            	<div class="tab-content" id="vert-tabs-tabContent">
		            		<div class="tab-pane text-left fade show active" id="vert-tabs-profile" role="tabpanel" aria-labelledby="vert-tabs-profile-tab">
		            			<div class="form-group">
			    					<label for="inputName">Employee ID</label>
			    					<input type="text" id="inputName" class="form-control">
			    				</div>
			    				<div class="form-group">
			    					<label for="inputName">First Name</label>
			    					<input type="text" id="inputName" class="form-control">
			    				</div>
			    				<div class="form-group">
			    					<label for="inputName">Last Name</label>
			    					<input type="text" id="inputName" class="form-control">
			    				</div>
			    				<div class="form-group">
			    					<label for="inputName">Place Of Birth</label>
			    					<input type="text" id="inputName" class="form-control">
			    				</div>
			    				<div class="form-group">
			    					<label for="inputName">Date Of Birth</label>
			    					<input type="text" id="inputName" class="form-control">
			    				</div>
			    				<div class="form-group">
			    					<label for="inputName">ID Card (KTP)</label>
			    					<input type="text" id="inputName" class="form-control">
			    				</div>
			    				<div class="form-group">
			    					<label for="inputName">Sex</label>
			    					<input type="text" id="inputName" class="form-control">
			    				</div>
			    				<div class="form-group">
			    					<label for="inputName">Marital Status</label>
			    					<input type="text" id="inputName" class="form-control">
			    				</div>
			    				<div class="form-group">
			    					<label for="inputName">Address</label>
			    					<input type="text" id="inputName" class="form-control">
			    				</div>
			    				<div class="form-group">
			    					<label for="inputName">Phone Number</label>
			    					<input type="text" id="inputName" class="form-control">
			    				</div>
			    				<div class="form-group">
			    					<label for="inputName">Mobile Number</label>
			    					<input type="text" id="inputName" class="form-control">
			    				</div>
			    				<div class="form-group">
			    					<label for="inputName">Email</label>
			    					<input type="text" id="inputName" class="form-control">
			    				</div>
			    				<div class="form-group">
			    					<label for="inputName">Picture</label>
			    					<input type="text" id="inputName" class="form-control">
			    				</div>
			    			</div>
			    			<div class="tab-pane fade" id="vert-tabs-family" role="tabpanel" aria-labelledby="vert-tabs-family-tab">
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
				            				<td>{!! Form::text('first_name[]', null, array('placeholder' => 'First Name','id' => 'first_name','class' => 'form-control')) !!}</td>
				            				<td>{!! Form::text('last_name[]', null, array('placeholder' => 'Last Name','class' => 'form-control')) !!}</td>
				            				<td>{!! Form::text('relationship[]', null, array('placeholder' => 'Relationship','class' => 'form-control')) !!}</td>
				            				<td>{!! Form::text('address[]', null, array('placeholder' => 'Address','class' => 'form-control')) !!}</td>
				            				<td>{!! Form::text('phone[]', null, array('placeholder' => 'Phone','class' => 'form-control')) !!}</td>
				            				<td>{!! Form::text('mobile[]', null, array('placeholder' => 'Mobile','class' => 'form-control')) !!}</td>
				            				<td><button type="button" name="add" id="add" class="btn btn-success">Add</button></td>
				            			</tr>
				            		</tbody>
				            	</table>
				            </div>
				            <div class="tab-pane fade" id="vert-tabs-education" role="tabpanel" aria-labelledby="vert-tabs-family-tab">
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
				            				<td>{!! Form::text('institution[]', null, array('placeholder' => 'Institution','id' => 'institution','class' => 'form-control')) !!}</td>
				            				<td>{!! Form::text('grade[]', null, array('placeholder' => 'Grade','class' => 'form-control')) !!}</td>
				            				<td>{!! Form::text('major[]', null, array('placeholder' => 'Major','class' => 'form-control')) !!}</td>
				            				<td>{!! Form::text('gpa[]', null, array('placeholder' => 'GPA','class' => 'form-control')) !!}</td>
				            				<td><button type="button" name="add" id="add" class="btn btn-success">Add</button></td>
				            			</tr>
				            		</tbody>
				            	</table>
				            </div>
				            <div class="tab-pane fade" id="vert-tabs-training" role="tabpanel" aria-labelledby="vert-tabs-family-tab">
			            		<table id="example2" class="table table-bordered table-hover">
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
				            <div class="tab-pane fade" id="vert-tabs-services" role="tabpanel" aria-labelledby="vert-tabs-family-tab">
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
    <div class="row">
        <div class="col-12">
    	    <a href="#" class="btn btn-secondary">Cancel</a>
        	<input type="submit" value="Create new Porject" class="btn btn-success float-right">
        </div>
    </div>
    <br>
</section>
@endsection
@section('footer.scripts')
<script type="text/javascript">
	$(document).ready(function(){ 
	var i=1;
		$('#add').click(function(){ 
			i++;
			$('#family').append('<tr id="row'+i+'" class="dynamic-added"><td>{!! Form::text('first_name[]', null, array('placeholder' => 'First Name','id' => 'first_name','class' => 'form-control')) !!}</td><td>{!! Form::text('last_name[]', null, array('placeholder' => 'Last Name','class' => 'form-control')) !!}</td><td>{!! Form::text('relationship[]', null, array('placeholder' => 'Relationship','class' => 'form-control')) !!}</td><td>{!! Form::text('address[]', null, array('placeholder' => 'Address','class' => 'form-control')) !!}</td><td>{!! Form::text('phone[]', null, array('placeholder' => 'Phone','class' => 'form-control')) !!}</td><td>{!! Form::text('mobile[]', null, array('placeholder' => 'Mobile','class' => 'form-control')) !!}</td><td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></td></tr>')
        });

      	$(document).on('click', '.btn_remove', function(){  
           var button_id = $(this).attr("id");   
           $('#row'+button_id+'').remove(); 
        }); 
    });
</script>
<script type="text/javascript">
	$(document).ready(function(){ 
	var i=1;
		$('#add').click(function(){ 
			i++;
			$('#education').append('<tr id="row'+i+'" class="dynamic-added"><td>{!! Form::text('institution[]', null, array('placeholder' => 'Institution','id' => 'institution','class' => 'form-control')) !!}</td><td>{!! Form::text('grade[]', null, array('placeholder' => 'Grade','class' => 'form-control')) !!}</td><td>{!! Form::text('major[]', null, array('placeholder' => 'Major','class' => 'form-control')) !!}</td><td>{!! Form::text('gpa[]', null, array('placeholder' => 'GPA','class' => 'form-control')) !!}</td><td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></td></tr>')
        });
      
      	$(document).on('click', '.btn_remove', function(){  
           var button_id = $(this).attr("id");   
           $('#row'+button_id+'').remove(); 
        });
    });
</script>
@endsection