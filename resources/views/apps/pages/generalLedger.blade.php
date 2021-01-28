@extends('apps.layouts.main')
@section('header.title')
Better Work Indonesia | General Ledger
@endsection
@section('header.plugins')
<link rel="stylesheet" href="{{ asset('bower_components/admin-lte/plugins/datatables-bs4/css/dataTables.bootstrap4.css') }}">
<link rel="stylesheet" href="{{ asset('bower_components/admin-lte/plugins/daterangepicker/daterangepicker.css') }}">
@endsection
@section('content')
<section class="content-header">
	<div class="container-fluid">
		<div class="row mb-2">
			<div class="col-sm-6">
				<h1>General Ledger</h1>
			</div>
		</div>
	</div>
</section>
<section class="content">
	<div class="row">
		<div class="col-12">
			<div class="card card-danger card-outline">
				<div class="card-body">
					{!! Form::open(array('route' => 'trial.report','method'=>'POST')) !!}
					@csrf
					<div class="row">
						<div class="col-3">
							<label>From</label>
							<div class="input-group">
								<div class="input-group-prepend">
									<span class="input-group-text">
										<i class="far fa-calendar-alt"></i>
									</span>
								</div>
								{!! Form::date('start', '', array('id' => 'datepicker','class' => 'form-control')) !!}
							</div>
						</div>
						<div class="col-3">
							<label>To</label>
							<div class="input-group">
								<div class="input-group-prepend">
									<span class="input-group-text">
										<i class="far fa-calendar-alt"></i>
									</span>
								</div>
								{!! Form::date('end', '', array('id' => 'datepicker','class' => 'form-control')) !!}
							</div>
						</div>
						<div class="col-3">
							<label>Chart of Account</label>
							<div class="input-group">
								<div class="input-group-prepend">
									<span class="input-group-text">
										<i class="far fa-calendar-alt"></i>
									</span>
								</div>
								{!! Form::select('coa_id', [null=>'Please Select'] + $coas,[], array('class' => 'form-control')) !!}
							</div>
						</div>
					</div>
					<br>
					<div class="row">
						<div class="col-3">
							<button type="submit" class="btn btn-sm btn-success">Search</button>
							<a button type="button" class="btn btn-sm btn-danger" href="{{ route('attReport.index') }}">Cancel</a>
						</div>
					</div>
					{!! Form::close() !!}
				</div>
			</div>
		</div>
	</div>
</section>
@endsection
@section('footer.scripts')
<script src="{{ asset('bower_components/admin-lte/plugins/datatables/jquery.dataTables.js') }}"></script>
<script src="{{ asset('bower_components/admin-lte/plugins/datatables-bs4/js/dataTables.bootstrap4.js') }}"></script>
<script src="{{ asset('bower_components/admin-lte/plugins/moment/moment.min.js') }}"></script>
<script src="{{ asset('bower_components/admin-lte/plugins/daterangepicker/daterangepicker.js') }}"></script>
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