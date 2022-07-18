@extends("layouts.master")

@section("content")
	 <section class="login-reg">
		<div class="container">
			<div class="row">
				<div class="login-main add-list add-ncate">
					 <div class="log-bor">&nbsp;</div>
					<span class="udb-inst">Update Listing Category</span>
					<div class="log log-1">
						<div class="login">
							<h4>Edit Listing Category</h4>

							@if ($errors->any())
								<div class="alert alert-danger">
									<ul>
										@foreach ($errors->all() as $error)
											<li>{{ $error }}</li>
										@endforeach
									</ul>
								</div>
							@endif
							 <form name="category_form" id="category_form" method="post" action="{{route('categories.update',[$category->id])}}" class="cre-dup-form cre-dup-form-show" enctype="multipart/form-data">
								@csrf
								 <ul>
									 <li>
										<div class="row">
											<div class="col-md-12">
												<div class="form-group">
												  <input type="text" id="category_name" name="category_name" class="form-control" placeholder="Category name *" value="{{$category->category_name}}" required>
												</div>
											</div>
											<div class="col-md-12">
												<div class="form-group">
													<label>Update new category image</label>
												  <input type="file" name="category_image" id="category_image" class="form-control">
												</div>
											</div>
											<div class="col-md-12">
												<div class="form-group">
												<label>SEO Title</label>
												  <input type="text" id="seo_title" name="seo_title" class="form-control" placeholder="Category SEO Title name *" value="{{$category->seo_title}}" required>
												</div>
											</div>
											<div class="col-md-12">
												<div class="form-group">
													<label>SEO Description</label>
													<textarea id="seo_description" name="seo_description" class="form-control" required><?php echo $category->seo_description;?></textarea>
												</div>
											</div>
											<div class="col-md-12">
												<div class="form-group">
													<label>SEO Keywords</label>
													<textarea id="keywords" name="keywords" class="form-control" required><?php echo $category->keywords;?></textarea>
												</div>
											</div>
										</div>
									 </li>
								 </ul>
								<button type="submit" name="category_submit" class="btn btn-primary">Submit</button>
							</form>
							<div class="col-md-12">
								<a href="javascript:void(0);" class="skip" data-toggle="modal" data-target="#infoModalCenter">Add/Update Other Information >></a>
								<a href="javascript:void(0);" class="skip" data-toggle="modal" data-target="#faqModalCenter">Add/Update FAQ >></a>
								<a href="{{route('listingcategories')}}" class="skip">Go to All Listing Category >></a>
							</div>
							
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!--- other information -->

	<div class="modal fade" id="infoModalCenter" tabindex="-1" role="dialog" aria-labelledby="infoModalCenterTitle" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLongTitle">Add Category Other Information</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<div class="row">
						<div class="add-ncateotherinfo">
							<div class="log-bor">&nbsp;</div>
							<div class="log log-9999">
								<div class="login">
									<h4>Add/Update Information</h4>
									<?php
									$infocount = count($categoryinfo); 
									$infocount = ($infocount == 0) ? 1 : $infocount;
									if($infocount <= 1) { ?>	
									<span class="add-list-add-btn cateotherinfo-add-btn" data-toggle="tooltip" title="Click to make additional category">+</span>
									<span class="add-list-rem-btn cateotherinfo-rem-btn" data-toggle="tooltip" title="Click to remove last category">-</span>
									<?php } ?>
									@if ($errors->any())
										<div class="alert alert-danger">
											<ul>
												@foreach ($errors->all() as $error)
													<li>{{ $error }}</li>
												@endforeach
											</ul>
										</div>
									@endif
									<?php 
									$route = route('categories.updateotherinfo', [$category->id]);
									if($infocount <= 1) {
										$route = route('categories.saveotherinfo');
									}
									$getType = "";
									foreach($categoryinfo as $info)
									{
										$getType = $info->type;
									}
									?>
									<form name="category_form" id="category_form" method="post" action="{{$route}}" class="cre-dup-form cre-dup-form-show" enctype="multipart/form-data">
										@csrf
										<ul>
											<?php 
											if($infocount > 1)
											{
												$count = 1;
												foreach($categoryinfo as $info)
												{
													?>
													<li>
														<div class="row"> 
															<div class="col-md-12"> 
																<div class="form-group">
																	<input class="form-control" type="text" name="heading[]" id="heading_<?=$count?>" value="<?php echo $info->heading;?>" required placeholder="heading" />
																</div>
															</div>
															<div class="col-md-12"> 
																<div class="form-group">
																	<textarea id="otherinfo_<?=$count?>" name="otherinfo[]" class="form-control" required><?php echo $info->otherinfo;?></textarea>
																</div>
															</div>
														</div>
														<input type="hidden" id="infoid" name="infoid[]" value="{{$info->id}}" />
													</li>
													<?php
													$count++;
												}
											}else{
												?>
												<li>
													<div class="row"> 
														<div class="col-md-12"> 
															<div class="form-group">
																<input class="form-control" type="text" name="heading[]" id="heading_1" required placeholder="heading" />
															</div>
														</div>
														<div class="col-md-12"> 
															<div class="form-group">
																<textarea id="otherinfo_1" name="otherinfo[]" class="form-control" required></textarea>
															</div>
														</div>
													</div>
												</li>
												<?php
											}
											?>
										</ul>
										<input type="hidden" id="countinfo" value="{{$infocount}}" />
										<input type="hidden" name="id" id="id" value="{{$category->id}}" />
										<input type="radio" name="type" value="info" style="height:auto;" <?php echo ($getType == "info") ? "checked":""?> /> Save as Information &nbsp;
										<input type="radio" name="type" value="faq" style="height:auto;" <?php echo ($getType == "faq") ? "checked":""?> /> Save as FAQ
										<p>&nbsp;</p>
										<button type="submit" name="category_submit" class="btn btn-primary">Submit</button>
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					&nbsp;
				</div>
			</div>
		</div>
	</div>

	<div class="modal fade" id="faqModalCenter" tabindex="-1" role="dialog" aria-labelledby="faqModalCenterTitle" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLongTitle">Add Category FAQs</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<div class="row">
						<div class="add-ncatefaq">
							<div class="log-bor">&nbsp;</div>
							<div class="log log-9999">
								<div class="login">
									<h4>Add/Update FAQs</h4>
									<?php
									$faqcount = count($categoryfaq); 
									$faqcount = ($faqcount == 0) ? 1 : $faqcount;
									if($faqcount <= 1) { ?>	
									<span class="add-list-add-btn catefaq-add-btn" data-toggle="tooltip" title="Click to make additional category">+</span>
									<span class="add-list-rem-btn catefaq-rem-btn" data-toggle="tooltip" title="Click to remove last category">-</span>
									<?php } ?>
									@if ($errors->any())
										<div class="alert alert-danger">
											<ul>
												@foreach ($errors->all() as $error)
													<li>{{ $error }}</li>
												@endforeach
											</ul>
										</div>
									@endif
									<?php 
									$route = route('categories.updatefaq', [$category->id]);
									if($faqcount <= 1) {
										$route = route('categories.savefaq');
									}
									$getType = "";
									foreach($categoryfaq as $faq)
									{
										$getType = $faq->type;
									}
									?>
									<form name="category_faq_form" id="category_faq_form" method="post" action="{{$route}}" class="cre-dup-form cre-dup-form-show" enctype="multipart/form-data">
										@csrf
										<ul>
											<?php 
											if($faqcount > 1)
											{
												$count = 1;
												foreach($categoryfaq as $faq)
												{
													?>
													<li>
														<div class="row"> 
															<div class="col-md-12"> 
																<div class="form-group">
																	<input class="form-control" type="text" name="heading[]" id="faqheading_<?=$count?>" value="<?php echo $faq->heading;?>" required placeholder="heading" />
																</div>
															</div>
															<div class="col-md-12"> 
																<div class="form-group">
																	<textarea id="faq_<?=$count?>" name="otherinfo[]" class="form-control ckeditr" required><?php echo $faq->otherinfo;?></textarea>
																</div>
															</div>
														</div>
														<input type="hidden" id="infoid" name="infoid[]" value="{{$faq->id}}" />
													</li>
													<?php
													$count++;
												}
											}else{
												?>
												<li>
													<div class="row"> 
														<div class="col-md-12"> 
															<div class="form-group">
																<input class="form-control" type="text" name="heading[]" id="faqheading_1" required placeholder="heading" />
															</div>
														</div>
														<div class="col-md-12"> 
															<div class="form-group">
																<textarea id="faq_1" name="otherinfo[]" class="form-control ckeditr" required></textarea>
															</div>
														</div>
													</div>
												</li>
												<?php
											}
											?>
										</ul>
										<input type="hidden" id="countfaq" value="{{$faqcount}}" />
										<input type="hidden" name="id" id="id" value="{{$category->id}}" />
										<input type="radio" name="type" value="info" style="height:auto;" <?php echo ($getType == "info") ? "checked":""?> /> Save as Information &nbsp;
										<input type="radio" name="type" value="faq" style="height:auto;" <?php echo ($getType == "faq") ? "checked":""?> /> Save as FAQ
										<p>&nbsp;</p>
										<button type="submit" name="category_submit" class="btn btn-primary">Submit</button>
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					&nbsp;
				</div>
			</div>
		</div>
	</div>
@endsection

@section('scripts')

    <script>
	jQuery( document ).ready( function( $ ) {
		var count = $("#countinfo").val();
		for(i=1;i<=count;i++)
		{
			console.log("i " + i);
			CKEDITOR.replace('otherinfo_'+i);
		}
		var jcount = $("#countfaq").val();
		for(j=1;j<=jcount;j++)
		{
			console.log("j " + j);
			CKEDITOR.replace('faq_'+j);
		}
	});

	</script>

@stop