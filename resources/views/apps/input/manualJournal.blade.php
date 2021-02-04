@extends('apps.layouts.main')
@section('header.title')
Better Work Indonesia | Create Manual Journal
@endsection 
@section('content')
<section class="content-header">
	<div class="container-fluid">
      	<div class="row mb-2">
       		<div class="col-sm-6">
          		<h1>Create Manual Journal</h1>
       		</div>
			<div class="col-sm-6">
				<ol class="breadcrumb float-sm-right">
					<li class="breadcrumb-item"><a href="{{ route('manualJournal.index') }}">Manual Journals</a></li>
					<li class="breadcrumb-item active">Create Manual Journal</li>
				</ol>
			</div>
       	</div>
    </div>
</section>
<section class="content">
	<div class="row">
		<div class="col-12">
			<div class="card card-danger card-outline">
				<div class="card-body">
					{!! Form::open(array('route' => 'manualJournal.store','method'=>'POST')) !!}
            		@csrf
					<div class="row">
						<div class="col-2">
							<label>To</label>
							<input type="text" class="form-control" id="payee" name="payee" placeholder="Payee">
						</div>
						<div class="col-2">
							<label>Transaction Date</label>
							{!! Form::date('transaction_date', '', array('id' => 'datepicker','class' => 'form-control')) !!}
						</div>
						<div class="col-5">
							<label>Narration</label>
							<input type="text" class="form-control" id="reference" name="reference" placeholder="Reference">
						</div>
					</div>
					<br>
					<div class="row">
						<div class="col-12">
							<table id="salary" class="table table-bordered table-hover">
								<thead>
									<tr>
										<th>Item</th>
										<th>Debit Account</th>
										<th>Credit Account</th>
										<th>Debit</th>
										<th>Credit</th>
										<th></th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td>{!! Form::text('item[]', null, array('id' => 'item', 'class' => 'form-control','required')) !!}</td>
										<td>{!! Form::select('debit_account[]', [null=>'Please Select'] + $coas,[], array('class' => 'form-control','required')) !!}</td>
										<td>{!! Form::select('credit_account[]', [null=>'Please Select'] + $coas,[], array('class' => 'form-control','required')) !!}</td>
										<td>{!! Form::number('debit[]', null, array('placeholder' => 'Unit Price','class' => 'form-control','required')) !!}</td>
										<td>{!! Form::number('credit[]', null, array('placeholder' => 'Unit Price','class' => 'form-control','required')) !!}</td>
										<td><button type="button" name="add" id="add" class="btn btn-sm btn-success">Add</button></td>
									</tr>
								</tbody>
							</table>
						</div>
					</div>
					<br>
					<div class="form-group">
				    	<button type="submit" class="btn btn-sm btn-success">Submit</button>
		                <a button type="button" class="btn btn-sm btn-danger" href="{{ route('manualJournal.index') }}">Cancel</a>
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
           	$('#salary').append(
			'<tr id="row'+i+'" class="dynamic-added"><td>{!! Form::text('item[]', null, array('id' => 'item','class' => 'form-control','required')) !!}</td><td>{!! Form::select('debit_account[]', [null=>'Please Select'] + $coas,[], array('class' => 'form-control','required')) !!}</td><td>{!! Form::select('credit_account[]', [null=>'Please Select'] + $coas,[], array('class' => 'form-control','required')) !!}</td><td>{!! Form::number('debit[]', null, array('placeholder' => 'Unit Price','class' => 'form-control','required')) !!}</td><td>{!! Form::number('credit[]', null, array('placeholder' => 'Unit Price','class' => 'form-control','required')) !!}</td><td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></td></tr>')
            });
        });  
      
      	$(document).on('click', '.btn_remove', function(){  
           	var button_id = $(this).attr("id");   
           	$('#row'+button_id+'').remove();  
      	});  
</script>
@endsection