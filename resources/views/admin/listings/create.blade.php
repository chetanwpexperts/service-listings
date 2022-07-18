@extends("layouts.master")

@section("content")
<div class="login-reg">
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="container">
        <form action="{{route('listingstore')}}" class="listing_form" id="listing_form"
                name="listing_form" method="post" enctype="multipart/form-data">
                @csrf
            <div class="row">
                <div class="login-main add-list posr">
                    <div class="log-bor">&nbsp;</div>
                    <span class="udb-inst">step 1</span>
                    <div class="log log-1">
                        <div class="login">
                            <h4>Listing Details</h4>
                            
                            <!--FILED START-->
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <select name="member_id" id="user_code" class="form-control" required="required">
                                            <option value="" disabled selected>User Name</option>
                                            @foreach($users as $user)
                                                <option value="{{$user->member_id}}">{{ucfirst($user->name)}}</option>
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
                                        <input id="listing_name" name="listing_name" type="text" required="required" class="form-control" placeholder="Listing name *">
                                    </div>
                                </div>
                            </div>
                            <!--FILED END-->
                            <!--FILED START-->
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="text" name="listing_mobile" class="form-control"
                                                placeholder="Phone number">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="text" name="listing_email" class="form-control"
                                                placeholder="Email id">
                                    </div>
                                </div>
                            </div>
                            <!--FILED END-->
                            <!--FILED START-->
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input type="text" name="listing_whatsapp" class="form-control"
                                                placeholder="Whatsapp Number">
                                    </div>
                                </div>
                            </div>
                            <!--FILED END-->
                            <!--FILED START-->
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input type="text" name="listing_website" class="form-control"
                                                placeholder="Webiste(www.rn53themes.net)">
                                    </div>
                                </div>
                            </div>
                            <!--FILED END-->
                            <!--FILED START-->
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input type="text" name="listing_address" required="required" class="form-control"
                                                placeholder="Shop address">
                                    </div>
                                </div>
                            </div>
                            <!--FILED END-->

                            <!--FILED START-->
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input type="text" name="listing_pincode" class="form-control"
                                                placeholder="Pincode i.e 123456">
                                    </div>
                                </div>
                               
                            </div>
                            <!--FILED END-->

                            <!--FILED START-->
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <select name="country" required="required" class="form-control" id="country-dropdown">
                                                <option value="">Select your Country</option>
                                            @foreach($countries as $country)
                                                <option value="{{$country->id}}">{{$country->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <!--FILED END-->
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <select name="state" required="required" class="form-control" id="state-dropdown">
                                            <option value="">Select your country first</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <!--FILED END-->
                            
                            <!--FILED START-->
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <select data-placeholder="Select your Cities" name="city_id[]" id="city_id" multiple required="required"
                                                class="chosen-select form-control">
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
                                        <select name="category_id" id="category_id" class="form-control">
                                            <option value="">Select Category</option>
                                            @foreach($categories as $category)
                                                <option value="{{$category->id}}">{{$category->category_name}}</option>
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
                                        <select  data-placeholder="Select Sub Category" name="sub_category_id[]" id="sub_category_id" multiple class="chosen-select chosen-select-category form-control">
                                            <option value="">Select Sub Category</option>
                                            <!--                                            -->                                                        <!--                                                <option -->                                                        <!--                                                    value="--><!--">--><!--</option>-->
                                                                                                </select>
                                    </div>
                                </div>
                            </div>
                            <!--FILED END-->
                            <!--FILED START-->
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <textarea class="form-control" id="listing_description"
                                                    name="listing_description"
                                                    placeholder="Details about your listing"></textarea>
                                    </div>
                                </div>
                            </div>
                            <!--FILED END-->
                            <!--FILED START-->
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Choose profile image</label>
                                        <input type="file" name="image" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Choose cover image</label>
                                        <input type="file" name="banner" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <!--FILED END-->

                            <!--FILED START-->
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                            <textarea class="form-control" id="service_locations"
                                        name="service_locations"
                                        placeholder="Enter your service locations... &#10;(i.e) London, Dallas, Wall Street, Opera House"></textarea>
                                    </div>
                                </div>
                            </div>
                            <!--FILED END-->


                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="login-main add-list add-list-ser">
                    <div class="log-bor">&nbsp;</div>
                    <span class="steps">Step 2</span>
                    <div class="log">
                        <div class="login">

                            <h4>Services provide</h4>
                            <span class="add-list-add-btn lis-ser-add-btn" title="add new offer">+</span>
                            <span class="add-list-rem-btn lis-ser-rem-btn" title="remove offer">-</span>
                                <ul>
                                    <li>
                                        <!--FILED START-->
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Service Name:</label>
                                                    <input type="text" name="service_name[]" class="form-control" placeholder="Ex: Plumbile">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Choose Service Image</label>
                                                    <input type="file" name="service_image[]"
                                                            class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                        <!--FILED END-->
                                    </li>
                                    <li>
                                        <!--FILED START-->
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Service Name:</label>
                                                    <input type="text" name="service_name[]"
                                                            class="form-control"
                                                            placeholder="Ex: bike service">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Choose Service Image</label>
                                                    <input type="file" name="service_image[]"
                                                            class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                        <!--FILED END-->
                                    </li>
                                </ul>
                        </div>
                    </div>
                </div>

            </div>
            <div class="row">
                <div class="login-main add-list">
                    <div class="log-bor">&nbsp;</div>
                    <span class="steps">Step 3</span>
                    <div class="log">
                        <div class="login add-list-off">

                            <h4>Special offers</h4>
                            <span class="add-list-add-btn lis-add-off" title="add new offer">+</span>
                            <span class="add-list-rem-btn lis-add-rem" title="remove offer">-</span>

                            <ul>
                                <li>
                                    <!--FILED START-->
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <input type="text" name="offer_name[]"
                                                        class="form-control"
                                                        placeholder="Offer name *">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <input type="text" name="offer_price[]"
                                                        class="form-control" onkeypress="return isNumber(event)"
                                                        placeholder="Price">
                                            </div>
                                        </div>
                                    </div>
                                    <!--FILED END-->
                                    <!--FILED START-->
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                            <textarea class="form-control" name="offer_details[]"
                                                        placeholder="Details about this offer"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <!--FILED END-->
                                    <!--FILED START-->
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Choose offer image</label>
                                                <input type="file" name="offer_image[]"
                                                        class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <!--FILED END-->
                                    <!--FILED START-->
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <input type="text" name="offer_view_more_link[]"
                                                        class="form-control"  placeholder="View More Link">
                                            </div>
                                        </div>
                                    </div>
                                    <!--FILED END-->
                                </li>
                            </ul>

                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="login-main add-list">
                    <div class="log-bor">&nbsp;</div>
                    <span class="steps">Step 4</span>
                    <div class="log add-list-map">
                        <div class="login add-list-map">
                            <h4>Video Gallery</h4>
                            <ul>
                                <span class="add-list-add-btn lis-add-oadvideo" title="add new video">+</span>
                                <span class="add-list-rem-btn lis-add-orevideo" title="remove video">-</span>
                                    <li>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                        <textarea id="listing_video" name="gallery_video[]"
                                                class="form-control"
                                                placeholder="Paste Your Youtube Url here"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                            </ul>
                            <h4>Map and 360 view</h4>
                            <!--FILED START-->
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                    <textarea class="form-control" name="google_map"
                                                placeholder="Shop location"></textarea>
                                    </div>
                                </div>
                            </div>
                            <!--FILED END-->
                            <!--FILED START-->
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                    <textarea class="form-control" name="view_360"
                                                placeholder="360 view"></textarea>
                                    </div>
                                </div>
                            </div>
                            <!--FILED END-->

                            <h4 class="pt30">Photo gallery</h4>
                            <!--FILED START-->
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="file" name="gallery_image[]" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="file" name="gallery_image[]" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <!--FILED END-->
                            <!--FILED START-->
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="file" name="gallery_image[]" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="file" name="gallery_image[]" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <!--FILED END-->
                            <!--FILED START-->
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="file" name="gallery_image[]" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="file" name="gallery_image[]" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <!--FILED END-->

                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="login-main add-list">
                    <div class="log-bor">&nbsp;</div>
                    <span class="steps">Step 5</span>
                    <div class="log">
                        <div class="login add-lis-oth">

                            <h4>Other informations</h4>
                            <span class="add-list-add-btn lis-add-oad" title="add new offer">+</span>
                            <span class="add-list-rem-btn lis-add-ore" title="remove offer">-</span>

                            <ul>
                                <li>
                                    <!--FILED START-->
                                    <div class="row">
                                        <div class="col-md-5">
                                            <div class="form-group">
                                                <input type="text" name="meta_name[]"
                                                        class="form-control" placeholder="Experience">
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <i class="material-icons">arrow_forward</i>
                                            </div>
                                        </div>
                                        <div class="col-md-5">
                                            <div class="form-group">
                                                <input type="text" name="meta_value[]"
                                                        class="form-control" placeholder="20 years">
                                            </div>
                                        </div>
                                    </div>
                                    <!--FILED END-->
                                </li>
                                <!--FILED START-->
                                <li>
                                    <div class="row">
                                        <div class="col-md-5">
                                            <div class="form-group">
                                                <input type="text" name="meta_name[]"
                                                        class="form-control" placeholder="Parking">
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <i class="material-icons">arrow_forward</i>
                                            </div>
                                        </div>
                                        <div class="col-md-5">
                                            <div class="form-group">
                                                <input type="text" name="meta_value[]"
                                                        class="form-control" placeholder="yes">
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <!--FILED END-->
                                <!--FILED START-->
                                <li>
                                    <div class="row">
                                        <div class="col-md-5">
                                            <div class="form-group">
                                                <input type="text" name="meta_name[]"
                                                        class="form-control" placeholder="Smoking">
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <i class="material-icons">arrow_forward</i>
                                            </div>
                                        </div>
                                        <div class="col-md-5">
                                            <div class="form-group">
                                                <input type="text" name="meta_value[]"
                                                        class="form-control" placeholder="yes">
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <!--FILED END-->
                                <!--FILED START-->
                                <li>
                                    <div class="row">
                                        <div class="col-md-5">
                                            <div class="form-group">
                                                <input type="text" name="meta_name[]"
                                                        class="form-control" placeholder="Take Out">
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <i class="material-icons">arrow_forward</i>
                                            </div>
                                        </div>
                                        <div class="col-md-5">
                                            <div class="form-group">
                                                <input type="text" name="meta_value[]"
                                                        class="form-control" placeholder="yes">
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <!--FILED END-->

                            </ul>
                            <!--FILED START-->
                            <div class="row">
                                <!--                                        <div class="col-md-6">-->
                                <!--                                            <button type="submit" class="btn btn-primary">Previous</button>-->
                                <!--                                        </div>-->
                                <div class="col-md-12">
                                    <button type="submit" name="listing_submit" class="btn btn-primary">
                                        Submit
                                        Listing
                                    </button>
                                </div>
                                <div class="col-md-12">
                                    <a href="{{route('dashboard')}}" class="skip">Go to Dashboard >></a>
                                </div>
                            </div>
                            <!--FILED END-->

                        </div>
                    </div>

                </div>
            </div>
        </form>


    </div>
    </div>
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

    $('#category_id').on('change', function() 
	{
		var category_id = this.value;
		$.ajax({
			url: "{{route('getsubcategories')}}",
			type: "POST",
			data: {
				category_id: category_id
			},
			cache: false,
			success: function(result)
			{
				$(".chosen-select-category").append(result);
                $(".chosen-select-category").trigger("chosen:updated");
                
			}
		});
	});

    //category_id
});
</script>
@stop