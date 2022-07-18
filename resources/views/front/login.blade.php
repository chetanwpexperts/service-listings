@extends("layouts.webmaster")

@section("content")
	<section class=" login-reg">
		<div class="container">
			<div class="row">
				<div class="login-main">
					<div class="log-bor">&nbsp;</div>
					<?php 
					$val = Session::get('verifyotp');
					$regsiterstatus = Session::get('regsiter');
					if($val == "Yes")
					{
						?>
						<div class="log log-9">
							<div class="login">
								<h4>Verify OTP</h4>
								<div class="alert alert-success">
									Please verify your phone or email to enter OTP sent on your email and phone number.
								</div>
								<form id="login_form" name="login_form" method="post" action="{{route('verifyotp')}}">
									@csrf
									<div class="form-group">
										<input type="text" autocomplete="off" name="otp" id="otp" class="form-control" placeholder="Enter otp*" required>
									</div>
									<button type="submit" name="otp_submit" value="submit" class="btn btn-primary">Verify</button>
								</form>
							</div>
						</div>
						<?php 
					}else{
					?>
					<div class="log log-1">
						<div class="login">
							<h4>Member Login</h4>
							<?php
							if($regsiterstatus == "success")
							{
								?>
								<div class="alert alert-success">
									You are successfully regsitered, Please login.
								</div><br />
								<?php
							}
							?>
							@if ($errors->any())
								<div class="alert alert-danger">
									<ul>
										@foreach ($errors->all() as $error)
											<li>{{ $error }}</li>
										@endforeach
									</ul>
								</div>
							@endif
							
							@if(session()->get('success'))
								<div class="alert alert-success">
									{{ session()->get('success') }}  
								</div><br />
							@endif
							
							@if(session()->get('error'))
								<div class="alert alert-danger">
									{{ session()->get('error') }}  
								</div><br />
							@endif
							
							<form id="login_form" name="login_form" method="post" action="{{route('checklogin')}}">
								@csrf
								<div class="form-group">
									<input type="email" autocomplete="off" name="email" id="email" class="form-control" placeholder="Enter email*" pattern="^[\w]{1,}[\w.+-]{0,}@[\w-]{2,}([.][a-zA-Z]{2,}|[.][\w-]{2,}[.][a-zA-Z]{2,})$" title="Enter email address" required>
								</div>
								<div class="form-group">
									<input type="password" name="password" id="password" class="form-control" placeholder="Enter password*" required value="passwor">
								</div>
								<button type="submit" name="login_submit" value="submit" class="btn btn-primary">Sign in</button>
							</form>
							<!-- SOCIAL MEDIA LOGIN -->
							<div class="soc-log">
								<ul>
									<li>
										<div class="g-signin2" data-onsuccess="onSignIn"></div>
									</li>
									<!--                                <li>-->
									<!--                                    <a href="google_login.html" class="login-goog"><img src="images/icon/seo.png">Continue-->
									<!--                                        with Google</a>-->
									<!--                                </li>-->
									<li>
										<a href="javascript:void(0);" onclick="fbLogin();" class="login-fb">
											<img src="{{ asset('public/images/icon/facebook.png') }}">Continue with Facebook</a>
									</li>
								</ul>
							</div>
							<!-- END SOCIAL MEDIA LOGIN -->
						</div>
					</div>
					<div class="log log-2">
						<div class="login">
							<h4>Create an account</h4>
							<p>Don't have an account? Create your account. It's take less then a minutes</p>
							<?php
							if(isset($_GET['success']) && $_GET['success'] == 1)
							{
								?>
								<div class="alert alert-success">
									User successfully regsiter.
								</div><br />
								<?php
							}
							?>
							@if ($errors->any())
								<div class="alert alert-danger">
									<ul>
										@foreach ($errors->all() as $error)
											<li>{{ $error }}</li>
										@endforeach
									</ul>
								</div>
							@endif
							<form name="register_form" id="register_form" method="post" action="{{ route('memberregsiter') }}">
								@csrf
								<div class="form-group">
									<input autocomplete="off" id="first_name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="Enter Name">
									@error('name')
										<span class="invalid-feedback" role="alert">
											<strong>{{ $message }}</strong>
										</span>
									@enderror
								</div>
								<div class="form-group">
									<input id="email_id" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Enter Valid Email">

									@error('email')
										<span class="invalid-feedback" role="alert">
											<strong>{{ $message }}</strong>
										</span>
									@enderror
								</div>
								<div class="form-group">
									<input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="Enter Password">

									@error('password')
										<span class="invalid-feedback" role="alert">
											<strong>{{ $message }}</strong>
										</span>
									@enderror
								</div>
								
								<div class="form-group">
									<input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="Enter Confirm Password">
								</div>
								
								<div class="form-group">
									<input type="text" onkeypress="return isNumber(event)" autocomplete="off" name="phone" id="mobile_number" class="form-control" placeholder="Enter Phone Number" required>
								</div>

								<div class="form-group">
									<select name="type" id="type" class="form-control">
										<option value="">Select User Type</option>
										<option value="General">General</option>
										<option value="Service Provider">Service Provider</option>
									</select>
								</div>
								
								 <button type="submit" name="register_submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
							</form>
							<!-- SOCIAL MEDIA LOGIN -->
							<div class="soc-log">
								<ul>
									<li>
										<div class="g-signin2" data-onsuccess="onSignIn"></div>
									</li>
									<!--                                        <li>-->
									<!--                                            <a href="google_login.html" class="login-goog"><img-->
									<!--                                                    src="images/icon/seo.png">Continue-->
									<!--                                                with Google</a>-->
									<!--                                        </li>-->
									<li>
										<a href="javascript:void(0);" onclick="fbLogin();" class="login-fb">
											<img src="{{ asset('public/images/icon/facebook.png') }}">Continue with Facebook</a>
									</li>
								</ul>
							</div>
							<!-- END SOCIAL MEDIA LOGIN -->
						</div>
					</div>
					<div class="log log-3">
						<div class="login">
							<h4>Forgot password</h4>
							<form id="forget_form" name="forget_form" method="post" action="forgot_process.html">
								<div class="form-group">
									<input type="email" autocomplete="off" name="email_id" id="email_id" class="form-control" placeholder="Enter email*" pattern="^[\w]{1,}[\w.+-]{0,}@[\w-]{2,}([.][a-zA-Z]{2,}|[.][\w-]{2,}[.][a-zA-Z]{2,})$" title="Invalid email address" required>
								</div>
								<button type="submit" name="forgot_submit" class="btn btn-primary">Submit</button>
							</form>
						</div>
					</div>
					<div class="log-bot">
						<ul>
							<li> <span class="ll-1">Login?</span>
							</li>
							<li> <span class="ll-2">Create an account?</span>
							</li>
							<li> <span class="ll-3">Forgot password?</span>
							</li>
						</ul>
					</div>
					<?php 
					}
					?>
				</div>
			</div>
		</div>
	</section>
	<!--END PRICING DETAILS-->
	<section>
		<div class="pop-ups pop-quo">
			<!-- The Modal -->
			<div class="modal fade" id="quote">
				<div class="modal-dialog">
					<div class="modal-content">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<!-- Modal Header -->
						<div class="quote-pop">
							<h4>Get quote</h4>
							<form>
								<div class="form-group">
									<input type="text" class="form-control" placeholder="Enter name*" required>
								</div>
								<div class="form-group">
									<input type="email" class="form-control" placeholder="Enter email*" pattern="^[\w]{1,}[\w.+-]{0,}@[\w-]{2,}([.][a-zA-Z]{2,}|[.][\w-]{2,}[.][a-zA-Z]{2,})$" title="Invalid email address" required>
								</div>
								<div class="form-group">
									<input type="text" class="form-control" placeholder="Enter mobile number *" pattern="[7-9]{1}[0-9]{9}" title="Phone number starting with 7-9 and remaining 9 digit with 0-9" required>
								</div>
								<div class="form-group">
									<textarea class="form-control" rows="3" placeholder="Enter your query or message"></textarea>
								</div>
								<button type="submit" class="btn btn-primary">Submit</button>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!--END-->
	<!-- START -->
	@include("partials.front.help")
@endsection

@section('scripts')
<script>
jQuery(document).ready(function($) 
{
	$(".alert-success").fadeTo(4000, 500).slideUp(500, function() 
	{
		$(".alert-success").slideUp(500);
	});
});
</script>
@endsection