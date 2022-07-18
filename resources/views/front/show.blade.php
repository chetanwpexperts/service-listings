@extends("layouts.webmaster")

@section("content")
	<?php 
	$route = $page->route_name;
	?>
	@if($route == 'about')
		<section class=" abou-pg">
			<div class="about-ban">
				<h1>{{$page->title}}</h1>
			</div>
			<div class="container">
				<div class="row">
					<div class="about-us">
						<?=$page->description?>
					</div>
				</div>
			</div>
		</section>
		@include("partials.front.why_choose_us")
	@endif
	
	@if($route == 'faq')
		@include("partials.front.faq")
	@endif
	
	@if($route == 'feedback')
		@include("partials.front.feedback")
	@endif
	
	@if($route == 'memberlogin')
		@include("front.login")
	@endif

	@if($route == 'add-business')````````````````````````````````````````````````````````````````````````
		@include("partials.front.add-business")
	@endif
	
	<!--END-->
	<!-- START -->
	@include("partials.front.help")
@endsection