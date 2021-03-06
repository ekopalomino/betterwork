@extends('apps.layouts.main')
@section('header.title')
Better Work Indonesia | Create Grievance
@endsection
@section('header.styles')
<link rel="stylesheet" href="{{ asset('bower_components/admin-lte/plugins/summernote/summernote-bs4.css') }}">
@endsection
@section('content')
<section class="content-header">
	<div class="container-fluid">
      	<div class="row mb-2">
       		<div class="col-sm-6">
          		<h1>Create Grievance</h1>
       		</div>
       	</div>
    </div>
</section>
<section class="content">
	<div class="row">
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
		<div class="col-12">
			<div class="card card-danger card-outline">
				<div class="card-header">
                	<h3 class="card-title">Grievance Form</h3>
              	</div>
				{!! Form::open(array('route' => 'myGrievance.store','method'=>'POST', 'class' => 'form-horizontal')) !!}
				@csrf
					<div class="card-body">
						<div class="row">
							<div class="col-6">
								<label><strong>Subject</strong></label>
								{!! Form::text('subject', null, array('placeholder' => 'Grievance Subject','class' => 'form-control')) !!}
							</div>
						</div>
						<br>
						<div class="row">
							<div class="col-6">
								<label><strong>Category</strong></label>
								{!! Form::select('type_id', [null=>'Please Select'] + $types,[], array('class' => 'form-control')) !!}
							</div>
						</div>
						<br>
						<div class="row">
							<div class="col-6">
								<div class="form-group">
									<label><strong>Grievance View</strong></label>
									<div class="custom-control custom-switch">
										<input type="checkbox" class="custom-control-input" id="is_public" name="is_public">
										<label class="custom-control-label" for="is_public">Toggle this switch to make data public</label>
									</div>
								</div>
							</div>
						</div>
						<br>
						<div class="row">
							<div class="col-12">
								<label><strong>Description</strong></label>
								<textarea class="textarea" name="description" placeholder="Place some text here"
                          			style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">
                          		</textarea>
                          	</div>
						</div>
						<button type="submit" class="btn btn-sm btn-success">Submit</button>
	                  	<a button type="button" class="btn btn-sm btn-danger" href="{{ route('myGrievance.index') }}">Cancel</a>
	                </div>
	            {!! Form::close() !!}
	        </div>
        </div>
    </div>
</section>
@endsection
@section('footer.scripts')
<script src="{{ asset('bower_components/admin-lte/plugins/summernote/summernote-bs4.min.js') }}"></script>
<script>
  $(function () {
    // Summernote
    $('.textarea').summernote()
  })
</script>
@endsection