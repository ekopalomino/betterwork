@extends('apps.layouts.main')
@section('header.title')
Better Work Indonesia | Reimbursment Type
@endsection
@section('header.plugins')
<link rel="stylesheet" href="{{ asset('public/bower_components/admin-lte/plugins/datatables-bs4/css/dataTables.bootstrap4.css') }}">
@endsection
@section('content')
<section class="content-header">
	<div class="container-fluid">
      	<div class="row mb-2">
       		<div class="col-sm-6">
          		<h1>Reimbursment Type</h1>
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
				              		<label for="inputEmail" class="col-sm-12 col-form-label">Reimbursment Type Name</label>
                        				<div class="col-sm-12">
                          					<input type="password" class="form-control" id="inputEmail" placeholder="Password">
                        				</div>
				            	</div>
				            	<div class="modal-footer justify-content-between">
				              		<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				              		<button type="button" class="btn btn-primary">Save changes</button>
				            	</div>
				          	</div>
				        </div>
				    </div>
            	</div>
            	<div class="card-body">
            		<table id="example2" class="table table-bordered table-hover">
            			<thead>
            				<tr>
            					<th>No</th>
            					<th>Reimbursment Type Name</th>
            					<th>Created At</th>
            					<th></th>
            				</tr>
            			</thead>
            			<tbody>
            				<tr>
            					<td></td>
            					<td></td>
            					<td></td>
            					<td></td>
            				</tr>
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