@include("partials.header")
	
	<section>
		<div class="ad-com">
			<div class="ad-dash leftpadd">
				@yield('content')
			</div>
		</div>
	</section>
@include("partials.footer")
	<script src="{{ asset('public/js/custom.js') }}"></script>

