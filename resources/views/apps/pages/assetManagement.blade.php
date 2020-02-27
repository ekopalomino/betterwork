@extends('apps.layouts.main')
@section('header.title')
Better Work Indonesia | Asset Management
@endsection
@section('header.plugins')
<link rel="stylesheet" href="{{ asset('public/bower_components/admin-lte/plugins/datatables-bs4/css/dataTables.bootstrap4.css') }}">
@endsection
@section('content')
<section class="content-header">
	<div class="container-fluid">
      	<div class="row mb-2">
       		<div class="col-sm-6">
          		<h1>Asset Management</h1>
       		</div>
       	</div>
    </div>
</section>
<section class="content">
	<div class="row">
		<div class="col-12">
			<div class="card card-info card-outline">
				<div class="card-header">
					<button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#modal-default">
                  		Add New
                	</button>
					<div class="modal fade" id="modal-default">
				        <div class="modal-dialog modal-lg">
				          	<div class="modal-content">
								{!! Form::open(array('route' => 'asset.store','method'=>'POST')) !!}
								@csrf
				            	<div class="modal-header">
				             		<h4 class="modal-title">New Asset</h4>
				              		<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				                		<span aria-hidden="true">&times;</span>
				              		</button>
				            	</div>
				            	<div class="modal-body">
									<label class="col-sm-12 col-form-label">Asset Code</label>
									{!! Form::text('asset_code', null, array('placeholder' => 'Asset Code','class' => 'form-control')) !!}
				              		<label class="col-sm-12 col-form-label">Asset Name</label>
                        			{!! Form::text('asset_name', null, array('placeholder' => 'Asset Name','class' => 'form-control')) !!}
									<label class="col-sm-12 col-form-label">Asset Category</label>
									{!! Form::select('category_name', [null=>'Please Select'] + $categories,[], array('class' => 'form-control')) !!}
									<label class="col-sm-12 col-form-label">Purchase Date</label>
									{!! Form::date('purchase_date', '', array('id' => 'datepicker','class' => 'form-control')) !!}
									<label class="col-sm-12 col-form-label">Purchase Price</label>
									{!! Form::number('purchase_price', null, array('placeholder' => 'Purchase Price','class' => 'form-control')) !!}
									<label class="col-sm-12 col-form-label">Estimate Lifespan (in month)</label>
									{!! Form::number('estimate_time', null, array('placeholder' => 'Estimate Lifespan','class' => 'form-control')) !!}
									<label class="col-sm-12 col-form-label">Estimate Depreciation Value</label>
									{!! Form::number('estimate_value', null, array('placeholder' => 'Estimate Depreciation Value','class' => 'form-control')) !!}
                        		</div>
				            	<div class="modal-footer">
				              		<button type="button" class="btn btn-sm btn-default" data-dismiss="modal">Close</button>
				              		<button type="submit" class="btn btn-sm btn-primary">Save changes</button>
				            	</div>
								{!! Form::close() !!}
				          	</div>
				        </div>
				    </div>
				</div>
				<div class="card-body">
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
					<table id="example1" class="table table-bordered table-hover">
						<thead>
							<tr>
								<th>No</th>
								<th>Asset Code</th>
								<th>Asset Name</th>
								<th>Category</th>
								<th>Purchase Date</th>
								<th>Purchase Price</th>
								<th>Created At</th>
								<th></th>
							</tr>
						</thead>
						<tbody>
							@foreach($data as $key=>$value)
							<tr>
								<td>{{ $key+1 }}</td>
								<td>{{ $value->asset_code }}</td>
								<td>{{ $value->name }}</td>
								<td>{{ $value->Categories->category_name }}</td>
								<td>{{date("d F Y",strtotime($value->purchase_date)) }}</td>
								<td>{{ number_format($value->purchase_price,0,',','.')}}</td>
								<td>{{date("d F Y H:i",strtotime($value->created_at)) }}</td>
								<td></td>
							</tr>
							@endforeach
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</section>
@endsection
@section('footer.scripts')
<script src="{{ asset('public/bower_components/admin-lte/plugins/datatables/jquery.dataTables.js') }}"></script>
<script src="{{ asset('public/bower_components/admin-lte/plugins/datatables-bs4/js/dataTables.bootstrap4.js') }}"></script>
<script>
  $(function () {
    $("#example1").DataTable();
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
    });
  });
</script>
<script>
    function ConfirmDelete()
    {
    var x = confirm("Data Delete?");
    if (x)
        return true;
    else
        return false;
    }
</script>
@endsection