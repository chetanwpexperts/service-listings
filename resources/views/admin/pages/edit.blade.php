@extends("layouts.master")

@section("content")
	<div class="ud-cen">
		<form name="seo_general_form" id="seo_general_form" method="post" action="{{route('pages.update')}}" enctype="multipart/form-data" class="cre-dup-form cre-dup-form-show">
			@csrf
			<input type="hidden" name="page_id" value="{{$pageData->page_id}}" />
			<input type="hidden" name="id" value="{{$pageData->id}}" />
			<div class="pg-cen">
				<div class="s-com pg-tit">
					<h1>Edit page</h1>
					<div class="form-group">
						<input type="text" name="title" value="{{$pageData->title}}" class="form-control">
					</div>
				</div>
				<div class="s-com pg-edita">
					<div class="form-group">
						<textarea class="form-control" id="page_description" name="description" placeholder="Details about your listing">{{$pageData->description}}</textarea>
					</div>
				</div>
				<div class="s-com">
					<h6>Banner image:</h6>
					<div class="form-group">
						<input type="file" name="image" class="form-control" placeholder="Download link">
					</div>
				</div>
				<div class="s-com pg-cen-tab pg-seo">
					<h4>SEO settings</h4>
					<div class="inn">
						<div class="form-group">
							<label>Page title</label>
							<input type="text" name="meta_title" value="{{$pageData->meta_title}}" class="form-control">
						</div>
						<div class="form-group">
							<label>Page keywords</label>
							<input type="text" name="keywords" value="{{$pageData->keywords}}" class="form-control">
						</div>
						<div class="form-group">
							<label>Page descriptions</label>
							<input type="text" name="meta_description" value="{{$pageData->meta_description}}" class="form-control">
						</div>
					</div>
				</div>
				<div class="s-com pg-cen-tab pg-adv-seo">
					<h4>Advance SEO settings</h4>
					<div class="inn">
						<div class="form-group">
							<label>Google schema</label>
							<textarea name="g_schema" class="form-control">{{$pageData->g_schema}}</textarea>
						</div>
					</div>
				</div>
			</div>
			<div class="pg-rhs">
				<div class="box pub">
					<h3>Publish</h3>
					<div class="inn">
						<ul>
							<li>
								<label>Status</label>
								<div class="form-group">
									<select name="status">
										<option value="">Select</option>
										<option value="1" <?php echo ($pageData->status == '1') ? "selected" : "";?>>Publish</option>
										<option value="3" <?php echo ($pageData->status == '3') ? "selected" : "";?>>Draft</option>
									</select>
								</div>
							</li>
							<li>
								<label>Visibility</label>
								<div class="form-group">
									<select name="page_visibility">
										<option value="">Select</option>
										<option value="public" <?php echo ($pageData->page_visibility == 'public') ? "selected" : "";?>>Public</option>
										<option value="private" <?php echo ($pageData->page_visibility == 'private') ? "selected" : "";?>>Private</option>
									</select>
								</div>
							</li>
							<!-- <li>-->
							<!-- <button class="btn-pub">Publish</button>-->
							<!-- </li>-->
							<li>
								<button name="general_submit" type="submit" class="btn-pub btn-pub">Save changes</button>
							</li>
						</ul>
					</div>
				</div>
				
				<div class="box pub">
					<h3>Page setting</h3>
					<div class="inn">
						<?php
						$settings = json_decode($pageData->page_settings);
						?>
						<ul>
							<li>
								<label>Show Listing</label>
								<div class="form-group">
									<select name="page_settings[show_listing]" id="showlisting">
										<option value="">Select</option>
										<option value="1" <?php echo ($settings[0]->show_listing == '1') ? "selected" : "";?>>Yes</option>
										<option value="0" <?php echo ($settings[0]->show_listing == '0') ? "selected" : "";?>>No</option>
									</select>
								</div>
							</li>
							<li>
								<label>Show Products</label>
								<div class="form-group">
									<select name="page_settings[show_products]" id="showproducts">
										<option value="">Select</option>
										<option value="1" <?php echo ($settings[0]->show_products == '1') ? "selected" : "";?>>Yes</option>
										<option value="0" <?php echo ($settings[0]->show_products == '0') ? "selected" : "";?>>No</option>
									</select>
								</div>
							</li>
							<li>
								<label>Show Blogs</label>
								<div class="form-group">
									<select name="page_settings[show_blogs]" id="showblogs">
										<option value="">Select</option>
										<option value="1" <?php echo ($settings[0]->show_blogs == '1') ? "selected" : "";?>>Yes</option>
										<option value="0" <?php echo ($settings[0]->show_blogs == '0') ? "selected" : "";?>>No</option>
									</select>
								</div>
							</li>
							<li>
								<label>Enquiry form</label>
								<div class="form-group">
									<select name="page_settings[show_enquiry_form]" id="showenquiry">
										<option value="">Select</option>
										<option value="1" <?php echo ($settings[0]->show_enquiry_form == '1') ? "selected" : "";?>>Yes</option>
										<option value="0" <?php echo ($settings[0]->show_enquiry_form == '0') ? "selected" : "";?>>No</option>
									</select>
								</div>
							</li>
						</ul>
					</div>
				</div>	
				<!--- LISTINGS --->
				<div class="box pub" id="listing" style="<?php echo ($settings[0]->show_listing == '1') ? "display:block;" : "display:none;";?>" >
					<h3>Listings</h3>
					<div class="inn">
						<div class="form-group">
							<select placeholder="Choose Listings" name="listing_id[]" id="page-new-list-add" multiple class="chosen-select form-control">
								<option value="396">qwerqw</option>
								<option value="395">test</option>
								
							</select>
						</div>
					</div>
				</div>
				<!--- END PRODUCTS --->
				<!--- PRODUCTS --->
				<div class="box pub" id="products" style="<?php echo ($settings[0]->show_products == '1') ? "display:block;" : "display:none;";?>">
					<h3>Products</h3>
					<div class="inn">
						<div class="form-group">
							<select placeholder="Choose Products" name="product_ids[]" id="page-new-pro-add" multiple class="chosen-select form-control">
								<option value="36">Audi q3</option>
								<option value="34">WHIRLPOOL FRIDGE</option>
								<option value="33">DELL</option>
								
							</select>
						</div>
					</div>
				</div>
				<!--- END PRODUCTS --->
				
				<!--- BLOG POST --->
				<div class="box pub" id="blogs" style="<?php echo ($settings[0]->show_blogs == '1') ? "display:block;" : "display:none;";?>">
					<h3>Blog posts</h3>
					<div class="inn">
						<div class="form-group">
							<select placeholder="Choose Blogs" name="blog_ids[]" id="page-new-blog-add" multiple class="chosen-select form-control">
								<option value="52">INCEPTION</option>
								<option value="50">The great wall</option>
								<option value="49">AVENGERS INFINTY WAR</option>
								<option value="46">Party time to beach ?</option>
								
							</select>
						</div>
					</div>
				</div>
				<!--- END BLOG POST --->
			</div>
		</form>
	</div>
@endsection

@section('scripts')

    <script>
	jQuery( document ).ready( function( $ ) {
		$( "#showlisting" ).on( "change", function() {
			if( $( this ).val() == 1)
			{
				$("#listing").show();
				$("#page_new_list_add_chosen").css({"width": "100%"});
			}else{
				$("#listing").hide();
			}
		});
		
		$( "#showproducts" ).on( "change", function() {
			if( $( this ).val() == 1)
			{
				$("#products").show();
				$("#page_new_pro_add_chosen").css({"width": "100%"});
			}else{
				$("#products").hide();
			}
		});
		
		$( "#showblogs" ).on( "change", function() {
			if( $( this ).val() == 1)
			{
				$("#blogs").show();
				$("#page_new_blog_add_chosen").css({"width": "100%"});
			}else{
				$("#blogs").hide();
			}
		});
		
	});
	
	CKEDITOR.replace('page_description');
	</script>

@stop