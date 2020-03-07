@extends('apps.layouts.main')
@section('header.title')
Better Work Indonesia | General Setting
@endsection
@section('content')
<section class="content-header">
	<div class="container-fluid">
      	<div class="row mb-2">
       		<div class="col-sm-6">
          		<h1>General Setting</h1>
       		</div>
       	</div>
    </div>
</section>
<section class="content">
	<div class="row">
		<div class="col-6">
			<div class="card card-info">
				<div class="card-header">
                	<h3 class="card-title">General Setting</h3>
              	</div>
				<form class="form-horizontal">
					<div class="card-body">
						<div class="form-group row">
	                    	<label for="inputEmail3" class="col-sm-2 col-form-label">Application Name</label>
	                    	<div class="col-sm-10">
	                      		<input type="text" class="form-control" id="inputEmail3" placeholder="Application Name">
	                    	</div>
	                  	</div>
	                  	<div class="form-group row">
	                    	<label for="inputEmail3" class="col-sm-2 col-form-label">Company Address</label>
	                    	<div class="col-sm-10">
	                      		<textarea class="form-control" rows="3" placeholder="Enter ..."></textarea>
	                    	</div>
	                  	</div>
	                  	<div class="form-group row">
	                    	<label for="inputEmail3" class="col-sm-2 col-form-label">Company Email</label>
	                    	<div class="col-sm-10">
	                      		<input type="email" class="form-control" id="inputEmail3" placeholder="Application Name">
	                    	</div>
	                  	</div>
	                  	<div class="form-group row">
	                    	<label for="inputEmail3" class="col-sm-2 col-form-label">Company Phone</label>
	                    	<div class="col-sm-10">
	                      		<input type="text" class="form-control" id="inputEmail3" placeholder="Application Name">
	                    	</div>
	                  	</div>
	                  	<div class="form-group row">
	                    	<label for="inputEmail3" class="col-sm-2 col-form-label">Company Website</label>
	                    	<div class="col-sm-10">
	                      		<input type="text" class="form-control" id="inputEmail3" placeholder="Application Name">
	                    	</div>
	                  	</div>
	                  	<div class="form-group row">
	                    	<label for="inputEmail3" class="col-sm-2 col-form-label">Application Logo</label>
	                    	<div class="col-sm-10">
	                      		<input type="file" class="custom-file-input" id="exampleInputFile">
                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
	                    	</div>
	                  	</div>
	                  	<div class="form-group row">
	                    	<label for="inputEmail3" class="col-sm-2 col-form-label">Application Favicon</label>
	                    	<div class="col-sm-10">
	                      		<input type="file" class="custom-file-input" id="exampleInputFile">
                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
	                    	</div>
	                  	</div>
	                </div>
	                <div class="card-footer">
	                  	<button type="submit" class="btn btn-info">Submit</button>
	                  	<button type="submit" class="btn btn-default float-right">Cancel</button>
	                </div>
	            </form>
	        </div>
        </div>
        <div class="col-6">
			<div class="card card-danger">
				<div class="card-header">
                	<h3 class="card-title">SMTP Setting</h3>
              	</div>
				<form class="form-horizontal">
					<div class="card-body">
						<div class="form-group row">
	                    	<label for="inputEmail3" class="col-sm-2 col-form-label">SMTP Hostname</label>
	                    	<div class="col-sm-10">
	                      		<input type="text" class="form-control" id="inputEmail3" placeholder="Application Name">
	                    	</div>
	                  	</div>
	                  	<div class="form-group row">
	                    	<label for="inputEmail3" class="col-sm-2 col-form-label">SMTP Port</label>
	                    	<div class="col-sm-10">
	                      		<input type="text" class="form-control" id="inputEmail3" placeholder="Application Name">
	                    	</div>
	                  	</div>
	                  	<div class="form-group row">
	                    	<label for="inputEmail3" class="col-sm-2 col-form-label">SMTP Username</label>
	                    	<div class="col-sm-10">
	                      		<input type="text" class="form-control" id="inputEmail3" placeholder="Application Name">
	                    	</div>
	                  	</div>
	                  	<div class="form-group row">
	                    	<label for="inputEmail3" class="col-sm-2 col-form-label">SMTP Password</label>
	                    	<div class="col-sm-10">
	                      		<input type="text" class="form-control" id="inputEmail3" placeholder="Application Name">
	                    	</div>
	                  	</div>
	                  	<div class="form-group row">
	                    	<label for="inputEmail3" class="col-sm-2 col-form-label">SMTP Security</label>
	                    	<div class="col-sm-10">
	                      		<select class="form-control">
                          			<option>Please Select</option>
						            <option>No Security</option>
						            <option>SSL</option>
						            <option>TLS</option>
						        </select>
	                    	</div>
	                  	</div>
	                  	<div class="form-group row">
	                    	<label for="inputEmail3" class="col-sm-2 col-form-label">Email From Name</label>
	                    	<div class="col-sm-10">
	                      		<input type="text" class="form-control" id="inputEmail3" placeholder="Application Name">
	                    	</div>
	                  	</div>
	                </div>
	                <div class="card-footer">
	                  	<button type="submit" class="btn btn-info">Submit</button>
	                  	<button type="submit" class="btn btn-default float-right">Cancel</button>
	                </div>
	            </form>
	        </div>
        </div>
    </div>
</section>
@endsection