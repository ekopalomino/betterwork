@extends('apps.layouts.main')
@section('header.title')
Better Work Indonesia | Chart of Account Category
@endsection
@section('header.plugins')
<link rel="stylesheet" href="{{ asset('public/bower_components/admin-lte/plugins/datatables-bs4/css/dataTables.bootstrap4.css') }}">
@endsection
@section('content')
<section class="content-header">
	<div class="container-fluid">
      	<div class="row mb-2">
       		<div class="col-sm-6">
          		<h1>Chart of Account Category</h1>
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
				            	<div class="modal-header">
				             		<h4 class="modal-title">New Chart of Account</h4>
				              		<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				                		<span aria-hidden="true">&times;</span>
				              		</button>
				            	</div>
				            	<div class="modal-body">
									{!! Form::open(array('route' => 'coaCat.store','method'=>'POST', 'class' => 'form-horizontal')) !!}
									@csrf
				              		<label for="inputEmail" class="col-sm-12 col-form-label">Account ID</label>
                        				<div class="col-sm-12">
                          					{!! Form::text('account_id', null, array('placeholder' => 'Account ID','class' => 'form-control')) !!}
                        				</div>
                        			<label for="inputEmail" class="col-sm-12 col-form-label">Account Name</label>
                        				<div class="col-sm-12">
                          					{!! Form::text('account_name', null, array('placeholder' => 'Account Name','class' => 'form-control')) !!}
                        				</div>
                        			<label for="inputEmail" class="col-sm-12 col-form-label">Account Category</label>
                        				<div class="col-sm-12">
                          					{!! Form::select('account_category', [null=>'Please Select'] + $categories,[], array('class' => 'form-control')) !!}
                        				</div>
									<label for="inputEmail" class="col-sm-12 col-form-label">Opening Balance</label>
                        				<div class="col-sm-12">
                          					{!! Form::number('opening_balance', null, array('placeholder' => 'Opening Balance','class' => 'form-control')) !!}
                        				</div>
				            	</div>
				            	<div class="modal-footer">
				              		<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
									<button id="register" type="submit" class="btn btn-primary">Save</button>
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
            					<th>Account ID</th>
            					<th>Account Name</th>
            					<th>Account Category</th>
            					<th>Opening Balance</th>
            					<th>Created By</th>
								<th>Created At</th>
            					<th></th>
            				</tr>
            			</thead>
            			<tbody>
							@foreach($data as $key=>$value)
            				<tr>
            					<td>{{ $key+1 }}</td>
            					<td>{{ $value->account_id }}</td>
            					<td>{{ $value->account_name }}</td>
            					<td>{{ $value->Parent->category_name }}</td>
            					<td>{{ number_format($value->opening_balance,2,',','.')}}</td>
            					<td>{{ $value->Author->first_name }} {{ $value->Author->last_name }}</td>
            					<td>{{date("d F Y H:i",strtotime($value->created_at)) }}</td>
								<td>
									<div class="btn-group">
										<button type="button" class="btn btn-sm btn-info dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
											Action
										</button>
										<div class="dropdown-menu" role="menu">
											<a class="dropdown-item modalMd" href="#" value="{{ action('Apps\ConfigurationController@coaCategoryEdit',['id'=>$value->id]) }}" data-toggle="modal" data-target="#modalMd">Edit Data</a>
											{!! Form::open(['method' => 'POST','route' => ['coaCat.destroy', $value->id],'style'=>'dropdown-item','onsubmit' => 'return ConfirmDelete()']) !!}
											{!! Form::button('<a>Delete Data</a>',['type'=>'submit','class' => 'dropdown-item']) !!}
											{!! Form::close() !!}
										</div>
									</div>
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
@endsection