@extends('apps.layouts.main')
@section('header.title')
Better Work Indonesia | Create Development Objectives
@endsection
@section('content')
<section class="content-header">
	<div class="container-fluid">
      	<div class="row mb-2">
       		<div class="col-sm-6">
          		<h1>Create Development Objectives</h1>
       		</div>
       	</div>
    </div>
</section>
<section class="content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-12">
				<div class="card-body">
					{!! Form::open(array('route' => 'myDevelopment.store','method'=>'POST')) !!}
            		@csrf
					<table id="salary" class="table table-bordered table-hover">
						<thead>
							<tr>
								<th>Course Undertaken</th>
								<th>Course Outcome</th>
								<th></th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td>{!! Form::text('course[]', null, array('id' => 'course', 'class' => 'form-control','required')) !!}</td>
								<td>{!! Form::textarea('outcome[]', null, array('class' => 'form-control','required')) !!}{!! Form::hidden('appraisal_id[]', $data->id, array('class' => 'form-control','required')) !!}</td>
								<td><button type="button" name="add" id="add" class="btn btn-success">Add</button></td>
							</tr>
						</tbody>
					</table>
					<br>
					<div class="form-group">
				    	<button type="submit" class="btn btn-info">Submit</button>
		                <a button type="button" class="btn btn-danger" href="{{ route('salary.index') }}">Cancel</a>
		            </div>
		            {!! Form::close() !!}
				</div>
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
           	$('#salary').append('<tr id="row'+i+'" class="dynamic-added"><td>{!! Form::text('course[]', null, array('id' => 'course', 'class' => 'form-control','required')) !!}</td><td>{!! Form::textarea('outcome[]', null, array('class' => 'form-control','required')) !!}{!! Form::hidden('appraisal_id[]', $data->id, array('class' => 'form-control','required')) !!}</td><td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></td></tr>')
            });
        });  
      
      	$(document).on('click', '.btn_remove', function(){  
           	var button_id = $(this).attr("id");   
           	$('#row'+button_id+'').remove();  
      	});  
</script>
@endsection