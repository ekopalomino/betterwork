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
                <div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch">
                	@foreach($data as $key=>$employee)
                	<div class="card bg-light">
                		<div class="card-header text-muted border-bottom-0">
                  		Digital Strategist
                		</div>
	                	<div class="card-body pt-0">
	                  		<div class="row">
	                    		<div class="col-7">
	                      			<h2 class="lead"><b>{{$employee->first_name}} {{$employee->last_name}}</b></h2>
	                      			<p class="text-muted text-sm"><b>Available: <span class="badge bg-danger">On Leave</span></b></p>
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
	                  			<a href="{{ route('employee.edit',$employee->id) }}" class="btn btn-sm btn-info">
	                      			<i class="fas fa-edit"></i> Edit Profile
	                    		</a>
	                    		<a href="#" class="btn btn-sm btn-primary">
	                      			<i class="fas fa-user"></i> View Profile
	                    		</a>
	                  		</div>
	                	</div>
	                </div>
	                @endforeach
              	</div>
            </div>
   		</div>
        <div class="card-footer">
          	<nav aria-label="Contacts Page Navigation">
            	<ul class="pagination justify-content-center m-0">
		            <li class="page-item active"><a class="page-link" href="#">1</a></li>
		            <li class="page-item"><a class="page-link" href="#">2</a></li>
		            <li class="page-item"><a class="page-link" href="#">3</a></li>
		            <li class="page-item"><a class="page-link" href="#">4</a></li>
		            <li class="page-item"><a class="page-link" href="#">5</a></li>
		            <li class="page-item"><a class="page-link" href="#">6</a></li>
		            <li class="page-item"><a class="page-link" href="#">7</a></li>
		            <li class="page-item"><a class="page-link" href="#">8</a></li>
            	</ul>
          	</nav>
        </div>
    </div>
</section>	
@endsection