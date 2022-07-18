@extends("layouts.master")

@section("content")
<div class="ud-cen">
@if(session()->get('success'))
			<div class="alert alert-success">
				{{ session()->get('success') }}  
			</div><br />
		@endif
		@if ($errors->any())
			<div class="alert alert-danger">
				<ul>
					@foreach ($errors->all() as $error)
						<li>{{ $error }}</li>
					@endforeach
				</ul>
			</div>
		@endif
	<div class="log-bor">&nbsp;</div>
		<span class="udb-inst">User Edit Details</span>
        <div class="ud-cen-s2 ud-pro-edit">
            <h2>Edit Profile details</h2>
            <form name="register_form" id="register_form" method="post" action="{{route('user.update', [$user->id])}}" enctype="multipart/form-data" class="">
				@csrf
				<table class="responsive-table bordered">
					<tbody>
					<tr>
						<td>Name</td>
						<td>
							<div class="form-group">
								<input type="text" value="{{$user->name}}"
									required="required" autocomplete="off" name="first_name"
									id="first_name" class="form-control">
							</div>
						</td>
					</tr>
					<tr>
						<td>Email id</td>
						<td>
							<div class="form-group">
								<input type="email" readonly="readonly"
									value="{{$user->email}}"
									required="required" autocomplete="off" name="email_id" id="email_id"
									class="form-control">
							</div>
						</td>
					</tr>
					
					<tr>
						<td>Mobile number</td>
						<td>
							<div class="form-group">
								<input type="text"
									value="{{$user->phone}}"
									required="required" autocomplete="off" name="mobile_number"
									id="mobile_number" class="form-control">
							</div>
						</td>
					</tr>
					<tr>
						<td>Profile picture</td>
						<td>
							<div class="form-group">
								<input type="file" name="profile_image" class="form-control">
							</div>
						</td>
					</tr>
					<tr>
						<td>Country</td>
						<td>
							<div class="form-group">
								<select name="country" required="required" class="form-control" id="country-dropdown">
									<option value="">Select your Country</option>
									@foreach($countries as $country)
										<option value="{{$country->id}}" <?php echo (!empty($userinfo) && $country->id == $userinfo->country) ? "selected" : "";?>>{{$country->name}}</option>
									@endforeach
								</select>
							</div>
						</td>
					</tr>
					<tr>
						<td>State</td>
						<td>
							<div class="form-group">
								<select name="state" required="required" class="form-control" id="state-dropdown">
									<option value="">Select your country first</option>
									<?php echo $stateOption;?>
								</select>
							</div>
						</td>
					</tr>
					<tr>
						<td>City</td>
						<td>
							<div class="form-group">
								<select data-placeholder="Select your Cities" name="city" id="city_id" multiple required="required"
										class="chosen-select form-control">
									<option value="">Select your Cities</option>
									<?php echo $cityOption;?>
								</select>
							</div>
						</td>
					</tr>
					<tr>
						<td>Twitter</td>
						<td>
							<div class="form-group">
								<input type="text" name="twitter_url" class="form-control" value="<?php echo (!empty($userinfo)) ? $userinfo->twitter_url : "";?>" />
							</div>
						</td>
					</tr>
					<tr>
						<td>Facebook</td>
						<td>
							<div class="form-group">
								<input type="text" name="facebook_url" class="form-control" value="<?php echo (!empty($userinfo)) ? $userinfo->facebook_url : "";?>" />
							</div>
						</td>
					</tr>
					<tr>
						<td>Website</td>
						<td>
							<div class="form-group">
								<input type="text" name="website" class="form-control" value="<?php echo (!empty($userinfo)) ? $userinfo->website : "";?>" >
							</div>
						</td>
					</tr>
					<tr>
						<td>Assign A Role</td>
						<td>
							<div class="form-group">
								<select data-placeholder="Select Roles" name="type" id="roles" multiple required="required" class="chosen-select form-control">
									@foreach($roles as $role)
										<option value="{{$role}}" <?php echo (!empty($userinfo) && $role == $userinfo->roles) ? "selected" : "";?>>{{$role}}</option>
									@endforeach
								</select>
							</div>
						</td>
					</tr>
					<tr>
						<td>
							<button type="submit" name="register_submit" class="db-pro-bot-btn">Update
								User
							</button>
						</td>
						<td></td>
					</tr>
					</tbody>
				</table>
			</form>    
        </div>
	</div>
@endsection

@section('scripts')

    <script>
	jQuery( document ).ready( function( $ ) {
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
				$('#city_id').html('<option value="">Select State First</option>'); 
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
				$("#city_id").append(result);
                $("#city_id").trigger("chosen:updated");
                
			}
		});
	});
		
	});
	CKEDITOR.replace('page_description');
	</script>

@stop