@extends("layouts.webmaster")

@section("content")

<section class=" login-reg">
	<div class="container">
		<div class="row">
			<div class="add-list-ste">
				<div class="add-list-ste-inn">
					<?php 
					$stepArr = array("Step 1" => 'Basic Info', "Step 2" => 'Services', "Step 3" => 'Offers', "Step 4" => 'map', "Step 5" => 'Other', "Step 6" => 'Done');
					?>
					<ul>
						@php $class = ""; $i = 1; @endphp
						@foreach($stepArr as $key => $step)
							@if($key == "Step 1")
								@php 
								$class = "act";
								@endphp
							@else
								@php 
								$class = "";
								@endphp
							@endif
							<li>
								<a href="javascript:void(0);" class="steps {{$class}}" data-step="step<?=$i?>"> 
									<span><?=$key?></span>
									<b><?=$step?></b>
								</a>
							</li>
							@php 
							$i++;
							@endphp
						@endforeach
					</ul>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="login-main add-list">
				<div class="log-bor">&nbsp;</div> <span class="steps">Step 1</span>
				<div class="log">
					<div class="login">
						<h4>Listing Details</h4>
						<form action="add-listing-step-2.html" class="listing_form_1" id="listing_form_1" name="listing_form_1" method="post" enctype="multipart/form-data">
							<!--FILED START-->
							<div class="row">
								<div class="col-md-12">
									<div class="form-group">
										<input id="listing_name" name="listing_name" type="text" required="required" class="form-control" value="" placeholder="Listing Name*">
									</div>
								</div>
							</div>
							<!--FILED END-->
							<!--FILED START-->
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<input type="text" name="listing_mobile" class="form-control" value="" placeholder="Phone number">
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<input type="text" name="listing_email" class="form-control" value="" placeholder="Email Id">
									</div>
								</div>
							</div>
							<!--FILED END-->
							<!--FILED START-->
							<div class="row">
								<div class="col-md-12">
									<div class="form-group">
										<input type="text" name="listing_whatsapp" class="form-control" value="" placeholder="Whatsapp Number (e.g. +919876543210)">
									</div>
								</div>
							</div>
							<!--FILED END-->
							<!--FILED START-->
							<div class="row">
								<div class="col-md-12">
									<div class="form-group">
										<input type="text" name="listing_website" class="form-control" value="" placeholder="Website(www.rn53themes.net)">
									</div>
								</div>
							</div>
							<!--FILED END-->
							<!--FILED START-->
							<div class="row">
								<div class="col-md-12">
									<div class="form-group">
										<input type="text" name="listing_address" class="form-control" value="" placeholder="Shop address">
									</div>
								</div>
							</div>
							<!--FILED END-->
							<!--FILED START-->
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<input type="text" name="listing_lat" class="form-control" value="" placeholder="Latitude i.e 40.730610">
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<input type="text" name="listing_lng" class="form-control" value="" placeholder="Longitude i.e -73.935242">
									</div>
								</div>
							</div>
							<!--FILED END-->
							<!--FILED START-->
							<div class="row">
								<div class="col-md-12">
									<div class="form-group">
										<select onChange="getCities(this.value);" name="country_id" required="required" id="country_id" class="chosen-select form-control">
											<option value="">Select your Country</option>
											<option value="101">India</option>
											<option value="230">United Kingdom</option>
											<option value="231">United States</option>
										</select>
									</div>
								</div>
							</div>
							<!--FILED END-->
							<!--FILED START-->
							<!--                            <div class="row">-->
							<!--                                <div class="col-md-12">-->
							<!--                                    <div class="form-group">-->
							<!--                                        <input id="select-city" name="city_id" required="required" type="text"-->
							<!--                                               value="-->
							<!--"-->
							<!--                                               class="autocomplete form-control" placeholder="City name">-->
							<!--                                    </div>-->
							<!--                                </div>-->
							<!--                            </div>-->
							<!--FILED END-->
							<!--FILED START-->
							<div class="row">
								<div class="col-md-12">
									<div class="form-group">
										<select data-placeholder="Select your Cities" name="city_id[]" id="city_id" multiple required="required" class="chosen-select form-control">
											<option value="">Select your Cities</option>
										</select>
									</div>
								</div>
							</div>
							<!--FILED END-->
							<!--FILED START-->
							<div class="row">
								<div class="col-md-12">
									<div class="form-group">
										<select onChange="getSubCategory(this.value);" name="category_id" id="category_id" class="chosen-select form-control">
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
								</div>
							</div>
							<!--FILED END-->
							<!--FILED START-->
							<div class="row">
								<div class="col-md-12">
									<div class="form-group">
										<select data-placeholder="Select Sub Category" name="sub_category_id[]" id="sub_category_id" multiple class="chosen-select form-control">
											<option value="">Select Sub Category</option>
											<!--                                            -->
											<!--                                                <option -->
											<!--                                                    value="-->
											<!--">-->
											<!--</option>-->
										</select>
									</div>
								</div>
							</div>
							<!--FILED END-->
							<!--FILED START-->
							<div class="row">
								<div class="col-md-12">
									<div class="form-group">
										<textarea class="form-control" id="listing_description" name="listing_description" placeholder="Details about your listing"></textarea>
									</div>
								</div>
							</div>
							<!--FILED END-->
							<!--FILED START-->
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label>Choose profile image</label>
										<input type="file" required="required" name="profile_image" class="form-control">
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label>Choose cover image</label>
										<input type="file" required="required" name="cover_image" class="form-control">
									</div>
								</div>
							</div>
							<!--FILED END-->
							<!--FILED START-->
							<div class="row">
								<div class="col-md-12">
									<div class="form-group">
										<textarea class="form-control" id="service_locations" name="service_locations" placeholder="Enter your service locations... &#10;(i.e) London, Dallas, Wall Street, Opera House"></textarea>
									</div>
								</div>
							</div>
							<!--FILED END-->
							<button type="submit" name="listing_submit" class="btn btn-primary">Next</button>
						</form>
					</div>
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
		$( document ).on("click", ".steps", function(){
			var step = $(this).attr("data-step");
			var error = 0;
			$("input[type=text]").each(function()
			{
				if($(this).val() == "")
				{
					$(".bodymessage").css({'display':'block'});
					$(".alert-heading").html("Error");
					$("#response").html("Please complete the current step before next step..");
					return false;
					error = 1;
				}
			});

			if(error != 1)
			{
				$.ajax({
					url: "{{route('loadstepform')}}",
					type: "POST",
					data: {
						step: step
					},
					cache: false,
					success: function(result)
					{
						$(".log").html($result);
					}
				});

				return false;
			}
		});

		$(".close").on("click", function(){
			$(".bodymessage").css({'display':'none'});
		});
	});
	</script>

@stop
	