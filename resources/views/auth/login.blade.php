<x-login-layout>
	<div class="d-flex flex-column flex-root">
		<!--begin::Login-->
		<div class="login login-3 login-signin-on d-flex flex-row-fluid" id="kt_login">
			<div class="d-flex flex-center bgi-size-cover bgi-no-repeat flex-row-fluid" style="background-image: url({{ asset('media/bg/bg-2.jpg') }});">
				<div class="login-form text-center text-white p-7 position-relative overflow-hidden">
					<!--begin::Login Header-->
					<div class="d-flex flex-center mb-15">
						<a href="#">
							<img src="{{ asset('media/logos/logo-letter-13.png') }}" class="max-h-75px" alt="" />
						</a>
					</div>
					<!--end::Login Header-->
					<!--begin::Login Sign in form-->
					<div class="login-signin">
						<div class="mb-20">
							<h3 class="opacity-40 font-weight-normal">Sign In To Admin</h3>
							<p class="opacity-40">Enter your details to login to your account:</p>
						</div>
						<!-- Session Status -->
						<x-auth-session-status class="mb-3" :status="session('status')" />

						<!-- Validation Errors -->
						<x-auth-validation-errors class="mb-3" :errors="$errors" />
						<form method="POST" action="{{ route('login') }}" class="form" id="kt_login_signin_form">
							@csrf
							
							<div class="form-group">
								<input class="form-control h-auto text-white bg-white-o-5 rounded-pill border-0 py-4 px-8" type="text" placeholder="Email" name="email" autocomplete="off" />
							</div>
							<div class="form-group">
								<input class="form-control h-auto text-white bg-white-o-5 rounded-pill border-0 py-4 px-8" type="password" placeholder="Password" name="password" />
							</div>
							<div class="form-group d-flex flex-wrap justify-content-between align-items-center px-8 opacity-60">
								<label class="checkbox checkbox-outline checkbox-white text-white m-0">
								<input type="checkbox" name="remember" />Remember me
								<span></span></label>
							</div>
							<div class="form-group text-center mt-10">
								<button id="kt_login_signin_submit" class="btn btn-pill btn-primary opacity-90 px-15 py-3">Sign In</button>
							</div>
						</form>
					</div>
					<!--end::Login Sign in form-->
				</div>
			</div>
		</div>
		<!--end::Login-->
	</div>
</x-login-layout>