<!doctype html>
<html lang="en">
<head>
	<title>{{$page->meta_title}}</title>
	<!--== META TAGS ==-->
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="csrf-token" content="{{ csrf_token() }}" />
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<meta name="theme-color" content="#76cef1" />
	<meta name="description" content="{{$page->meta_description}}">
	<meta name="keyword" content="{{$page->keywords}}">
	<!--== FAV ICON(BROWSER TAB ICON) ==-->
	@php 
	$imgsrc = '';
	if(!empty($websettings) && $websettings['fav_icon'] != "")
	{
		$imgsrc = asset('public/public/admin/settings/'.$websettings['fav_icon']);
	}
	@endphp
	<link rel="shortcut icon" href="{{ $imgsrc }}" type="image/x-icon">
	<!--== GOOGLE FONTS ==-->
	<link href="https://fonts.googleapis.com/css?family=Oswald:700|Source+Sans+Pro:300,400,600,700&display=swap" rel="stylesheet">
	<!--== WEB ICON FONTS ==-->
	<link rel="preload" as="font" href="{{ asset('public/css/icon.woff2') }}" type="font/woff2" crossorigin="anonymous">
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<!--== CSS FILES ==-->
	<link rel="stylesheet" href="{{ asset('public/css/jquery-ui.css') }}">
	<link rel="stylesheet" href="{{ asset('public/css/bootstrap.css') }}">
	<link rel="stylesheet" href="{{ asset('public/css/style.css') }}">
	<link rel="stylesheet" href="{{ asset('public/css/fonts.css') }}">
	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->
	<!--    Google Analytics Code Starts-->
	<!-- Global site tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-90614514-2"></script>
	<script>
		window.dataLayer = window.dataLayer || [];
		  function gtag(){dataLayer.push(arguments);}
		  gtag('js', new Date());
		
		  gtag('config', 'UA-90614514-2');
	</script>
	<!--    Google Analytics Code Ends-->
</head>

<body>
	<div class="row bodymessage" style="display:none;">
		<div class="alert alert-success" role="alert">
			<button type="button" class="close">
				<span aria-hidden="True">&times;</span>
			</button>
			<h4 class="alert-heading"></h4>
			<p id="response"></p>
		</div>
	</div>
	<!-- Preloader -->
	<div id="preloader">
		<div id="status">&nbsp;</div>
	</div>
	<!-- START -->
	<section>
		<div class="str">
			<?php 
			$home_page_banner = URL::to('/public/images/promo.jpg');
			if(!empty($websettings) && $websettings['home_page_banner'] != "")
			{
				$home_page_banner = asset('public/public/admin/settings/'.$websettings['home_page_banner']);
			}
			$bannerurl = $home_page_banner;
			$bannerstyle = "";
			$bannerclass = "";
			$hide = 0;
			foreach($settings as $homepagesetting)
			{
				if($homepagesetting->page_id == $page->id && $homepagesetting->show_banner == 1)
				{
					$bannerstyle = 'background-image: url('.$bannerurl.');';
					$bannerclass = "hom-head";
					$hide = 1;
				}
			}
			?>
			<div class="{{$bannerclass}}" style="{{$bannerstyle}}">
				<?php
				//dd(Session::get('auth'));
				$mid = Session::get('mid');
				$name = Session::get('Name');
				$email = Session::get('email');
				$joining = Session::get('joining');
				if($mid != "")
				{
					?>
					<div class="hom-top">
						<div class="container">
							<div class="row">
								<div class="hom-nav  db-open ">
									<!--MOBILE MENU-->
									<!--<div class="menu">
									<i class="material-icons mopen">menu</i>
								</div>-->
									<a href="<?php echo URL::to('/');?>" class="top-log">
									@php 
									$logo = asset('public/images/home/logo-b.png');
									if(!empty($websettings) && $websettings['logo'] != "")
									{
										$logo = asset('public/public/admin/settings/'.$websettings['logo']);
									}
									@endphp
									<img src="{{ $logo }}" class="ic-logo">
									</a>
									<div class="menu">
										<h4>All Category</h4>
									</div>
									<div class="pop-menu">
										<div class="container">
											<div class="row"> <i class="material-icons clopme">close</i>
												<div class="pmenu-spri">
													<ul>
														<li>
															<a href="{{route('getcategories')}}" class="act">
																<img src="{{asset('public/images/icon/shop.png')}}">All Services</a>
														</li>
														
														<li>
															<a href="all-products.html">
																<img src="{{asset('public/images/icon/cart.png')}}">Products</a>
														</li>
														
														<li>
															<a href="blog-posts.html">
																<img src="{{asset('public/images/icon/blog1.png')}}">Blogs</a>
														</li>
														
													</ul>
												</div>
												<div class="pmenu-cat">
													<h4>All Categories</h4>
													<input type="text" id="pg-sear" placeholder="Search category">
													<ul id="pg-resu">
														<?php 
														if(!empty($sub_categories))	
														{
															foreach($sub_categories as $subcat)
															{
																?>
																<li> <a href="{{route('getsubcategorylisting',['category_slug' => $subcat->category_slug, 'parent_slug' => $category->category_slug, ])}}">{{$subcat->category_name}} <span><?php echo getCategoryListingCount("", $subcat->id);?></span></a></li>
																<?php 
															}
														}else{
															foreach($categories as $category)
															{
																?>
																<li> <a href="{{route('getcategorylisting',[$category->category_slug])}}">{{$category->category_name}} <span><?php echo getCategoryListingCount("", $category->id);?></span></a></li>
																<?php
															}
														}
														?>
													</ul>
												</div>
												<div class="dir-home-nav-bot">
													<ul>
														<li>A few reasons you’ll love Online Business Directory <span>Call us on: +01 6214 6548</span> 
														</li>
														<li><a href="post-your-ads.html.html" class="waves-effect waves-light btn-large"><i class="material-icons">font_download</i> Advertise with us</a>
														</li>
														<li>
															<a href="<?php echo URL::to('/add-business');?>" class="waves-effect waves-light btn-large"> <i class="material-icons">store</i> Add your business</a>
														</li>
													</ul>
												</div>
											</div>
										</div>
									</div>
									<!--END MOBILE MENU-->
									<div class="top-ser">
										<form name="filter_form" id="filter_form" class="filter_form">
											<ul>
												<li class="sr-sea">
													<input type="text" autocomplete="off" id="top-select-search" placeholder="Search for services and business...">
													<ul id="tser-res1" class="tser-res tser-res2">
														<li>
															<div>
																<h4>The Royal Spa Center For Womens</h4>
																<span>No:2, 4th Avenue, Newyork, USA, Near to Airport</span>
																<a href="all-listing.html"></a>
															</div>
														</li>
														<li>
															<div>
																<h4>Real estate</h4>
																<span>Chennai, India</span>
																<a href="all-listing.html"></a>
															</div>
														</li>
														<li>
															<div>
																<h4>Education</h4>
																<span>Schools, university, colleges, online classes, tution centers, distance education..</span>
																<a href="all-listing.html"></a>
															</div>
														</li>
														<li>
															<div>
																<h4>Hotel and resort booking</h4>
																<span>hotel booking online, hotel reservation, holiday room booking</span>
																<a href="all-listing.html"></a>
															</div>
														</li>
														<li>
															<div>
																<h4>Import and export</h4>
																<span>Import and export to other countrys with low cost</span>
																<a href="all-listing.html"></a>
															</div>
														</li>
														<li>
															<div>
																<h4>Properties in Illunois</h4>
																<span>Villas, Plots, House rent and buy</span>
																<a href="all-listing.html"></a>
															</div>
														</li>
														<li>
															<div>
																<h4>Schools in Adyar</h4>
																<span>schools, adyar, education, </span>
																<a href="all-listing.html"></a>
															</div>
														</li>
														<li>
															<div>
																<h4>Laptop services near you</h4>
																<span>laptop services, computer services</span>
																<a href="all-listing.html"></a>
															</div>
														</li>
														<li>
															<div>
																<h4>Hospital and medical services near you</h4>
																<span>Hospital and medical services near you</span>
																<a href="all-listing.html"></a>
															</div>
														</li>
													</ul>
												</li>
												<li class="sbtn">
													<button type="button" class="btn btn-success" id="top_filter_submit"><i class="material-icons">&nbsp;</i>
													</button>
												</li>
											</ul>
										</form>
									</div>
									<div class="al">
										<div class="head-pro">
											<?php
											$imgSrc = asset('public/images/defaultimg.png');
											
											if(!empty($userdp))
											{
												if($userdp->image != "" || $userdp->image != null)
												{
													$imgSrc = asset('public/public/user/dp/' . $userdp->image);
												}
											}
											?>
											<img src="{{ $imgSrc }}" alt=""> <b>Profile by</b>
											<br>
											<h4>{{$name}}</h4>
											<a href="<?php echo URL::to('/member-dashboard');?>" class="fclick"></a>
										</div>
										<div class="db-menu" style="display: none; height: 437.797px; padding-top: 15px; margin-top: -1px; padding-bottom: 15px; margin-bottom: 0px;">
											<ul>
												<li>
													<a href="<?php echo URL::to('/member-dashboard');?>" class="db-lact">
														<img src="{{asset('public/images/icon/dbl1.png')}}" alt="">My Dashboard</a>
												</li>
												<li>
													<a href="db-all-listing.html">
														<img src="{{asset('public/images/icon/dbl7.png')}}" alt="">All Listings</a>
												</li>
												<li>
													<a href="add-listing-start.html" class="tz-lma">
														<img src="{{asset('public/images/icon/dbl3.png')}}" alt="">Add New Listing</a>
												</li>
												<li>
													<a href="db-enquiry.html">
														<img src="{{asset('public/images/icon/dbl14.png')}}" alt="">Lead enquiry</a>
												</li>
												<li>
													<a href="db-events.html">
														<img src="{{asset('public/images/icon/dbl4.png')}}" alt="">Events</a>
												</li>
												<li>
													<a href="db-blog-posts.html">
														<img src="{{asset('public/images/icon/dbl10.png')}}" alt="">Blog posts</a>
												</li>
												<li>
													<a href="db-review.html">
														<img src="{{asset('public/images/icon/dbl13.png')}}" alt="">Reviews</a>
												</li>
												<li>
													<a href="db-my-profile.html">
														<img src="{{asset('public/images/icon/dbl6.png')}}" alt="">My Profile</a>
												</li>
												<li>
													<a href="{{route('memberlogout')}}">
														<img src="{{asset('public/images/icon/dbl12.png')}}" alt="">Log Out</a>
												</li>
											</ul>
										</div>
									</div>
									<!--MOBILE MENU-->
									<div class="mob-menu">
										<div class="mob-me-ic"><i class="material-icons">menu</i>
										</div>
										<div class="mob-me-all">
											<div class="mob-me-clo"><i class="material-icons">close</i>
											</div>
											<div class="mv-pro ud-lhs-s1">
												<img src="images/user/62736rn53themes.png" alt="">
												<h4>{{$name}}</h4>
												<b>Join on {{$joining->isoFormat('D, MMMM YYYY')}}</b>
											</div>
											<div class="mv-pro-menu ud-lhs-s2">
												<ul>
													<li>
														<a href="dashboard.html" class="">
															<img src="images/icon/dbl1.png" alt="">My Dashboard</a>
													</li>
													<li>
														<a href="db-all-listing.html" class="">
															<img src="images/icon/shop.png" alt="">All Listings</a>
													</li>
													<li>
														<a href="add-listing-start.html">
															<img src="images/icon/dbl3.png" alt="">Add New Listing</a>
													</li>
													<li>
														<a href="db-enquiry.html" class="">
															<img src="images/icon/tick.png" alt="">Lead enquiry</a>
													</li>
													<li>
														<a href="db-products.html" class="">
															<img src="images/icon/cart.png" alt="">All Products</a>
													</li>
													<li>
														<a href="db-events.html" class="">
															<img src="images/icon/calendar.png" alt="">Events</a>
													</li>
													<li>
														<a href="db-blog-posts.html" class="">
															<img src="images/icon/blog1.png" alt="">Blog posts</a>
													</li>
													<li>
														<a href="db-coupons.html" class="">
															<img src="images/icon/coupons.png" alt="">Coupons</a>
													</li>
													<li>
														<a href="db-promote.html" class="">
															<img src="images/icon/promotion.png" alt="">Promotions</a>
													</li>
													<li>
														<a href="db-seo.html" class="">
															<img src="images/icon/seo.png" alt="">SEO</a>
													</li>
													<li>
														<a href="db-review.html" class="">
															<img src="images/icon/dbl13.png" alt="">Reviews</a>
													</li>
													<li>
														<a href="db-message.html" class="">
															<img src="images/icon/dbl14.png" alt="">Messages</a>
													</li>
													<li>
														<a href="db-my-profile.html" class="">
															<img src="images/icon/dbl6.png" alt="">My Profile</a>
													</li>
													<li>
														<a href="db-like-listings.html" class="">
															<img src="images/icon/dbl15.png" alt="">Liked Listings</a>
													</li>
													<li>
														<a href="db-followings.html" class="">
															<img src="images/icon/dbl18.png" alt="">Followings</a>
													</li>
													<li>
														<a href="db-post-ads.html" class="">
															<img src="images/icon/dbl11.png" alt="">Ad Summary</a>
													</li>
													<li>
														<a href="db-payment.html" class="">
															<img src="images/icon/dbl9.png" alt="">Payment &amp; plan</a>
													</li>
													<li>
														<a href="db-invoice-all.html" class="">
															<img src="images/icon/dbl16.png" alt="">Payment invoice</a>
													</li>
													<li>
														<a href="db-notifications.html" class="">
															<img src="images/icon/dbl19.png" alt="">Notifications</a>
													</li>
													<li>
														<a href="how-to.html" class="" target="_blank">
															<img src="images/icon/dbl17.png" alt="">How to's</a>
													</li>
													<li>
														<a href="db-setting.html" class="">
															<img src="images/icon/dbl210.png" alt="">Setting</a>
													</li>
													<li>
														<a href="{{route('memberlogout')}}">
															<img src="images/icon/dbl12.png" alt="">Log Out</a>
													</li>
												</ul>
											</div>
											<div class="mv-cate">
												<h4>All Categories</h4>
												<ul>
													<li> <a href="all-listing.html">Wedding halls</a>
													</li>
													<li> <a href="all-listing.html">Hotel &amp; Food</a>
													</li>
													<li> <a href="all-listing.html">Pet shop</a>
													</li>
													<li> <a href="all-listing.html">Digital Products</a>
													</li>
													<li> <a href="all-listing.html">Spa and Facial</a>
													</li>
													<li> <a href="all-listing.html">Real Estate</a>
													</li>
													<li> <a href="all-listing.html">Sports</a>
													</li>
													<li> <a href="all-listing.html">Education</a>
													</li>
													<li> <a href="all-listing.html">Electricals</a>
													</li>
													<li> <a href="all-listing.html">Automobiles</a>
													</li>
													<li> <a href="all-listing.html">Transportation</a>
													</li>
													<li> <a href="all-listing.html">Hospitals</a>
													</li>
													<li> <a href="all-listing.html">Hotels And Resorts</a>
													</li>
												</ul>
											</div>
										</div>
									</div>
									<!--END MOBILE MENU-->
								</div>
							</div>
						</div>
					</div>
					<?php
				}else{
					?>
					<div class="hom-top">
						<div class="container">
							<div class="row">
								<div class="hom-nav ">
									<!--MOBILE MENU-->
									<!--<div class="menu">
									<i class="material-icons mopen">menu</i>
								</div>-->
									<a href="<?php echo URL::to('/');?>" class="top-log">
									@php 
									$logo = asset('public/images/home/logo-b.png');
									if(!empty($websettings) && $websettings['logo'] != "")
									{
										$logo = asset('public/public/admin/settings/'.$websettings['logo']);
									}
									@endphp
									<img src="{{ $logo }}" class="ic-logo">
									</a>
									<div class="menu">
										<h4>All Category</h4>
									</div>
									<div class="pop-menu">
										<div class="container">
											<div class="row"> <i class="material-icons clopme">close</i>
												<div class="pmenu-spri">
													<ul>
													<li>
															<a href="{{route('getcategories')}}" class="act">
																<img src="{{asset('public/images/icon/shop.png')}}">All Services</a>
														</li>
														
														<li>
															<a href="all-products.html">
																<img src="{{asset('public/images/icon/cart.png')}}">Products</a>
														</li>
														
														<li>
															<a href="blog-posts.html">
																<img src="{{asset('public/images/icon/blog1.png')}}">Blogs</a>
														</li>
														
													</ul>
												</div>
												<div class="pmenu-cat">
													<h4>All Categories</h4>
													<input type="text" id="pg-sear" placeholder="Search category">
													<ul id="pg-resu">
													<?php 
														$count = count($sub_categories);
														if($count > 0)
														{
															foreach($sub_categories as $subcat)
															{
																?>
																<li> <a href="{{route('getsubcategorylisting',['category_slug' => $subcat->category_slug, 'parent_slug' => $category->category_slug, ])}}">{{$subcat->category_name}} <span><?php echo getCategoryListingCount("", $subcat->id);?></span></a></li>
																<?php 
															}
														}else{
															foreach($categories as $category)
															{
																?>
																<li> <a href="{{route('getcategorylisting',[$category->category_slug])}}">{{$category->category_name}} <span><?php echo getCategoryListingCount("", $category->id);?></span></a></li>
																<?php
															}
														}
														?>
													</ul>
												</div>
												<div class="dir-home-nav-bot">
													<ul>
														<li>A few reasons you’ll love Online Business Directory <span>Call us on: +01 6214 6548</span> 
														</li>
														<li><a href="post-your-ads.html.html" class="waves-effect waves-light btn-large"><i class="material-icons">font_download</i> Advertise with us</a>
														</li>
														<li>
															<a href="<?php echo URL::to('/add-business');?>" class="waves-effect waves-light btn-large"> <i class="material-icons">store</i> Add your business</a>
														</li>
													</ul>
												</div>
											</div>
										</div>
									</div>
									<!--END MOBILE MENU-->
									<div class="top-ser">
										<form name="filter_form" id="filter_form" class="filter_form">
											<ul>
												<li class="sr-sea">
													<!--                                            <input type="text"  id="-->
													<!--" class="autocomplete"-->
													<!--                                                   placeholder="-->
													<!--">-->
													<input type="text" autocomplete="off" id="top-select-search" placeholder="Search for services and business...">
													<ul id="tser-res1" class="tser-res tser-res2">
														<li>
															<div>
																<h4>The Royal Spa Center For Womens</h4>
																<span>No:2, 4th Avenue, Newyork, USA, Near to Airport</span>
																<a href="all-listing.html"></a>
															</div>
														</li>
														<li>
															<div>
																<h4>Real estate</h4>
																<span>Chennai, India</span>
																<a href="all-listing.html"></a>
															</div>
														</li>
														<li>
															<div>
																<h4>Education</h4>
																<span>Schools, university, colleges, online classes, tution centers, distance education..</span>
																<a href="all-listing.html"></a>
															</div>
														</li>
														<li>
															<div>
																<h4>Hotel and resort booking</h4>
																<span>hotel booking online, hotel reservation, holiday room booking</span>
																<a href="all-listing.html"></a>
															</div>
														</li>
														<li>
															<div>
																<h4>Import and export</h4>
																<span>Import and export to other countrys with low cost</span>
																<a href="all-listing.html"></a>
															</div>
														</li>
														<li>
															<div>
																<h4>Properties in Illunois</h4>
																<span>Villas, Plots, House rent and buy</span>
																<a href="all-listing.html"></a>
															</div>
														</li>
														<li>
															<div>
																<h4>Schools in Adyar</h4>
																<span>schools, adyar, education, </span>
																<a href="all-listing.html"></a>
															</div>
														</li>
														<li>
															<div>
																<h4>Laptop services near you</h4>
																<span>laptop services, computer services</span>
																<a href="all-listing.html"></a>
															</div>
														</li>
														<li>
															<div>
																<h4>Hospital and medical services near you</h4>
																<span>Hospital and medical services near you</span>
																<a href="all-listing.html"></a>
															</div>
														</li>
													</ul>
												</li>
												<li class="sbtn">
													<button type="button" class="btn btn-success" id="top_filter_submit"><i class="material-icons">&nbsp;</i>
													</button>
												</li>
											</ul>
										</form>
									</div>
									<ul class="bl">
										<li><a href="<?php echo URL::to('/add-business');?>">Add business</a>
										</li>
										<li><a href="<?php echo URL::to('/memberlogin');?>">Sign in</a>
										</li>
										<li><a href="<?php echo URL::to('/memberlogin?login=register');?>">Create an account</a>
										</li>
									</ul>
									<!--MOBILE MENU-->
									<div class="mob-menu">
										<div class="mob-me-ic"><i class="material-icons">menu</i>
										</div>
										<div class="mob-me-all">
											<div class="mob-me-clo"><i class="material-icons">close</i>
											</div>
											<div class="mv-bus">
												<h4></h4>
												<ul>
													<li><a href="<?php echo URL::to('/add-business');?>">Add business</a>
													</li>
													<li><a href="<?php echo URL::to('/memberlogin');?>">Sign in</a>
													</li>
													<li><a href="<?php echo URL::to('/memberlogin?login=register');?>">Create an account</a>
													</li>
												</ul>
											</div>
											<div class="mv-cate">
												<h4>All Categories</h4>
												<ul>
													<li> <a href="all-listing.html">Wedding halls</a>
													</li>
													<li> <a href="all-listing.html">Hotel &amp; Food</a>
													</li>
													<li> <a href="all-listing.html">Pet shop</a>
													</li>
													<li> <a href="all-listing.html">Digital Products</a>
													</li>
													<li> <a href="all-listing.html">Spa and Facial</a>
													</li>
													<li> <a href="all-listing.html">Real Estate</a>
													</li>
													<li> <a href="all-listing.html">Sports</a>
													</li>
													<li> <a href="all-listing.html">Education</a>
													</li>
													<li> <a href="all-listing.html">Electricals</a>
													</li>
													<li> <a href="all-listing.html">Automobiles</a>
													</li>
													<li> <a href="all-listing.html">Transportation</a>
													</li>
													<li> <a href="all-listing.html">Hospitals</a>
													</li>
													<li> <a href="all-listing.html">Hotels And Resorts</a>
													</li>
												</ul>
											</div>
										</div>
									</div>
									<!--END MOBILE MENU-->
								</div>
							</div>
						</div>
					</div>
					<?php
				}
				?>
				@if($hide != 0)
				<div class="container">
					<div class="row">
						<div class="ban-tit">
							<h1><b>Connect with the right<br>Service Experts</b> Restaurants, cafe's, and bars in New york                                                            </h1>
						</div>
						<div class="ban-search">
							<form name="filter_form" id="filter_form" class="filter_form">
								<ul>
									<li class="sr-cit">
										<input type="text" id="select-city" name="select-city" class="autocomplete" placeholder="City">
									</li>
									<li class="sr-sea">
										<!--<input type="text" id="select-search" class="autocomplete"
                                               placeholder="">-->
										<input type="text" autocomplete="off" id="select-search" placeholder="Search for services and business..." class="search-field">
										<ul id="tser-res" class="tser-res tser-res1">
											<li>
												<div>
													<h4>The Royal Spa Center For Womens</h4>
													<span>No:2, 4th Avenue, Newyork, USA, Near to Airport</span>
													<a href="all-listing.html"></a>
												</div>
											</li>
											<li>
												<div>
													<h4>Real estate</h4>
													<span>Chennai, India</span>
													<a href="all-listing.html"></a>
												</div>
											</li>
											<li>
												<div>
													<h4>Education</h4>
													<span>Schools, university, colleges, online classes, tution centers, distance education..</span>
													<a href="all-listing.html"></a>
												</div>
											</li>
											<li>
												<div>
													<h4>Hotel and resort booking</h4>
													<span>hotel booking online, hotel reservation, holiday room booking</span>
													<a href="all-listing.html"></a>
												</div>
											</li>
											<li>
												<div>
													<h4>Import and export</h4>
													<span>Import and export to other countrys with low cost</span>
													<a href="all-listing.html"></a>
												</div>
											</li>
											<li>
												<div>
													<h4>Properties in Illunois</h4>
													<span>Villas, Plots, House rent and buy</span>
													<a href="all-listing.html"></a>
												</div>
											</li>
											<li>
												<div>
													<h4>Schools in Adyar</h4>
													<span>schools, adyar, education, </span>
													<a href="all-listing.html"></a>
												</div>
											</li>
											<li>
												<div>
													<h4>Laptop services near you</h4>
													<span>laptop services, computer services</span>
													<a href="all-listing.html"></a>
												</div>
											</li>
											<li>
												<div>
													<h4>Hospital and medical services near you</h4>
													<span>Hospital and medical services near you</span>
													<a href="all-listing.html"></a>
												</div>
											</li>
										</ul>
									</li>
									<li class="sr-btn">
										<input type="submit" id="filter_submit" name="filter_submit" value="Search" class="filter_submit">
									</li>
								</ul>
							</form>
						</div>
						<div class="ban-ql">
							<ul>
								@php
								$i = 1;
								@endphp
								@foreach($sections as $section)
									@if($section->section_heading == "Home Banner")
									<li>
										<div>
											@php 
											$icon = asset('public/images/icon/'.$i.'.png');
											if($section->image != "")
											{
												$icon = asset('public/public/sections/'.$section->image);
											}
											@endphp
											<img src="{{$icon}}" alt="">
											<h4>{{$section->section_name}}</h4>
											<?=$section->description?> <a href="<?php echo URL::to('/about');?>">Explore Now</a>
										</div>
									</li>
									@endif
									@php
									$i++;
									@endphp
								@endforeach
							</ul>
						</div>
					</div>
				</div>
				@endif
			</div>
		</div>
	</section>
	<!-- END -->