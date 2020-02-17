@extends('apps.layouts.main')
@section('header.title')
Better Work Indonesia | Edit Bulletin
@endsection
@section('header.styles')
<link rel="stylesheet" href="{{ asset('public/bower_components/admin-lte/plugins/summernote/summernote-bs4.css') }}">
@endsection
@section('content')
<section class="content-header">
	<div class="container-fluid">
      	<div class="row mb-2">
       		<div class="col-sm-6">
          		<h1>Edit Bulletin</h1>
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
			<div class="card card-outline card-info">
				<div class="card-header">
                	<h3 class="card-title">Bulletin Form</h3>
              	</div>
				{!! Form::model($data, ['method' => 'POST','route' => ['bulletin.update', $data->id]]) !!}
        		@csrf
					<div class="card-body">
						<div class="row">
							<div class="col-6">
								<label><strong>Title</strong></label>
								{!! Form::text('title', null, array('placeholder' => 'Bulletin Title','class' => 'form-control')) !!}
							</div>
						</div>
						<br>
						<div class="row">
							<div class="col-12">
								<label><strong>Content</strong></label>
								{!! Form::textarea('content', old('content', $data->content), array('placeholder' => 'Konten','class' => 'form-control summernote')) !!}
                          	</div>
						</div>
						<button type="submit" class="btn btn-info">Submit</button>
	                  	<a button type="button" class="btn btn-danger" href="{{ route('bulletin.index') }}">Cancel</a>
	                </div>
	            {!! Form::close() !!}
	        </div>
        </div>
    </div>
</section>
@endsection
@section('footer.scripts')
<script src="{{ asset('public/bower_components/admin-lte/plugins/summernote/summernote-bs4.min.js') }}"></script>
<script>
  $(function () {
    // Summernote
    $('.textarea').summernote()
  })
</script>
@endsection