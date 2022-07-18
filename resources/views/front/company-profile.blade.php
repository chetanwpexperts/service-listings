@extends("layouts.webmaster")

@section("content")

<style>
.hom-top {
	        display: none;
	    }
	
	    html {
	        scroll-behavior: smooth;
	    }
.com-pro-pg-head {z-index: 999999999999999999;}
</style>
<section class=" abou-pg comp-pro-pg">
		<div class="com-pro-pg-head">
			<div class="container">
				<div class="row">
					<div class="comp-head">
                        <?php
                        $imgSrc = asset('public/images/bizbook-black.png');
                        ?>
						<a href="<?php echo URL::to('/member-dashboard');?>"><img src="{{$imgSrc}}" alt=""></a>
						<ul>
							<li><a href="#about">About us</a>
							</li>
							<li><a href="#prod">Products</a>
							</li>
							<!--<li><a href="#event">Events</a>
							</li>-->
							<li><a href="#blog">Blogs</a>
							</li>
							<li><a href="#home_enquiry_form" id="bus-pg-quot">Get quote</a>
							</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
		<div class="com-pro-pg-banner">
            <?php
            $imgbannerSrc = asset('public/images/all-list-bg.jpg');
            if($company->banner != "" || $company->banner != null)
            {
                $imgbannerSrc = asset('public/public/company/banner/' . $company->banner);
            }
            ?>
			<img src="{{$imgbannerSrc}}" alt="">
		</div>
		<div class="com-pro-pg-bd">
			<div class="container">
				<div class="row">
					<!--START-->
					<div class="box-s1">
						<div class="pro-pg-logo">
                            <?php
                            $imglogoSrc = asset('public/images/user/1.png');
                            if($company->banner != "" || $company->banner != null)
                            {
                                $imglogoSrc = asset('public/public/company/bannerlogo/' . $company->bannerlogo);
                            }
                            ?>
							<img src="{{$imglogoSrc}}" alt="">
						</div>
						<div class="pro-pg-bio">
							<h1>{{$company->name}} <i class="li-veri" title="Verified"><img
                                    src="{{asset('public/images/icon/svg/verified.png')}}"></i></h1>
							<ul class="bio">
								<li><span><img
                                        src="{{asset('public/images/icon/line/map.png')}}">Address: {{$company->address}}</span>
								</li>
								<li>
									<a href="Tel:{{$company->phone}}">
										<img src="{{asset('public/images/icon/line/phone.png')}}">{{$company->phone}}</a>
								</li>
								<li>
									<a href="mailto:{{$company->email}}">
										<img src="{{asset('public/images/icon/line/email.png')}}">{{$company->email}}</a>
								</li>
								<li>
									<a target="_blank" href="{{$company->website}}">
										<img src="{{asset('public/images/icon/line/website.png')}}">{{$company->website}}</a>
								</li>
								<li>
									<img src="{{asset('public/images/icon/line/website.png')}}">Tax no: {{$company->taxno}}</li>
							</ul>
							<ul class="soc">
                                <?php 
                                $socialAccounts = json_decode($company->social_accounts, true);
                                $iconPath = "";
                                foreach($socialAccounts as $key => $social)
                                {
                                    foreach($social as $k => $v)
                                    {
                                        switch($k)
                                        {
                                            case "facebook":
                                                $iconPath = asset('public/images/icon/line/facebook.png');
                                                break;
                                            case "twitter":
                                                $iconPath = asset('public/images/icon/line/twitter.png');
                                                break;
                                            case "linkedin":
                                                $iconPath = asset('public/images/icon/line/linkedin.png');
                                                break;
                                            case "instagram":
                                                $iconPath = asset('public/images/icon/line/instagram.png');
                                                break;
                                            case "youtube":
                                                $iconPath = asset('public/images/icon/line/youtube.png');
                                                break;
                                            case "whatsapp":
                                                $iconPath = asset('public/images/icon/line/whatsapp.png');
                                                break;
                                        }
                                        ?>
                                        <li>
                                            <?php 
                                            if($v != "")
                                            {
                                                ?>
                                                <a href="<?=$v?>" target="_blank">
                                                    <img src="<?=$iconPath?>">
                                                </a>
                                                <?php 
                                            }
                                            ?>
                                        </li>
                                        <?php 
                                    }
                                }
                                ?>
							</ul>
						</div>
						<div class="pro-pg-cts"> <a href="#home_enquiry_form" class="cta1">Get quote</a>
							<a href="Tel:{{$company->phone}}" class="cta2">Call now</a>
							<a target="_blank" href="https://wa.me/{{$company->phone}}" class="cta3">WhatsApp</a>
						</div>
					</div>
					<!--END-->
					<!--START-->
					<div class="box-s2">
						<div class="lhs">
							<!--START-->
							<div class="comp-abo" id="about">
								<h2>About company</h2>
								<?=$company->description?>
							</div>
							<!--END-->
							<!--START-->
							<div class="comp-pro" id="prod">
								<h2>Products</h2>
								<div class="all-pro-box">
									<div class="all-pro-img">
										<img src="images/products/1.jpg">
									</div>
									<div class="all-pro-aut">
										<div class="auth">
											<a target="_blank" href="product/8-x-4-metal-trailer---exc-tyres" class="fclick"></a>
										</div>
									</div>
									<div class="all-pro-txt">
										<h4>8 x 4 Metal Trailer - Exc Tyres</h4>
										<span class="pri"><b
                                                    class="pro-off">$400</b> 20% off</span>
										<div class="links"> <a target="_blank" href="https://themeforest.net/item/bizbook-directory-listings-template/25391222">Buy now</a>
										</div>
									</div>
									<a target="_blank" href="#" class="pro-view-full"></a>
								</div>
							</div>
							<!--END-->
							<!--START-->
							<div class="comp-pro" id="event">
								<h2>Events</h2>
								<div class="land-pack-grid">
									<div class="land-pack-grid-img">
										<img src="images/events/2.jpg" alt="">
									</div>
									<div class="land-pack-grid-text">
										<h4>Digital Marketing Seminar 2020</h4>
									</div>
									<a target="_blank" href="#" class="land-pack-grid-btn"></a>
								</div>
							</div>
							<!--END-->
							<!--START-->
							<div class="comp-pro" id="blog">
								<h2>Blogs</h2>
								<div class="land-pack-grid">
									<div class="land-pack-grid-img">
										<img src="images/blogs/blog2.jpg" alt="">
									</div>
									<div class="land-pack-grid-text">
										<h4>Digital Marketing</h4>
									</div>
									<a target="_blank" href="#" class="land-pack-grid-btn"></a>
								</div>
							</div>
							<!--END-->
						</div>
						<div class="rhs">
							<div class="cpro-form">
								<div class="box templ-rhs-eve">
									<div class="hot-page2-hom-pre-head">
										<h4>Send enquiry</h4>
									</div>
									<div class="templ-rhs-form">
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
											<div class="form-group ic-user">
												<input type="text" name="enquiry_name" value="" required="required" class="form-control" placeholder="Enter name*" id="ic-user">
											</div>
											<div class="form-group ic-eml">
												<input type="email" class="form-control" placeholder="Enter email*" required="required" value="" name="enquiry_email" pattern="^[\w]{1,}[\w.+-]{0,}@[\w-]{2,}([.][a-zA-Z]{2,}|[.][\w-]{2,}[.][a-zA-Z]{2,})$" title="Invalid email address">
											</div>
											<div class="form-group ic-pho">
												<input type="text" class="form-control" value="" name="enquiry_mobile" placeholder="Enter mobile number *" pattern="[7-9]{1}[0-9]{9}" title="Phone number starting with 7-9 and remaing 9 digit with 0-9" required="">
											</div>
											<div class="form-group">
												<textarea class="form-control" rows="3" name="enquiry_message" placeholder="Enter your query or message"></textarea>
											</div>
											<input type="hidden" id="source">
											<button type="submit" id="home_enquiry_submit" name="home_enquiry_submit" class="btn btn-primary">Submit</button>
										</form>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!--END-->
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
			url: "{{route('storecompanyviews')}}",
			type: "POST",
			data: {
				company_id: '{{$company->id}}'
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