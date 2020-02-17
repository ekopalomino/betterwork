@extends('apps.layouts.main')
@section('header.title')
Better Work Indonesia | Employee Bulletin
@endsection
@section('header.styles')
<link rel="stylesheet" href="{{ asset('public/bower_components/admin-lte/plugins/summernote/summernote-bs4.css') }}">
@endsection
@section('content')
<section class="content-header">
	<div class="container-fluid">
   	<div class="row mb-2">
   		<div class="col-sm-6">
     		<h1>Employee Bulletin</h1>
   		</div>
		<div class="col-sm-6">
			<ol class="breadcrumb float-sm-right">
				<li class="breadcrumb-item"><a href="{{ route('myBulletin.index') }}">My Bulletin</a></li>
				<li class="breadcrumb-item active">{{ $data->title }}</li>
			</ol>
		</div>
   	</div>
  </div>
</section>
<section class="content">
	<div class="row">
		<div class="col-md-12">
			<div class="card card-success card-outline">
				<div class="card-header">
					<div class="user-block">
						<span class="username">{{ $data->title }}</a></span>
						<span class="description">{{date("d F Y H:i",strtotime($data->created_at)) }}</span>
					</div>
				</div>
				<div class="card-body">
					<p>{!!html_entity_decode($data->content)!!} </p>
				</div>
				<div class="card-footer">
					<p>Author : {{ $data->Author->first_name }} {{ $data->Author->last_name }}</p>
				</div>
			</div>
		</div>
	</div>
</section>
@endsection
@section('footer.scripts')
<script src="{{ asset('public/bower_components/admin-lte/plugins/summernote/summernote-bs4.min.js') }}"></script>
@endsection