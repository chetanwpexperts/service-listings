@extends("layouts.webmaster")

@section("content")

<section>
		<div class="v3-list-ql">
			<div class="container">
				<div class="row">
					<div class="v3-list-ql-inn">
						<ul>
							<li class="active"><a href="#ld-abo"><i class="material-icons">person</i> About</a>
							</li>
							<li><a href="#ld-ser"><i class="material-icons">business_center</i> Services</a>
							</li>
							<li><a href="#ld-gal"><i class="material-icons">photo</i> Gallery</a>
							</li>
							<li><a href="#ld-off"><i class="material-icons">style</i> Offers</a>
							</li>
							<li><a href="#ld-360"><i class="material-icons">camera</i> 360 View</a>
							</li>
							<li><a href="#ld-rev"><i class="material-icons">star_half</i> Write Review</a>
							</li>
							<li><a href="#" data-toggle="modal" data-target="#claim"><i class="material-icons">store</i>
                                Claim business</a>
							</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- END -->
	<!-- START -->
	<section>
		<div class="list-det-fix">
			<div class="container">
				<div class="row">
					<div class="list-det-fix-inn">
						<div class="list-fix-pro">
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
						</div>
						<div class="list-fix-tit">
							<h3>{{$listing->listing_name}}</h3>
							<p><b>Address:</b> {{$listing->company_address}}</p>
						</div>
						<div class="list-fix-btn"> <span data-toggle="modal" data-target="#quote" class="pulse">Send an enquiry</span>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- END -->
	<!-- START -->
	<section>
		<div class="list-bann">
			<?php 
			$imgsrcbanner = "";
			if($listing->banner != null || $listing->banner != "")
			{
				$imgsrcbanner = asset('public/public/listings/banner/' . $listing->banner);
			}else{
				$imgsrcbanner = asset('public/images/defaultimg.png');
			}
			?>
			<img src="{{$imgsrcbanner}}" alt="">
		</div>
	</section>
	<!-- END -->
	<!-- START -->
	<!--LISTING DETAILS-->
	<section class=" pg-list-1">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="pg-list-1-pro">
						<img src="{{$imgsrc}}" alt=""> <span class="stat"><i class="material-icons">verified_user</i></span>
					</div>
					<div class="pg-list-1-left">
						<h3>{{$listing->listing_name}}</h3>
						<div class="list-rat-all"> <b>5.0</b>
							<label class="rat"> <i class="material-icons">star</i>
								<i class="material-icons">star</i>
								<i class="material-icons">star</i>
								<i class="material-icons">star</i>
								<i class="material-icons">star</i>
							</label> <span>0 Reviews</span>
						</div>
						<p><b>Address:</b> {{$listing->company_address}}</p>
						<div class="list-number pag-p1-phone">
							<ul>
								<a href="Tel:{{$listing->listing_phone}}">
									<li class="ic-php">{{$listing->listing_phone}}</li>
								</a>
								<a href="mailto:{{$listing->listing_email}}">
									<li class="ic-mai">{{$listing->listing_email}}</li>
								</a>
							<a target="_blank" href="{{$listing->company_website_link}}">
									<li class="ic-web">{{$listing->company_website_link}}</li>
								</a>
							</ul>
						</div>
					</div>
					<div class="list-ban-btn">
						<ul>
							<li> <a href="tel:{{$listing->listing_phone}}" class="cta cta-call">Call now</a>
							</li>
							<li><span class="cta cta-like ldelik Animatedheartfunc385 " data-for="1" data-section="1" data-num="325" data-item="37" data-id='385'>
                                    <b class="like-content385">1</b> Likes</span>
							</li>
							<li> <a href="https://wa.me/{{$listing->listing_whatsapp_number}}" class="cta cta-rev">WhatsApp</a>
							</li>
							<li> <span data-toggle="modal" data-target="#quote" class="pulse cta cta-get">Get quote</span>
							</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</section>
	<section class=" list-pg-bg">
		<div class="container">
			<div class="row">
				<div class="com-padd">
					<div id="ld-abo" class="list-pg-lt list-page-com-p">
						<!--                        -->
						<!--LISTING DETAILS: LEFT PART 1-->
						<div class="pglist-bg pglist-p-com">
							<div class="pglist-p-com-ti">
								<h3><span>About</span> {{$listing->listing_name}}</h3>
							</div>
							<div class="list-pg-inn-sp list-pg-inn-abo">
								<div class="share-btn">
									<ul>
										<li>
											<a target="_blank" href="https://www.facebook.com/sharer/sharer.html?u=listing/{{$listing->listing_slug}}?src=facebook&quote={{$listing->listing_name}}" class="so-fb">
												<img src="{{ asset('public/images/social/3.png') }}" alt="Share on Facebook" title="Share on Facebook">
											</a>
										</li>
										<li>
											<a target="_blank" href="http://twitter.com/share?text={{$listing->listing_name}}&url={{$socialUrl}}&src=twitter" class="so-tw">
												<img src="{{ asset('public/images/social/2.png') }}" alt="Share On Twitter" title="Share On Twitter">
											</a>
										</li>
										<li>
											<a target="_blank" href="whatsapp://send?text={{$socialUrl}}&src=whatsapp" class="so-wa">
												<img src="{{ asset('public/images/social/6.png') }}" alt="Share on WhatsApp" title="Share on WhatsApp">
											</a>
										</li>
										<li>
											<a target="_blank" href="https://www.linkedin.com/sharing/share-offsite/?url={{$socialUrl}}&src=linkedin" class="so-li">
												<img src="{{ asset('public/images/social/1.png') }}" alt="Share on LinkedIn" title="Share on LinkedIn">
											</a>
										</li>
										<li>
											<a target="_blank" href="https://www.pinterest.com/pin/create/bookmarklet/?media={{$imgsrc}}&url={{$socialUrl}}&src=pinterest&description={{$listing->listing_name}}" class="so-pi">
												<img src="{{ asset('public/images/social/9.png') }}" alt="Share on Pinterest" title="Share on Pinterest">
											</a>
										</li>
									</ul>
								</div>
								<p>
									{{$listing->listing_description}}
								</p>
							</div>
						</div>
						<!--                            -->
						<!--END LISTING DETAILS: LEFT PART 1-->
						<!--LISTING DETAILS: LEFT PART 2-->
						<div id="ld-ser" class="pglist-bg pglist-p-com">
							<div class="pglist-p-com-ti">
								<h3><span>Services</span> Offered</h3>
							</div>
							<div class="list-pg-inn-sp">
								<div class="row pg-list-ser">
									<ul>
										@if(!empty($services))
											@foreach($services as $service)
											<li class="col-md-4">
												<div class="pg-list-ser-p1">
												<?php 
												$imgsrcservices = "";
												if($service->image != null || $service->image != "")
												{
													$imgsrcservices = asset('public/public/listings/services/' . $service->image);
												}else{
													$imgsrcservices = asset('public/images/defaultimg.png');
												}
												?>
												<img src="{{$imgsrcservices}}" alt="">
												</div>
												<div class="pg-list-ser-p2">
													<h4>{{$service->service_name}}</h4>
												</div>
											</li>
											@endforeach
										@else
											<li class="col-md-4">
												<div class="pg-list-ser-p1">
													<img src="{{asset('public/images/defaultimg.png')}}">
													<div class="pg-list-ser-p2">
														No Service Found
													</div>
												</div>
											</li>
										@endif
									</ul>
								</div>
							</div>
						</div>
						<!--END LISTING DETAILS: LEFT PART 2-->
						<!--START SERVICE AREAS-->
						<div id="ld-ser" class="pglist-bg pglist-p-com">
							<div class="pglist-p-com-ti">
								<h3><span>Service</span> Areas</h3>
							</div>
							<div class="list-pg-inn-sp">
								<div class="row pg-list-ser-area">
									<ul>
										<?php 
										$serviceLocations = explode(",", $listing->service_locations);
										?>
										@if(!empty($serviceLocations))
											@foreach($serviceLocations as $area)
												<li><span>{{$area}}</span></li>
											@endforeach
										@else
											<li><span> Not Found</span>
										</li>
										@endif
									</ul>
								</div>
							</div>
						</div>
						<!--END SERVICE AREAS-->
						<!--LISTING DETAILS: LEFT PART 3-->
						<div id="ld-gal" class="pglist-bg pglist-p-com">
							<div class="pglist-p-com-ti">
								<h3><span>Photo</span> Gallery</h3>
							</div>
							<div class="list-pg-inn-sp">
								<div id="demo" class="carousel slide" data-ride="carousel">
									<!-- Indicators -->
									<ul class="carousel-indicators">
										<li data-target="#demo" data-slide-to="0" class="active"></li>
										<li data-target="#demo" data-slide-to="1" class=""></li>
										<li data-target="#demo" data-slide-to="2" class=""></li>
									</ul>
									<!-- The slideshow -->
									<div class="carousel-inner">
										@if(!empty($gallery))
											@foreach($gallery as $gimg)
												<div class="carousel-item active">
													@php
													$galleryImages = "";
													if($gimg->image != null || $gimg->image != "")
													{
														$galleryImages = asset('public/public/listing/gallery/' . $gimg->image);
													}else{
														$galleryImages = asset('public/images/defaultimg.png');
													}
													@endphp
													<img src="{{$galleryImages}}" alt="">
												</div>
											@endforeach
										@else
											<img src="{{asset('public/images/defaultimg.png')}}" alt="">
										</li>
										@endif
										
									</div>
									<!-- Left and right controls -->
									<a class="carousel-control-prev" href="#demo" data-slide="prev"> <span class="carousel-control-prev-icon"></span>
									</a>
									<a class="carousel-control-next" href="#demo" data-slide="next"> <span class="carousel-control-next-icon"></span>
									</a>
								</div>
							</div>
						</div>
						<!--END LISTING DETAILS: LEFT PART 3-->
						<!--LISTING DETAILS: LEFT PART 4-->
						<div id="ld-off" class="pglist-bg pglist-off-last pglist-p-com">
							<div class="pglist-p-com-ti">
								<h3><span>Special</span> Offers</h3>
							</div>
							<div class="list-pg-inn-sp">
								@if(!empty($offers))
									@foreach($offers as $offer)
									<div class="home-list-pop">
										@php
										$offerImages = "";
										if($offer->offer_image != null || $offer->offer_image != "")
										{
											$offerImages = asset('public/public/listing/offers/' . $offer->offer_image);
										}else{
											$offerImages = asset('public/images/defaultimg.png');
										}
										@endphp
										<!--LISTINGS IMAGE-->
										<div class="col-md-3">
											<img src="{{$offerImages}}" alt="">
										</div>
										<!--LISTINGS: CONTENT-->
										<div class="col-md-9 home-list-pop-desc inn-list-pop-desc list-room-deta"><a href="#!"><h3>{{$offer->offer_name}}</h3></a>
											<p>{{$offer->offer_details}}</p> <span class="home-list-pop-rat list-rom-pric">${{$offer->offer_price}}</span>
											<div class="list-enqu-btn">
												<ul>
													<li> <a target="_blank" href="#">View more</a>
													</li>
													<li><a href="#!" data-toggle="modal" data-target="#quote">Send enquiry</a>
													</li>
												</ul>
											</div>
										</div>
									</div>
									@endforeach
								@else
									<div class="home-list-pop">
										<h3>No Offers Available</h3>
									</div>
								@endif
							</div>
						</div>
						<!--END 360 DEGREE MAP: LEFT PART 8-->
						<div class="pglist-bg pglist-p-com" id="ld-360">
							<div class="pglist-p-com-ti">
								<h3><span>360 </span> Degree View</h3>
							</div>
							<div class="list-pg-inn-sp list-360">
								@if($listing->view_360 == "" || $listing->view_360 == null)
									No View Available
								@else
									@php 
									echo $listing->view_360;
									@endphp
								@endif
							</div>
						</div>
						<!--END 360 DEGREE MAP: LEFT PART 8-->
						<!--LISTING DETAILS: LEFT PART 6-->
						<!--LISTING DETAILS: LEFT PART 6-->
						<div class="pglist-bg pglist-p-com" style="" id="ld-rew">
							<div class="pglist-p-com-ti">
								<h3><span>Write Your</span> Reviews</h3>
							</div>
							<div class="list-pg-inn-sp">
								<div class="list-pg-write-rev">
									<form class="col" name="review_form" id="review_form" method="post">
										<input type="hidden" class="form-control" name="listing_id" value="385">
										<input type="hidden" class="form-control" name="listing_user_id" value="325">
										<input name="review_user_id" value="37" type="hidden">
										<p>Writing great reviews may help others discover the places that are just apt for them. Here are a few tips to write a good review:</p>
										<div id="review_success" style="text-align:center;display: none;color: green;">Thanks for your Review !! Your Review Is Successful!!</div>
										<div id="review_fail" style="text-align:center;display: none;color: red;">Something Went Wrong!!!</div>
										<div class="row">
											<div>
												<fieldset class="rating">
													<input type="radio" id="star5" name="price_rating" class="price_rating" value="5" />
													<label class="full" for="star5" title="Awesome"></label>
													<input type="radio" id="star4" name="price_rating" class="price_rating" value="4" />
													<label class="full" for="star4" title="Excellent"></label>
													<input type="radio" checked="checked" id="star3" class="price_rating" name="price_rating" value="3" />
													<label class="full" for="star3" title="Good"></label>
													<input type="radio" id="star2" name="price_rating" class="price_rating" value="2" />
													<label class="full" for="star2" title="Average"></label>
													<input type="radio" id="star1" name="price_rating" class="price_rating" value="1" />
													<label class="full" for="star1" title="Poor"></label>
													<input type="radio" id="star0" name="price_rating" class="price_rating" value="0" />
													<label class="" for="star0" title="Very Poor"></label>
												</fieldset>
												<div id="star-value">3 Star</div>
											</div>
										</div>
										<div class="row">
											<div class="input-field col s6">
												<input id="review_name" readonly name="review_name" type="text" value="Rn53 Themes">
											</div>
											<div class="input-field col s6">
												<input id="review_mobile" readonly name="review_mobile" type="text" onkeypress="return isNumber(event)" placeholder="Mobile number" value="5522114422">
											</div>
										</div>
										<div class="row">
											<div class="input-field col s6">
												<input id="review_email" readonly name="review_email" type="email" placeholder="Email Id" value="rn53themes@gmail.com">
											</div>
											<div class="input-field col s6">
												<input id="review_city" name="review_city" placeholder="City" type="text">
											</div>
										</div>
										<div class="row">
											<div class="input-field col s12">
												<textarea id="review_message" placeholder="Write review" name="review_message"></textarea>
											</div>
										</div>
										<div class="row">
											<div class="input-field col s12">
												<input type="submit" id="review_submit" name="review_submit" value="Submit Review">
											</div>
										</div>
									</form>
								</div>
							</div>
						</div>
						<!--END LISTING DETAILS: LEFT PART 6-->
						<!--END LISTING DETAILS: LEFT PART 6-->
						<!--LISTING DETAILS: LEFT PART 5-->
						<!--LISTING DETAILS: LEFT PART 5-->
						<div class="pglist-p3 pglist-bg pglist-p-com" id="ld-rev">
							<div class="pglist-p-com-ti">
								<h3><span>User</span> Reviews</h3>
							</div>
							<div class="list-pg-inn-sp">
								<div class="lp-ur-all">
									<div class="lp-ur-all-left">
										<div class="lp-ur-all-left-1">
											<div class="lp-ur-all-left-11">Excellent</div>
											<div class="lp-ur-all-left-12">
												<div class="lp-ur-all-left-13"></div>
											</div>
										</div>
										<div class="lp-ur-all-left-1">
											<div class="lp-ur-all-left-11">Good</div>
											<div class="lp-ur-all-left-12">
												<div class="lp-ur-all-left-13 lp-ur-all-left-Good"></div>
											</div>
										</div>
										<div class="lp-ur-all-left-1">
											<div class="lp-ur-all-left-11">Satisfactory</div>
											<div class="lp-ur-all-left-12">
												<div class="lp-ur-all-left-13 lp-ur-all-left-satis"></div>
											</div>
										</div>
										<div class="lp-ur-all-left-1">
											<div class="lp-ur-all-left-11">Below Average</div>
											<div class="lp-ur-all-left-12">
												<div class="lp-ur-all-left-13 lp-ur-all-left-below"></div>
											</div>
										</div>
										<div class="lp-ur-all-left-1">
											<div class="lp-ur-all-left-11">Below Average</div>
											<div class="lp-ur-all-left-12">
												<div class="lp-ur-all-left-13 lp-ur-all-left-poor"></div>
											</div>
										</div>
									</div>
									<div class="lp-ur-all-right">
										<h5>Overall Ratings</h5>
										<p>
											<label class="rat"> <i class="material-icons">star</i>
												<i class="material-icons">star</i>
												<i class="material-icons">star</i>
												<i class="material-icons">star</i>
												<i class="material-icons">star</i>
											</label> <span>based on 1 reviews</span>
										</p>
									</div>
								</div>
								<div class="lp-ur-all-rat">
									<h5>Reviews</h5>
									<ul>
										<li>
											<div class="lr-user-wr-img">
												<img src="images/services/25.jpeg" alt="">
											</div>
											<div class="lr-user-wr-con">
												<h6>Rn53 Themes</h6>
												<label class="rat"> <i class="material-icons">star</i>
													<i class="material-icons">star</i>
													<i class="material-icons">star</i>
													<i class="material-icons">star</i>
													<i class="material-icons">star</i>
												</label> <span class="lr-revi-date">07, Mar 2021</span>
												<p>verified_userRolexo Villas is well-known to all as a premier builder of villas and apartments. Even though they have various departments they stay united in giving the customers the best service. I really had a good service right from on time delivery, quality of work, perfection in work completion. The relationship does not end in just in hand over but they stand strong in all tuff times for the commitment given. After 3+ years of handover they addressed the compound wall cracks which expanded and in a week condition. They still respond to any queries / faults on time and track it to closure.</p>
											</div>
										</li>
									</ul>
								</div>
							</div>
						</div>
						<!--END LISTING DETAILS: LEFT PART 5-->
						<!--ADS-->
						<div class="ban-ati-com ads-det-page"> <a href=""><span>Ad</span>
                            <img src="images/ads/3.png"></a>
						</div>
						<!--ADS-->
						<!--RELATED PREMIUM LISTINGS-->
						<div class="list-det-rel-pre">
							<h2>Related listings:</h2>
							<ul>
								<li>
									<div class="land-pack-grid">
										<div class="land-pack-grid-img">
											<img src="images/services/28.jpeg" alt="">
										</div>
										<div class="land-pack-grid-text">
											<h4>Core real estates</h4>
											<div class="list-rat-all"> <b></b>
											</div>
										</div>
										<a target="_blank" href="#" class="land-pack-grid-btn"></a>
									</div>
								</li>
								<li>
									<div class="land-pack-grid">
										<div class="land-pack-grid-img">
											<img src="images/services/25.jpeg" alt="">
										</div>
										<div class="land-pack-grid-text">
											<h4>Museo Villas and Plots</h4>
											<div class="list-rat-all"> <b></b>
											</div>
										</div>
										<a target="_blank" href="#" class="land-pack-grid-btn"></a>
									</div>
								</li>
								<li>
									<div class="land-pack-grid">
										<div class="land-pack-grid-img">
											<img src="images/services/30.jpg" alt="">
										</div>
										<div class="land-pack-grid-text">
											<h4>ccc</h4>
											<div class="list-rat-all"> <b></b>
											</div>
										</div>
										<a target="_blank" href="#" class="land-pack-grid-btn"></a>
									</div>
								</li>
							</ul>
						</div>
						<!--RELATED PREMIUM LISTINGS-->
					</div>
					<div class="list-pg-rt">
						<!--LISTING DETAILS: LEFT PART 9-->
						<div class="list-rhs-form pglist-bg pglist-p-com">
							<div class="quote-pop">
								<h3><span>Get</span> Quote</h3>
								<div id="detail_enq_success" class="log" style="display: none;">
									<p>Your Enquiry Is Submitted Successfully</p>
								</div>
								<div id="detail_enq_same" class="log" style="display: none;">
									<p>You cannot make enquiry on your own listing</p>
								</div>
								<div id="detail_enq_fail" class="log" style="display: none;">
									<p>Something Went Wrong!!!</p>
								</div>
								<form method="post" name="detail_enquiry_form" id="detail_enquiry_form">
									<input type="hidden" class="form-control" name="listing_id" value="385" placeholder="" required>
									<input type="hidden" class="form-control" name="listing_user_id" value="325" placeholder="" required>
									<input type="hidden" class="form-control" name="enquiry_sender_id" value="37" placeholder="" required>
									<input type="hidden" class="form-control" name="enquiry_source" value="Website" placeholder="" required>
									<div class="form-group ic-user">
										<input type="text" name="enquiry_name" value="Rn53 Themes" required="required" class="form-control" placeholder="Enter name*">
									</div>
									<div class="form-group ic-eml">
										<input type="email" class="form-control" placeholder="Enter email*" required="required" value="rn53themes@gmail.com" name="enquiry_email" pattern="^[\w]{1,}[\w.+-]{0,}@[\w-]{2,}([.][a-zA-Z]{2,}|[.][\w-]{2,}[.][a-zA-Z]{2,})$" title="Invalid email address">
									</div>
									<div class="form-group ic-pho">
										<input type="text" class="form-control" value="5522114422" name="enquiry_mobile" placeholder="Enter mobile number *" pattern="[7-9]{1}[0-9]{9}" title="Phone number starting with 7-9 and remaing 9 digit with 0-9" required>
									</div>
									<div class="form-group">
										<textarea class="form-control" rows="3" name="enquiry_message" placeholder="Enter your query or message"></textarea>
									</div>
									<input type="hidden" id="source">
									<button type="submit" id="detail_enquiry_submit" name="enquiry_submit" class="btn btn-primary">Submit</button>
								</form>
							</div>
						</div>
						<!--END LISTING DETAILS: LEFT PART 9-->
						<!--LISTING DETAILS: LEFT PART 7-->
						<div class="lide-guar pglist-bg pglist-p-com">
							<div class="pglist-p-com-ti pglist-p-com-ti-right">
								<h3><span>Claim</span> Listing</h3>
							</div>
							<div class="list-pg-inn-sp">
								<div class="list-pg-guar">
									<ul>
										<li>
											<div class="list-pg-guar-img">
												<img src="images/icon/g2.png" alt="" />
											</div>
											<h4>Claim this business</h4>
											<span data-toggle="modal" data-target="#claim" class="clim-edit">Suggest an edit</span>
										</li>
									</ul>
								</div>
							</div>
						</div>
						<!--END LISTING DETAILS: LEFT PART 7-->
                        <!--LISTING DETAILS: COMPANY BADGE-->
<div class="ld-rhs-pro pglist-bg pglist-p-com">
	<div class="lis-comp-badg">
		<div class="s1">
			<div> <span class="by">Business profile</span>
				<img class="proi" src="images/user/1.png" alt="">
				<h4>Rn53 Themes net</h4>
				<p>Address: 28800 Orchard Lake Road, Suite 180 Farmington Hills, U.S.A</p>
				<ul>
					<li>
						<a href="https://www.facebook.com/53themes" target="_blank">
							<img src="https://bizbookdirectorytemplate.com/images/social/3.png">
						</a>
					</li>
					<li>
						<a href="https://twitter.com/53themes" target="_blank">
							<img src="https://bizbookdirectorytemplate.com/images/social/2.png">
						</a>
					</li>
					<li>
						<a href="https://www.youtube.com/channel/UC3wN3O2GXTt7ZZniIoMZumg" target="_blank">
							<img src="https://bizbookdirectorytemplate.com/images/social/5.png">
						</a>
					</li>
					<li>
						<a href="#" target="_blank">
							<img src="https://bizbookdirectorytemplate.com/images/social/6.png">
						</a>
					</li>
				</ul>
			</div>
		</div>
		<div class="s2"> <a target="_blank" href="company-profile.html" class="use-fol">View profile</a>
			<a target="_blank" href="company-profile.html#home_enquiry_form">Get in touch with us</a>
		</div>
	</div>
</div>
<!--END LISTING DETAILS: COMPANY BADGE-->
						<!--LISTING DETAILS: LEFT PART 8-->
						<div class="pglist-p3 pglist-bg pglist-p-com">
							<div class="pglist-p-com-ti pglist-p-com-ti-right">
								<h3><span>Our</span> Location</h3>
							</div>
							<div class="list-pg-inn-sp">
								<div class="list-pg-map">
									<iframe allowfullscreen="" loading="lazy" width="600" height="450" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?width=600&amp;height=450&amp;hl=en&amp;q={{$listing->pincode}}+(Your%20Business%20Name)&amp;t=&amp;z=14&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"></iframe>
								</div>
							</div>
						</div>
						<!--END LISTING DETAILS: LEFT PART 8-->
						<!--LISTING DETAILS: LEFT PART 9-->
						<div class="pglist-p3 pglist-bg pglist-p-com">
							<div class="pglist-p-com-ti pglist-p-com-ti-right">
								<h3><span>Company</span> Info</h3>
							</div>
							<div class="list-pg-inn-sp">
								<div class="list-pg-oth-info">
									<ul>
										<li>Available villas <span>12</span>
										</li>
										<li>Booking advance <span>$500</span>
										</li>
										<li>Contact number <span>986516876516</span>
										</li>
										<li>WhatsApp <span>65468764879</span>
										</li>
										<li>Email id <span>booking@rolex.com</span>
										</li>
										<li>Contact name <span>Bruce mecho</span>
										</li>
										<li>Website <span>www.relexovillas.com</span>
										</li>
										<li>Available plots <span>32</span>
										</li>
										<li>Next project location <span>Losangles</span>
										</li>
									</ul>
								</div>
							</div>
						</div>
						<!--END LISTING DETAILS: LEFT PART 9-->
						<!--LISTING DETAILS: LEFT PART 7-->
						<div class="ld-rhs-pro pglist-bg pglist-p-com">
							<div class="lis-pro-badg">
								<div> <span class="rat" alt="User rating">4.2</span>
									<span class="by">Created by</span>
									<?php
									$imgSrc = asset('public/images/user/62736rn53themes.png');
									if(!empty($memberdp))
									{
										if($memberdp->image != "" || $memberdp->image != null)
										{
											$imgSrc = asset('public/public/user/dp/' . $memberdp->image);
										}
									}
									?>
									<img src="{{ $imgSrc }}" alt="">
									<h4>{{$user->name}}</h4>
									<p>Member since {{$memberInfo->created_at->isoFormat('MMMM YYYY')}}</p>
								</div> <a href="{{route('viewprofile', [$memberInfo->member_id])}}" class="fclick" target="_blank">&nbsp;</a>
							</div>
						</div>
						<!--END LISTING DETAILS: LEFT PART 7-->
						<!--LISTING DETAILS: LEFT PART 10-->
						<div class="list-mig-like">
							<div class="list-ri-peo-like">
								<h3>Who all are like this</h3>
								<ul>
									<li>
										<a href="{{route('viewprofile', [$memberInfo->member_id])}}" target="_blank">
											<img src="{{asset('public/images/user/62736rn53themes.png')}}" alt="">
										</a>
									</li>
								</ul>
							</div>
						</div>
						<!--END LISTING DETAILS: LEFT PART 10-->
						<!--ADS-->
						<div class="ban-ati-com ads-det-page"> <a href=""><span>Ad</span><img
                                src="{{asset('public/images/ads/59040boat-728x90.png')}}"></a>
						</div>
						<!--ADS-->
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
		$.ajax({
			url: "{{route('storeviews')}}",
			type: "POST",
			data: {
				listing_id: '{{$listing->id}}'
			},
			cache: false,
			success: function(result)
			{
				return true;
			}
		});
	});
	</script>

@stop