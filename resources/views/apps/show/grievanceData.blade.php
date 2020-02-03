@extends('apps.layouts.main')
@section('header.title')
Better Work Indonesia | Grievance Database Show
@endsection
@section('header.styles')
<link rel="stylesheet" href="{{ asset('public/bower_components/admin-lte/plugins/summernote/summernote-bs4.css') }}">
@endsection
@section('content')
<section class="content-header">
	<div class="container-fluid">
      	<div class="row mb-2">
       		<div class="col-sm-6">
          		<h1>Grievance Database Show</h1>
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
          <p>Category : {{ $data->Categories->category_name }}</p>
          <p>Public Access : @if(($data->is_public) == 1)Yes @else No @endif</p>
          <p>Description : {!!html_entity_decode($data->description)!!} </p>
          <a href="{{ route('grievanceData.edit',$data->id) }}" class="btn btn-default btn-sm">
            <i class="fas fa-edit"></i> Edit
          </a>
        </div>
        <div class="card-footer card-comments">
         	<p><strong>Comments and Response</strong></p>
         	<div class="card-comment">
         	</div>
        </div>
        <div class="card-footer">
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