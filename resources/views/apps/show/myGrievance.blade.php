@extends('apps.layouts.main')
@section('header.title')
Better Work Indonesia | My Grievance Data
@endsection
@section('header.styles')
<link rel="stylesheet" href="{{ asset('public/bower_components/admin-lte/plugins/summernote/summernote-bs4.css') }}">
@endsection
@section('content')
<section class="content-header">
	<div class="container-fluid">
      	<div class="row mb-2">
       		<div class="col-sm-6">
          		<h1>My Grievance Data</h1>
       		</div>
       	</div>
    </div>
</section>
<section class="content">
	<div class="row">
		<div class="col-md-12">
			<div class="card card-widget">
				<div class="card-header">
					<div class="user-block">
                  		<span class="username">{{ $data->subject }}</a></span>
                  		<span class="description">{{date("d F Y H:i",strtotime($data->created_at)) }}</span>
                	</div>
                </div>
                <div class="card-body">
                	{!!html_entity_decode($data->description)!!}
                </div>
                <div class="card-footer card-comments">
                	<p><strong>Your Grievance Respond</strong></p>
                	<div class="card-comment">
                	</div>
                </div>
                <div class="card-footer">
                	<p>Post Your Respond Here</p>
                	<form action="#" method="post">
                    	<textarea class="textarea" name="description" placeholder="Place some text here"
                        	style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">
                        </textarea>
                        <button type="submit" class="btn btn-info">Submit</button>
	                </form>
                </div>
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