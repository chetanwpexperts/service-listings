	<section>
		<div class="ad-head">
			<div class="head-s1">
				<div class="menu"> <i class="material-icons mopen">menu</i>
					<i class="material-icons mclose">close</i>
				</div>
				<div class="logo">
					@php 
					$logo = asset('public/images/logo-b.png');
					if(!empty($websettings) && $websettings['logo'] != "")
					{
						$logo = asset('public/public/admin/settings/'.$websettings['logo']);
					}
					@endphp
					<img src="{{ $logo }}">
				</div>
			</div>
			<div class="head-s2">
				<div class="head-sear">
					<input type="text" id="top_search" placeholder="Search the listing and users..." class="search-field">
					<ul id="tser-res" class="tser-res">
						<li><a href="{{route('users')}}">Add new user</a>
						</li>
						<li><a href="{{route('listingcreate')}}">Add new listing</a>
						</li>
						</li>
						<li><a href="{{route('dashboard')}}">Dashboard</a>
						</li>
						<li><a href="profile.html">Profile page</a>
						</li>
						<li><a href="{{route('users')}}">All users</a>
						</li>
						<li><a href="{{route('user.create')}}">New user requests</a>
						</li>
						</li>
						<li><a href="{{route('plans')}}">Pricing plan</a>
						</li>
						<li><a href="{{route('listings')}}">All listings</a>
						</li>
						<li><a href="{{route('listingcategories')}}">All listing category</a>
						</li>
						<li><a href="{{route('categories.create')}}">Add new listing category</a>
						</li>
						<li><a href="{{route('listingsubcategories')}}">Listing sub categorys</a>
						</li>
						<li><a href="{{route('subcategories.create')}}">Add new listing sub category</a>
						</li>
						<li><a href="{{route('admin.settings')}}">Admin setting</a>
						</li>
					</ul>
				</div>
			</div>
			<div class="head-s3">
				<div class="head-pro">
					@php 
					$adminlogo = asset('public/images/user/3.jpg');
					if(!empty($websettings) && $websettings['logo'] != "")
					{
						$adminlogo = asset('public/public/admin/settings/'.$websettings['logo']);
					}
					@endphp
					<img src="{{ $adminlogo }}" alt=""> <b>Profile by</b>
					<br>
					<h4>Bizbook Directory Template</h4>
					<a href="{{route('admin.settings')}}" class="fclick"></a>
				</div>
			</div>
		</div>
	</section>