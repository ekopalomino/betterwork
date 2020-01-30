@extends('apps.layouts.main')
@section('header.title')
Better Work Indonesia | Log Activity
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
     		<h1>Log Activity</h1>
    	</div>
    </div>
  </div>
</section>
<section class="content">
	<div class="row">
		<div class="col-12">
			<div class="card">
				<div class="card-header">
        </div>
        <div class="card-body">
          <table id="example2" class="table table-bordered table-hover">
            <thead>
              <tr>
                <th>No</th>
                <th>Subject</th>
                <th>URL</th>
                <th>User IP</th>
                <th>Username</th>
                <th>Activity Date</th>
              </tr>
            </thead>
            <tbody>
              @if($logs->count())
              @foreach($logs as $key => $log)
              <tr>
                <td>{{ $key+1 }}</td>
                <td>{{ $log->subject }}</td>
                <td class="text-success">{{ $log->url }}</td>
                <td class="text-danger">{{ $log->ip }}</td>
                <td><span class="badge badge-danger">{{ $log->creator->name }}</span></td>
                <td>{{date("d F Y H:i",strtotime($log->created_at)) }}</td>
              </tr>
            </tbody>
            @endforeach
            @endif
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