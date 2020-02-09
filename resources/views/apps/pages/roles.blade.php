@extends('apps.layouts.main')
@section('header.title')
Better Work Indonesia | Access Roles
@endsection
@section('header.plugins')
<link rel="stylesheet" href="{{ asset('public/bower_components/admin-lte/plugins/datatables-bs4/css/dataTables.bootstrap4.css') }}">
@endsection
@section('content')
<section class="content-header">
	<div class="container-fluid">
      	<div class="row mb-2">
       		<div class="col-sm-6">
          		<h1>Access Roles</h1>
       		</div>
       	</div>
    </div>
</section>
<section class="content">
	<div class="row">
		<div class="col-12">
			<div class="card card-primary card-outline">
				<div class="card-header">
       				<a class="btn btn-primary" href="{{ route('role.create') }}">
         			Add New</a>
         		
         	</div>
         	<div class="card-body">
         		<table id="example2" class="table table-bordered table-hover">
         			<thead>
         				<tr>
         					<th>No</th>
         					<th>Role Name</th>
			                <th>Created At</th>
         					<th></th>
         				</tr>
         			</thead>
         			<tbody>
                		@foreach($roles as $key=>$role)
         				<tr>
         					<td>{{ $key+1 }}</td>
         					<td>{{ $role->name }}</td>
                      		<td>{{date("d F Y H:i",strtotime($role->created_at)) }}</td>
                      		<td>
		                        <div class="btn-group">
		                          <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
		                            Action
		                          </button>
		                          <div class="dropdown-menu" role="menu">
		                            <a class="dropdown-item" href="{{ route('role.edit',$role->id) }}">Edit Role</a>
		                            {!! Form::open(['method' => 'POST','route' => ['role.destroy', $role->id],'style'=>'dropdown-item','onsubmit' => 'return ConfirmDelete()']) !!}
                            		{!! Form::button('<a>Delete Role</a>',['type'=>'submit','class' => 'dropdown-item']) !!}
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
<script>
    function ConfirmDelete()
    {
    var x = confirm("Role Delete?");
    if (x)
        return true;
    else
        return false;
    }
</script>
@endsection