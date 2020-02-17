@extends('apps.layouts.main')
@section('header.title')
Better Work Indonesia | Verify Email
@endsection
@section('content')
<section class="content">
	<br>
	<div class="row">
		<div class="col-12">
			<div class="card card-info card-outline">
				<div class="row justify-content-center">
					<div class="col-md-8">
						<div class="card">
							<div class="card-header">{{ __('Verify Your Email Address') }}</div>

							<div class="card-body">
								@if (session('resent'))
									<div class="alert alert-success" role="alert">
										{{ __('A fresh verification link has been sent to your email address.') }}
									</div>
								@endif

								{{ __('Before proceeding, please check your email for a verification link.') }}
								{{ __('If you did not receive the email') }}, <a href="{{ route('verification.resend') }}">{{ __('click here to request another') }}</a>.
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
@endsection
