@extends("layouts.webmaster")

@section("content")
	<?php 
	$mid = Session::get('mid');
	$name = Session::get('Name');
	$email = Session::get('email');
	$joining = Session::get('joining');
	?>
	<section class=" ud">
		<div class="ud-inn">
			<!--LEFT SECTION-->
			@include("partials.front.leftmenu")
			<!--CENTER SECTION-->
			<!--CENTER SECTION-->
			<div class="ud-cen">
				<div class="log-bor">&nbsp;</div>	<span class="udb-inst">All Listings</span>
				<div class="ud-cen-s2">
					<h2>Listing Details</h2>
					<a href="{{route('newlisting')}}" class="db-tit-btn">Add New Listing</a>
					<div class="table-responsive">
						<table class="table bordered">
							<thead>
								<tr>
									<th>No</th>
									<th>Listing Name</th>
									<th>Rating</th>
									<th>Views</th>
									<!--									<th>Expiry on</th>-->
									<th>Status</th>
									<th>Edit</th>
									<th>Delete</th>
									<!--                                    <th>-->
									<!--</th>-->
									<th>Preview</th>
								</tr>
							</thead>
							<tbody>
                            @foreach($listings as $listing)
                            @php 
                            $dbRating = number_format(getavgrating($listing->id),1);
                            $views = ($listing->views == "") ? 0: $listing->views;
                            @endphp
                            <tr>
                                <td>{{$listing->id}}</td>
                                <td>
                                <?php 
                                $imgsrc = "";
                                if($listing->image != null || $listing->image != "")
                                {
                                    $imgsrc = asset('public/public/listings/image/' . $listing->image);
                                }else{
                                    $imgsrc = asset('public/images/defaultimg.png');
                                }
                                ?>
                                <img src="{{$imgsrc}}" alt=""> {{$listing->listing_name}} <span>{{$listing->created_at->isoFormat('D, MMMM YYYY')}}</span></td>
                                <td><span class="db-list-rat">{{$dbRating}}</span></td>
                                <td><span
                                        class="db-list-rat">{{$views}}</span>
                                </td>
                                <td><a href="javascript:void(0);" class="db-list-ststus" target="_blank">{{ucwords($listing->status)}}</a></td>
                                <td><a href="admin-edit-listings.html?code=LIST396"
                                        class="db-list-edit">Edit</a></td>
                                <td><a href="admin-delete-listings.html?code=LIST396"
                                        class="db-list-edit">Delete</a></td>
                                <td><a href="{{route('getdetailsbyslug',[$listing->listing_slug])}}" class="db-list-edit" target="_blank">Preview</a>
                                </td>
                            </tr>
                            @endforeach
								
							</tbody>
						</table>
					</div>
				</div>
			</div>
			<!--RIGHT SECTION-->
			@include("partials.front.sidebar")
		</div>
	</section>
	<!--END-->
	<!-- START -->
	@include("partials.front.help")
@endsection