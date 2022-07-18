@extends("layouts.webmaster")

@section("content")
<style>
		.hom-top {
		            transition: all 0.5s ease;
		            background: none;
		            box-shadow: none;
		        }
		
		        .top-ser {
		            display: none;
		        }
		
		        .dmact .top-ser {
		            display: block;
		        }
		
		        .caro-home {
		            margin-top: 90px;
		            float: left;
		            width: 100%;
		        }
		
		        .carousel-item:before {
		            background: none;
		        }
	</style>
	<!-- START -->
	<section>
		<div class="str">
			<div class="container">
				<div class="row">
					<!--<div class="home-tit">
                    <h2><span>Top Services</span> Cras nulla nulla, pulvinar sit amet nunc at, lacinia viverra lectus. Fusce imperdiet ullamcorper metus eu fringilla.</h2>
                </div>-->
					<div class="home-tit">
						<h2><span>Popular Services</span> near you</h2>
						<p>lacinia viverra lectus. Fusce imperdiet ullamcorper metus eu fringilla.</p>
					</div>
					<div class="land-pack">
						<ul>
							@if(!empty($popularServices))
								@foreach($popularServices as $popularlisting)
								<li>
									<div class="land-pack-grid">
										<div class="land-pack-grid-img">
											@php 
											$plistingimage = asset('public/images/defaultimg.png');
											if($popularlisting->image != "")
											{
												$plistingimage = asset('public/public/listings/image/' . $popularlisting->image);
											}
											@endphp
											<img src="{{$plistingimage}}" alt="{{$popularlisting->listing_name}}" />
										</div>
										<div class="land-pack-grid-text">
											<h4>{{$popularlisting->listing_name}} <span class="dir-ho-cat">Show All ({{getCategoryListingCount($popularlisting->category_id)}})</span></h4>
										</div>@php
										$category_slug = getcategorySlug($popularlisting->category_id);
										@endphp <a href="{{route('getcategorylisting', [$category_slug])}}" class="land-pack-grid-btn">View all listings</a>
									</div>
								</li>
								@endforeach
							@endif
						</ul> <a href="{{route('getcategories')}}" class="more">View all services</a>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- END -->
	<!-- START -->
	<section>
		<div class="str">
			<div class="container">
				<div class="row">
					<div class="home-tit">
						<h2><span>Explore City</span> Category                        </h2>
						<p>lacinia viverra lectus. Fusce imperdiet ullamcorper metus eu fringilla.</p>
					</div>
					<div class="home-city">
						<ul>
							<li>
								<div class="hcity">
									<div>
										<img src="https://bizbookdirectorytemplate.com/images/services/95787pexels-asad-photo-maldives-1450363.jpg" alt="">
									</div>
									<div>
										<img src="images/services/1.jpg" alt="">
										<h4>Hotels And Resorts</h4>
										<div class="list-rat-all"> <b>3.0</b>
											<label class="rat"> <i class="material-icons">star</i>
												<i class="material-icons">star</i>
												<i class="material-icons">star</i>
												<i class="material-icons ratstar">star</i>
												<i class="material-icons ratstar">star</i>
											</label> <span>2 Reviews</span>
										</div>
										<p>09 Listings</p>
									</div> <a href="all-listing.html" class="fclick">&nbsp;</a>
								</div>
							</li>
							<li>
								<div class="hcity">
									<div>
										<img src="images/services/9.png" alt="">
									</div>
									<div>
                                        <img src="images/services/20356s7.jpeg" alt="">
										<h4>Automobiles</h4>
										<div class="list-rat-all"> <b>3.0</b>
											<label class="rat"> <i class="material-icons">star</i>
												<i class="material-icons">star</i>
												<i class="material-icons">star</i>
												<i class="material-icons ratstar">star</i>
												<i class="material-icons ratstar">star</i>
											</label> <span>2 Reviews</span>
										</div>
										<p>06 Listings</p>
									</div><a href="all-listing.html" class="fclick">&nbsp;</a>
								</div>
							</li>
							<li>
								<div class="hcity">
									<div>
										<img src="images/services/19.jpg" alt="">
									</div>
									<div>
                                        <img src="images/services/20356s7.jpeg" alt="">
										<h4>Wedding halls</h4>
										<div class="list-rat-all"> <b>5.0</b>
											<label class="rat"> <i class="material-icons">star</i>
												<i class="material-icons">star</i>
												<i class="material-icons">star</i>
												<i class="material-icons">star</i>
												<i class="material-icons">star</i>
											</label> <span>1 Reviews</span>
										</div>
										<p>03 Listings</p>
									</div> <a href="all-listing.html" class="fclick">&nbsp;</a>
								</div>
							</li>
							<li>
								<div class="hcity">
									<div>
										<img src="images/services/8.jpg" alt="">
									</div>
									<div>
										<img src="images/services/445234.jpg" alt="">
										<h4>Digital products</h4>
										<div class="list-rat-all"> <b>3.3</b>
											<label class="rat"> <i class="material-icons">star</i>
												<i class="material-icons">star</i>
												<i class="material-icons">star</i>
												<i class="material-icons">star</i>
												<i class="material-icons ratstar">star</i>
											</label> <span>3 Reviews</span>
										</div>
										<p>23 Listings</p>
									</div> <a href="all-listing.html" class="fclick">&nbsp;</a>
								</div>
							</li>
                            <li>
								<div class="hcity">
									<div>
										<img src="images/services/2.jpeg" alt="">
									</div>
									<div>
										<img src="images/services/20356s7.jpeg" alt="">
										<h4>Real Estate</h4>
										<div class="list-rat-all"> <b>3.3</b>
											<label class="rat"> <i class="material-icons">star</i>
												<i class="material-icons">star</i>
												<i class="material-icons">star</i>
												<i class="material-icons">star</i>
												<i class="material-icons ratstar">star</i>
											</label> <span>3 Reviews</span>
										</div>
										<p>23 Listings</p>
									</div> <a href="all-listing.html" class="fclick">&nbsp;</a>
								</div>
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
		<div class="hom-mpop-ser">
			<div class="container">
				<div class="hom-mpop-main">
					<div class="home-tit">
						<h2>
                            <span>Featured Services</span> in your city                        </h2>
						<p>lacinia viverra lectus. Fusce imperdiet ullamcorper metus eu fringilla.</p>
					</div>
					<div class="col-md-6">
							<!--POPULAR LISTINGS-->
							@if(!empty($featuredListingArr))
								@php
								$i=0;
								@endphp
								@foreach($featuredListingArr as $featured)
								<div class="hom-mpop">
									<!--POPULAR LISTINGS IMAGE-->
									<div class="col-md-3">
										@php 
										$listingimage = asset('public/images/defaultimg.png');
										if($featured->image != "")
										{
											$listingimage = asset('public/public/listings/image/' . $featured->image);
										}
										@endphp
										<img src="{{$listingimage}}" alt="{{$featured->listing_name}}" />
									</div>
									<!--POPULAR LISTINGS: CONTENT-->
									<div class="col-md-9">
										<h3>{{$featured->listing_name}}</h3>
										<h4>{{getCategoryName($featured->category_id)}}</h4>
										<p>{{$featured->company_address}}</p> <span class="rat-sh">{{getavgrating($featured->id)}}</span>
									</div> <a href="{{route('getdetailsbyslug',[$featured->listing_slug])}}">&nbsp;</a>
								</div>
								@php 
								if ($i%3 == 1)
								{  
									echo "<div class='col-md-6'>";
								}
								if($i%3 == 0)
								{
									echo "</div>";
								}
								$i++;
								@endphp
								@endforeach
							@endif
							<!--POPULAR LISTINGS-->
						
						</div>
					</div>
				</div>
				<div class="hlead-coll">
					<div class="col-md-6">
						<div class="hom-cre-acc-left">
							<h3>What service do you need?                                <span>BizBook Directory</span>
                            </h3>
							<p>Tell us more about your requirements so that we can connect you to the right service provider.</p>
							<ul>
								<li>
									<img src="images/icon/blog.png" alt="">
									<div>
										<h5>Tell us more about your requirements</h5>
										<p>HI Imagine you have made your presence online through a local online directory, but your competitors have..</p>
									</div>
								</li>
								<li>
									<img src="images/icon/shield.png" alt="">
									<div>
										<h5>We connect with right service provider</h5>
										<p>Advertising your business to area specific has many advantages. For local businessmen, it is an opportunity..</p>
									</div>
								</li>
								<li>
									<img src="images/icon/general.png" alt="">
									<div>
										<h5>Happy with our service</h5>
										<p>Your local business too needs brand management and image making. As you know the local market..</p>
									</div>
								</li>
							</ul>
						</div>
					</div>
					<div class="col-md-6">
						<div class="hom-col-req">
							<div class="log-bor">&nbsp;</div> <span class="udb-inst">Fill the form</span>
							<h4>What you looking for?</h4>
							<div id="home_enq_success" class="log" style="display: none;">
								<p>Your Enquiry Is Submitted Successfully!!!</p>
							</div>
							<div id="home_enq_fail" class="log" style="display: none;">
								<p>Something Went Wrong!!!</p>
							</div>
							<div id="home_enq_same" class="log" style="display: none;">
								<p>You cannot make enquiry on your own listing</p>
							</div>
							<form name="home_enquiry_form" id="home_enquiry_form" method="post" enctype="multipart/form-data">
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
									<select name="enquiry_category" id="enquiry_category" class="form-control">
										<option value="">Select Category</option>
										<option value="19">Wedding halls</option>
										<option value="18">Hotel & Food</option>
										<option value="17">Pet shop</option>
										<option value="16">Digital Products</option>
										<option value="15">Spa and Facial</option>
										<option value="10">Real Estate</option>
										<option value="8">Sports</option>
										<option value="7">Education</option>
										<option value="6">Electricals</option>
										<option value="5">Automobiles</option>
										<option value="3">Transportation</option>
										<option value="2">Hospitals</option>
										<option value="1">Hotels And Resorts</option>
									</select>
								</div>
								<div class="form-group">
									<textarea class="form-control" rows="3" name="enquiry_message" placeholder="Enter your query or message"></textarea>
								</div>
								<input type="hidden" id="source">
								<button type="submit" id="home_enquiry_submit" name="home_enquiry_submit" class="btn btn-primary">Submit Requirements</button>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- END -->
	<!-- START -->
	<section>
		<div class="str str-full">
			<div class="container">
				<div class="row">
					<div class="home-tit">
						<h2>
                            <span>Top Service Provider</span> in city                        </h2>
						<p>lacinia viverra lectus. Fusce imperdiet ullamcorper metus eu fringilla.</p>
					</div>
					<div class="ho-popu-bod">
						<!--Top Branding Hotels-->
						<div class="col-md-4">
							<div class="hot-page2-hom-pre-head">
								<h4>Top Branding                                        <span>Real Estate</span></h4>
							</div>
							<div class="hot-page2-hom-pre">
								<ul>
									<!--LISTINGS-->
									<li>
										<div class="hot-page2-hom-pre-1">
											<img src="images/services/1.jpg" alt="">
										</div>
										<div class="hot-page2-hom-pre-2">
											<h5>Royal Real Estates</h5>
											<span>No:2, 4th Avenue,  Newyork, USA, Near to Airport</span>
										</div>
										<a href="listing-details.html" class="fclick"></a>
									</li>
									<!--LISTINGS-->
									<!--LISTINGS-->
									<li>
										<div class="hot-page2-hom-pre-1">
											<img src="images/services/2.jpeg" alt="">
										</div>
										<div class="hot-page2-hom-pre-2">
											<h5>Smith Luxury Villas</h5>
											<span>No:2, 4th Avenue,  Newyork, USA, Near to Airport</span>
										</div>
										<div class="hot-page2-hom-pre-3"> <span>2.0</span>
										</div>
										<a href="listing-details.html" class="fclick"></a>
									</li>
									<!--LISTINGS-->
									<!--LISTINGS-->
									<li>
										<div class="hot-page2-hom-pre-1">
											<img src="images/services/3.jpg" alt="">
										</div>
										<div class="hot-page2-hom-pre-2">
											<h5>Appers Premium Independent Houses</h5>
											<span>No:2, 4th Avenue,  Newyork, USA, Near to Airport</span>
										</div>
										<div class="hot-page2-hom-pre-3"> <span>3.3</span>
										</div>
										<a href="listing-details.html" class="fclick"></a>
									</li>
									<!--LISTINGS-->
									<!--LISTINGS-->
									<li>
										<div class="hot-page2-hom-pre-1">
											<img src="images/services/4.jpg" alt="">
										</div>
										<div class="hot-page2-hom-pre-2">
											<h5>Asian Real Estate</h5>
											<span>No:2, 4th Avenue,  Newyork, USA, Near to Airport</span>
										</div>
										<a href="listing-details.html" class="fclick"></a>
									</li>
									<!--LISTINGS-->
									<!--LISTINGS-->
									<li>
										<div class="hot-page2-hom-pre-1">
											<img src="images/services/5.jpeg" alt="">
										</div>
										<div class="hot-page2-hom-pre-2">
											<h5>jj</h5>
											<span>No:2, 4th Avenue,  Newyork, USA, Near to Airport</span>
										</div>
										<a href="listing-details.html" class="fclick"></a>
									</li>
									<!--LISTINGS-->
								</ul>
							</div>
						</div>
						<div class="col-md-4">
							<div class="hot-page2-hom-pre-head">
								<h4>Top Branding                                        <span>Digital Products</span></h4>
							</div>
							<div class="hot-page2-hom-pre">
								<ul>
									<!--LISTINGS-->
									<li>
										<div class="hot-page2-hom-pre-1">
											<img src="images/services/6.jpeg" alt="">
										</div>
										<div class="hot-page2-hom-pre-2">
											<h5>BizBookBusiness Directory Template</h5>
											<span>No:2, 4th Avenue,  Newyork, USA, Near to Airport</span>
										</div>
										<a href="listing-details.html" class="fclick"></a>
									</li>
									<!--LISTINGS-->
									<!--LISTINGS-->
									<li>
										<div class="hot-page2-hom-pre-1">
											<img src="images/services/7.jpeg" alt="">
										</div>
										<div class="hot-page2-hom-pre-2">
											<h5>Sony Music</h5>
											<span>No:2, 4th Avenue,  Newyork, USA, Near to Airport</span>
										</div>
										<a href="listing-details.html" class="fclick"></a>
									</li>
									<!--LISTINGS-->
									<!--LISTINGS-->
									<li>
										<div class="hot-page2-hom-pre-1">
											<img src="images/services/8.jpg" alt="">
										</div>
										<div class="hot-page2-hom-pre-2">
											<h5>IPM Business Software</h5>
											<span>No:2, 4th Avenue,  Newyork, USA, Near to Airport</span>
										</div>
								        <a href="listing-details.html" class="fclick"></a>
									</li>
									<!--LISTINGS-->
									<!--LISTINGS-->
									<li>
										<div class="hot-page2-hom-pre-1">
											<img src="images/services/9.png" alt="">
										</div>
										<div class="hot-page2-hom-pre-2">
											<h5>Tour and Travel html Template</h5>
											<span>No:2, 4th Avenue,  Newyork, USA, Near to Airport</span>
										</div>
										<div class="hot-page2-hom-pre-3"> <span>3.7</span>
										</div>
										<a href="listing-details.html" class="fclick"></a>
									</li>
									<!--LISTINGS-->
									<!--LISTINGS-->
									<li>
										<div class="hot-page2-hom-pre-1">
											<img src="images/services/10.jpg" alt="">
										</div>
										<div class="hot-page2-hom-pre-2">
											<h5>Smart Digital Products</h5>
											<span>No:2, 4th Avenue,  Newyork, USA, Near to Airport</span>
										</div>
										<div class="hot-page2-hom-pre-3"> <span>3.2</span>
										</div>
										<a href="listing-details.html" class="fclick"></a>
									</li>
									<!--LISTINGS-->
								</ul>
							</div>
						</div>
						<div class="col-md-4">
							<div class="hot-page2-hom-pre-head">
								<h4>Top Branding                                        <span>Hospitals</span></h4>
							</div>
							<div class="hot-page2-hom-pre">
								<ul>
									<!--LISTINGS-->
									<li>
										<div class="hot-page2-hom-pre-1">
											<img src="images/services/11.jpg" alt="">
										</div>
										<div class="hot-page2-hom-pre-2">
											<h5>William Chil care Hospital</h5>
											<span>No:2, 4th Avenue,  Newyork, USA, Near to Airport</span>
										</div>
										<a href="listing-details.html" class="fclick"></a>
									</li>
									<!--LISTINGS-->
									<!--LISTINGS-->
									<li>
										<div class="hot-page2-hom-pre-1">
											<img src="images/services/12.jpeg" alt="">
										</div>
										<div class="hot-page2-hom-pre-2">
											<h5>Urban Community Hospital</h5>
											<span>No:2, 4th Avenue,  Newyork, USA, Near to Airport</span>
										</div>
										<div class="hot-page2-hom-pre-3"> <span>4.0</span>
										</div>
										<a href="listing-details.html" class="fclick"></a>
									</li>
									<!--LISTINGS-->
									<!--LISTINGS-->
									<li>
										<div class="hot-page2-hom-pre-1">
											<img src="images/services/13.jpg" alt="">
										</div>
										<div class="hot-page2-hom-pre-2">
											<h5>Joseph Multispeciality Hospital</h5>
											<span>No:2, 4th Avenue,  Newyork, USA, Near to Airport</span>
										</div>
										<a href="listing-details.html" class="fclick"></a>
									</li>
									<!--LISTINGS-->
									<!--LISTINGS-->
									<li>
										<div class="hot-page2-hom-pre-1">
											<img src="images/services/14.jpg" alt="">
										</div>
										<div class="hot-page2-hom-pre-2">
											<h5>Apolloo Hospitals UAE</h5>
											<span>No:2, 4th Avenue,  Newyork, USA, Near to Airport</span>
										</div>
										<div class="hot-page2-hom-pre-3"> <span>4.0</span>
										</div>
										<a href="listing-details.html" class="fclick"></a>
									</li>
									<!--LISTINGS-->
									<!--LISTINGS-->
									<li>
										<div class="hot-page2-hom-pre-1">
											<img src="images/services/16.jpg" alt="">
										</div>
										<div class="hot-page2-hom-pre-2">
											<h5>Green Healthcare Hospital</h5>
											<span>No:2, 4th Avenue,  Newyork, USA, Near to Airport</span>
										</div>
										<div class="hot-page2-hom-pre-3"> <span>3.0</span>
										</div>
										<a href="listing-details.html" class="fclick"></a>
									</li>
									<!--LISTINGS-->
								</ul>
							</div>
						</div>
						<!--End Top Branding Hotels-->
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- END -->
	<section>
		<div id="demo" class="carousel slide cate-sli caro-home" data-ride="carousel">
			<div class="carousel-inner">
				<div class="carousel-item active">
					<img src="images/slider/1.jpg" alt="Los Angeles">
					<a href="https://bizbookdirectorytemplate.com/demo.html" target="_blank"></a>
				</div>
				<div class="carousel-item ">
					<img src="images/slider/2.jpg" alt="Los Angeles">
					<a href="https://bizbookdirectorytemplate.com/demo.html" target="_blank"></a>
				</div>
			</div>
			<a class="carousel-control-prev" href="#demo" data-slide="prev"> <span class="carousel-control-prev-icon"></span>
			</a>
			<a class="carousel-control-next" href="#demo" data-slide="next"> <span class="carousel-control-next-icon"></span>
			</a>
		</div>
	</section>
	<!-- START -->
	<section>
		<div class="str count">
			<div class="container">
				<div class="row">
					<div class="home-tit">
						<h2><span>Feature Events</span> in city                        </h2>
						<p>lacinia viverra lectus. Fusce imperdiet ullamcorper metus eu fringilla.</p>
					</div>
					<div class="hom-event">
						<div class="hom-eve-com hom-eve-lhs">
							<div class="hom-eve-lhs-1 col-md-4">
								<div class="eve-box">
									<div>
										<a href="event-details.html">
											<img src="images/events/1.png" alt=""> 
                                            <span><b>Dec 31</b></span>
										</a>
									</div>
									<div>
										<h4>
                                                <a href="event-details.html">Online Marketers Meet-Up</a>
                                            </h4>
										<span class="addr">London, UK</span>
										<span class="pho">6622442200</span>
									</div>
									<div>
										<div class="auth">
											<img src="images/user/1.png" alt=""> <b>Hosted by</b>
											<br>
											<h4>Directory Finder</h4>
											<a target="_blank" href="profile.html" class="fclick"></a>
										</div>
									</div>
								</div>
							</div>
							<div class="hom-eve-lhs-1 col-md-4">
								<div class="eve-box">
									<div>
										<a href="event-details.html">
											<img src="images/events/2.jpg" alt=""> 
                                            <span><b>Dec 31</b></span>
										</a>
									</div>
									<div>
										<h4>
                                                <a href="event-details.html">New year celebration</a>
                                            </h4>
										<span class="addr">London, UK</span>
										<span class="pho">6622442200</span>
									</div>
									<div>
										<div class="auth">
											<img src="images/user/2.jpeg" alt=""> <b>Hosted by</b>
											<br>
											<h4>Chris moris</h4>
											<a target="_blank" href="profile.html" class="fclick"></a>
										</div>
									</div>
								</div>
							</div>
							<div class="hom-eve-lhs-2 col-md-4">
								<ul>
									<li>
										<div class="eve-box-list">
											<img src="images/events/3.jpeg" alt="">
											<h4 title="Lunar New Year 2020">Lunar New Year 2020</h4>
												<p>Celebrate as the sights, sounds and aromas of A</p> <span>Jan                                                <b> 07</b></span>
												<a href="event-details.html" class="fclick"></a>
										</div>
									</li>
									<li>
										<div class="eve-box-list">
											<img src="images/events/4.jpg" alt="">
											<h4 title="Car Fest 2020">Car Fest 2020</h4>
												<p>Celebrate as the sights, sounds and aromas of A</p> <span>Jan                                                <b> 10</b></span>
												<a href="event-details.html" class="fclick"></a>
										</div>
									</li>
									<li>
										<div class="eve-box-list">
											<img src="images/events/5.jpg" alt="">
											<h4 title="Poway Winter Festival">Poway Winter Festival</h4>
												<p>Celebrate as the sights, sounds and aromas of A</p> <span>Jan                                                <b> 18</b></span>
												<a href="event-details.html" class="fclick"></a>
										</div>
									</li>
									<li>
										<div class="eve-box-list">
											<img src="images/events/6.jpg" alt="">
											<h4 title="Toyota Cars 20% Offer">Toyota Cars 20% Offer</h4>
												<p>Celebrate as the sights, sounds and aromas of A</p> <span>Mar                                                <b> 18</b></span>
												<a href="event-details.html" class="fclick"></a>
										</div>
									</li>
									<li>
										<div class="eve-box-list">
											<img src="images/events/7.jpg" alt="">
											<h4 title="Electrical Energy Saving Methods">Electrical Energy Saving Methods</h4>
												<p>Celebrate as the sights, sounds and aromas of A</p> <span>Jan                                                <b> 31</b></span>
												<a href="event-details.html" class="fclick"></a>
										</div>
									</li>
									<li>
										<div class="eve-box-list">
											<img src="images/events/8.jpeg" alt="">
											<h4 title="Food eating challenge">Food eating challenge</h4>
												<p>Celebrate as the sights, sounds and aromas of A</p> <span>Jan                                                <b> 18</b></span>
												<a href="event-details.html" class="fclick"></a>
										</div>
									</li>
								</ul>
							</div>
						</div>
					</div>
					<div class="how-wrks">
						<div class="home-tit">
							<h2><span>How It Works</span></h2>
							<p>Explore some of the best tips from around the world from our
								<br>partners and friends.lacinia viverra lectus.</p>
						</div>
						<div class="how-wrks-inn">
							<ul>
								<li>
									<div> <span>1</span>
										<img src="images/icon/how1.png" alt="">
										<h4>Create an account</h4>
										<p>Fusce imperdiet ullamcorper metus eu fringilla. from around the world from our partners and friends.</p>
									</div>
								</li>
								<li>
									<div> <span>2</span>
										<img src="images/icon/how2.png" alt="">
										<h4>Add your business</h4>
										<p>Fusce imperdiet ullamcorper metus eu fringilla. from around the world from our partners and friends.</p>
									</div>
								</li>
								<li>
									<div> <span>3</span>
										<img src="images/icon/how3.png" alt="">
										<h4>Get more leads</h4>
										<p>Fusce imperdiet ullamcorper metus eu fringilla. from around the world from our partners and friends.</p>
									</div>
								</li>
								<li>
									<div> <span>4</span>
										<img src="images/icon/how4.png" alt="">
										<h4>Archive goles</h4>
										<p>Fusce imperdiet ullamcorper metus eu fringilla. from around the world from our partners and friends.</p>
									</div>
								</li>
							</ul>
						</div>
					</div>
					<!--<div class="home-tit">
                    <h2><span></span> </h2>
                    <p></p>
                </div>
                <div class="inte">
                    <ul>
                        <li>
                            <div class="hom-oth">
                                <div>
                                    <img src="images/listings/hot5.jpg" alt="">
                                </div>
                                <div>
                                    <h4>Events</h4>
                                    <span>Email configuration</span>
                                </div>
                                <a href="events" class="fclick"></a>
                            </div>
                        </li>
                        <li>
                            <div class="hom-oth">
                                <div>
                                    <img src="images/listings/re1.jpg" alt="">
                                </div>
                                <div>
                                    <h4>Blog posts</h4>
                                    <span>Email configuration</span>
                                </div>
                                <a href="blog-posts" class="fclick"></a>
                            </div>
                        </li>
                        <li>
                            <div class="hom-oth">
                                <div>
                                    <img src="images/listings/spa3.jpg" alt="">
                                </div>
                                <div>
                                    <h4>How it works</h4>
                                    <span>Email configuration</span>
                                </div>
                                <a href="how-to.html" class="fclick"></a>
                            </div>
                        </li>
                        <li>
                            <div class="hom-oth">
                                <div>
                                    <img src="images/listings/re5.jpg" alt="">
                                </div>
                                <div>
                                    <h4>Pricing details</h4>
                                    <span>Email configuration</span>
                                </div>
                                <a href="pricing-details.html" class="fclick"></a>
                            </div>
                        </li>
                    </ul>
                </div>-->
					<!--<div class="country">
                    <div class="country-inn">
                        <h4>                            <span class="cont2"></span>
                        </h4>
                                                <iframe src="" allowfullscreen=""></iframe>
                    </div>
                </div>-->
					<div class="mob-app">
						<div class="lhs">
							<img src="images/mobile.png" alt="">
						</div>
						<div class="rhs">
							<h2>Looking for the Best Service Provider?                                <span>Get the App!</span></h2>
							<ul>
								<li>HOM-APP-TITFind nearby listings</li>
								<li>Easy service enquiry</li>
								<li>Listing reviews and ratings</li>
								<li>Manage your listing, enquiry and reviews</li>
							</ul> <span>We'll send you a link, to you below provided email id & open it on your smart phone to download the app</span>
							<form>
								<ul>
									<li>
										<input type="email" placeholder="Enter email id" required>
									</li>
									<li>
										<input type="submit" value="Get App Link">
									</li>
								</ul>
							</form>
							<a href="#">
								<img src="images/android.png" alt="">
							</a>
							<a href="#">
								<img src="images/apple.png" alt="">
							</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- END -->
	<!-- START -->
	<section>
		<div class="hom-ads">
			<div class="container">
				<div class="row">
					<div class="filt-com lhs-ads">
						<div class="ads-box">
							<a href=""> <span>Ad</span>
								<img src="images/ads/ads2.jpg" alt="">
							</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- END -->
	<!-- START -->
	<div class="ani-quo">
		<div class="ani-q1">
			<h4>What you looking for?</h4>
			<p>We connect you to service experts.</p> <span>Get experts</span>
		</div>
		<div class="ani-q2">
			<img src="images/quote.png" alt="">
		</div>
	</div>
	<!-- END -->
	<!-- START -->
<span class="btn-ser-need-ani">Help & Support</span>
	<div class="ani-quo-form"> <i class="material-icons ani-req-clo">close</i>
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
					<select name="enquiry_category" id="enquiry_category" class="form-control">
						<option value="">Select Category</option>
						<option value="19">Wedding halls</option>
						<option value="18">Hotel & Food</option>
						<option value="17">Pet shop</option>
						<option value="16">Digital Products</option>
						<option value="15">Spa and Facial</option>
						<option value="10">Real Estate</option>
						<option value="8">Sports</option>
						<option value="7">Education</option>
						<option value="6">Electricals</option>
						<option value="5">Automobiles</option>
						<option value="3">Transportation</option>
						<option value="2">Hospitals</option>
						<option value="1">Hotels And Resorts</option>
					</select>
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
@endsection