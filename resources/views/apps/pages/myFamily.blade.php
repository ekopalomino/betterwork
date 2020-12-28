@extends('apps.layouts.main')
@section('header.title')
Better Work Indonesia | Update My Family Data
@endsection
@section('header.plugins')
<link rel="stylesheet" href="{{ asset('bower_components/admin-lte/plugins/datatables-bs4/css/dataTables.bootstrap4.css') }}">
@endsection
@section('content')
<section class="content-header">
	<div class="container-fluid">
      	<div class="row mb-2">
       		<div class="col-sm-6">
          		<h1>Update My Family Data</h1>
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
	         			Add Family
	         		</button>
	         		<div class="modal fade" id="family">
	         			<div class="modal-dialog modal-lg">
	         				<div class="modal-content">
	         					{!! Form::open(array('route' => 'myFamily.store','method'=>'POST', 'class' => 'form-horizontal')) !!}
	                			@csrf
	                			{!! Form::hidden('employee_id',$data->id) !!}
	         					<div class="modal-header">
					           		<h4 class="modal-title">New Family Member</h4>
					           		<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					               		<span aria-hidden="true">&times;</span>
					           		</button>
					           	</div>
					           	<div class="modal-body">
	                           		<div class="form-group row">
					                   	<label class="col-sm-2 col-form-label">First Name</label>
					                    {!! Form::text('first_name', null, array('placeholder' => 'Address','class' => 'form-control')) !!}
					                </div>
									<div class="form-group row">
									  	<label class="col-sm-2 col-form-label">Last Name</label>
									    {!! Form::text('last_name', null, array('placeholder' => 'Address','class' => 'form-control')) !!}
									</div>
									<div class="form-group row">
									   	<label class="col-sm-2 col-form-label">Relations</label>
									   	<select name="relations" class="form-control">
							        		<option value="">Please Select</option>
									        <option value="1">Husband</option>
									        <option value="2">Wife</option>
									        <option value="3">Parent</option>
									        <option value="4">Sibling</option>
									    </select>
									</div>
									<div class="form-group row">
									  	<label class="col-sm-2 col-form-label">Address</label>
									   	{!! Form::textarea('address', null, array('placeholder' => 'Address','class' => 'form-control')) !!}
									</div>
									<div class="form-group row">
									   	<label for="inputEmail" class="col-sm-2 col-form-label">Phone</label>
									   	{!! Form::text('phone', null, array('placeholder' => 'Address','class' => 'form-control')) !!}
									</div>
									<div class="form-group row">
									   	<label for="inputEmail" class="col-sm-2 col-form-label">Mobile</label>
									  	{!! Form::text('mobile', null, array('placeholder' => 'Address','class' => 'form-control')) !!}
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
		            				<th>First Name</th>
		            				<th>Last Name</th>
		            				<th>Relationship</th>
		            				<th>Address</th>
		            				<th>Phone</th>
		            				<th>Mobile</th>
		            				<th></th>
		            			</tr>
		            		</thead>
		            		<tbody>
		            			@foreach($data->Child as $child)
		            			<tr>
		            				<td>{{ $child->first_name}}</td>
		            				<td>{{ $child->last_name}}</td>
		            				<td>
		            					@if(($child->relations) == '1')
		            					Husband
		            					@elseif(($child->relations) == '2')
		            					Wife
		            					@elseif(($child->relations) == '3')
		            					Parent
		            					@elseif(($child->relations) == '4')
		            					Sibling
		            					@else
		            					No Relation
		            					@endif
		            				</td>
		            				<td>{{ $child->address}}</td>
		            				<td>{{ $child->phone}}</td>
		            				<td>{{ $child->mobile}}</td>
		            				<td>
		            					<a class="btn btn-xs btn-success modalLg" href="#" title="Edit Data" value="{{ action('Apps\HumanResourcesController@familyEdit',['id'=>$child->id]) }}" data-toggle="modal" data-target="#modalLg"><i class="fa fa-edit"></i></a>
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