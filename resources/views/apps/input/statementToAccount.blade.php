@extends('apps.layouts.main')
@section('header.title')
Better Work Indonesia | Bank Statement Reconciliation
@endsection
@section('header.plugins')
<link rel="stylesheet" href="{{ asset('bower_components/admin-lte/plugins/datatables-bs4/css/dataTables.bootstrap4.css') }}">
@endsection
@section('content')
<section class="content-header">
	<div class="container-fluid">
      	<div class="row mb-2">
       		<div class="col-sm-6">
          		<h1>Bank Statement Reconciliation</h1>
       		</div>
       	</div>
    </div>
</section>
<section class="content">
	<div class="row">
		<div class="col-12">
			<div class="card card-primary card-outline">
				<div class="card-body">
					@if (count($errors) > 0) 
					<div class="alert alert-danger alert-dismissible">
						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
						<h5><i class="icon fas fa-ban"></i> Alert!</h5>
						<ul>
							@foreach ($errors->all() as $error)
							<li>{{ $error }}</li>
							@endforeach
						</ul>
					</div>
					@endif
					<table id="example1" class="table table-bordered table-hover">
						<thead>
							<tr>
								<th>Transaction Date</th>
								<th>Account Name</th>
								<th>Payee</th>
								<th>Description</th>
								<th>Amount</th>
								<th>Type</th>
								<th>Status</th>
								<th></th>
							</tr>
						</thead>
						<tbody>
							@foreach($data as $key=>$value)
							<tr>
								<td>{{date("d F Y",strtotime($value->transaction_date)) }}</td>
								<td>{{ $value->account_name }}</td>
								<td>{{ $value->payee }}</td>
								<td>{{ $value->description }}</td>
								<td>{{ number_format($value->amount,0,',','.')}}</td>
								<td>{{ $value->type }}</td>
								<td>{{ $value->Statuses->name }}</td>
								<td>
									<div class="btn-group">
										<a class="btn btn-sm btn-warning modalLg" title="Find Matching Transaction" href="#" value="{{ action('Apps\AccountingController@findTransactionByDate',['id'=>$value->id]) }}" data-toggle="modal" data-target="#modalLg">Match</a>
									</div>
									@if(($value->type) == 'Receive')
									<div class="btn-group">
										<a class="btn btn-sm btn-danger" href="{{ route('receive.create',$value->bank_account_id) }}" >Create</a>
									</div>
									@elseif(($value->type) == 'Spend')
									<div class="btn-group">
										<a class="btn btn-sm btn-danger" href="{{ route('spend.create',$value->bank_account_id) }}" >Create</a>
									</div>
									@endif
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
<script>
    function ConfirmApprove()
    {
    var x = confirm("Payroll Approve?");
    if (x)
        return true;
    else
        return false;
    }
</script>
<script>
    function ConfirmReject()
    {
    var x = confirm("Payroll Reject?");
    if (x)
        return true;
    else
        return false;
    }
</script>
@endsection