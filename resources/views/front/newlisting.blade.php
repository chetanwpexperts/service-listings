@extends("layouts.webmaster")

@section("content")

<section class=" login-reg">
		<div class="container">
			<div class="row">
				<div class="login-main add-list">
					<div class="log-bor">&nbsp;</div> <span class="steps">Create new</span>
					<div class="log">
						<div class="login">
							<h4>Add New Listing</h4>
							<div class="row cre-dup">
								<div class="col-md-6"> <a href="{{route('newlistingform')}}">Create listing from scratch</a>
								</div>
								<div class="col-md-6"> <span class="cre-dup-btn">Create duplicate listing</span>
								</div>
							</div>
							<form name="duplicate_listing_form" action="{{route('frontlistingstore.duplicate')}}" id="duplicate_listing_form" method="post" class="cre-dup-form cre-dup-form-show">
								@csrf
								<!--FILED START-->
								<div class="row">
									<div class="col-md-12">
										<div class="form-group">
											<select name="listing_id" id="listing_id" class="chosen-select form-control" required="required">
												<option value="" disabled selected>Listing Name</option>
                                                @foreach($listings as $listing)
												<option value="{{$listing->id}}">{{$listing->listing_name}}</option>
                                                @endforeach
											</select>
										</div>
									</div>
								</div>
								<!--FILED END-->
								<!--FILED START-->
								<div class="row">
									<div class="col-md-12">
										<div class="form-group">
											<input type="text" name="listing_name" required="required" class="form-control" placeholder="New Listing Name*">
										</div>
									</div>
								</div>
								<!--FILED END-->
								<button type="submit" name="listing_submit" class="btn btn-primary">Create Now</button>
							</form>
							<div class="col-md-12"> <a href="<?php echo URL::to('/member-dashboard');?>" class="skip">Go to user dashboard >></a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
@endsection