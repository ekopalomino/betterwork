@extends('apps.layouts.main')
@section('header.title')
Better Work Indonesia | Create Transaction
@endsection
@section('content')
<section class="content-header">
	<div class="container-fluid">
      	<div class="row mb-2">
       		<div class="col-sm-6">
          		<h1>Create Transaction</h1>
       		</div>
       	</div>
    </div>
</section>
<section class="content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-12">
				<div class="card card-danger card-outline">
					<div class="card-body">
						{!! Form::open(array('route' => 'salary.store','method'=>'POST')) !!}
						@csrf
						
						<table id="salary" class="table table-bordered table-hover">
							<thead>
								<tr>
									<th>Account Name</th>
									<th>Payee</th>
									<th>Description</th>
									<th>Amount</th>
									<th></th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td>{!! Form::text('account_name[]', null, array('id' => 'employee', 'class' => 'form-control','required')) !!}</td>
									<td>{!! Form::number('nett_salary[]', null, array('placeholder' => 'Nett Salary','class' => 'form-control','required')) !!}</td>
									<td>{!! Form::number('leave_balance[]', null, array('placeholder' => 'Leave Balance','class' => 'form-control','required')) !!}</td>
									<td>{!! Form::number('reward[]', null, array('placeholder' => 'Reward','class' => 'form-control','required')) !!}</td>
									<td><button type="button" name="add" id="add" class="btn btn-success">Add</button></td>
								</tr>
							</tbody>
						</table>
						<br>
						<div class="form-group">
							<button type="submit" class="btn btn-sm btn-info">Submit</button>
							<a button type="button" class="btn btn-sm btn-danger" href="{{ route('salary.index') }}">Cancel</a>
						</div>
						{!! Form::close() !!}
					</div>
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
           	$('#salary').append('<tr id="row'+i+'" class="dynamic-added"><td>{!! Form::text('account_name[]', null, array('id' => 'employee', 'class' => 'form-control','required')) !!}</td><td>{!! Form::number('nett_salary[]', null, array('placeholder' => 'Nett Salary','class' => 'form-control','required')) !!}</td><td>{!! Form::number('leave_balance[]', null, array('placeholder' => 'Leave Balance','class' => 'form-control','required')) !!}</td><td>{!! Form::number('reward[]', null, array('placeholder' => 'Reward','class' => 'form-control','required')) !!}</td><td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></td></tr>')
            });
        });  
      
      	$(document).on('click', '.btn_remove', function(){  
           	var button_id = $(this).attr("id");   
           	$('#row'+button_id+'').remove();  
      	});  
</script>
@endsection