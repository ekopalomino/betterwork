@extends('apps.layouts.main')
@section('header.title')
Better Work Indonesia | Grievance Category
@endsection
@section('header.plugins')
<link rel="stylesheet" href="{{ asset('public/bower_components/admin-lte/plugins/datatables-bs4/css/dataTables.bootstrap4.css') }}">
@endsection
@section('content')
<section class="content-header">
	<div class="container-fluid">
      	<div class="row mb-2">
       		<div class="col-sm-6">
          		<h1>Grievance Category</h1>
       		</div>
       	</div>
    </div>
</section>
<section class="content">
	<div class="row">
		<div class="col-12">
			<div class="card">
				<div class="card-header"> 
              		<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-default">
                  		Add New
                	</button>
                	<div class="modal fade" id="modal-default">
				        <div class="modal-dialog">
				          	<div class="modal-content">
				            	<div class="modal-header">
				             		<h4 class="modal-title">New Type</h4>
				              		<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				                		<span aria-hidden="true">&times;</span>
				              		</button>
				            	</div>
				            	<div class="modal-body">
                        {!! Form::open(array('route' => 'grievCat.store','method'=>'POST', 'class' => 'form-horizontal')) !!}
                        @csrf
				              		<label for="inputEmail" class="col-sm-12 col-form-label">Grievance Category</label>
                        				<div class="col-sm-12">
                          					{!! Form::text('category_name', null, array('placeholder' => 'Category Name','class' => 'form-control')) !!}
                        				</div>
				            	</div>
				            	<div class="modal-footer justify-content-between">
				              		<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				              		<button id="register" type="submit" class="btn btn-primary">Save changes</button>
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
            					<th>Grievance Category</th>
                      <th>Created By</th>
            					<th>Created At</th>
            					<th></th>
            				</tr>
            			</thead>
            			<tbody>
                    @foreach($data as $key=>$value)
            				<tr>
            					<td>{{ $key+1 }}</td>
            					<td>{{ $value->category_name }}</td>
            					<td>{{ $value->Author->name }}</td>
            					<td>{{date("d F Y H:i",strtotime($value->created_at)) }}</td>
                      <td>
                          <div class="btn-group">
                          <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Action
                          </button>
                          <div class="dropdown-menu" role="menu">
                            <a class="dropdown-item modalMd" href="#" value="{{ action('Apps\ConfigurationController@grievanceCategoryEdit',['id'=>$value->id]) }}" data-toggle="modal" data-target="#modalMd">Edit Data</a>
                            {!! Form::open(['method' => 'POST','route' => ['grievCat.destroy', $value->id],'style'=>'dropdown-item','onsubmit' => 'return ConfirmDelete()']) !!}
                            {!! Form::button('<a>Delete Data</a>',['type'=>'submit','class' => 'dropdown-item']) !!}
                            {!! Form::close() !!}
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