@extends('apps.layouts.main')
@section('header.title')
Better Work Indonesia | Human Resources Setting
@endsection
@section('header.styles')
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/css/bootstrap-datetimepicker.min.css" rel="stylesheet">
@endsection
@section('content')
<section class="content-header">
	<div class="container-fluid">
      	<div class="row mb-2">
       		<div class="col-sm-6">
          		<h1>Human Resources Setting</h1>
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
	                    	<label class="col-sm-2 col-form-label">Start Working Time (HH:MM:SS)</label>
	                    	<div class="col-sm-10">
	                      		<input class="timepicker form-control" type="text">
	                    	</div>
	                  	</div>
						<div class="form-group row">
	                    	<label class="col-sm-2 col-form-label">End Working Time (HH:MM:SS)</label>
	                    	<div class="col-sm-10">
	                      		<input class="timepicker form-control" type="text">
	                    	</div>
	                  	</div>
	                  	<div class="form-group row">
	                    	<label class="col-sm-2 col-form-label">Payroll Email</label>
	                    	<div class="col-sm-10">
	                      		<input type="text" class="form-control" placeholder="Email Address">
	                    	</div>
	                  	</div>
						<div class="form-group row">
	                    	<label class="col-sm-2 col-form-label">Payroll Sender Name</label>
	                    	<div class="col-sm-10">
	                      		<input type="text" class="form-control" placeholder="Sender Name">
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
@section('footer.scripts')
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/js/bootstrap-datetimepicker.min.js"></script>
<script type="text/javascript">

    $('.timepicker').datetimepicker({

        format: 'HH:mm:ss'

    }); 

</script>  
@endsection