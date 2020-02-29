@extends('apps.layouts.main')
@section('header.title')
Better Work Indonesia | Asset Category
@endsection
@section('header.plugins')
<link rel="stylesheet" href="{{ asset('public/bower_components/admin-lte/plugins/datatables-bs4/css/dataTables.bootstrap4.css') }}">
@endsection
@section('content')
<section class="content-header">
	<div class="container-fluid">
      	<div class="row mb-2">
       		<div class="col-sm-6">
          		<h1>Asset Category</h1>
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
								{!! Form::open(array('route' => 'assetCat.store','method'=>'POST')) !!}
								@csrf
				            	<div class="modal-header">
				             		<h4 class="modal-title">New Category</h4>
				              		<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				                		<span aria-hidden="true">&times;</span>
				              		</button>
				            	</div>
				            	<div class="modal-body">
				              		<label class="col-sm-12 col-form-label">Category Name</label>
                        			{!! Form::text('category_name', null, array('placeholder' => 'Category Name','class' => 'form-control')) !!}
									<label for="inputEmail" class="col-sm-12 col-form-label">Chart of Account</label>
									{!! Form::select('charts_id', [null=>'Please Select'] + $accounts,[], array('class' => 'form-control')) !!}
                        			<label for="inputEmail" class="col-sm-12 col-form-label">Depreciation Account</label>
                        			{!! Form::select('depreciate_id', [null=>'Please Select'] + $accounts,[], array('class' => 'form-control')) !!}
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
            		<table id="example2" class="table table-bordered table-hover">
            			<thead>
            				<tr>
            					<th>No</th>
            					<th>Category Name</th>
								<th>Chart of Account</th>
								<th>Depreciation Account</th>
            					<th>Created At</th>
            					<th></th>
            				</tr>
            			</thead>
            			<tbody>
							@foreach($data as $key=>$value)
            				<tr>
            					<td>{{ $key+1 }}</td>
            					<td>{{ $value->category_name }}</td>
            					<td>{{ $value->Coas->account_name }}</td>
								<td>{{ $value->Depreciates->account_name }}</td>
            					<td>{{date("d F Y H:i",strtotime($value->created_at)) }}</td>
								<td>
									<a class="btn btn-xs btn-info modalLg" href="#" value="{{ action('Apps\ConfigurationController@assetCategoryEdit',['id'=>$value->id]) }}" title="Edit Data" data-toggle="modal" 
									data-target="#modalLg"><i class="fas fa-edit"></i></a>
									{!! Form::open(['method' => 'POST','route' => ['assetCat.destroy', $value->id],'style'=>'display:inline','onsubmit' => 'return ConfirmDelete()']) !!}
									{!! Form::button('<i class="fas fa-trash"></i>',['type'=>'submit','class' => 'btn btn-xs btn-danger']) !!}
									{!! Form::close() !!}
								</td>
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
<script src="{{ asset('public/bower_components/admin-lte/plugins/datatables-bs4/js/dataTables.bootstrap4.js') }}"></script><script>
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
    var x = confirm("Data Will Be Delete?");
    if (x)
        return true;
    else
        return false;
    }
</script>
@endsection