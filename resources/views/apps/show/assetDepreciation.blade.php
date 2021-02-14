@extends('apps.layouts.main')
@section('header.title')
Better Work Indonesia | Asset Depreciation Details
@endsection
@section('header.plugins')
<link rel="stylesheet" href="{{ asset('public/bower_components/admin-lte/plugins/datatables-bs4/css/dataTables.bootstrap4.css') }}">
@endsection
@section('content')
<section class="content-header">
	<div class="container-fluid">
      	<div class="row mb-2">
       		<div class="col-sm-6">
          		<h1>Asset Depreciation Details</h1>
       		</div>
			<div class="col-sm-6">
				<ol class="breadcrumb float-sm-right">
					<li class="breadcrumb-item"><a href="{{ route('asset.index') }}">Asset Management</a></li>
					<li class="breadcrumb-item active">Depreciation Details for {{$data->name}}</li>
				</ol>
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
								<th>Depreciation Period</th>
								<th>Purchase Price</th>
								<th>Depreciation Expense</th>
								<th>Depreciation Accumulation</th>
								<th>Book Value</th>
							</tr>
						</thead>
						<tbody>
							@foreach($details as $key=>$value)
							<tr>
								<td>{{date("F Y",strtotime($value->depreciate_period)) }}</td>
								<td>{{ number_format($data->purchase_price,0,',','.')}}</td>
								<td>{{ number_format($value->depreciate_value,0,',','.')}}</td>
								<td>{{ number_format($value->accumulate_value,0,',','.')}}</td>
								<td>{{ number_format($value->closing_value,0,',','.')}}</td>
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
<script type="text/javascript">
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