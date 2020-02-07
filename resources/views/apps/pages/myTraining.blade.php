@extends('apps.layouts.main')
@section('header.title')
Better Work Indonesia | My Training Data
@endsection
@section('header.plugins')
<link rel="stylesheet" href="{{ asset('public/bower_components/admin-lte/plugins/datatables-bs4/css/dataTables.bootstrap4.css') }}">
@endsection
@section('content')
<section class="content-header">
	<div class="container-fluid">
      	<div class="row mb-2">
       		<div class="col-sm-6">
          		<h1>My Training Data</h1>
       		</div>
       	</div>
    </div>
</section>
<section class="content">
	<div class="row">
        <div class="card-body">
			<table id="example1" class="table table-bordered table-hover">
				<thead>
					<tr>
						<th>No</th>
						<th>Training Title</th>
						<th>Provider</th>
						<th>Location</th>
						<th>Schedule</th>
						<th>Status</th>
						<th></th>
					</tr>
				</thead>
				<tbody>
					@foreach($data as $key=>$value)
					<tr>
						<td>{{ $key+1 }}</td>
						<td>{{ $value->training_title }}</td>
						<td>{{ $value->training_provider }}</td>
						<td>{{ $value->location }}</td>
						<td>
							@if(!empty($value->training_from))
							{{date("d F Y H:i",strtotime($value->training_from)) }} - date("d F Y H:i",strtotime($value->training_to)) }}
							@endif
						</td>
						<td>{{ $value->Statuses->name }}</td>
						<td>
							<button type="button" href="#" value="{{ action('Apps\UserMenuController@trainingEdit',['id'=>$value->id]) }}" class="btn btn-xs btn-success modalLg" data-toggle="modal" data-target="#modalLg">
								<i class="fa fa-edit"></i>
							</button>
						</td>
					</tr>
					@endforeach
				</tbody>
			</table>
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