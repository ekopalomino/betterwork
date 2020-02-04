@extends('apps.layouts.main')
@section('header.title')
Better Work Indonesia | Salary Process
@endsection
@section('header.plugins')
<link rel="stylesheet" href="{{ asset('public/bower_components/admin-lte/plugins/datatables-bs4/css/dataTables.bootstrap4.css') }}">
@endsection
@section('content')
<section class="content-header">
	<div class="container-fluid">
      	<div class="row mb-2">
       		<div class="col-sm-6">
          		<h1>Employee Salary Process</h1>
       		</div>
       	</div>
    </div>
</section>
<section class="content">
	<div class="row">
		<div class="col-12">
			<div class="card">
				<div class="card-header">
					<a class="btn btn-primary" href="{{ route('salary.create') }}">
         				Add New
         			</a>
         		</div>
        <div class="card-body">
        <table id="example1" class="table table-bordered table-hover">
          	<thead>
	          	<tr>
	          		<th>No</th>
	          		<th>Period</th>
	              	<th>Total Salary</th>
	              	<th>Payment To Employee</th>
	              	<th>Payment To BPJS TK</th>
	              	<th>Payment To BPJS Health</th>
	              	<th>Status</th>
	              	<th>Created By</th>
	              	<th>Approved By</th>
	              	<th></th>
	          	</tr>
          	</thead>
          	<tbody>
        		<tr>
        			<td></td>
        			<td></td>
        			<td></td>
        			<td></td>
        			<td></td>
        			<td></td>
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