@extends('apps.layouts.main')
@section('header.title')
Better Work Indonesia | Update My Education Data
@endsection
@section('header.plugins')
<link rel="stylesheet" href="{{ asset('bower_components/admin-lte/plugins/datatables-bs4/css/dataTables.bootstrap4.css') }}">
@endsection
@section('content')
<section class="content-header">
	<div class="container-fluid">
      	<div class="row mb-2">
       		<div class="col-sm-6">
          		<h1>Update My Education Data</h1>
       		</div>
       	</div>
    </div>
</section>
<section class="content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12">
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
		    </div>
		</div>
		<div class="card card-danger card-outline">
			<div class="card-body">
				<div class="row">
					<button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#family">
	         			Add Data
	         		</button>
	         		<div class="modal fade" id="family">
	         			<div class="modal-dialog modal-lg">
	         				<div class="modal-content">
	         					{!! Form::open(array('route' => 'myFamily.store','method'=>'POST', 'class' => 'form-horizontal')) !!}
	                			@csrf
	                			{!! Form::hidden('employee_id',$data->id) !!}
	         					<div class="modal-header">
					           		<h4 class="modal-title">New Education Data</h4>
					           		<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					               		<span aria-hidden="true">&times;</span>
					           		</button>
					           	</div>
					           	<div class="modal-body">
	                           		<div class="form-group row">
					                   	<label class="col-sm-2 col-form-label">Insitution Name</label>
					                    {!! Form::text('institution_name', null, array('placeholder' => 'Insitution Name','class' => 'form-control')) !!}
					                </div>
									<div class="form-group row">
									  	<label class="col-sm-2 col-form-label">Graduate On</label>
									    {!! Form::date('date_of_graduate', '', array('id' => 'datepicker','class' => 'form-control')) !!}
									</div>
									<div class="form-group row">
									  	<label class="col-sm-2 col-form-label">Degree</label>
									    {!! Form::select('degree', [null=>'Please Select'] + $degrees,[], array('class' => 'form-control')) !!}
									</div>
									<div class="form-group row">
									  	<label class="col-sm-2 col-form-label">Major</label>
									   	{!! Form::text('address', null, array('placeholder' => 'Major','class' => 'form-control')) !!}
									</div>
									<div class="form-group row">
									   	<label class="col-sm-2 col-form-label">GPA</label>
									  	{!! Form::text('gpa', null, array('placeholder' => 'GPA','class' => 'form-control')) !!}
									</div>
								</div>
								<div class="modal-footer">
									<button type="close" class="btn btn-sm btn-danger" data-dismiss="modal">Close</button>
									<button name="family" type="submit" class="btn btn-sm btn-success">Save changes</button>
								</div>
								{!! Form::close() !!}
				            </div>
				        </div>
				    </div>
				</div>
				<br>
				<div class="row">
					<div class="col-12">
						<table id="example1" class="table table-bordered table-hover">
							<thead>
			           			<tr>
		            				<th>Insitution</th>
		            				<th>Grade</th>
		            				<th>Major</th>
		            				<th>GPA</th>
		            				<th>Graduate On</th>
		            				<th></th>
		            			</tr>
		            		</thead>
		            		<tbody>
		            			@foreach($data->Educations as $value)
		            			<tr>
		            				<td>{{ $value->institution_name }}</td>
		            				<td>{{ $value->degree }}</td>
					    			<td>{{ $value->major }}</td>
					    			<td>{{ $value->gpa }}</td>
									<td>
										@if(!empty($value->date_of_graduate))
										{{date("d F Y",strtotime($value->date_of_graduate)) }}
										@endif
									</td>
					    			<td>
					    				<a class="btn btn-xs btn-success modalLg" href="#" value="{{ action('Apps\HumanResourcesController@educationEdit',['id'=>$value->id]) }}" data-toggle="modal" data-target="#modalLg"><i class="fa fa-edit"></i></a>
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
</section>
@endsection
@section('footer.scripts')
<script src="{{ asset('bower_components/admin-lte/plugins/datatables/jquery.dataTables.js') }}"></script>
<script src="{{ asset('bower_components/admin-lte/plugins/datatables-bs4/js/dataTables.bootstrap4.js') }}"></script><script>
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