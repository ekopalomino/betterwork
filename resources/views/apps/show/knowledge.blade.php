@extends('apps.layouts.main')
@section('header.title')
Better Work Indonesia | Employee Knowledge Base
@endsection
@section('header.styles')
<link rel="stylesheet" href="{{ asset('public/bower_components/admin-lte/plugins/summernote/summernote-bs4.css') }}">
@endsection
@section('content')
<section class="content-header">
	<div class="container-fluid">
   	<div class="row mb-2">
   		<div class="col-sm-6">
     		<h1>Employee Knowledge Base</h1>
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
          	<span class="username">{{ $data->title }}</a></span>
          	<span class="description">{{date("d F Y H:i",strtotime($data->created_at)) }}</span>
          </div>
        </div>
        <div class="card-body">
          <p>Category : {{ $data->Categories->category_name }}</p>
          <p>Description : {!!html_entity_decode($data->description)!!} </p>
          <p>
            <embed
                src="{{ Storage::url($data->file) }}"
                style="width:600px; height:800px;"
                frameborder="0"
                type="application/pdf"
            >
          </p>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection
@section('footer.scripts')
<script src="{{ asset('public/bower_components/admin-lte/plugins/summernote/summernote-bs4.min.js') }}"></script>
@endsection