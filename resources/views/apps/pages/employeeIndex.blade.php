@extends('apps.layouts.main')
@section('header.title')
Better Work Indonesia | Human Resources
@endsection
@section('content')
<section class="content-header">
	<div class="container-fluid">
      	<div class="row mb-2">
       		<div class="col-sm-6">
          		<h1>Employee Database</h1>
       		</div>
       	</div>
    </div>
</section>
<section class="content">
	<div class="col-4">
		<a class="btn btn-primary" href="{{ route('employee.create') }}">
			New Employee
		</a> 
    </div>
    <br>
    <div class="card card-solid">
        <div class="card-body pb-0">
            <div class="row d-flex align-items-stretch">
            	@foreach($data as $key=>$employee)
                <div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch">
                	<div class="card bg-light">
                		<div class="card-header text-muted border-bottom-0">
                		@foreach($employee->Services as $service)
						@if(empty($service->to))
                  		{{$service->grade}}
						@endif
                  		@endforeach
                		</div>
	                	<div class="card-body pt-0">
	                  		<div class="row">
	                    		<div class="col-7">
	                      			<h2 class="lead"><b>{{$employee->first_name}} {{$employee->last_name}}</b></h2>
	                      			<p class="text-muted text-sm"><b>Available: 
	                      				@if(($employee->availability) == '2207ac0e-71a0-41ae-897b-b49efb016d6e')
	                      					<span class="badge bg-success">{{$employee->Available->name}}</span>
	                      				@else
	                      					<span class="badge bg-danger">{{$employee->Available->name}}</span>
	                      				@endif
	                      				</b>
	                      			</p>
	                      			<ul class="ml-4 mb-0 fa-ul text-muted">
	                        			<li class="small"><span class="fa-li"><i class="fas fa-lg fa-building"></i></span> Address: {{ $employee->address }}</li>
	                        			<li class="small"><span class="fa-li"><i class="fas fa-lg fa-phone"></i></span> Mobile #: {{ $employee->mobile }}</li>
	                      			</ul>
	                    		</div>
	                    		<div class="col-5 text-center">
	                      			<img src="http://betterwork.local/public/employees/{{$employee->picture}}" alt="" class="img-circle img-fluid">
	                    		</div>
	                  		</div>
	                	</div>
	                	<div class="card-footer">
	                  		<div class="text-right">
								@can('Edit Employee')
	                  			<a class="btn btn-xs btn-success" href="{{ route('employee.edit',$employee->id) }}" title="Edit Data" ><i class="fa fa-edit"></i></a>
								@endcan
								@can('Remove Employee')
	                  			{!! Form::open(['method' => 'POST','route' => ['employee.destroy', $employee->id],'style'=>'display:inline','onsubmit' => 'return ConfirmDelete()']) !!}
                                {!! Form::button('<i class="fas fa-user-slash"></i>',['type'=>'submit','class' => 'btn btn-xs btn-danger','title'=>'Suspend User']) !!}
                                {!! Form::close() !!}
								@endcan
	                  		</div>
	                	</div>
	                </div>
	            </div>
              	@endforeach
            </div>
   		</div>
        <div class="card-footer">
          	<nav aria-label="Contacts Page Navigation">
            	{{ $data->links() }}
          	</nav>
        </div>
    </div>
</section>	
@endsection
@section('footer.scripts')
<script>
    function ConfirmDelete()
    {
    var x = confirm("User Akan Dihapus?");
    if (x)
        return true;
    else
        return false;
    }
</script>
@endsection
