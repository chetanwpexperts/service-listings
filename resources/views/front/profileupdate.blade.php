@extends("layouts.webmaster")

@section("content")
	<?php 
	$mid = Session::get('mid');
	$name = Session::get('Name');
	$email = Session::get('email');
	$joining = Session::get('joining');
	$verified = (Session::get('verified') == 1) ? "Yes" : "No";
	?>
	<section class=" ud">
		<div class="ud-inn">
			<!--LEFT SECTION-->
			@include("partials.front.leftmenu")
			<!--CENTER SECTION-->
			<div class="ud-cen">
				<div class="log-bor">&nbsp;</div>	<span class="udb-inst">Edit User Profile</span>
				<div class="ud-cen-s2 ud-pro-edit">
					@if(session()->get('success'))
						<div class="alert alert-success">
							{{ session()->get('success') }}  
						</div><br />
					@endif
					<h2>Profile Details</h2>
					<form id="profile_update" name="profile_update" action="{{route('profileupdate', [$user->member_id])}}" method="post" enctype="multipart/form-data">
						@csrf
						<input type="hidden" value="62736rn53themes.png" autocomplete="off" name="profile_image_old" id="profile_image_old" required class="validate">
						<input type="hidden" value="5f4dcc3b5aa765d61d8327deb882cf99" autocomplete="off" name="password_old" id="password_old" required class="validate">
						<table class="responsive-table bordered">
							<tbody>
								<!--                                <tr>-->
								<!--                                    <td>-->
								<!--</td>-->
								<!--									<td>8 June 2025</td>-->
								<!--								</tr>-->
								<tr>
									<td>Name</td>
									<td>{{$user->name}}</td>
								</tr>
								<tr>
									<td>Email Id</td>
									<td>{{$user->email}}</td>
								</tr>
								<tr>
									<td>Mobile Number</td>
									<td>
										<div class="form-group">
											<input type="text" name="phone" class="form-control" value="{{$user->phone}}">
										</div>
									</td>
								</tr>
								<tr>
									<td>Profile Picture</td>
									<td>
										<div class="form-group">
											<input type="file" name="image" class="form-control">
										</div>
									</td>
								</tr>
								<tr>
									<td>Country</td>
									<td>
										<div class="form-group">
											<select name="country" class="form-control" id="country-dropdown">
												<option value="">Select</option>
												<?php 
												foreach($countries as $country)
												{
													?><option value="<?php echo $country->id;?>" <?php echo (!empty($userinfo) && $country->id == $userinfo->country) ? "selected":"";?>><?php echo $country->name;?></option><?php
												}
												?>
											</select>
										</div>
									</td>
								</tr>
								<tr>
									<td>State</td>
									<td>
										<div class="form-group">
											<select name="state" class="form-control" id="state-dropdown">
											<?php echo $stateOption;?>
											</select>
										</div>
									</td>
								</tr>
								<tr>
									<td>City</td>
									<td>
										<div class="form-group">
											<select name="city" class="form-control" id="city-dropdown">
											<?php echo $cityOption;?>
											</select>
										</div>
									</td>
								</tr>
								<tr>
									<td>Join date</td>
									<td>{{$joining->isoFormat('D, MMMM YYYY')}}</td>
								</tr>
								<tr>
									<td>Verified</td>
									<td>{{$verified}}</td>
								</tr>
								<tr>
									<td>Premium service provider</td>
									<td>Yes</td>
								</tr>
								<tr>
									<td>Facebook</td>
									<td>
										<div class="form-group">
											<input type="text" class="form-control" name="facebook_url" value="<?php if(!empty($userinfo)) $userinfo->facebook_url;?>">
										</div>
									</td>
								</tr>
								<tr>
									<td>Twitter</td>
									<td>
										<div class="form-group">
											<input type="text" class="form-control" name="twitter_url" value="<?php if(!empty($userinfo)) $userinfo->twitter_url;?>">
										</div>
									</td>
								</tr>
								
								<tr>
									<td>Website</td>
									<td>
										<div class="form-group">
											<input type="text" class="form-control" name="website" value="www.rn53themes.net">
										</div>
									</td>
								</tr>
								<tr>
									<td>
										<button type="submit" name="profile_update_submit" class="db-pro-bot-btn">Save Changes</button> <a href="db-payment" class="db-pro-bot-btn">Upgrade</a>
									</td>
									<td></td>
								</tr>
							</tbody>
						</table>
					</form>
				</div>
			</div>
			<!--RIGHT SECTION-->
			<div class="ud-rhs">
				<div class="ud-rhs-promo">
					<h3>Promote my business</h3>
					<p>Your listing show on the top of the respective category page</p> <a href="promote-business.html">Start now</a>
				</div>
				<!--    //Total Point Section Starts-->
				<div class="ud-rhs-poin">
					<div class="ud-rhs-poin1">
						<h4>Your points</h4>
						<span class="count1">60</span>
					</div>
					<div class="ud-rhs-poin2">
						<h3>Earn more credit points</h3>
						<p>Use this poins to promote your listing. <a href="#">Click here</a> for demo</p> <a href="buy-points.html" class="cta">Buy Points</a>
					</div>
				</div>
				<!--    //Total Point Section Ends-->
				<div class="ud-rhs-pay">
					<div class="ud-rhs-pay-inn">
						<h3>Payment Information</h3>
						<ul>
							<li><b>Plan name : </b> Premium Plus</li>
							<li><b>Start date : </b> 26, Mar 2021</li>
							<li><b>Expiry date : </b> 26, Mar 2031</li>
							<li><b>Duration : </b> 10 year</li>
							<li><b>Remaining Days: </b> 3638</li>
							<li><span class="ud-stat-pay-btn"><b>Checkout cost:</b> $20</span>
							</li>
							<li><span class="ud-stat-pay-btn"><b>Payment Status:</b> PENDING</span>
							</li>
						</ul> <a href="db-payment" class="btn btn2">Pay Now</a>
					</div>
				</div>
				<div class="ud-rhs-pay ud-rhs-status">
					<div class="ud-rhs-pay-inn">
						<h3>Listing open & close status</h3>
						<ul>
							<!--                <li>-->
							<!--                    <span>Premium gardens</span>-->
							<!--                    <div class="custom-control custom-switch">-->
							<!--                        <input type="checkbox" class="listing_open_close_switch custom-control-input" id="switch1" checked>-->
							<!--                        <label class="custom-control-label" for="switch1">&nbsp;</label>-->
							<!--                    </div>-->
							<!--                </li>-->
							<li> <span>test</span>
								<div class="custom-control custom-switch">
									<input type="checkbox" class="listing_open_close_switch custom-control-input" id="395" checked>
									<label class="custom-control-label" for="395" data-toggle="tooltip" title="Click here to update your listing status, Open or Closed.">&nbsp;</label>
								</div>
							</li>
							<li> <span>dfzhfhd</span>
								<div class="custom-control custom-switch">
									<input type="checkbox" class="listing_open_close_switch custom-control-input" id="394" checked>
									<label class="custom-control-label" for="394" data-toggle="tooltip" title="Click here to update your listing status, Open or Closed.">&nbsp;</label>
								</div>
							</li>
							<li> <span>Iei</span>
								<div class="custom-control custom-switch">
									<input type="checkbox" class="listing_open_close_switch custom-control-input" id="393">
									<label class="custom-control-label" for="393" data-toggle="tooltip" title="Click here to update your listing status, Open or Closed.">&nbsp;</label>
								</div>
							</li>
							<li> <span>phoenix mall</span>
								<div class="custom-control custom-switch">
									<input type="checkbox" class="listing_open_close_switch custom-control-input" id="392" checked>
									<label class="custom-control-label" for="392" data-toggle="tooltip" title="Click here to update your listing status, Open or Closed.">&nbsp;</label>
								</div>
							</li>
							<li> <span>Ocha Thai Cuisine</span>
								<div class="custom-control custom-switch">
									<input type="checkbox" class="listing_open_close_switch custom-control-input" id="391" checked>
									<label class="custom-control-label" for="391" data-toggle="tooltip" title="Click here to update your listing status, Open or Closed.">&nbsp;</label>
								</div>
							</li>
							<li> <span>Core real estates</span>
								<div class="custom-control custom-switch">
									<input type="checkbox" class="listing_open_close_switch custom-control-input" id="389">
									<label class="custom-control-label" for="389" data-toggle="tooltip" title="Click here to update your listing status, Open or Closed.">&nbsp;</label>
								</div>
							</li>
							<li> <span>Gill Automobiles and Services</span>
								<div class="custom-control custom-switch">
									<input type="checkbox" class="listing_open_close_switch custom-control-input" id="384" checked>
									<label class="custom-control-label" for="384" data-toggle="tooltip" title="Click here to update your listing status, Open or Closed.">&nbsp;</label>
								</div>
							</li>
							<li> <span>Titan Wedding Hall</span>
								<div class="custom-control custom-switch">
									<input type="checkbox" class="listing_open_close_switch custom-control-input" id="381" checked>
									<label class="custom-control-label" for="381" data-toggle="tooltip" title="Click here to update your listing status, Open or Closed.">&nbsp;</label>
								</div>
							</li>
							<li> <span>Taj Hotels</span>
								<div class="custom-control custom-switch">
									<input type="checkbox" class="listing_open_close_switch custom-control-input" id="380" checked>
									<label class="custom-control-label" for="380" data-toggle="tooltip" title="Click here to update your listing status, Open or Closed.">&nbsp;</label>
								</div>
							</li>
							<li> <span>ccc</span>
								<div class="custom-control custom-switch">
									<input type="checkbox" class="listing_open_close_switch custom-control-input" id="378" checked>
									<label class="custom-control-label" for="378" data-toggle="tooltip" title="Click here to update your listing status, Open or Closed.">&nbsp;</label>
								</div>
							</li>
							<li> <span>Hello</span>
								<div class="custom-control custom-switch">
									<input type="checkbox" class="listing_open_close_switch custom-control-input" id="375" checked>
									<label class="custom-control-label" for="375" data-toggle="tooltip" title="Click here to update your listing status, Open or Closed.">&nbsp;</label>
								</div>
							</li>
							<li> <span>Premium gardens</span>
								<div class="custom-control custom-switch">
									<input type="checkbox" class="listing_open_close_switch custom-control-input" id="268" checked>
									<label class="custom-control-label" for="268" data-toggle="tooltip" title="Click here to update your listing status, Open or Closed.">&nbsp;</label>
								</div>
							</li>
							<li> <span>Beach luxury villa gardens</span>
								<div class="custom-control custom-switch">
									<input type="checkbox" class="listing_open_close_switch custom-control-input" id="267">
									<label class="custom-control-label" for="267" data-toggle="tooltip" title="Click here to update your listing status, Open or Closed.">&nbsp;</label>
								</div>
							</li>
							<li> <span>GOS Villas</span>
								<div class="custom-control custom-switch">
									<input type="checkbox" class="listing_open_close_switch custom-control-input" id="266">
									<label class="custom-control-label" for="266" data-toggle="tooltip" title="Click here to update your listing status, Open or Closed.">&nbsp;</label>
								</div>
							</li>
							<li> <span>Super bike showroom</span>
								<div class="custom-control custom-switch">
									<input type="checkbox" class="listing_open_close_switch custom-control-input" id="247">
									<label class="custom-control-label" for="247" data-toggle="tooltip" title="Click here to update your listing status, Open or Closed.">&nbsp;</label>
								</div>
							</li>
							<li> <span>Benz cars showroom</span>
								<div class="custom-control custom-switch">
									<input type="checkbox" class="listing_open_close_switch custom-control-input" id="238">
									<label class="custom-control-label" for="238" data-toggle="tooltip" title="Click here to update your listing status, Open or Closed.">&nbsp;</label>
								</div>
							</li>
							<li> <span>Smith Luxury Villas</span>
								<div class="custom-control custom-switch">
									<input type="checkbox" class="listing_open_close_switch custom-control-input" id="207">
									<label class="custom-control-label" for="207" data-toggle="tooltip" title="Click here to update your listing status, Open or Closed.">&nbsp;</label>
								</div>
							</li>
							<li> <span>Ø§Ø¨Ù†Ù‰ Ù…ÙˆÙ‚Ø¹Ùƒ Ù…Ø¹Ù†Ø§</span>
								<div class="custom-control custom-switch">
									<input type="checkbox" class="listing_open_close_switch custom-control-input" id="164" checked>
									<label class="custom-control-label" for="164" data-toggle="tooltip" title="Click here to update your listing status, Open or Closed.">&nbsp;</label>
								</div>
							</li>
							<li> <span>BizBookBusiness Directory Template</span>
								<div class="custom-control custom-switch">
									<input type="checkbox" class="listing_open_close_switch custom-control-input" id="163" checked>
									<label class="custom-control-label" for="163" data-toggle="tooltip" title="Click here to update your listing status, Open or Closed.">&nbsp;</label>
								</div>
							</li>
							<li> <span>Tour and Travel html Template</span>
								<div class="custom-control custom-switch">
									<input type="checkbox" class="listing_open_close_switch custom-control-input" id="130" checked>
									<label class="custom-control-label" for="130" data-toggle="tooltip" title="Click here to update your listing status, Open or Closed.">&nbsp;</label>
								</div>
							</li>
							<li> <span>Smart Digital Products</span>
								<div class="custom-control custom-switch">
									<input type="checkbox" class="listing_open_close_switch custom-control-input" id="129" checked>
									<label class="custom-control-label" for="129" data-toggle="tooltip" title="Click here to update your listing status, Open or Closed.">&nbsp;</label>
								</div>
							</li>
						</ul>
					</div>
				</div>
				<div class="ud-rhs-pay ud-rhs-repo">
					<div class="ud-rhs-pay-inn">
						<h3>Last week report</h3>
						<ul>
							<li> <span class="view">Enquiry</span>
								<span class="cout">00</span>
								<span class="name">Leads</span>
							</li>
							<li> <span class="view">Views</span>
								<span class="cout">02</span>
								<span class="name">Listings</span>
							</li>
							<li> <span class="view">Views</span>
								<span class="cout">01</span>
								<span class="name">Events</span>
							</li>
							<li> <span class="view">Views</span>
								<span class="cout">01</span>
								<span class="name">Blogs</span>
							</li>
							<li> <span class="view">Views</span>
								<span class="cout">00</span>
								<span class="name">Products</span>
							</li>
							<li> <span class="cout">00</span>
								<span class="name">Messages</span>
							</li>
						</ul>
					</div>
				</div>
				<!--    <div class="ud-rhs-sec-2">-->
				<!--        <h4>-->
				<!--</h4>-->
				<!--        <ul>-->
				<!--            -->
				<!--            <li>-->
				<!--                <a href="-->
				<!--">-->
				<!--                    <img src="images/user/-->
				<!--" alt="">-->
				<!--                    <h5>-->
				<!--</h5>-->
				<!--                    <p>-->
				<!--: <b>-->
				<!--</b> -->
				<!--: <b> -->
				<!--</b></p>-->
				<!--                </a>-->
				<!--            </li>-->
				<!--                -->
				<!--        </ul>-->
				<!--    </div>-->
				<div class="ud-rhs-sec-1">
					<h4>Admin Notification</h4>
					<ul>
						<li>
							<a target="_blank" href="xxxxxxxxxxxxxxxxxx">
								<h5>test</h5>
								<p>test</p>
							</a>
						</li>
						<li>
							<a target="_blank" href="demoo">
								<h5>demo2</h5>
								<p>demo2222</p>
							</a>
						</li>
						<li>
							<a target="_blank" href="demo">
								<h5>demo</h5>
								<p>demo notification</p>
							</a>
						</li>
						<li>
							<a target="_blank" href="https://www.location-voitures-maurice.com/">
								<h5>https://www.location-voitures-maurice.com/</h5>
								<p>https://www.location-voitures-maurice.com/</p>
							</a>
						</li>
						<li>
							<a target="_blank" href="prueba">
								<h5>preuba</h5>
								<p>prieba</p>
							</a>
						</li>
						<li>
							<a target="_blank" href="https://directoryfinder.net/demo/business-directory-template/listing-details?code=LIST211">
								<h5>Homey massage offer 50%</h5>
								<p>Special offer for this month only</p>
							</a>
						</li>
						<li>
							<a target="_blank" href="https://youtu.be/O8EeSKUgyj8">
								<h5>How lead tracking works?</h5>
								<p>Lead and url tracking work process</p>
							</a>
						</li>
						<li>
							<a target="_blank" href="http://www.fltdsgn.com/">
								<h5>Other url redirect</h5>
								<p>Other url redirect test by directory finder</p>
							</a>
						</li>
						<li>
							<a target="_blank" href="https://directoryfinder.net/how-to-install-this-on-local-server-tutorial-videos.html">
								<h5>How to install directoryfinder template?</h5>
								<p>How to install directoryfinder template in local server</p>
							</a>
						</li>
						<li>
							<a target="_blank" href="http://directoryfinder.net/demo/business-directory-template/event-details?row=10">
								<h5>How to add new listing?</h5>
								<p>Just few clicks to add your new listing</p>
							</a>
						</li>
						<li>
							<a target="_blank" href="https://youtu.be/93_4_0Dyys8">
								<h5>Best Business Directory Template</h5>
								<p>Get the premium business directory templates with the best quality</p>
							</a>
						</li>
						<li>
							<a target="_blank" href="www.google.com1">
								<h5>1test noti title1</h5>
								<p>Tour Travel | Tour Travel Package Template</p>
							</a>
						</li>
					</ul>
				</div>
				<div class="ud-rhs-promo ud-rhs-promo-1">
					<h3>Community members</h3>
					<p>Follow your favirote business users and grove your online business now.</p> <a href="community">Community</a>
				</div>
				<div class="ud-rhs-sec-3">
					<div class="list-mig-like">
						<div class="list-ri-peo-like">
							<h3>Who all are follow you</h3>
							<ul>
								<li>
									<a href="profile/rachel" target="_blank">
										<img src="images/user/63520pexels-photo-1130626.jpeg" alt="">
									</a>
								</li>
								<li>
									<a href="profile/betty-d-friedman" target="_blank">
										<img src="images/user/8766pexels-photo-774909.jpeg" alt="">
									</a>
								</li>
								<li>
									<a href="profile/claude-d-dial" target="_blank">
										<img src="images/user/33654pexels-photo-91227.jpeg" alt="">
									</a>
								</li>
								<li>
									<a href="profile/kumar" target="_blank">
										<img src="images/user/4913411004989_334444876752279_544839968_n.jpg" alt="">
									</a>
								</li>
								<li>
									<a href="profile/deneme" target="_blank">
										<img src="images/user/475847.jpg" alt="">
									</a>
								</li>
								<li>
									<a href="profile/clic" target="_blank">
										<img src="images/user/475847.jpg" alt="">
									</a>
								</li>
								<li>
									<a href="profile/nawaf-alayli" target="_blank">
										<img src="images/user/475847.jpg" alt="">
									</a>
								</li>
								<!--                    <li>-->
								<!--                        <a href="profile" target="_blank">-->
								<!--                            <img src="images/user/2.jpg" alt="">-->
								<!--                        </a>-->
								<!--                    </li>-->
								<!--                    <li>-->
								<!--                        <a href="profile" target="_blank">-->
								<!--                            <img src="images/user/3.jpg" alt="">-->
								<!--                        </a>-->
								<!--                    </li>-->
								<!--                    <li>-->
								<!--                        <a href="profile" target="_blank">-->
								<!--                            <img src="images/user/4.jpg" alt="">-->
								<!--                        </a>-->
								<!--                    </li>-->
								<!--                    <li>-->
								<!--                        <a href="profile" target="_blank">-->
								<!--                            <img src="images/user/5.jpg" alt="">-->
								<!--                        </a>-->
								<!--                    </li>-->
								<!--                    <li>-->
								<!--                        <a href="profile" target="_blank">-->
								<!--                            <img src="images/user/6.jpg" alt="">-->
								<!--                        </a>-->
								<!--                    </li>-->
								<!--                    <li>-->
								<!--                        <a href="profile" target="_blank">-->
								<!--                            <img src="images/user/7.jpg" alt="">-->
								<!--                        </a>-->
								<!--                    </li>-->
								<!--                    <li>-->
								<!--                        <a href="profile" target="_blank">-->
								<!--                            <img src="images/user/8.jpg" alt="">-->
								<!--                        </a>-->
								<!--                    </li>-->
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	
	<!--END-->
	<!-- START -->
	@include("partials.front.help")
@endsection

@section('scripts')
<script>
$(document).ready(function() 
{
	$.ajaxSetup({
		headers: {
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		}
	});
	
	$('#country-dropdown').on('change', function() 
	{
		var country_id = this.value;
		$.ajax({
			url: "{{route('getstates')}}",
			type: "POST",
			data: {
				country_id: country_id
			},
			cache: false,
			success: function(result){
				$("#state-dropdown").html(result);
				$('#city-dropdown').html('<option value="">Select State First</option>'); 
			}
		});
	});    
	$('#state-dropdown').on('change', function() 
	{
		var state_id = this.value;
		$.ajax({
			url: "{{route('getcities')}}",
			type: "POST",
			data: {
				state_id: state_id
			},
			cache: false,
			success: function(result)
			{
				$("#city-dropdown").html(result);
			}
		});
	});
});
</script>
@stop