@extends('apps.layouts.main')
@section('header.title')
Better Work Indonesia | Create Receive Money
@endsection 
@section('content')
<section class="content-header">
	<div class="container-fluid">
      	<div class="row mb-2">
       		<div class="col-sm-6">
          		<h1>Create Receive Money</h1>
       		</div>
			<div class="col-sm-6">
				<ol class="breadcrumb float-sm-right">
					<li class="breadcrumb-item"><a href="{{ route('bank.index') }}">Bank Account</a></li>
					<li class="breadcrumb-item active">Receive Money</li>
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
					{!! Form::open(array('route' => 'receive.store','method'=>'POST')) !!}
            		@csrf
					<div class="row">
						<div class="col-2">
							<label>From</label>
							<input type="text" class="form-control" id="payee" name="payee" placeholder="Payee">
							{!! Form::hidden('bank', $bank->id, array('class' => 'form-control')) !!}
						</div>
						<div class="col-2">
							<label>Date</label>
							{!! Form::date('transaction_date', '', array('id' => 'datepicker','class' => 'form-control')) !!}
						</div>
						<div class="col-2">
							<label>Reference</label>
							<input type="text" class="form-control" id="reference" name="reference" placeholder="Reference">
						</div>
						<div class="col-2">
							<label>Amounts Are</label>
							<select name="tax_reference" class="form-control">
                          		<option value="0">Please Select</option>
						        <option value="1">Tax Inclusive</option>
						        <option value="2">Tax Exclusive</option>
								<option value="3">No Tax</option>
						    </select>
						</div>
					</div>
					<br>
					<div class="row">
						<div class="col-12">
							<table id="salary" class="table table-bordered table-hover">
								<thead>
									<tr>
										<th>Item</th>
										<th>Description</th>
										<th>Qty</th>
										<th>Unit Price</th>
										<th>Account</th>
										<th>Tax Rate</th>
										<th>Files</th>
										<th></th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td>{!! Form::text('item[]', null, array('id' => 'item', 'class' => 'form-control','required')) !!}</td>
										<td>{!! Form::text('description[]', null, array('class' => 'form-control','required')) !!}</td>
										<td>{!! Form::number('quantity[]', null, array('placeholder' => 'Quantity','class' => 'form-control','required')) !!}</td>
										<td>{!! Form::number('unit_price[]', null, array('placeholder' => 'Unit Price','class' => 'form-control','required')) !!}</td>
										<td>{!! Form::select('account[]', [null=>'Please Select'] + $coas,[], array('class' => 'form-control','required')) !!}</td>
										<td>{!! Form::number('tax[]', null, array('placeholder' => 'Tax Rate','class' => 'form-control','required')) !!}</td>
										<td>{!! Form::file('file[]', null, array('placeholder' => 'File','class' => 'form-control')) !!}</td>
										<td><button type="button" name="add" id="add" class="btn btn-success">Add</button></td>
									</tr>
								</tbody>
							</table>
						</div>
					</div>
					<br>
					<div class="form-group">
				    	<button type="submit" class="btn btn-sm btn-info">Submit</button>
		                <a button type="button" class="btn btn-sm btn-danger" href="{{ route('bank.index') }}">Cancel</a>
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
			'<tr id="row'+i+'" class="dynamic-added"><td>{!! Form::text('item[]', null, array('id' => 'item','class' => 'form-control','required')) !!}</td><td>{!! Form::text('description[]', null, array('class' => 'form-control','required')) !!}</td><td>{!! Form::number('quantity[]', null, array('placeholder' => 'Quantity','class' => 'form-control','required')) !!}</td><td>{!! Form::number('unit_price[]', null, array('placeholder' => 'Unit Price','class' => 'form-control','required')) !!}</td><td>{!! Form::select('account[]', [null=>'Please Select'] + $coas,[], array('class' => 'form-control','required')) !!}</td><td>{!! Form::number('tax[]', null, array('placeholder' => 'Tax Rate','class' => 'form-control','required')) !!}</td><td>{!! Form::file('file[]', null, array('placeholder' => 'File','class' => 'form-control')) !!}</td><td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></td></tr>')
            });
        });  
      
      	$(document).on('click', '.btn_remove', function(){  
           	var button_id = $(this).attr("id");   
           	$('#row'+button_id+'').remove();  
      	});  
</script>
@endsection