@extends('apps.layouts.main')
@section('header.title')
Better Work Indonesia | Dashboard
@endsection
@section('header.styles')
<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
@endsection
@section('content')
<section class="content-header">
	<div class="container-fluid">
      	<div class="row mb-2">
       		<div class="col-sm-6">
          		<h1>Grievance Dashboard</h1>
       		</div>
       	</div>
    </div>
</section>
<section class="content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-lg-4 col-6">
				<div class="small-box bg-info">
					<div class="inner">
						<h3>150</h3>
						<p>Average Respon Time</p>
					</div>
					<div class="icon">
						<i class="ion ion-bag"></i>
					</div>
				</div>
			</div>
			<div class="col-lg-4 col-6">
				<div class="small-box bg-success">
					<div class="inner">
						<h3>150</h3>
						<p>Average Closing Time</p>
					</div>
					<div class="icon">
						<i class="ion ion-bag"></i>
					</div>
				</div>
			</div>
			<div class="col-lg-4 col-6">
				<div class="small-box bg-danger">
					<div class="inner">
						<h3>150</h3>
						<p>Average Rating</p>
					</div>
					<div class="icon">
						<i class="ion ion-star-half-outline"></i>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
@endsection