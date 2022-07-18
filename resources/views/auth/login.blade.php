@extends('layouts.app')

@section('content')
<section class="login-reg ad-login-reg">
	<div class="container">
		<div class="row">
			<div class="login-main">
				<div class="log-bor">&nbsp;</div> <span class="udb-inst">Super Admin</span>
				<div class="log log-1">
					<div class="login">
						<h4>Admin Login</h4>
						<form method="POST" action="{{ route('login') }}">
							@csrf
							<div class="form-group">
								<input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
							</div>
							<div class="form-group">
								<input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
							</div>
							<div class="form-group">
								<input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }} style="height:auto !important;margin-left:0rem;y">

								<label class="form-check-label" for="remember" style="margin-left: 2rem;">
									{{ __('Remember Me') }}
								</label>
							</div>
							<button type="submit" value="submit" name="admin_submit" class="btn btn-primary">Sign in</button>
						</form>
					</div>
				</div>
				<div class="log log-3">
					<div class="login">
						<h4>Forgot password</h4>
						<form>
							<div class="form-group">
								<input type="email" class="form-control" placeholder="Enter email*" pattern="^[\w]{1,}[\w.+-]{0,}@[\w-]{2,}([.][a-zA-Z]{2,}|[.][\w-]{2,}[.][a-zA-Z]{2,})$" title="Invalid email address" required>
							</div>
							<button type="submit" class="btn btn-primary">Sign in</button>
						</form>
					</div>
				</div>
				<div class="log-bot">
					<ul>
						<li> <span class="ll-1"> Login? </span>
						</li>
						<li> <span class="ll-3"> {{ __('Forgot Password?') }} </span>
						</li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</section>
@endsection
