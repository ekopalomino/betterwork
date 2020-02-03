@extends('apps.layouts.main')
@section('header.title')
Better Work Indonesia | Employee Grievance Data
@endsection
@section('header.plugins')
<link rel="stylesheet" href="{{ asset('public/bower_components/admin-lte/plugins/datatables-bs4/css/dataTables.bootstrap4.css') }}">
@endsection
@section('content')
<section class="content-header">
	<div class="container-fluid">
      	<div class="row mb-2">
       		<div class="col-sm-6">
          		<h1>Employee Grievance Data</h1>
       		</div>
       	</div>
    </div>
</section>
<section class="content">
	<div class="row">
		<div class="col-12">
			<div class="card">
        <div class="card-body">
        <table id="example1" class="table table-bordered table-hover">
          <thead>
          	<tr>
          		<th>No</th>
          		<th>Subject</th>
              <th>Description</th>
              <th>Status</th>
              <th>Respond</th>
              <th>Created At</th>
          		<th>Updated At</th>
              <th></th>
          	</tr>
          </thead>
          <tbody>
            @foreach($data as $key=>$value)
          	<tr>
          		<td>{{ $key+1 }}</td>
              <td>{{ $value->subject }}</td>
          		<td>{{ str_limit(strip_tags($value->description), 100) }}</td>
              <td>{{ $value->Statuses->name }}</td>
              <td>{{ $value->notes }}</td>
            	<td>{{date("d F Y H:i",strtotime($value->created_at)) }}</td>
              <td>{{date("d F Y H:i",strtotime($value->updated_at)) }}</td>
              <td>
                <div class="btn-group">
                  <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Action
                  </button>
                  <div class="dropdown-menu" role="menu">
                    <a class="dropdown-item" href="#">Edit Data</a>
                    <a class="dropdown-item" href="#">Approval Data</a>
                    <a class="dropdown-item" href="{{ route('myGrievance.show',$value->id) }}">View Data</a>
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