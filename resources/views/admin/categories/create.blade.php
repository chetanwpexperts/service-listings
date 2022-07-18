@extends("layouts.master")

@section("content")
	 <section class="login-reg">
		<div class="container">
			<div class="row">
				<div class="login-main add-list add-ncate">
					 <div class="log-bor">&nbsp;</div>
					<span class="udb-inst">New Listing Category</span>
					<div class="log log-1">
						<div class="login">
							<h4>Add New Listing Category</h4>
							<span class="add-list-add-btn cate-add-btn" data-toggle="tooltip" title="Click to make additional category">+</span>
							<span class="add-list-rem-btn cate-rem-btn" data-toggle="tooltip" title="Click to remove last category">-</span>
							@if ($errors->any())
								<div class="alert alert-danger">
									<ul>
										@foreach ($errors->all() as $error)
											<li>{{ $error }}</li>
										@endforeach
									</ul>
								</div>
							@endif
							 <form name="category_form" id="category_form" method="post" action="{{route('categories.store')}}" class="cre-dup-form cre-dup-form-show" enctype="multipart/form-data">
								@csrf
								 <ul>
									 <li>
										<div class="row">
											<div class="col-md-12">
												<div class="form-group">
												  <input type="text" id="category_name" name="category_name[]" class="form-control" placeholder="Category name *" required>
												</div>
											</div>
											<div class="col-md-12">
												<div class="form-group">
													<label>Choose category image</label>
												  <input type="file" name="category_image[]" id="category_image" class="form-control" required>
												</div>
											</div>
											<div class="col-md-12">
												<div class="form-group">
												<label>SEO Title</label>
												  <input type="text" id="seo_title" name="seo_title[]" class="form-control" placeholder="Category SEO Title name *" value="" required>
												</div>
											</div>
											<div class="col-md-12">
												<div class="form-group">
													<label>SEO Description</label>
													<textarea id="seo_description" name="seo_description[]" class="form-control" required></textarea>
												</div>
											</div>
											<div class="col-md-12">
												<div class="form-group">
													<label>SEO Keywords</label>
													<textarea id="keywords" name="keywords[]" class="form-control" required></textarea>
												</div>
											</div>
										</div>
									 </li>
								 </ul>
								<button type="submit" name="category_submit" class="btn btn-primary">Submit</button>
							</form>
							<div class="col-md-12">
								
								<a href="{{route('listingcategories')}}" class="skip">Go to All Listing Category >></a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
@endsection

@section('scripts')

    <script>
	CKEDITOR.replace('otherinfo_1');
	</script>

@stop