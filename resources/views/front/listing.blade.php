@extends("layouts.webmaster")

@section("content")
<style>
	.header{
        border-radius: 20px 20px 0px 0px;
        padding: 10px 0px;
        background: #090b52;
        color: #fff;
        width: 100%;
        display: flex;
        align-content: center;
        justify-content: center;
      }
	  .header h1{font-size:1rem;}
		.faq-item{
        margin-bottom: 40px;
        margin-top: 40px;
      }
	  .faq-item h3{ font-size:1rem;}
      .faq-body{
        display: none;
        margin-top: 30px;
      }
      .faq-wrapper{
        width: 100%;
		padding:3rem 5rem 10rem;
      }
      .faq-inner{
        padding: 30px;
		box-shadow: 0px 0px 23px -16px #000000;
      }
      .faq-plus{
        float: right;
        font-size: 1.4em;
        line-height: 1em;
        cursor: pointer;
      }
      hr{
        background-color: #9b9b9b;
      }
</style>
<section>
		<div class="all-listing all-listing-pg">
			<!--FILTER ON MOBILE VIEW-->
			<div class="fil-mob fil-mob-act">
				<h4>Listing filters <i class="material-icons">filter_list</i></h4>
			</div>
			<div class="all-list-bre">
				<div class="container sec-all-list-bre">
					<div class="row">
						<h1>{{$category->category_name}}</h1>
						<ul>
							<li><a href="<?=URL::to('/');?>">Home</a>
							</li>
							<li><a href="{{route('getcategories')}}">All category</a>
							</li>
							<li> <a href="javascript:void(0);">{{$category->category_name}}</a>
							</li>
						</ul>
					</div>
				</div>
			</div>
			<div class="container">
				<div class="row">
					<div class="col-md-3 fil-mob-view">
						<div class="all-filt"> <span class="fil-mob-clo"><i class="material-icons">close</i></span>
							<!--START-->
							<div class="filt-alist-near">
								<div class="tit">
									<h4>Top Service Providers</h4>
								</div>
								<div class="near-ser-list top-ser-secti-prov">
									<ul>
										<li>
											<div class="near-bx">
												<div class="ne-1">
													<img src="{{ asset('public/images/services/1.jpg') }}">
												</div>
												<div class="ne-2">
													<h5>Core real estates</h5>
													<p>City: No:2, 4th Avenue, Newyork, USA, Near to Airport</p>
												</div>
												<div class="ne-3"> <span>5.0</span>
												</div>
												<a href="listing-details.html"></a>
											</div>
										</li>
										<li>
											<div class="near-bx">
												<div class="ne-1">
													<img src="{{ asset('public/images/services/12.jpeg') }}">
												</div>
												<div class="ne-2">
													<h5>Rolexo Villas in California</h5>
													<p>City: 28800 Orchard Lake Road, Suite 180 Farmington Hills, U.S.A.</p>
												</div>
												<div class="ne-3"> <span>4.0</span>
												</div>
												<a href="listing-details.html"></a>
											</div>
										</li>
										<li>
											<div class="near-bx">
												<div class="ne-1">
													<img src="{{ asset('public/images/services/13.jpg') }}">
												</div>
												<div class="ne-2">
													<h5>Orange pet shop</h5>
													<p>City: No:2, 4th Avenue, Newyork, USA, Near to Airport</p>
												</div>
												<div class="ne-3"> <span>5.0</span>
												</div>
												<a href="listing-details.html"></a>
											</div>
										</li>
										<li>
											<div class="near-bx">
												<div class="ne-1">
													<img src="{{ asset('public/images/services/14.jpg') }}">
												</div>
												<div class="ne-2">
													<h5>Best villas near you</h5>
													<p>City: No:2, 4th Avenue, Newyork, USA, Near to Airport</p>
												</div>
												<div class="ne-3"> <span>5.0</span>
												</div>
												<a href="listing-details.html"></a>
											</div>
										</li>
										<li>
											<div class="near-bx">
												<div class="ne-1">
													<img src="{{ asset('public/images/services/20.jpeg') }}">
												</div>
												<div class="ne-2">
													<h5>Ac services near you</h5>
													<p>City: testapro 456</p>
												</div>
												<div class="ne-3"> <span>4.0</span>
												</div>
												<a href="listing-details.html"></a>
											</div>
										</li>
									</ul>
								</div>
							</div>
							<!--END-->
							<!--START-->
							<div class="filt-com lhs-cate">
								<h4>Categories</h4>
								<div class="dropdown">
									<select class="chosen-select">
										<option value="">Select Category</option>
										<option value="1">Hotels And Resorts</option>
										<option value="15">Spa and Facial</option>
										<option value="16">Digital Products</option>
										<option value="17">Pet shop</option>
										<option value="18">Hotel & Food</option>
										<option value="19">Wedding halls</option>
										<option selected value="10">Real Estate</option>
										<option value="8">Sports</option>
										<option value="7">Education</option>
										<option value="3">Transportation</option>
										<option value="6">Electricals</option>
										<option value="5">Automobiles</option>
										<option value="2">Hospitals</option>
									</select>
								</div>
							</div>
							<!--END-->
							<!--START-->
							<div class="sub_cat_section filt-com lhs-sub">
								<h4>Sub category</h4>
								<ul>
									<li>
										<div class="chbox">
											<input type="checkbox" class="sub_cat_check" name="sub_cat_check" value="22" id="Villas" />
											<label for="Villas">Villas</label>
										</div>
									</li>
									<li>
										<div class="chbox">
											<input type="checkbox" class="sub_cat_check" name="sub_cat_check" value="21" id="Indepentant House" />
											<label for="Indepentant House">Indepentant House</label>
										</div>
									</li>
									<li>
										<div class="chbox">
											<input type="checkbox" class="sub_cat_check" name="sub_cat_check" value="20" id="Plots and Lands" />
											<label for="Plots and Lands">Plots and Lands</label>
										</div>
									</li>
								</ul>
							</div>
							<!--END-->
							<!--START-->
							<div class="filt-com lhs-featu">
								<h4>Features</h4>
								<ul>
									<li>
										<div class="chbox">
											<input type="checkbox" value="trusted" class="feature_check" id="trusted" />
											<label for="trusted">Trusted services provider</label>
										</div>
									</li>
									<li>
										<div class="chbox">
											<input type="checkbox" value="premium" class="feature_check" id="premium" />
											<label for="premium">Premium services</label>
										</div>
									</li>
									<li>
										<div class="chbox">
											<input type="checkbox" value="verified" class="feature_check" id="verified" />
											<label for="verified">Verified services</label>
										</div>
									</li>
									<li>
										<div class="chbox">
											<input type="checkbox" value="trending" class="feature_check" id="trending" />
											<label for="trending">Trending services</label>
										</div>
									</li>
									<li>
										<div class="chbox">
											<input type="checkbox" value="offers" class="feature_check" id="offers" />
											<label for="offers">Offers and discounts</label>
										</div>
									</li>
									<li>
										<div class="chbox">
											<input type="checkbox" value="latest" class="feature_check" id="latest" />
											<label for="latest">Latest updated</label>
										</div>
									</li>
									<li>
										<div class="chbox">
											<input type="checkbox" value="likes" class="feature_check" id="likes" />
											<label for="likes">Most likes</label>
										</div>
									</li>
								</ul>
							</div>
							<!--END-->
							<!--START-->
							<div class="filt-com lhs-rati">
								<h4>Ratings</h4>
								<ul>
									<li>
										<div class="rbbox">
											<input type="radio" value="5" name="rating_check" class="rating_check" id="rb1" />
											<label for="rb1"> <i class="material-icons">star</i>
												<i class="material-icons">star</i>
												<i class="material-icons">star</i>
												<i class="material-icons">star</i>
												<i class="material-icons">star</i>
											</label>
										</div>
									</li>
									<li>
										<div class="rbbox">
											<input type="radio" value="4" name="rating_check" class="rating_check" id="rb2" />
											<label for="rb2"> <i class="material-icons">star</i>
												<i class="material-icons">star</i>
												<i class="material-icons">star</i>
												<i class="material-icons">star</i>
												<i class="material-icons">star_border</i>
											</label>
										</div>
									</li>
									<li>
										<div class="rbbox">
											<input type="radio" value="3" name="rating_check" class="rating_check" id="rb3" />
											<label for="rb3"> <i class="material-icons">star</i>
												<i class="material-icons">star</i>
												<i class="material-icons">star</i>
												<i class="material-icons">star_border</i>
												<i class="material-icons">star_border</i>
											</label>
										</div>
									</li>
									<li>
										<div class="rbbox">
											<input type="radio" value="2" name="rating_check" class="rating_check" id="rb4" />
											<label for="rb4"> <i class="material-icons">star</i>
												<i class="material-icons">star</i>
												<i class="material-icons">star_border</i>
												<i class="material-icons">star_border</i>
												<i class="material-icons">star_border</i>
											</label>
										</div>
									</li>
									<li>
										<div class="rbbox">
											<input type="radio" value="1" name="rating_check" class="rating_check" id="rb5" />
											<label for="rb5"> <i class="material-icons">star</i>
												<i class="material-icons">star_border</i>
												<i class="material-icons">star_border</i>
												<i class="material-icons">star_border</i>
												<i class="material-icons">star_border</i>
											</label>
										</div>
									</li>
								</ul>
							</div>
							<!--END-->
							<!--START-->
							<div class="filt-com lhs-ads">
								<ul>
									<li>
										<div class="ads-box">
											<a href=""> <span>Ad</span>
												<img src="{{ asset('public/images/ads/ads1.jpg') }}" alt="">
											</a>
										</div>
									</li>
									<!--                                    <li>-->
									<!--                                        <div class="ads-box">-->
									<!--                                            -->
									<!--                                            <a href="-->
									<!--">-->
									<!--                                                <span>Ad</span>-->
									<!---->
									<!--                                                <img-->
									<!--                                                    src="images/ads/-->
									<!--" alt="">-->
									<!--                                            </a>-->
									<!--                                        </div>-->
									<!--                                    </li>-->
								</ul>
							</div>
							<!--END-->
							<div class="all-list-filt-form">
								<div class="tit">
									<h3>What service do you need? <span>BizBook will help you</span></h3>
								</div>
								<div class="hom-col-req">
									<div id="home_slide_enq_success" class="log" style="display: none;">
										<p>Your Enquiry Is Submitted Successfully!!!</p>
									</div>
									<div id="home_slide_enq_fail" class="log" style="display: none;">
										<p>Something Went Wrong!!!</p>
									</div>
									<div id="home_slide_enq_same" class="log" style="display: none;">
										<p>You cannot make enquiry on your own listing</p>
									</div>
									<form name="home_slide_enquiry_form" id="home_slide_enquiry_form" method="post" enctype="multipart/form-data">
										<input type="hidden" class="form-control" name="listing_id" value="0" placeholder="" required>
										<input type="hidden" class="form-control" name="listing_user_id" value="0" placeholder="" required>
										<input type="hidden" class="form-control" name="enquiry_sender_id" value="" placeholder="" required>
										<input type="hidden" class="form-control" name="enquiry_source" value="Website" placeholder="" required>
										<div class="form-group">
											<input type="text" name="enquiry_name" value="" required="required" class="form-control" placeholder="Enter name*">
										</div>
										<div class="form-group">
											<input type="email" class="form-control" placeholder="Enter email*" required="required" value="" name="enquiry_email" pattern="^[\w]{1,}[\w.+-]{0,}@[\w-]{2,}([.][a-zA-Z]{2,}|[.][\w-]{2,}[.][a-zA-Z]{2,})$" title="Invalid email address">
										</div>
										<div class="form-group">
											<input type="text" class="form-control" value="" name="enquiry_mobile" placeholder="Enter mobile number *" pattern="[7-9]{1}[0-9]{9}" title="Phone number starting with 7-9 and remaing 9 digit with 0-9" required="">
										</div>
										<div class="form-group">
											<textarea class="form-control" rows="3" name="enquiry_message" placeholder="Enter your query or message"></textarea>
										</div>
										<input type="hidden" id="source">
										<button type="submit" id="home_slide_enquiry_submit" name="home_slide_enquiry_submit" class="btn btn-primary">Submit Requirements</button>
									</form>
								</div>
							</div>
							<!-- END -->
							
						</div>
					</div>
					
					<div class="col-md-9">
						<div class="f2">
							<div class="vfilter"> <i class="material-icons ic1 " title="Grid view">apps</i>
								<i class="material-icons ic2 act" title="List view">format_list_bulleted</i>
								<i class="material-icons ic3" title="Map view">location_on</i>
							</div>
						</div>
						<!-- LISTING INN FILTER -->
						<div class="list-filt-v2">
							<ul>
								<li>
									<div class="chbox">
										<input type="checkbox" name="lfv2-all" class="lfv2-all" value="1" id="lfv2-all" checked="checked" />
										<label for="lfv2-all">All</label>
									</div>
								</li>
								<li>
									<div class="chbox">
										<input type="checkbox" name="lfv2-pop" class="lfv2-pop" id="lfv2-pop" />
										<label for="lfv2-pop">Popular</label>
									</div>
								</li>
								<li>
									<div class="chbox">
										<input type="checkbox" name="lfv2-op" class="lfv2-op" id="lfv2-op" />
										<label for="lfv2-op">Open</label>
									</div>
								</li>
								<li>
									<div class="chbox">
										<input type="checkbox" name="lfv2-tru" class="lfv2-tru" id="lfv2-tru" />
										<label for="lfv2-tru">Verified</label>
									</div>
								</li>
								<li>
									<div class="chbox">
										<input type="checkbox" name="lfv2-near" class="lfv2-near" id="lfv2-near" />
										<label for="lfv2-near">Nearby</label>
									</div>
								</li>
								<li>
									<div class="chbox">
										<input type="checkbox" name="lfv2-off" class="lfv2-off" id="lfv2-off" />
										<label for="lfv2-off">Offers</label>
									</div>
								</li>
							</ul>
						</div>
						<!-- END LISTING INN FILTER -->
						<!--ADS-->
						<div class="ban-ati-com ads-all-list"> 
                            <a href="https://themeforest.net/item/bizbook-directory-listings-template/25391222"><span>Ad</span><img src="{{ asset('public/images/ads/1.png') }}" alt="">
                            </a>
						</div>
						<!--ADS-->
						<!-- Loader Image -->
						<div id="loadingmessage" style="display:none">
							<div id="loadingmessage1">&nbsp;</div>
						</div>
						<!-- Loader Image -->
						<div class="all-list-sh all-listing-total">
						<style>.all-list-sh .eve-box div:nth-child(2) h4 {text-overflow: unset;}fieldset.floatright{float:right;margin: 0 20px 0 0px;height: auto;}.floatright > label:before {margin: 0;font-size: 18px;font-family: Material Icons;display: inline-block;content: "star";color: currentColor;top: 14px;}@media only screen and (max-width: 768px) { .floatright > label:before {top: 0px;position: unset;} fieldset.floatright{float:left;margin:0px;height: auto;}}</style>
							<ul>
                                @foreach($listings as $listing)
								<li>
									<div class="eve-box">
										<!---LISTING IMAGE--->
										<div class="al-img"> <span class="open-stat">{{$listing->status}}</span>
											<a href="{{route('getdetailsbyslug',[$listing->listing_slug])}}">
											<?php 
											$imgsrc = "";
											if($listing->image != null || $listing->image != "")
											{
												$imgsrc = asset('public/public/listings/image/' . $listing->image);
											}else{
												$imgsrc = asset('public/images/defaultimg.png');
											}
											?>
											<img src="{{$imgsrc}}" alt="">
                                            </a>
										</div>
										<!---END LISTING IMAGE--->
										<!---LISTING NAME--->
										<div>
											<h4>
                                                <a href="{{route('getdetailsbyslug',[$listing->listing_slug])}}">{{$listing->listing_name}}</a>
												@if($listing->veryfied == "Yes")
                                                <i class="li-veri"><img src="{{ asset('public/images/icon/svg/verified.png') }}" alt=""></i>
												@endif
                                            </h4>
											<?php 
											$heart = "heart-black.svg";
											$member_id = "";
											if(!empty($userinfo))
											{
												$member_id = $userinfo->member_id;
												$listingliked = like($listing->id, $userinfo->member_id);
												if(!empty($listingliked))
												{
													$heart = "like.svg";
												}
											}
											
											$rattings = array('star5'=>5,'star4'=>4,'star3'=>3,'star2'=>2,'star1'=>1);
											?>
											<fieldset class="rating floatright">
												<?php 
												$title = "";
												foreach($rattings as $id => $rating)
												{
													switch($rating)
													{
														case "5":
															$title = "Awesome";
															break;
														case "4":
															$title = "Excellent";
															break;
														case "3":
															$title = "Good";
															break;
														case "2":
															$title = "Average";
															break;
														case "1":
															$title = "Poor";
															break;
													}
													$dbRating = round(getavgrating($listing->id));
													?>
													<input type="radio" id="<?=$id?>" name="price_rating" class="price_rating" value="<?=$rating?>" data-listing="{{$listing->id}}" data-member="{{$member_id}}" <?php echo ($rating == $dbRating) ? "checked": "";?>>
													<label class="full" for="<?=$id?>" title="<?=$title?>"></label>
													<?php
												}
												?>
												<input type="radio" id="star0" name="price_rating" class="price_rating" value="0" style="display:none;">
												<label class="" for="star0" title="Very Poor" style="display:none;"></label>
											</fieldset> 
                                            <span class="addr">{{$listing->company_address}}</span>
											<span class="pho">{{$listing->listing_phone}}</span>
											<span class="mail">{{$listing->listing_email}}</span>
											<div class="links">
                                                <a href="#" data-toggle="modal" data-target="#quote" class="quo">Get quote</a>
												<a href="{{route('getdetailsbyslug',[$listing->listing_slug])}}">View more</a>
												<a href="Tel:{{$listing->listing_phone}}">Call Now</a>
												<a href="https://wa.me/{{$listing->listing_phone}}" class="what" target="_blank">WhatsApp</a>
											</div>
										</div>
										<!---END LISTING NAME--->
										<!---SAVE---> 
										
                                        <span class="enq-sav" data-toggle="tooltip" title=" Click to like this listing" data-listing-id="{{$listing->id}}" data-member-id="{{$member_id}}">
                                        <i class="l-like sav-act"><img src="{{ asset('public/images/icon/svg/'.$heart) }}" alt=""></i></span>
										<!---END SAVE--->
									</div>
								</li>
                                @endforeach
							</ul>
							<!--ADS-->
							<div class="ban-ati-com ads-all-list"> 
                                <a href="https://themeforest.net/item/bizbook-directory-listings-template/25391222"><span>Ad</span><img src="{{ asset('public/images/ads/3.png') }}" alt=""></a>
							</div>
							<!--ADS-->

							
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- END -->
	<!-- START -->
	<section>
		<div class="list-map"> <span id="map-error-box" class="map-error-box" style="display:none;">!!! Oops No Listing with the Selected Category</span>
			<div class="list-map-resu map-view" id="map-view"></div>
			<div class="list-map-filt">
				<div class="map-fi-com map-fi-view">
					<div class="vfilter"> <i class="material-icons ic-map-1" title="Grid view">apps</i>
						<i class="material-icons ic-map-2" title="List view">format_list_bulleted</i>
						<i class="material-icons ic-map-3 act" title="Map view">layers</i>
					</div>
				</div>
				<div class="map-fi-com map-fi-cate">
					<select onChange="SubcategoryFilter1(this.value);" name="cat_check" id="cat_check1" class="cat_check chosen-select ">
						<option value="">Select Category</option>
						<option value="hotels-and-resorts">Hotels And Resorts</option>
						<option value="spa-and-facial">Spa and Facial</option>
						<option value="digital-products">Digital Products</option>
						<option value="pet-shop">Pet shop</option>
						<option value="hotel---food">Hotel & Food</option>
						<option value="wedding-halls">Wedding halls</option>
						<option selected value="real-estate">Real Estate</option>
						<option value="sports">Sports</option>
						<option value="education">Education</option>
						<option value="transportation">Transportation</option>
						<option value="electricals">Electricals</option>
						<option value="automobiles">Automobiles</option>
						<option value="hospitals">Hospitals</option>
					</select>
				</div>
				<div class="sub_cat_section1 map-fi-com map-fi-subcate">
					<select name="sub_cat_check" id="sub_cat_check1" class="sub_cat_check">
						<option value="">Select sub-category</option>
						<option value="22">Villas</option>
						<option value="21">Indepentant House</option>
						<option value="20">Plots and Lands</option>
					</select>
				</div>
				<!--        <div class="map-fi-com map-fi-rat">-->
				<!--            <select id="rating_check1" name="rating_check">-->
				<!--                <option value="">Select Rating</option>-->
				<!--                <option value="5">5 Star</option>-->
				<!--                <option value="4">4 Star</option>-->
				<!--                <option value="3">3 Star</option>-->
				<!--                <option value="2">2 Star</option>-->
				<!--                <option value="1">1 Star</option>-->
				<!--            </select>-->
				<!--        </div>-->
				<div class="map-fi-com map-fi-fea">
					<select id="city_check1" name="city_check">
						<option value="">Select City</option>
						<option value="10519">Toronto</option>
						<option value="1068">Vadodara</option>
						<option value="11">Akkarampalle</option>
						<option value="1131">Hisar</option>
						<option value="26">Balapur</option>
						<option value="114">Karnul</option>
						<option value="706">Delhi</option>
						<option value="707">New Delhi</option>
						<option value="3659">Chennai</option>
					</select>
				</div>
				<div class="map-fi-com map-fi-fea">
					<select id="feature_check1" name="feature_check">
						<option value="">Select Feature</option>
						<option value="trusted">Trusted services provider</option>
						<option value="premium">Premium services</option>
						<option value="verified">Verified services</option>
						<option value="trending">Trending services</option>
						<option value="offers">Offers and discounts</option>
						<option value="latest">Latest updated</option>
						<option value="likes">Most likes</option>
					</select>
				</div>
			</div>
		</div>
	</section>
	<!-- END -->
	<!-- START -->
	
	<section>
		<div class="container">
			<div class="row">
				<div class="col-md-6">
					<div class="faq-wrapper">
						<div class="header">
							<h1>Category Infomration</h1>
						</div>
						<div class="faq-inner" style="float:unset;">
							@if(!empty($otherinfo))
								@foreach($otherinfo as $catinfo)
									<div class="faq-item">
										<h3>
											{{ucfirst($catinfo->heading)}}
											<span class="faq-plus">&plus;</span>
										</h3>
										<div class="faq-body">
											<?=$catinfo->otherinfo?>
										</div>
									</div>
									<hr>
								@endforeach
							@else
								<div class="faq-item">
									<h3>
										No Information Available
									</h3>
								</div>				
							@endif
						</div>
					</div>
				</div>
				<div class="col-md-6">
					<div class="faq-wrapper">
						<div class="header">
							<h1>Frequentally Asked Questions</h1>
						</div>
						<div class="faq-inner" style="float:unset;">
							@if(!empty($faqs))
								@foreach($faqs as $faq)
									<div class="faq-item">
										<h3>
											{{ucfirst($faq->heading)}}
											<span class="faq-plus">&plus;</span>
										</h3>
										<div class="faq-body">
											<?=$faq->otherinfo?>
										</div>
									</div>
									<hr>
								@endforeach
							@else
								<div class="faq-item">
									<h3>
										No Information Available
									</h3>
								</div>
							@endif
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- END -->

    <section>
        <div class="pop-ups pop-quo">
            <!-- The Modal -->
            <div class="modal fade" id="quote">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="log-bor">&nbsp;</div>
                        <span class="udb-inst">Send enquiry</span>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <!-- Modal Header -->
                        <div class="quote-pop">
                            <h4>Get quote</h4>
                            <form>
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Enter name*" required>
                                </div>
                                <div class="form-group">
                                    <input type="email" class="form-control" placeholder="Enter email*" pattern="^[\w]{1,}[\w.+-]{0,}@[\w-]{2,}([.][a-zA-Z]{2,}|[.][\w-]{2,}[.][a-zA-Z]{2,})$" title="Invalid email address" required>
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Enter mobile number *" pattern="[7-9]{1}[0-9]{9}" title="Phone number starting with 7-9 and remaing 9 digit with 0-9" required>
                                </div>
                                <div class="form-group">
                                    <textarea class="form-control" rows="3" placeholder="Enter your query or message"></textarea>
                                </div>
                                <input type="hidden" id="source">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('scripts')
    <script>
	jQuery( document ).ready( function() {
		$.ajaxSetup({
			headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			}
		});
		$( document ).on("click", ".enq-sav", function() {
			$( this ).find("img").attr("src", "{{ asset('public/images/icon/svg/like.svg') }}");
			var listing_id = $(this).attr('data-listing-id');
			var member_id = $(this).attr('data-member-id');
			if(member_id == "")
			{
				$(".bodymessage").css({'display':'block'});
				$(".alert-heading").html("Error");
				$("#response").html("You are not logged In..");
				return false;
			}
			$.ajax({
				url: "{{route('storelikes')}}",
				type: "POST",
				data: {
					listing_id: listing_id,
					member_id: member_id
				},
				cache: false,
				success: function(result)
				{
					if(result != 1)
					{
						var message = "You are not login. Please login first...";
						$(".bodymessage").css({'display':'block'});
						$(".alert-heading").html("Error");
						$("#response").html(result);
					}else{
						var message = "Listing added in your favourite listings.";
						$(".bodymessage").css({'display':'block'});
						$(".alert-heading").html("Success");
						$("#response").html(message);
					}
				}
			});
		});

		$( document ).on("click", ".price_rating", function() {
			var rating = $(this).val();
			var listing_id = $(this).attr('data-listing');
			var member_id = $(this).attr('data-member');
			$.ajax({
				url: "{{route('storeratings')}}",
				type: "POST",
				data: {
					listing_id: listing_id,
					member_id: member_id,
					rating: rating
				},
				cache: false,
				success: function(result)
				{
					if(result != 1)
					{
						var message = "You are not login. Please login first...";
						$(".bodymessage").css({'display':'block'});
						$(".alert-heading").html("Error");
						$("#response").html(result);
					}else{
						var message = "Rating has been saved.";
						$(".bodymessage").css({'display':'block'});
						$(".alert-heading").html("Success");
						$("#response").html(message);
					}
				}
			});
		});

		$(".close").on("click", function(){
			$(".bodymessage").css({'display':'none'});
		});

		$(".faq-plus").on('click',function(){
			$(this).parent().parent().find('.faq-body').slideToggle();
		});
	});
	</script>

@stop