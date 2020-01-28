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
		<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-default">
            New Employee
        </button>
    </div>
    <br>
    <div class="card card-solid">
        <div class="card-body pb-0">
            <div class="row d-flex align-items-stretch">
                <div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch">
                	<div class="card bg-light">
                		<div class="card-header text-muted border-bottom-0">
                  		Digital Strategist
                		</div>
	                	<div class="card-body pt-0">
	                  		<div class="row">
	                    		<div class="col-7">
	                      			<h2 class="lead"><b>Nicole Pearson</b></h2>
	                      			<p class="text-muted text-sm"><b>Available: <span class="badge bg-danger">On Leave</span></b></p>
	                      			<ul class="ml-4 mb-0 fa-ul text-muted">
	                        			<li class="small"><span class="fa-li"><i class="fas fa-lg fa-building"></i></span> Address: Demo Street 123, Demo City 04312, NJ</li>
	                        			<li class="small"><span class="fa-li"><i class="fas fa-lg fa-phone"></i></span> Phone #: + 800 - 12 12 23 52</li>
	                      			</ul>
	                    		</div>
	                    		<div class="col-5 text-center">
	                      			<img src="{{ asset('public/bower_components/admin-lte/dist/img/user1-128x128.jpg') }}" alt="" class="img-circle img-fluid">
	                    		</div>
	                  		</div>
	                	</div>
	                	<div class="card-footer">
	                  		<div class="text-right">
	                    		<a href="#" class="btn btn-sm btn-primary">
	                      			<i class="fas fa-user"></i> View Profile
	                    		</a>
	                  		</div>
	                	</div>
	                </div>
              	</div>
              	<div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch">
                	<div class="card bg-light">
                		<div class="card-header text-muted border-bottom-0">
                  		Digital Strategist
                		</div>
	                	<div class="card-body pt-0">
	                  		<div class="row">
	                    		<div class="col-7">
	                      			<h2 class="lead"><b>Nicole Pearson</b></h2>
	                      			<p class="text-muted text-sm"><b>Available: <span class="badge bg-success">Availabe</span></b></p>
	                      			<ul class="ml-4 mb-0 fa-ul text-muted">
	                        			<li class="small"><span class="fa-li"><i class="fas fa-lg fa-building"></i></span> Address: Demo Street 123, Demo City 04312, NJ</li>
	                        			<li class="small"><span class="fa-li"><i class="fas fa-lg fa-phone"></i></span> Phone #: + 800 - 12 12 23 52</li>
	                      			</ul>
	                    		</div>
	                    		<div class="col-5 text-center">
	                      			<img src="{{ asset('public/bower_components/admin-lte/dist/img/user1-128x128.jpg') }}" alt="" class="img-circle img-fluid">
	                    		</div>
	                  		</div>
	                	</div>
	                	<div class="card-footer">
	                  		<div class="text-right">
	                    		<a href="#" class="btn btn-sm btn-primary">
	                      			<i class="fas fa-user"></i> View Profile
	                    		</a>
	                  		</div>
	                	</div>
	                </div>
              	</div>
              	<div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch">
                	<div class="card bg-light">
                		<div class="card-header text-muted border-bottom-0">
                  		Digital Strategist
                		</div>
	                	<div class="card-body pt-0">
	                  		<div class="row">
	                    		<div class="col-7">
	                      			<h2 class="lead"><b>Nicole Pearson</b></h2>
	                      			<p class="text-muted text-sm"><b>Available: <span class="badge bg-success">Availabe</span></b></p>
	                      			<ul class="ml-4 mb-0 fa-ul text-muted">
	                        			<li class="small"><span class="fa-li"><i class="fas fa-lg fa-building"></i></span> Address: Demo Street 123, Demo City 04312, NJ</li>
	                        			<li class="small"><span class="fa-li"><i class="fas fa-lg fa-phone"></i></span> Phone #: + 800 - 12 12 23 52</li>
	                      			</ul>
	                    		</div>
	                    		<div class="col-5 text-center">
	                      			<img src="{{ asset('public/bower_components/admin-lte/dist/img/user1-128x128.jpg') }}" alt="" class="img-circle img-fluid">
	                    		</div>
	                  		</div>
	                	</div>
	                	<div class="card-footer">
	                  		<div class="text-right">
	                    		<a href="#" class="btn btn-sm btn-primary">
	                      			<i class="fas fa-user"></i> View Profile
	                    		</a>
	                  		</div>
	                	</div>
	                </div>
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