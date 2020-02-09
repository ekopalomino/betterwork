@extends('apps.layouts.main')
@section('header.title')
Better Work Indonesia | Employee Request Approval
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
     		<h1>Employee Request Approval</h1>
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
                <th>Employee ID</th>
                <th>Employee Name</th>
                <th>Date From</th>
                <th>Date To</th>
                <th>Request Type</th>
                <th>Status</th>
                <th></th>
              </tr>
            </thead>
            <tbody>
              @foreach($data as $key=>$value)
              <tr>
                <td>{{ $key+1 }}</td>
                <td>{{ $value->Parent->Employees->employee_no }}</td>
                <td>{{ $value->Parent->Employees->first_name }} {{ $value->Parent->Employees->last_name }}</td>
                <td>{{date("d F Y H:i",strtotime($value->leave_start)) }}</td>
                <td>{{date("d F Y H:i",strtotime($value->leave_end)) }}</td>
                <td>{{ $value->Types->leave_name }}</td>
                <td>
                    @if(($value->status_id) == 'b0a0c17d-e56a-41a7-bfb0-bd8bdc60a7be')
                    <span class="badge badge-info">{{ $value->Statuses->name }}</span>
                    @elseif(($value->status_id) == 'ca52a2ce-5c37-48ce-a7f2-0fd5311860c2')
                    <span class="badge badge-success">{{ $value->Statuses->name }}</span>
                    @else
                    <span class="badge badge-danger">{{ $value->Statuses->name }}</span>
                    @endif
                </td>
                <td>
                    @if(($value->status_id) == 'b0a0c17d-e56a-41a7-bfb0-bd8bdc60a7be')
                    <a class="btn btn-danger btn-sm modalMd" href="#" value="{{ action('Apps\HumanResourcesController@requestShow',['id'=>$value->id]) }}" data-toggle="modal" data-target="#modalMd"><i class="fas fa-search"></i>Show Data</a>
                    @endif
                </td>
              </tr>
              @endforeach
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