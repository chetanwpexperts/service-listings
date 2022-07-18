@extends("layouts.master")

@section("content")
	<div class="ud-cen">
		@if(session()->get('success'))
			<div class="alert alert-success">
				{{ session()->get('success') }}  
			</div><br />
		@endif
		<div class="log-bor">&nbsp;</div>
		<span class="udb-inst">Listing Sub Categories</span>
		<div class="ud-cen-s2 hcat-cho">
			<h2>All Listing Sub Categories</h2>
								<div class="ad-int-sear">
				<input type="text" id="pg-sear" placeholder="Search this page..">
			</div>
			<a href="{{route('subcategories.create')}}" class="db-tit-btn">Add new Listing sub category</a>
			<table class="responsive-table bordered" id="pg-resu">
				<thead>
					<tr>
						<th>No</th>
						<th>Image</th>
						<th>Sub Category Name</th>
						<th>Main Category Name</th>
						<th>Created date</th>
						<th>Listing</th>
						<th>Views</th>
						<th>Edit</th>
						<th>Delete</th>
					</tr>
				</thead>
				<tbody>
					
					@foreach($categories as $category)
					<tr>
						<td>{{$category->id}}</td>
						<?php 
						$imgsrc = "";
						if($category->category_image != null || $category->category_image != "")
						{
							$imgsrc = asset('public/public/listing-categories/' . $category->category_image);
						}else{
							$imgsrc = asset('public/images/defaultimg.png');
						}
						?>
						<td><img src="{{$imgsrc}}" alt=""></td>
						<td><b class="db-list-rat">{{$category->category_name}}</b></td>
						<td><b class="db-list-rat"> <?php echo getCategoryName($category->parent_id); ?></b></td>
						
						<td>{{$category->created_at->isoFormat('D, MMMM YYYY')}}</td>
						<td><span class="db-list-ststus" data-toggle="tooltip"
								  title="Total listings in this category">4</span></td>
						<td><span class="db-list-ststus">5</span></td>
						<td><a href="{{route('subcategories.edit', [$category->id])}}" class="db-list-edit">Edit</a></td>
						<!--<td><a href="" class="db-list-edit">View</a></td>-->
						<td><a href="{{route('subcategories.destroy', [$category->id])}}" class="db-list-edit">Delete</a></td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
@endsection