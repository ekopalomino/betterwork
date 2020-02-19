@extends('apps.layouts.main')
@section('header.title')
Better Work Indonesia | Report a Problem
@endsection
@section('content')
<section class="content-header">
	<div class="container-fluid">
      	<div class="row mb-2">
       		<div class="col-sm-6">
          		<h1>Report a Problem</h1>
       		</div>
       	</div>
    </div>
</section>
<section class="content">
	<div class="row">
		<div class="col-12">
			<div class="card card-info card-outline">
				<div class="card-body">
					<p>If you experience any problem when using this application, you can report to us using these link below.</p>
					<p><a href="http://support.iteos.tech" target="blank">iTeos Tech Support Center</a></p>
					<p>Please make sure to complete the following data, so we can help resolve your problem.</p>
					<ul>
						<li>Your user access role</li>
						<li>Action taken before problem occured</li>
						<li>URL page which problem occured</li>
						<li>Screenshot of the problem</li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</section>
@endsection