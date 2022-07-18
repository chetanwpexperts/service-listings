@extends("layouts.webmaster")

@section("content")

<section class=" login-reg edit-comp-pro">
		<div class="container">
			<div class="row">
				<div class="login-main add-list">
					<div class="log-bor">&nbsp;</div> <span class="steps">Company profile</span>
					<div class="log">
						<div class="login add-list-off comp-pro-edit">
							<h4>Edit company profile</h4>
							<form action="{{route('storecompanyprofile')}}" class="company_profile_form" id="company_profile_form" name="company_profile_form" method="post" enctype="multipart/form-data">
                                @csrf
								<input type="hidden" id="company_profile_photo_old" value="39791rn53-themes.png" name="company_profile_photo_old" class="validate">
								<input type="hidden" id="company_banner_photo_old" value="43550pexels-francesco-ungaro-409127.jpg" name="company_banner_photo_old" class="validate">
								<input type="hidden" id="company_header_photo_old" value="96677rn53themes.png" name="company_header_photo_old" class="validate">
								<ul>
									<li>
										<!--FILED START-->
										<div class="row">
											<div class="col-md-12">
												<h6>Company info</h6>
												<div class="form-group">
													<input type="text" name="name" id="company_name" value="Rn53 Themes net" required="required" class="form-control" placeholder="Commpany name">
												</div>
											</div>
										</div>
										<!--FILED END-->
										<!--FILED START-->
										<div class="row">
											<div class="col-md-12">
												<div class="form-group">
													<input type="text" name="address" value="Address: 28800 Orchard Lake Road, Suite 180 Farmington Hills, U.S.A" id="company_address" required="required" class="form-control" placeholder="Address">
												</div>
											</div>
										</div>
										<!--FILED END-->
										<!--FILED START-->
										<div class="row">
											<div class="col-md-6">
												<div class="form-group">
													<input type="text" name="phone" id="company_mobile" value="8765768675" required="required" class="form-control" placeholder="Phone">
												</div>
											</div>
											<div class="col-md-6">
												<div class="form-group">
													<input type="text" name="email" id="company_email_id" value="rn53themes@gmail.com" required="required" class="form-control" placeholder="Email id">
												</div>
											</div>
										</div>
										<!--FILED END-->
										<!--FILED START-->
										<div class="row">
											<div class="col-md-6">
												<div class="form-group">
													<input type="text" name="website" id="company_website" value="www.rn53themes.net" class="form-control" placeholder="Website">
												</div>
											</div>
										</div>
										<!--FILED END-->
										<!--FILED START-->
										<h6>Tax Details:</h6>
										<div class="row">
											<div class="col-md-12">
												<div class="form-group">
													<input type="text" name="taxno" id="company_tax" value="TX6543 HYG76" class="form-control" placeholder="Tax No./ GST No.">
												</div>
											</div>
										</div>
										<!--FILED END-->
										<!--FILED START-->
										<h6>Social media:</h6>
										<div class="row">
											<div class="col-md-6">
												<div class="form-group">
													<input type="text" name="social_accounts[facebook]" id="company_facebook" value="https://www.facebook.com/53themes" class="form-control" placeholder="Facebook profile">
												</div>
											</div>
											<div class="col-md-6">
												<div class="form-group">
													<input type="text" name="social_accounts[twitter]" id="company_twitter" value="https://twitter.com/53themes" class="form-control" placeholder="Twitter profile">
												</div>
											</div>
										</div>
										<!--FILED END-->
										<!--FILED START-->
										<div class="row">
											<div class="col-md-6">
												<div class="form-group">
													<input type="text" name="social_accounts[linkedin]" id="company_linkedin" value="" class="form-control" placeholder="Linkedin profile">
												</div>
											</div>
											<div class="col-md-6">
												<div class="form-group">
													<input type="text" name="social_accounts[instagram]" id="company_instagram" value="" class="form-control" placeholder="Instagram profile">
												</div>
											</div>
										</div>
										<!--FILED END-->
										<!--FILED START-->
										<div class="row">
											<div class="col-md-6">
												<div class="form-group">
													<input type="text" name="social_accounts[youtube]" id="company_youtube" value="https://www.youtube.com/channel/UC3wN3O2GXTt7ZZniIoMZumg" class="form-control" placeholder="Youtube profile">
												</div>
											</div>
											<div class="col-md-6">
												<div class="form-group">
													<input type="text" name="social_accounts[whatsapp]" id="company_whatsapp" value="98769876987" class="form-control" placeholder="WhatsApp No">
												</div>
											</div>
										</div>
										<!--FILED END-->
										<!--FILED START-->
										<h6>About company:</h6>
										<div class="row">
											<div class="col-md-12">
												<div class="form-group">
													<textarea class="form-control" required="required" name="description" id="company_description" placeholder="Product Details">
														<h1>Feel the professionalRn53 ThemesEasy to build your web presence</h1>
														<p>Official website of Rn53 Themes, Affiliated to&nbsp;<a href="https://themeforest.net/user/rn53themes/portfolio" target="_blank">Themeforest</a>. We provide the best html and&nbsp;<a href="https://rn53themes.net/phpdirectorytemplate.html">fully functional website</a>&nbsp;templates. Our services are template customization, custom template design, directory php template, HTML to PHP conversions and more</p>
														<p>We are one of the best web development team we always interesting to develop beautiful websites.</p>
														<ul>
															<li>
																<h3><strong>Classified Templates</strong></h3>
																<p>Kick start your online presence with Bizbook Classified Templates. Template includes Classified ads, listing, products, events, blogs &amp; community. Try it today!</p>
															</li>
															<li>
																<h3><strong>HTML Templates</strong></h3>
																<p>We design most beautifull website tempalets with latest trend and user friendly wesites.</p>
															</li>
															<li>
																<h3><strong>Custom websites</strong></h3>
																<p>We are the leading custom website developers and custom HTML websites are usually the most important thing about an online presence.</p>
															</li>
														</ul>
														<ul>
															<li>
																<h3><strong>Template customization</strong></h3>
																<p>We offer professional website template customization for the templates we built and released here at styleshout. Choose a template and submit to us the customization requirements and we will work on the design until the desired result is achieve.</p>
															</li>
															<li>
																<h3><strong>Available for freelance</strong></h3>
																<p>Finibus Bonorum et Malorum&quot; (The Extremes of Good and Evil) by Cicero, written in 45 BC.</p>
															</li>
															<li>
																<h3><strong>Custom Directory Template</strong></h3>
																<p>We have to directory templates &quot;The Directory&quot; and &quot;Bizbook Directory Template&quot;, If you interested in our directory template and need any template related customization or addition work we will help you to integrate this..</p>
															</li>
															<li>
																<h3><strong>Website re-design</strong></h3>
																<p>Are you looking for a website redesign? Our expert web designers can build attractive and wonderful websites for sustainable brands.</p>
															</li>
														</ul>
													</textarea>
												</div>
											</div>
										</div>
										<!--FILED END-->
										<!--FILED START-->
										<div class="row">
											<div class="col-md-12">
												<label>Header top logo(size 200X35):</label>
												<div class="form-group">
													<input type="file" name="logo" class="form-control" accept="image/png, image/jpeg">
												</div>
											</div>
										</div>
										<div class="row">
											<div class="col-md-6">
												<label>Banner logo(size 200X35):</label>
												<div class="form-group">
													<input type="file" name="bannerlogo" class="form-control" accept="image/png, image/jpeg">
												</div>
											</div>
											<div class="col-md-6">
												<label>Banner background(size 250X250):</label>
												<div class="form-group">
													<input type="file" name="banner" class="form-control" accept="image/png, image/jpeg">
												</div>
											</div>
										</div>
										
										<!--FILED END-->
										<!--FILED START-->
										<h6>Choose Products:</h6>
										<div class="row">
											<div class="col-md-12">
												<div class="form-group">
													<select data-placeholder="Select products" multiple="multiple" name="products[]" id="company_products" class="chosen-select form-control">
														<option disabled value="">Select products</option>
														<option value="36">Audi q3</option>
														<option value="34">WHIRLPOOL FRIDGE</option>
														<option value="33">DELL</option>
														<option value="32">samsung m31</option>
														<option value="31">LG AC</option>
														<option value="30">lenova yoga 510</option>
														<option value="18">Engineered Shelving Unit</option>
														<option selected value="12">8 x 4 Metal Trailer - Exc Tyres</option>
													</select>
												</div>
											</div>
										</div>
										<!--FILED END-->
										<!--FILED START-->
										<h6>Choose blog posts:</h6>
										<div class="row">
											<div class="col-md-12">
												<div class="form-group">
													<select data-placeholder="Select blogs" multiple="multiple" name="blogs[]" id="company_blogs" class="chosen-select form-control">
														<option disabled value="">Select blogs</option>
														<option value="52">INCEPTION</option>
														<option value="49">AVENGERS INFINTY WAR</option>
														<option value="45">AVENGERS END GAME</option>
														<option value="43">captainamerica the civil war</option>
														<option value="42">Samsung M31 Review</option>
														<option value="41">wizard of oz</option>
														<option value="40">wizard of oz</option>
														<option value="39">Titanic</option>
														<option selected value="34">Digital Marketing</option>
													</select>
												</div>
											</div>
										</div>
										<!--FILED END-->
										<!--FILED START-->
										<h6>SEO Settings</h6>
										<div class="row">
											<div class="col-md-12">
												<div class="form-group">
													<textarea class="form-control" name="seo_description" id="company_seo_description" placeholder="Meta descriptions(Write some short description about your company. It's more helps for google indexing and characters limit 155–160)">Official website of Rn53 Themes, Affiliated to Themeforest. We provide the best HTML and fully functional website templates to all over the world.</textarea>
												</div>
											</div>
										</div>
										<!--FILED END-->
										<!--FILED START-->
										<div class="row">
											<div class="col-md-12">
												<div class="form-group">
													<textarea class="form-control" name="seo_keywords" id="company_seo_keywords" placeholder="Meta keywords(Write some short keywords, related your company profile. (i.e) electronics,laptop,hp,canon)">rn53 themes, html templates bootstrap, html templates for personal website, php templates, html templates download, directory listing html template, business directory html template, html5 directory template, travel and tourism html templates, travel html template free, landing page html template, promotion landing page template, hotel booking template, sports website templates,admin panel website templates,hotel booking website templates,tour and travels website templates,digital product website templates,affiliate sale page website templates</textarea>
												</div>
											</div>
										</div>
										<!--FILED END-->
									</li>
								</ul>
								<!--FILED START-->
								<div class="row">
									<div class="col-md-12">
										<button type="submit" name="company_profile_submit" class="btn btn-primary">Submit</button>
									</div>
									<div class="col-md-12"> <a href="{{URL::to('/member-dashboard')}}" class="skip">Go to user dashboard                                        >></a>
									</div>
								</div>
								<!--FILED END-->
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
    @endsection