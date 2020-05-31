@extends('apps.layouts.main')
@section('header.title')
Better Work Indonesia | Employee Bulletin Data
@endsection
@section('header.plugins')
<link rel="stylesheet" href="{{ asset('bower_components/admin-lte/plugins/datatables-bs4/css/dataTables.bootstrap4.css') }}">
@endsection
@section('content')
<section class="content-header">
	<div class="container-fluid">
      	<div class="row mb-2">
       		<div class="col-sm-6">
          		<h1>Employee Bulletin Data</h1>
       		</div>
       	</div>
    </div>
</section>
<section class="content">
	<div class="row">
		<div class="col-12">
			<div class="card card-info card-outline">
				<div class="card-header">
					<a class="btn btn-sm btn-danger" href="{{ route('bulletin.create') }}">
						Add New
					</a>
				</div>
				<div class="card-body">
					<table id="example1" class="table table-bordered table-hover">
						<thead>
							<tr>
								<th>No</th>
								<th>Title</th>
								<th>Category</th>
								<th>Description</th>
								<th>Created By</th>
								<th>Created At</th>
								<th></th>
							</tr>
						</thead>
						<tbody>
							@foreach($data as $key=>$value)
							<tr>
								<td>{{ $key+1 }}</td>
								<td>{{ $value->title }}</td>
								<td>{{ $value->category_id }}</td>
								<td>{{ str_limit(strip_tags($value->content), 100) }}</td>
								<td>{{ $value->Author->first_name }} {{ $value->Author->last_name }}</td>
								<td>{{date("d F Y H:i",strtotime($value->created_at)) }}</td>
								<td>
									<div class="btn-group">
										<a button id="search" type="submit" class="btn btn-xs btn-info" href="{{ route('bulletin.edit',$value->id) }}">
											<i class="fa fa-edit"></i>
										</a>
										{!! Form::open(['method' => 'POST','route' => ['bulletin.destroy', $value->id],'style'=>'display:inline','onsubmit' => 'return ConfirmDelete()']) !!}
										{!! Form::button('<i class="fas fa-check"></i>',['type'=>'submit','class' => 'btn btn-xs btn-danger','title'=>'Delete Data']) !!}
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
<script src="{{ asset('bower_components/admin-lte/plugins/datatables/jquery.dataTables.js') }}"></script>
<script src="{{ asset('bower_components/admin-lte/plugins/datatables-bs4/js/dataTables.bootstrap4.js') }}"></script>
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