@include("partials.header")

	@include("partials.topbar")

	@include("partials.sidenav")
	
	<section>
		<div class="ad-com">
			<div class="ad-dash leftpadd">
				@yield('content')
			</div>
		</div>
	</section>
	
@include("partials.footer")
