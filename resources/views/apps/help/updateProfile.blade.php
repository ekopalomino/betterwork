@extends('apps.layouts.main')
@section('header.title')
Better Work Indonesia | Help - Update Profile
@endsection
@section('content')
<section class="content-header">
	<div class="container-fluid">
      	<div class="row mb-2">
       		<div class="col-sm-6">
          		<h1>Update Profile</h1>
       		</div>
			<div class="col-sm-6">
				<ol class="breadcrumb float-sm-right">
					<li class="breadcrumb-item"><a href="{{ route('help.index') }}">Help Content</a></li>
					<li class="breadcrumb-item active">Update Profile</li>
				</ol>
			</div>
       	</div>
    </div>
</section>
<section class="content">
	<div class="row">
		<div class="col-12">
			<div class="card card-info card-outline">
				<div class="card-body">
					<p>There are three section of profile which you can update yourself.
					<br>
					To reset your password, click Home on Main Menu.
					</p>
					<p><img src="http://betterwork.local/public/help/user_menu/reset_password/Home.jpg" width="1200px;"></p>
					<p>Select Change Password on User Dashboard</p>
					<p><img src="http://betterwork.local/public/help/user_menu/reset_password/reset.jpg" width="1200px;"></p>
					<p>Input and confirm your new password, remember to use minimum 8 character.
				</div>
			</div>
		</div>
	</div>
</section>
@endsection