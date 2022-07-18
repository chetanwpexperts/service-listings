@extends("layouts.master")

@section("content")
	<div class="ad-dash-s1">
		<div class="cd-cen-intr-inn">
			<h2>Hi Welcome <b>Bizbook Directory Template {{ __('Dashboard') }}</b></h2>
			<p>Stay up to date reports in your listing, products, events and blog reports here</p>
		</div>
	</div>
	<!--            User Welcome Div ends -->
	<div class="ad-dash-s2">
		<ul>
			<li>
				<div>
					<img src="../images/icon/ic-1.png" alt="">
					<h2>248</h2>
					<h4>All Users</h4>
					<a href="admin-all-users.html" class="fclick"></a>
				</div>
			</li>
			<li>
				<div>
					<img src="../images/icon/shop.png" alt="">
					<h2>132</h2>
					<h4>All Listing</h4>
					<a href="admin-all-listings.html" class="fclick"></a>
				</div>
			</li>
			<li>
				<div>
					<img src="../images/icon/calendar.png" alt="">
					<h2>24</h2>
					<h4>All Events</h4>
					<a href="admin-event.html" class="fclick"></a>
				</div>
			</li>
			<li>
				<div>
					<img src="../images/icon/cart.png" alt="">
					<h2>24</h2>
					<h4>All Products</h4>
					<a href="admin-all-products.html" class="fclick"></a>
				</div>
			</li>
			<li>
				<div>
					<img src="../images/icon/blog1.png" alt="">
					<h2>39</h2>
					<h4>All Blog Posts</h4>
					<a href="admin-all-blogs.html" class="fclick"></a>
				</div>
			</li>
		</ul>
	</div>
	<div class="ad-dash-s4">
		<ul>
			<li>
				<div class="cor-1">
					<h4>New Users</h4>
					<h2>User requests</h2>
					<span>07</span>
					<p>This count for today how many get quote and enquiry you got it.</p>
					<a href="admin-new-user-requests.html" class="fclick"></a>
				</div>
			</li>
			<li>
				<div class="cor-2">
					<h4>Leads & Enquiry</h4>
					<h2>Get Quote</h2>
					<span>133</span>
					<p>This count for last month get quote and enquiry you got it.</p>
					<a href="admin-all-enquiry.html" class="fclick"></a>
				</div>
			</li>
			<li>
				<div class="cor-3">
					<h4>Enquiry</h4>
					<h2>Ad Request</h2>
					<span>33</span>
					<p>This count for total get quote and enquiry leads you got it till to end.</p>
					<a href="admin-ads-request.html" class="fclick"></a>
				</div>
			</li>
		</ul>
	</div>
	<div class="ad-dash-s3">
		<ul>
			<li>
				<div class="ad-cou">
					<div> <span>Premium Plus Users</span>
						<h4>23</h4>
					</div>
					<div>
						<img src="../images/icon/ic-9.png" alt="">
					</div>
					<a href="admin-premium-plus-users.html" class="fclick"></a>
				</div>
			</li>
			<li>
				<div class="ad-cou">
					<div> <span>Premium Users</span>
						<h4>04</h4>
					</div>
					<div>
						<img src="../images/icon/ic-8.png" alt="">
					</div>
					<a href="admin-premium-users.html" class="fclick"></a>
				</div>
			</li>
			<li>
				<div class="ad-cou">
					<div> <span>Standard Users</span>
						<h4>16</h4>
					</div>
					<div>
						<img src="../images/icon/ic-10.png" alt="">
					</div>
					<a href="admin-standard-users.html" class="fclick"></a>
				</div>
			</li>
			<li>
				<div class="ad-cou">
					<div> <span>Free Users</span>
						<h4>69</h4>
					</div>
					<div>
						<img src="../images/icon/ic-11.png" alt="">
					</div>
					<a href="admin-free-users.html" class="fclick"></a>
				</div>
			</li>
		</ul>
	</div>
	<div class="ad-dash-s3 ad-dash-s5">
		<ul>
			<li>
				<div class="ad-cou">
					<div>
						<img src="../images/icon/ic-14.png" alt="">
					</div>
					<div> <span>Category</span>
						<h4>13</h4>
					</div>
					<a href="admin-all-category.html" class="fclick"></a>
				</div>
			</li>
			<li>
				<div class="ad-cou">
					<div>
						<img src="../images/icon/ic-12.png" alt="">
					</div>
					<div> <span>Sub Category</span>
						<h4>45</h4>
					</div>
					<a href="admin-all-category.html" class="fclick"></a>
				</div>
			</li>
			<li>
				<div class="ad-cou">
					<div>
						<img src="../images/icon/ic-13.png" alt="">
					</div>
					<div> <span>Cities</span>
						<h4>48358</h4>
					</div>
					<a href="admin-all-city.html" class="fclick"></a>
				</div>
			</li>
			<li>
				<div class="ad-cou">
					<div>
						<img src="../images/icon/ic-15.png" alt="">
					</div>
					<div> <span>Notifications Send</span>
						<h4>12</h4>
					</div>
					<a href="admin-notification-all.html" class="fclick"></a>
				</div>
			</li>
		</ul>
	</div>
@endsection
