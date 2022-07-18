@extends("layouts.master")

@section("content")
	 <section class="login-reg">
		<div class="container">
			<div class="row">
                <div class="login-main add-list add-ncate">
                     <div class="log-bor">&nbsp;</div>
                    <span class="udb-inst">New Listing Sub Category</span>
                    <div class="log log-1">
                        <div class="login">
                            <h4>Add New Listing Sub Category</h4>
                           
                             <form  name="sub_category_form" id="sub_category_form" method="post" action="{{route('subcategories.update',[$editcategory->id])}}" enctype="multipart/form-data" class="cre-dup-form cre-dup-form-show">
								@csrf
                                 <div class="row">
                                     <div class="col-md-12">
                                        <div class="form-group">
                                            <select name="parent_id" class="form-control" id="parent_id">
												<option value="">Select Parent Category</option>
												@foreach($categories as $category)
													<option value="{{$category->id}}" <?php echo ($editcategory->parent_id == $category->id) ? "selected" : "";?>>{{$category->category_name}}</option>
												@endforeach
											</select>
                                        </div>
                                    </div>
                                </div>
                                 <br>
                                 <ul>
                                     <li>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                  <input type="text" value="{{$editcategory->category_name}}" name="category_name" class="form-control" placeholder="Sub category name *" required>
                                                </div>
                                            </div>
											<div class="col-md-12">
												<div class="form-group">
													<label>Update category image</label>
												  <input type="file" name="category_image" id="category_image" class="form-control" required>
												</div>
											</div>
                                            <div class="col-md-12">
												<div class="form-group">
												<label>SEO Title</label>
												  <input type="text" id="seo_title" name="seo_title" class="form-control" placeholder="Category SEO Title name *" value="{{$editcategory->seo_title}}" required>
												</div>
											</div>
											<div class="col-md-12">
												<div class="form-group">
													<label>SEO Description</label>
													<textarea id="seo_description" name="seo_description" class="form-control" required><?php echo $editcategory->seo_description;?></textarea>
												</div>
											</div>
											<div class="col-md-12">
												<div class="form-group">
													<label>SEO Keywords</label>
													<textarea id="keywords" name="keywords" class="form-control" required><?php echo $editcategory->keywords;?></textarea>
												</div>
											</div>
                                        </div>
                                     </li>
                                 </ul>
                                <button type="submit" name="sub_category_submit" class="btn btn-primary">Submit</button>
                            </form>
                            <div class="col-md-12">
                                  <a href="admin-all-sub-category.html" class="skip">Go to All Listing Sub Category >></a>
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
	jQuery( document ).ready( function( $ ) {
	
	});
	</script>

@stop