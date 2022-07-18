@extends("layouts.webmaster")

@section("content")
<style>
		.hom-head {
		        padding: 0
		    }
		
		    .hom-head:before {
		        display: none
		    }
		
		    .hom-head .hom-top ~ .container {
		        display: none
		    }
		
		    .carousel-item:before {
		        background: none
		    }
		
		    .home-tit {
		        padding-top: 0
		    }
	</style>

	<section class="abou-pg commun-pg-main">
		<div class="about-ban comunity-ban">
			<h1>All Services</h1>
			<p>Connect with the right Service Experts</p>
			<input type="text" id="tail-se" placeholder="Search sub category here..">
		</div>
	</section>
	<!-- START -->
	<section>
		<div class="str all-cate-pg">
			<div class="container">
				<div class="row">
					<div class="sh-all-scat">
                        @foreach($categories as $category)
                        <ul id="tail-re">
							<li>
								<div class="sh-all-scat-box">
									<div class="lhs">
                                        <?php
                                        $imgSrc = asset('public/images/defaultimg.png');
                                        if($category->category_image != "" || $category->category_image != null)
                                        {
                                            $imgSrc = asset('public/public/listing-categories/' . $category->category_image);
                                        }
                                        ?>
                                        <img src="{{ $imgSrc }}" alt="">
									</div>
									<div class="rhs">
										<h4>
                                            <a href="{{route('getcategorylisting', [$category->category_slug])}}">{{$category->category_name}} <span><?php echo getCategoryListingCount($category->id, "");?></span> </a>
                                        </h4>
										<ol>
                                            <?php 
                                            $sub_categories = getSubCateories($category->id);
                                            if(!empty($sub_categories))
                                            {
                                                foreach($sub_categories as $subcat)
                                                {
                                                    ?>
                                                    <li> <a href="{{route('getsubcategorylisting',['category_slug' => $subcat->category_slug, 'parent_slug' => $category->category_slug, ])}}">{{$subcat->category_name}} <span><?php echo getCategoryListingCount("", $subcat->id);?></span></a></li>
                                                    <?php 
                                                }
                                            }else{
                                                ?>
											    <li> Not Available </li> 
											    <?php 
                                            }
                                            ?>
										</ol>
									</div>
								</div>
							</li>
						</ul>
                        @endforeach
					</div>
				</div>
			</div>
	</section>
@endsection