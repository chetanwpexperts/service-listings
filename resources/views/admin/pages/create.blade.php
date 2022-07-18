@extends("layouts.master")

@section("content")
	<div class="ud-cen">	
		@if ($errors->any())
			<div class="alert alert-danger">
				<ul>
					@foreach ($errors->all() as $error)
						<li>{{ $error }}</li>
					@endforeach
				</ul>
			</div>
		@endif
		<form name="seo_general_form" id="seo_general_form" method="post" action="{{route('pages.store')}}" enctype="multipart/form-data" class="cre-dup-form cre-dup-form-show">
			@csrf
			<input type="hidden" name="page_id" value="{{$page_id}}" />
			<div class="pg-cen">
				<div class="s-com pg-tit">
					<h1>Page Route Name</h1>
					<div class="form-group">
						<input type="text" name="route_name" class="form-control" placeholder="Enter Route Name">
					</div>
				</div>
				<div class="s-com pg-tit">
					<h1>Add new page</h1>
					<div class="form-group">
						<input type="text" name="title" class="form-control" placeholder="Enter Page Name">
					</div>
				</div>
				<div class="s-com pg-edita">
					<div class="form-group">
						<textarea class="form-control" id="page_description" name="description" placeholder="Details about your listing"></textarea>
					</div>
				</div>
				<div class="s-com">
					<h6>Banner image:</h6>
					<div class="form-group">
						<input type="file" name="image" class="form-control" placeholder="Download link">
					</div>
				</div>
				<div class="s-com pg-cen-tab pg-seo">
					<h4>SEO settings</h4>
					<div class="inn">
						<div class="form-group">
							<label>Page title</label>
							<input type="text" name="meta_title" class="form-control">
						</div>
						<div class="form-group">
							<label>Page keywords</label>
							<input type="text" name="keywords" class="form-control">
						</div>
						<div class="form-group">
							<label>Page descriptions</label>
							<input type="text" name="meta_description" class="form-control">
						</div>
					</div>
				</div>
				<div class="s-com pg-cen-tab pg-adv-seo">
					<h4>Advance SEO settings</h4>
					<div class="inn">
						<div class="form-group">
							<label>Google schema</label>
							<textarea name="g_schema" class="form-control"></textarea>
						</div>
					</div>
				</div>
			</div>
			<div class="pg-rhs">
				<div class="box pub">
					<h3>Publish</h3>
					<div class="inn">
						<ul>
							<li>
								<label>Status</label>
								<div class="form-group">
									<select name="status">
										<option value="1">Publish</option>
										<option value="3">Draft</option>
									</select>
								</div>
							</li>
							<li>
								<label>Visibility</label>
								<div class="form-group">
									<select name="page_visibility">
										<option value="public">Public</option>
										<option value="private">Private</option>
									</select>
								</div>
							</li>
							<!--                                <li>-->
							<!--                                    <button class="btn-pub">Publish</button>-->
							<!--                                </li>-->
							<li>
								<button name="general_submit" type="submit" class="btn-pub btn-pub">Save changes</button>
							</li>
						</ul>
					</div>
				</div>
				
				<div class="box pub">
					<h3>Page setting</h3>
					<div class="inn">
						<ul>
							<li>
								<label>Show Listing</label>
								<div class="form-group">
									<select name="page_settings[show_listing]" id="showlisting">
										<option value="">Select</option>
										<option value="1">Yes</option>
										<option value="0">No</option>
									</select>
								</div>
							</li>
							<li>
								<label>Show Products</label>
								<div class="form-group">
									<select name="page_settings[show_products]" id="showproducts">
										<option value="">Select</option>
										<option value="1">Yes</option>
										<option value="0">No</option>
									</select>
								</div>
							</li>
							<li>
								<label>Show Blogs</label>
								<div class="form-group">
									<select name="page_settings[show_blogs]" id="showblogs">
										<option value="">Select</option>
										<option value="1">Yes</option>
										<option value="0">No</option>
									</select>
								</div>
							</li>
							<li>
								<label>Enquiry form</label>
								<div class="form-group">
									<select name="page_settings[show_enquiry_form]" id="showenquiry">
										<option value="">Select</option>
										<option value="1">Yes</option>
										<option value="0">No</option>
									</select>
								</div>
							</li>
						</ul>
					</div>
				</div>	
				<!--- LISTINGS --->
				<div class="box pub" id="listing" style="display:none;">
					<h3>Listings</h3>
					<div class="inn">
						<div class="form-group">
							<select placeholder="Choose Listings" name="listing_id[]" id="page-new-list-add" multiple class="chosen-select form-control">
								<option value="396">qwerqw</option>
								<option value="395">test</option>
								<option value="394">dfzhfhd</option>
								<option value="393">Iei</option>
								<option value="392">phoenix mall</option>
								<option value="391">Ocha Thai Cuisine</option>
								<option value="389">Core real estates</option>
								<option value="388">Museo Villas and Plots</option>
								<option value="387">Musi Wedding and Party Hall</option>
								<option value="385">Rolexo Villas in California</option>
								<option value="384">Gill Automobiles and Services</option>
								<option value="381">Titan Wedding Hall</option>
								<option value="380">Taj Hotels</option>
								<option value="378">ccc</option>
								<option value="377">aknfkl</option>
								<option value="376">Test</option>
								<option value="375">Hello</option>
								<option value="354">TESTBAG</option>
								<option value="352">Rental App</option>
								<option value="351">Nnbgg</option>
								<option value="350">Demo List Test</option>
								<option value="349">HHHAHAA</option>
								<option value="348">Hari krishna entrepreneur</option>
								<option value="347">ddd</option>
								<option value="346">Garhwal Media India Pvt. Ltd.</option>
								<option value="345">Listing</option>
								<option value="344">car with flowrs</option>
								<option value="337">testing New listing</option>
								<option value="336">ATLETA</option>
								<option value="334">Cinderela</option>
								<option value="332">Pedro</option>
								<option value="331">Hello</option>
								<option value="328">test3</option>
								<option value="326">SdF</option>
								<option value="325">sAEDF</option>
								<option value="324">saadsds</option>
								<option value="323">saadsds</option>
								<option value="322">n mnm</option>
								<option value="321"></option>
								<option value="320">sdss</option>
								<option value="319">Chachawan</option>
								<option value="318">Ganniti</option>
								<option value="317">Plumbing Work</option>
								<option value="316">SpryOX</option>
								<option value="315">Restaurante las peñas</option>
								<option value="314"></option>
								<option value="313">gghhjghj</option>
								<option value="312">dsadlasf</option>
								<option value="310">Love it</option>
								<option value="306">International Food Bazaar</option>
								<option value="303"></option>
								<option value="302">asf</option>
								<option value="301">xxxx</option>
								<option value="300">testa pro</option>
								<option value="299">ddd</option>
								<option value="298">sddssd</option>
								<option value="297">sddssd</option>
								<option value="296">GOOD FOOD</option>
								<option value="295">GOOD</option>
								<option value="294">vbhjc</option>
								<option value="293">sdfdsgf</option>
								<option value="292">test</option>
								<option value="288"></option>
								<option value="287">asfja</option>
								<option value="286">sdfsdgdfsgsdf</option>
								<option value="282">Bharat cs coaching center</option>
								<option value="278">web services company</option>
								<option value="275">newsd</option>
								<option value="270">qEAES</option>
								<option value="268">Premium gardens</option>
								<option value="267">Beach luxury villa gardens</option>
								<option value="266">GOS Villas</option>
								<option value="265">Test4343</option>
								<option value="264">a</option>
								<option value="263">Dalkom</option>
								<option value="262">rdgt</option>
								<option value="259">Yours Firm Ltd</option>
								<option value="257">Hanging with mr. cooper</option>
								<option value="256">deepak</option>
								<option value="255">deepak</option>
								<option value="254">deepak</option>
								<option value="253">fghdfgfdg</option>
								<option value="252">dndndn</option>
								<option value="251">vxcvxcvxcvx</option>
								<option value="250">ML TEST</option>
								<option value="249">kjhgf</option>
								<option value="247">Super bike showroom</option>
								<option value="245">Ronaldparmar</option>
								<option value="241">Lemo Taxi</option>
								<option value="238">Benz cars showroom</option>
								<option value="236">mmmm</option>
								<option value="233">Online Casino</option>
								<option value="232">Deneme</option>
								<option value="221">hhh</option>
								<option value="216">Sony Musics 2</option>
								<option value="215">Sony Music</option>
								<option value="214">1</option>
								<option value="211">Honey Massage Center</option>
								<option value="209">jj</option>
								<option value="207">Smith Luxury Villas</option>
								<option value="179">Colors Real Estate and Villas</option>
								<option value="178">A List</option>
								<option value="172">Asian Real Estate</option>
								<option value="171">Modern SPA for Men</option>
								<option value="168">The Spa at Mandarin Oriental</option>
								<option value="164">Ø§Ø¨Ù†Ù‰ Ù…ÙˆÙ‚Ø¹Ùƒ Ù…Ø¹Ù†Ø§</option>
								<option value="163">BizBookBusiness Directory Template</option>
								<option value="162">asjdklfasd</option>
								<option value="161">IPM Business Software</option>
								<option value="160">Wedding Venues viki</option>
								<option value="159">forms soft tech</option>
								<option value="158">Forms hospitals</option>
								<option value="154">Royal Real Estates</option>
								<option value="149">William Chil care Hospital</option>
								<option value="148">Urban Community Hospital</option>
								<option value="147">Joseph Multispeciality Hospital</option>
								<option value="144">Apolloo Hospitals UAE</option>
								<option value="143">Appers Premium Independent Houses</option>
								<option value="142">Capital five star hotels</option>
								<option value="141">Hard Rocks Hotels</option>
								<option value="140">Taaj Five Star Hotels</option>
								<option value="138">Dial Sports Shops</option>
								<option value="137">Andree Education and Tuition Center</option>
								<option value="136">TATE Electrical Shops</option>
								<option value="135">Center Automobiles</option>
								<option value="134">Lemoo Cap Services</option>
								<option value="133">Green Healthcare Hospital</option>
								<option value="132">Rachel Taj Hotels</option>
								<option value="131">coffee shop</option>
								<option value="130">Tour and Travel html Template</option>
								<option value="129">Smart Digital Products</option>
								<option value="128">The Royal Spa Center for Women</option>
							</select>
						</div>
					</div>
				</div>
				<!--- END PRODUCTS --->
				<!--- PRODUCTS --->
				<div class="box pub" id="products" style="display:none;">
					<h3>Products</h3>
					<div class="inn">
						<div class="form-group">
							<select placeholder="Choose Products" name="product_ids[]" id="page-new-pro-add" multiple class="chosen-select form-control">
								<option value="36">Audi q3</option>
								<option value="34">WHIRLPOOL FRIDGE</option>
								<option value="33">DELL</option>
								<option value="32">samsung m31</option>
								<option value="31">LG AC</option>
								<option value="30">lenova yoga 510</option>
								<option value="29">mango cacke</option>
								<option value="25">fdsfsd</option>
								<option value="24">LÃ©gume</option>
								<option value="23">pendrive</option>
								<option value="22">zapatos</option>
								<option value="20">Laptop XS</option>
								<option value="18">Engineered Shelving Unit</option>
								<option value="15">ND</option>
								<option value="14">Fastrack Reflex 2.0 - Smart Watches</option>
								<option value="13">Professional DSLR Battery Grip Holder Kit</option>
								<option value="12">8 x 4 Metal Trailer - Exc Tyres</option>
								<option value="10">Tour and Travel Booking html Template</option>
								<option value="9">Yake vegitables shops - online orders</option>
								<option value="8">Weight loss digital products</option>
								<option value="7">Rock Crawler RC Monster Truck</option>
								<option value="6">REVOLUTION 5 Running Shoe For Men (Red)</option>
								<option value="5">Nikon D5600 DSLR Camera Body</option>
								<option value="4">VU Pixelight Ultra UHD TV</option>
							</select>
						</div>
					</div>
				</div>
				<!--- END PRODUCTS --->
				
				<!--- BLOG POST --->
				<div class="box pub" id="blogs" style="display:none;">
					<h3>Blog posts</h3>
					<div class="inn">
						<div class="form-group">
							<select placeholder="Choose Blogs" name="blog_ids[]" id="page-new-blog-add" multiple class="chosen-select form-control">
								<option value="52">INCEPTION</option>
								<option value="50">The great wall</option>
								<option value="49">AVENGERS INFINTY WAR</option>
								<option value="46">Party time to beach ?</option>
								<option value="45">AVENGERS END GAME</option>
								<option value="43">captainamerica the civil war</option>
								<option value="42">Samsung M31 Review</option>
								<option value="41">wizard of oz</option>
								<option value="40">wizard of oz</option>
								<option value="39">Titanic</option>
								<option value="38">HHHH</option>
								<option value="37">nader</option>
								<option value="36">Pepillo</option>
								<option value="34">Digital Marketing</option>
								<option value="32">dfgdsfdsfds</option>
								<option value="31">Liberman</option>
								<option value="30">Laravel</option>
								<option value="29">emo</option>
								<option value="28">Test</option>
								<option value="27">IPM Business Software Upgrade</option>
								<option value="26">New blog</option>
								<option value="24">Nature is a nature</option>
								<option value="22">Hair care treatment</option>
								<option value="20">Tower hotel grand opening</option>
								<option value="19">Google my business update features</option>
								<option value="17">12 Days Fitness Chanllege</option>
								<option value="16">Bike Racing Techniques</option>
								<option value="15">Best Island In The World</option>
								<option value="14">Online Marketing 2020</option>
								<option value="13">Home Interior Design Trends</option>
								<option value="12">Christmas Fun Games</option>
								<option value="11">Online courses free with certificate</option>
								<option value="10">Online courses for Dot Net Trainees</option>
								<option value="9">Tips for Increase Car Mileage?</option>
								<option value="8">How to service a Car?</option>
								<option value="7">10 Healthy Foods for Kids</option>
								<option value="6">7 Healthy Tips</option>
								<option value="5">Bike Sale 50% Offer</option>
								<option value="4">Source and URL tracking</option>
							</select>
						</div>
					</div>
				</div>
				<!--- END BLOG POST --->
			</div>
		</form>
	</div>
@endsection

@section('scripts')

    <script>
	jQuery( document ).ready( function( $ ) {
		$( "#showlisting" ).on( "change", function() {
			if( $( this ).val() == 1)
			{
				$("#listing").show();
				$("#page_new_list_add_chosen").css({"width": "100%"});
			}else{
				$("#listing").hide();
			}
		});
		
		$( "#showproducts" ).on( "change", function() {
			if( $( this ).val() == 1)
			{
				$("#products").show();
				$("#page_new_pro_add_chosen").css({"width": "100%"});
			}else{
				$("#products").hide();
			}
		});
		
		$( "#showblogs" ).on( "change", function() {
			if( $( this ).val() == 1)
			{
				$("#blogs").show();
				$("#page_new_blog_add_chosen").css({"width": "100%"});
			}else{
				$("#blogs").hide();
			}
		});
		
	});
	
	CKEDITOR.replace('page_description');
	</script>

@stop