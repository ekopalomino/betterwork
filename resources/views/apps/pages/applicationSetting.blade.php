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
		@include('app_settings::_settings')
    </div>
</section>
@endsection