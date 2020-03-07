@extends('apps.layouts.main')
@section('header.title')
Better Work Indonesia | Accounting Setting
@endsection
@section('content')
<section class="content-header">
	<div class="container-fluid">
      	<div class="row mb-2">
       		<div class="col-sm-6">
          		<h1>Accounting Setting</h1>
       		</div>
       	</div>
    </div>
</section>
<section class="content">
	<div class="row">
		<div class="col-12">
			<div class="card card-info card-outline">
				<form class="form-horizontal">
					<div class="card-body">
						<div class="form-group row">
	                    	<label class="col-sm-2 col-form-label">Financial End Year</label>
	                    	<div class="col-sm-10">
	                      		{!! Form::date('date_of_birth', '', array('id' => 'datepicker','class' => 'form-control')) !!}
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
	                  	<button type="submit" class="btn btn-success">Save</button>
	                  	<button type="submit" class="btn btn-danger">Cancel</button>
	                </div>
	            </form>
	        </div>
        </div>
    </div>
</section>
@endsection