@extends('apps.layouts.main')
@section('header.title')
Better Work Indonesia | Published Grievance Data
@endsection
@section('header.plugins')
<link rel="stylesheet" href="{{ asset('bower_components/admin-lte/plugins/datatables-bs4/css/dataTables.bootstrap4.css') }}">
@endsection
@section('content')
<section class="content-header">
	<div class="container-fluid">
      	<div class="row mb-2">
       		<div class="col-sm-6">
          		<h1>Published Grievance Data</h1>
       		</div>
       	</div>
    </div>
</section>
<section class="content">
	<div class="row">
		<div class="col-12">
			<div class="card card-info card-outline">
				<div class="card-body">
					<div class="row">
						<div class="col-md-12">
							<table id="example1" class="table table-bordered table-hover">
								<thead>
									<tr>
										<th>No</th>
										<th>Subject</th>
										<th>Description</th>
										<th>Status</th>
										<th style="width:300px;">Rating</th>
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
										<td>{{ str_limit(strip_tags($value->description), 50) }}</td>
										<td>{{ $value->Statuses->name }}</td>
										<td style="width:300px;">
											@if(($value->rating) == '1')
											<img src="https://img.icons8.com/color/48/000000/filled-star.png" style="height:30px;">
											@elseif(($value->rating) == '2')
											<img src="https://img.icons8.com/color/48/000000/filled-star.png" style="height:30px;"><img src="https://img.icons8.com/color/48/000000/filled-star.png" style="height:30px;">
											@elseif(($value->rating) == '3')
											<img src="https://img.icons8.com/color/48/000000/filled-star.png" style="height:30px;"><img src="https://img.icons8.com/color/48/000000/filled-star.png" style="height:30px;">
											<img src="https://img.icons8.com/color/48/000000/filled-star.png" style="height:30px;">
											@elseif(($value->rating) == '4')
											<img src="https://img.icons8.com/color/48/000000/filled-star.png" style="height:30px;"><img src="https://img.icons8.com/color/48/000000/filled-star.png" style="height:30px;">
											<img src="https://img.icons8.com/color/48/000000/filled-star.png" style="height:30px;"><img src="https://img.icons8.com/color/48/000000/filled-star.png" style="height:30px;">
											@else
											<img src="https://img.icons8.com/color/48/000000/filled-star.png" style="height:30px;"><img src="https://img.icons8.com/color/48/000000/filled-star.png" style="height:30px;">
											<img src="https://img.icons8.com/color/48/000000/filled-star.png" style="height:30px;"><img src="https://img.icons8.com/color/48/000000/filled-star.png" style="height:30px;">
											<img src="https://img.icons8.com/color/48/000000/filled-star.png" style="height:30px;">
											@endif
										</td>
										<td>{{date("d F Y H:i",strtotime($value->created_at)) }}</td>
										<td>{{date("d F Y H:i",strtotime($value->updated_at)) }}</td>
										<td>
											<a button id="search" type="submit" class="btn btn-xs btn-info" href="{{ route('grievancePublished.show',$value->id) }}">
												<i class="fa fa-search"></i>
											</a>
										</td>
									</tr>
									@endforeach
								</tbody>
							</table>
						</div>
					</div>
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