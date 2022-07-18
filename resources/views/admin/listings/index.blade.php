@extends("layouts.master")

@section("content")
<div class="ud-cen">
        @if(session()->get('success'))
			<div class="alert alert-success">
				{{ session()->get('success') }}  
			</div><br />
		@endif
        <div class="log-bor">&nbsp;</div>
        <span class="udb-inst">All Listing Details</span>
        <div class="ud-cen-s2">
            <h2>Listing details</h2>
                                <div class="ad-int-sear">
                <input type="text" id="pg-sear" placeholder="Search this page..">
            </div>
            <a href="{{route('listingcreate')}}" class="db-tit-btn">Add new listing</a>
            <table class="responsive-table bordered" id="pg-resu">
                <thead>
                <tr>
                    <th>No</th>
                    <th>Listing Name</th>
                    <th>Rating</th>
                    <th>Views</th>
                    <th>Created by</th>
                    <th>Edit</th>
                    <th>Delete</th>
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
                        <td><a href="javascript:void(0);" class="db-list-ststus" target="_blank">{{$listing->created_by}}</a></td>
                        <td><a href="admin-edit-listings.html?code=LIST396"
                                class="db-list-edit">Edit</a></td>
                        <td><a href="admin-delete-listings.html?code=LIST396"
                                class="db-list-edit">Delete</a></td>
                        <td><a href="http://localhost/directory/bizbook/listing/qwerqw" class="db-list-edit" target="_blank">Preview</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $listings->links('pagination::bootstrap-4') }}
        </div>
    </div>
@endsection