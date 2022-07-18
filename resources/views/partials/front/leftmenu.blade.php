<div class="ud-lhs">
				<div class="ud-lhs-s1">
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
					<img src="{{ $imgSrc }}" alt="">
					<h4>{{$name}}</h4>
					<b>Join on {{$joining->isoFormat('D, MMMM YYYY')}}</b>
					<a class="ud-lhs-view-pro" target="_blank" href="{{route('viewprofile', [$user->member_id])}}">My profile</a>
				</div>
				<div class="ud-lhs-s2">
					<ul>
						<li>
							<a href="<?php echo URL::to('/member-dashboard');?>" class="db-lact">
								<img src="{{ asset('public/images/icon/dbl1.png') }}" alt="" />My Dashboard</a>
						</li>
						<li>
							<a href="{{route('getalllisting')}}" class="">
								<img src="{{ asset('public/images/icon/shop.png') }}" alt="" />All Listings</a>
						</li>
						<li>
							<a href="{{route('newlisting')}}">
								<img src="{{ asset('public/images/icon/dbl3.png') }}" alt="" />Add New Listing</a>
						</li>
						<li>
							<a href="db-enquiry.html" class="">
								<img src="{{ asset('public/images/icon/tick.png') }}" alt="" />Lead enquiry</a>
						</li>
						<li>
							<a href="db-products.html" class="">
								<img src="{{ asset('public/images/icon/cart.png') }}" alt="" />All Products</a>
						</li>
						<li>
							<a href="db-events.html" class="">
								<img src="{{ asset('public/images/icon/calendar.png') }}" alt="" />Events</a>
						</li>
						<li>
							<a href="db-blog-posts.html" class="">
								<img src="{{ asset('public/images/icon/blog1.png') }}" alt="" />Blog posts</a>
						</li>
						<li>
							<a href="db-coupons.html" class="">
								<img src="{{ asset('public/images/icon/coupons.png') }}" alt="" />Coupons</a>
						</li>
						<li>
							<a href="db-promote.html" class="">
								<img src="{{ asset('public/images/icon/promotion.png') }}" alt="" />Promotions</a>
						</li>
						<li>
							<a href="db-seo.html" class="">
								<img src="{{ asset('public/images/icon/seo.png') }}" alt="" />SEO</a>
						</li>
						<li>
							<a href="db-point-history.html" class="">
								<img src="{{ asset('public/images/icon/point.png') }}" alt="" />Points History</a>
						</li>
						<li>
							<a href="db-review.html" class="">
								<img src="{{ asset('public/images/icon/dbl13.png') }}" alt="" />Reviews</a>
						</li>
						<!--<li>
                        <a href="db-message" class=""><img src="images/icon/dbl14.png" alt="" />Messages</a>
                    </li>-->
						<li>
							<a href="db-my-profile.html" class="">
								<img src="{{ asset('public/images/icon/dbl6.png') }}" alt="" />My Profile</a>
						</li>
						<li>
							<a href="db-like-listings.html" class="">
								<img src="{{ asset('public/images/icon/dbl15.png') }}" alt="" />Liked Listings</a>
						</li>
						<li>
							<a href="db-followings.html" class="">
								<img src="{{ asset('public/images/icon/dbl18.png') }}" alt="" />Followings</a>
						</li>
						<li>
							<a href="db-post-ads.html" class="">
								<img src="{{ asset('public/images/icon/dbl11.png') }}" alt="" />Ad Summary</a>
						</li>
						<li>
							<a href="db-payment" class="">
								<img src="{{ asset('public/images/icon/dbl9.png') }}" alt="">Payment & plan</a>
						</li>
						<li>
							<a href="db-invoice-all.html" class="">
								<img src="{{ asset('public/images/icon/dbl16.pn') }}g" alt="" />Payment invoice</a>
						</li>
						<li>
							<a href="db-notifications.html" class="">
								<img src="{{ asset('public/images/icon/dbl19.png') }}" alt="" />Notifications</a>
						</li>
						<li>
							<a href="how-to.html" class="" target="_blank">
								<img src="{{ asset('public/images/icon/dbl17.png') }}" alt="" />How to's</a>
						</li>
						<li>
							<a href="db-setting.html" class="">
								<img src="{{ asset('public/images/icon/dbl210.png') }}" alt="" />Setting</a>
						</li>
						<li>
							<a href="{{route('memberlogout')}}">
								<img src="{{ asset('public/images/icon/dbl12.png') }}" alt="" />Log Out</a>
						</li>
					</ul>
				</div>
			</div>