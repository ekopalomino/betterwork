@extends('apps.layouts.main')
@section('header.title')
Better Work Indonesia | Edit Knowledge Base
@endsection
@section('header.styles')
<link rel="stylesheet" href="{{ asset('bower_components/admin-lte/plugins/summernote/summernote-bs4.css') }}">
<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
@endsection
@section('content')
<section class="content-header">
	<div class="container-fluid">
      	<div class="row mb-2">
       		<div class="col-sm-6">
          		<h1>Edit Knowledge Base</h1>
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
                	<h3 class="card-title">Knowledge Base Form</h3>
              	</div>
				{!! Form::model($data, ['method' => 'POST','route' => ['knowledge.update', $data->id]]) !!}
        		@csrf
					<div class="card-body">
						<div class="row">
							<div class="col-6">
								<label><strong>Title</strong></label>
								{!! Form::text('title', null, array('placeholder' => 'Knowledge Base Title','class' => 'form-control')) !!}
							</div>
						</div>
						<br>
						<div class="row">
							<div class="col-12">
								<label><strong>Content</strong></label>
								{!! Form::textarea('content', old('content', $data->content), array('placeholder' => 'Konten','class' => 'form-control summernote')) !!}
              </div>
						</div>
            <div class="row">
              <div class="col-6">
                <label><strong>File</strong></label>
                <div class="custom-file">
                  <input type="file" class="custom-file-input" id="file" name="file">
                  <label class="custom-file-label" for="file">Choose File</label>
                </div>
              </div>
            </div>
            <br>
						<button type="submit" class="btn btn-info">Submit</button>
	                  	<a button type="button" class="btn btn-danger" href="{{ route('knowledge.index') }}">Cancel</a>
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
<script src="{{ asset('bower_components/admin-lte/plugins/bs-custom-file-input/bs-custom-file-input.min.js') }}"></script>
<script type="text/javascript">
$(document).ready(function () {
    bsCustomFileInput.init();
});
</script>
@endsection