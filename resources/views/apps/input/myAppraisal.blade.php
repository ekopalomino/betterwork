@extends('apps.layouts.main')
@section('header.title')
Better Work Indonesia | Create New Appraisal
@endsection
@section('header.plugins')
<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
@endsection
@section('content')
<section class="content-header">
	<div class="container-fluid">
      	<div class="row mb-2">
       		<div class="col-sm-6">
          		<h1>Create New Appraisal</h1>
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
	            	<div class="col-md-6"> 
	            	{!! Form::open(array('route' => 'myAppraisal.store','method'=>'POST')) !!}
                  	@csrf
                  		<div class="form-group">
			    			<label for="phone">Appraisal Type</label>
			    			<select name="appraisal_type" class="form-control">
                          		<option value="0">Please Select</option>
						        <option value="6a792ef2-9002-414e-80f6-05f01adc3875">3 Month Probation</option>
						        <option value="663c8ca5-206f-4426-a1c5-610f903eb142">6 Month Probation</option>
						        <option value="33486784-509a-45bc-9833-b021ad5d4441">1 Year Contract</option>
						        <option value="2e9731fd-6544-44a1-b832-aab293e8804a">Permanent</option>
						    </select>
			    		</div>
                  		<div class="form-group">
			    			<label for="phone">Appraisal Period</label>
			    			{!! Form::date('period', '', array('id' => 'datepicker','class' => 'form-control')) !!}
			    		</div>
			        	<table id="one" class="table table-bordered table-hover">
			        		<thead>
			        			<tr>
			        				<th>Key Performance Indicator</th>
			        				<th style="width: 15px;"></th>
			        			</tr>
			        		</thead>
			        		<tbody>
			        			<tr>
			        				<td>{!! Form::text('kpi[]', null, array('id'=>'kpi','placeholder' => 'KPI','class' => 'form-control')) !!}</td>
			        				<td><button type="button" name="add" id="add" class="btn btn-sm btn-danger">Add</button></td>
			        			</tr>
			        		</tbody>
			        	</table>
			        </div>
			    </div>
			    <div class="form-group">
			    	<button type="submit" name="profile" class="btn btn-sm btn-success">Submit</button>
	            	<a button type="button" class="btn btn-sm btn-danger" href="{{ route('myAppraisal.index') }}">Cancel</a>
	            </div>
	            {!! Form::close() !!}	
		    </div>
		</div>
	</div>
</section>
@endsection
@section('footer.scripts')
<script type="text/javascript">
    $(document).ready(function(){    
      	var i=1;  
      	$('#add').click(function(){  
           	i++;  
           	$('#one').append('<tr id="row'+i+'" class="dynamic-added"><td>{!! Form::text('kpi[]', null, array('id'=>'kpi','placeholder' => 'Leave','class' => 'form-control')) !!}</td><td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></td></tr>')
            });
        });  
      
      	$(document).on('click', '.btn_remove', function(){  
           	var button_id = $(this).attr("id");   
           	$('#row'+button_id+'').remove();  
      	});  
</script>
@endsection