@extends('apps.layouts.main')
@section('header.title')
Better Work Indonesia | Employee Reimbursment Approval
@endsection
@section('header.plugins')
<link rel="stylesheet" href="{{ asset('public/bower_components/admin-lte/plugins/datatables-bs4/css/dataTables.bootstrap4.css') }}">
<link rel="stylesheet" href="{{ asset('public/bower_components/admin-lte/plugins/daterangepicker/daterangepicker.css') }}">
@endsection
@section('content')
<section class="content-header">
	<div class="container-fluid">
    <div class="row mb-2">
    	<div class="col-sm-6">
     		<h1>Employee Reimbursment Approval</h1>
    	</div>
    </div>
  </div>
</section>
<section class="content">
	<div class="row">
		<div class="col-12">
			<div class="card card-primary card-outline">
        <div class="card-body">
          <table id="example2" class="table table-bordered table-hover">
            <thead>
              <tr>
                <th>No</th>
                <th>Employee Name</th>
                <th>Type</th>
                <th>Amount</th>
				<th>Notes</th>
				<th>Status</th>
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
            </tbody>
          </table>
      </div>
    </div>
  </div>
</section>
@endsection
@section('footer.scripts')
<script src="{{ asset('public/bower_components/admin-lte/plugins/datatables/jquery.dataTables.js') }}"></script>
<script src="{{ asset('public/bower_components/admin-lte/plugins/datatables-bs4/js/dataTables.bootstrap4.js') }}"></script>
<script src="{{ asset('public/bower_components/admin-lte/plugins/moment/moment.min.js') }}"></script>
<script src="{{ asset('public/bower_components/admin-lte/plugins/daterangepicker/daterangepicker.js') }}"></script>
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
    $('#reservation').daterangepicker()
  });
</script>
@endsection