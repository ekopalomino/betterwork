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
              <th>Category</th>
              <th>Public</th>
              <th>Description</th>
              <th>Status</th>
              <th>Created At</th>
          	</tr>
          </thead>
          <tbody>
            @foreach($data as $key=>$value)
          	<tr>
          		<td>{{ $key+1 }}</td>
              <td><a href="{{ route('grievanceData.show',$value->id) }}">{{ $value->subject }}</a></td>
              <td>{{ $value->Categories->category_name }}</td>
              <td>
                  @if(($value->is_public) == 1)
                  Yes
                  @else
                  No
                  @endif
              </td>
          		<td>{{ str_limit(strip_tags($value->description), 100) }}</td>
              <td>{{ $value->Statuses->name }}</td>
              <td>{{date("d F Y H:i",strtotime($value->created_at)) }}</td>
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