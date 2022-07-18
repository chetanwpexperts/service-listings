@extends("layouts.master")

@section("content")
	<div class="ud-cen">	
		@if ($errors->any())
			<div class="alert alert-danger">
				<ul>
					@foreach ($errors->all() as $error)
						<li>{{ $error }}</li>
					@endforeach
				</ul>
			</div>
		@endif
		<form name="seo_general_form" id="seo_general_form" method="post" action="{{route('section.store')}}" enctype="multipart/form-data" class="cre-dup-form cre-dup-form-show">
			@csrf
			<div class="pg-cen">
				<div class="s-com pg-tit">
					<h1>Section Heading</h1>
					<div class="form-group">
						
						<select class="form-control" name="section_heading">
							<option value="">Select</option>
							<option value="Home Page">Home Page</option>
							<option value="Home Banner">Home Banner</option>
							<option value="Why Choose Us">Why Choose Us</option>
							<option value="How It Works">How It Works</option>
							<option value="Business Directory and Service Provider">Business Directory and Service Provider</option>
							<option value="FAQ">FAQ</option>
							<option value="Feedback">Feedback</option>
						</select>
					</div>
				</div>
				<div class="s-com pg-tit">
					<h1>Section Name</h1>
					<div class="form-group">
						<input type="text" name="section_name" class="form-control" placeholder="Enter Section Name">
					</div>
				</div>
				<div class="s-com pg-edita">
					<div class="form-group">
						<textarea class="form-control" id="description" name="description" placeholder="Details about your section"></textarea>
					</div>
				</div>
				<div class="s-com">
					<h6>Section Image:</h6>
					<div class="form-group">
						<input type="file" name="image" class="form-control" placeholder="Download link">
					</div>
				</div>
				
				<div class="inn">
					<div class="form-group">
						<button name="general_submit" type="submit" class="btn-pub btn-pub">Save changes</button>
					</div>
				</div>
			</div>
			
		</form>
	</div>
@endsection

@section('scripts')

    <script>
	CKEDITOR.replace('description');
	</script>

@stop