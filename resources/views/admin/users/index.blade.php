@extends("layouts.master")

@section("content")
	<div class="ud-cen">
		<div class="log-bor">&nbsp;</div>
		<span class="udb-inst">General User Details</span>
		<div class="ud-cen-s2">
			<h2>General Users - {{countUsers()}}</h2>
								<div class="ad-int-sear">
				<input type="text" id="pg-sear" placeholder="Search this page..">
			</div>
			<a href="admin-add-new-user.html" class="db-tit-btn">Add new user</a>
			<table class="responsive-table bordered" id="pg-resu">
				<thead>
					<tr>
						<th>No</th>
						<th>User Name</th>
						<th>User ID</th>
						<th>User Type</th>
						<th>Followings</th>
						<th>Edit</th>
						<th>Delete</th>
						<th>Preview</th>
						<th>More</th>
					</tr>
				</thead>
				<tbody>
					@foreach($data as $user)
						@if($user->member_id != "")
						<tr>
							<td>{{$user->id}}</td>
							<td>
							@php 
							$imgSrc = getUserDp($user->member_id);
							@endphp
							<img src="{{ $imgSrc }}" alt="">{{ucfirst($user->name)}}<span>{{$user->email}}</span> <span>Join: {{$user->created_at->isoFormat('D, MMMM YYYY')}}</span>
							</td>
							<td>{{$user->member_id}} </td>
							<td>{{$user->type}} </td>
							<td><span class="db-list-rat">{{countFollowing($user->member_id)}}</span></td>
							<td><a href="{{route('user.edit', [$user->id])}}" class="db-list-edit">Edit</a></td>
							<td><a href="{{route('user.destroy', [$user->id])}}" class="db-list-edit">Delete</a></td>
							<td><a href="{{route('viewprofile', [$user->member_id])}}" class="db-list-edit" target="_blank">Preview</a></td>
							<td><a href="{{route('user.show', [$user->id])}}" class="db-list-edit">More</a></td>
						</tr>
						@endif
					@endforeach
					
				</tbody>
			</table>
			{{ $data->links('pagination::bootstrap-4') }}
		</div>
	</div>
@endsection