@extends('apps.layouts.main')
@section('header.title')
Better Work Indonesia | Edit Account Transaction
@endsection
@section('content')
<section class="content-header">
	<div class="container-fluid">
      	<div class="row mb-2">
       		<div class="col-sm-6">
          		<h1>Edit Account Transaction</h1>
       		</div>
       	</div>
    </div>
</section>
<section class="content">
	<div class="row">
		<div class="col-12">
			<div class="card card-danger card-outline">
				<div class="card-body">
					{!! Form::model($data, ['method' => 'POST','route' => ['accTransaction.update', $data->id]]) !!}
            		@csrf
					<div class="row">
						<div class="col-2">
							<label>Payee</label>
							{!! Form::text('payee', null, array('class' => 'form-control')) !!}
						</div>
						<div class="col-2">
							<label>Date</label>
							{!! Form::date('transaction_date', old('transaction_date'), array('id' => 'datepicker','class' => 'form-control')) !!}
						</div>
						<div class="col-2">
							<label>Reference</label>
							{!! Form::text('reference_no', null, array('class' => 'form-control')) !!}
						</div>
						<div class="col-2">
							<label>Bank Account</label>
							{!! Form::select('bank', [null=>'Please Select'] + $bank,[], array('class' => 'form-control')) !!}
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
									@foreach($detail as $key=>$value) 
									<tr>
										<td>{!! Form::text('item[]', $value->item, array('id' => 'item', 'class' => 'form-control','required')) !!}</td>
										<td>{!! Form::text('description[]', $value->description, array('class' => 'form-control','required')) !!}</td>
										<td>{!! Form::number('quantity[]', $value->quantity, array('placeholder' => 'Quantity','class' => 'form-control','required')) !!}</td>
										<td>{!! Form::number('unit_price[]', $value->unit_price, array('placeholder' => 'Unit Price','class' => 'form-control','required')) !!}</td>
										<td>{!! Form::select('account[]', $coas,$value->account_name, array('class' => 'form-control','required')) !!}</td>
										<td>{!! Form::number('tax[]', $value->tax_rate, array('placeholder' => 'Tax Rate','class' => 'form-control')) !!}</td>
										<td>{!! Form::file('file[]', null, array('placeholder' => 'File','class' => 'form-control')) !!}</td>
										<td>
											{{ Form::hidden('id', $key+1) }}
											{{ Form::hidden('type', $value->trans_type) }}
											<input type="button" value="Delete" class="btn btn-danger" onclick="deleteRow(this)">
										</td>
									</tr>
									@endforeach
									<!-- <tr>
										<td>{!! Form::text('item[]', null, array('id' => 'item', 'class' => 'form-control','required')) !!}</td>
										<td>{!! Form::text('description[]', null, array('class' => 'form-control','required')) !!}</td>
										<td>{!! Form::number('quantity[]', null, array('placeholder' => 'Quantity','class' => 'form-control','required')) !!}</td>
										<td>{!! Form::number('unit_price[]', null, array('placeholder' => 'Unit Price','class' => 'form-control','required')) !!}</td>
										<td>{!! Form::select('account[]', $coas,$value->account_name, array('class' => 'form-control','required')) !!}</td>
										<td>{!! Form::number('tax[]', null, array('placeholder' => 'Tax Rate','class' => 'form-control','required')) !!}</td>
										<td>{!! Form::file('file[]', null, array('placeholder' => 'File','class' => 'form-control')) !!}</td>
										<td>
											<input type="button" value="Delete" class="btn btn-danger" onclick="deleteRow(this)">
										</td>
									</tr>
									<tr>
										<td>{!! Form::text('item[]', null, array('id' => 'item', 'class' => 'form-control','required')) !!}</td>
										<td>{!! Form::text('description[]', null, array('class' => 'form-control','required')) !!}</td>
										<td>{!! Form::number('quantity[]', null, array('placeholder' => 'Quantity','class' => 'form-control','required')) !!}</td>
										<td>{!! Form::number('unit_price[]', null, array('placeholder' => 'Unit Price','class' => 'form-control','required')) !!}</td>
										<td>{!! Form::select('account[]', $coas,$value->account_name, array('class' => 'form-control','required')) !!}</td>
										<td>{!! Form::number('tax[]', null, array('placeholder' => 'Tax Rate','class' => 'form-control','required')) !!}</td>
										<td>{!! Form::file('file[]', null, array('placeholder' => 'File','class' => 'form-control')) !!}</td>
										<td>
											<input type="button" value="Delete" class="btn btn-danger" onclick="deleteRow(this)">
										</td>
									</tr>
									<tr>
										<td>{!! Form::text('item[]', null, array('id' => 'item', 'class' => 'form-control','required')) !!}</td>
										<td>{!! Form::text('description[]', null, array('class' => 'form-control','required')) !!}</td>
										<td>{!! Form::number('quantity[]', null, array('placeholder' => 'Quantity','class' => 'form-control','required')) !!}</td>
										<td>{!! Form::number('unit_price[]', null, array('placeholder' => 'Unit Price','class' => 'form-control','required')) !!}</td>
										<td>{!! Form::select('account[]', $coas,$value->account_name, array('class' => 'form-control','required')) !!}</td>
										<td>{!! Form::number('tax[]', null, array('placeholder' => 'Tax Rate','class' => 'form-control','required')) !!}</td>
										<td>{!! Form::file('file[]', null, array('placeholder' => 'File','class' => 'form-control')) !!}</td>
										<td>
											<input type="button" value="Delete" class="btn btn-danger" onclick="deleteRow(this)">
										</td>
									</tr>
									<tr>
										<td>{!! Form::text('item[]', null, array('id' => 'item', 'class' => 'form-control','required')) !!}</td>
										<td>{!! Form::text('description[]', null, array('class' => 'form-control','required')) !!}</td>
										<td>{!! Form::number('quantity[]', null, array('placeholder' => 'Quantity','class' => 'form-control','required')) !!}</td>
										<td>{!! Form::number('unit_price[]', null, array('placeholder' => 'Unit Price','class' => 'form-control','required')) !!}</td>
										<td>{!! Form::select('account[]', $coas,$value->account_name, array('class' => 'form-control','required')) !!}</td>
										<td>{!! Form::number('tax[]', null, array('placeholder' => 'Tax Rate','class' => 'form-control','required')) !!}</td>
										<td>{!! Form::file('file[]', null, array('placeholder' => 'File','class' => 'form-control')) !!}</td>
										<td>
											<input type="button" value="Delete" class="btn btn-danger" onclick="deleteRow(this)">
										</td>
									</tr>
									<tr>
										<td>{!! Form::text('item[]', null, array('id' => 'item', 'class' => 'form-control','required')) !!}</td>
										<td>{!! Form::text('description[]', null, array('class' => 'form-control','required')) !!}</td>
										<td>{!! Form::number('quantity[]', null, array('placeholder' => 'Quantity','class' => 'form-control','required')) !!}</td>
										<td>{!! Form::number('unit_price[]', null, array('placeholder' => 'Unit Price','class' => 'form-control','required')) !!}</td>
										<td>{!! Form::select('account[]', $coas,$value->account_name, array('class' => 'form-control','required')) !!}</td>
										<td>{!! Form::number('tax[]', null, array('placeholder' => 'Tax Rate','class' => 'form-control','required')) !!}</td>
										<td>{!! Form::file('file[]', null, array('placeholder' => 'File','class' => 'form-control')) !!}</td>
										<td>
											<input type="button" value="Delete" class="btn btn-danger" onclick="deleteRow(this)">
										</td>
									</tr> -->
								</tbody>
							</table>
						</div>
					</div>
					<br>
					<div class="form-group">
				    	<button type="submit" class="btn btn-sm btn-success">Update</button>
		                <a button type="button" class="btn btn-sm btn-danger" href="{{ url()->previous() }}">Cancel</a>
		            </div>
		            {!! Form::close() !!}
				</div>
			</div>
		</div>
	</div>
</section>
@endsection
@section('footer.scripts')
<script>
function deleteRow(r) {
  var i = r.parentNode.parentNode.rowIndex;
  document.getElementById("salary").deleteRow(i);
}
</script>
@endsection