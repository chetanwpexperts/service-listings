@extends("layouts.master")

@section("content")
	<div class="ud-cen">
		@if(session()->get('success'))
			<div class="alert alert-success">
				{{ session()->get('success') }}  
			</div><br />
		@endif
		<div class="log-bor">&nbsp;</div> <span class="udb-inst">All Pages</span>
		<div class="ud-cen-s2">
			<h2>Search Page By Name</h2>
			<div class="ad-int-sear">
				<input type="text" id="pg-sear">
			</div> <a href="{{route('pages.create')}}" class="db-tit-btn">Add new page</a>
			<table class="responsive-table bordered" id="pg-resu">
				<thead>
					<tr>
						<th>ID</th>
						<th>Page</th>
						<th>Status</th>
						<th>Last edit</th>
						<th>Edit</th>
						<th>Remove</th>
						<th>Parmanent Delete</th>
					</tr>
				</thead>
				<tbody>
					 @foreach($pages as $page)
					<tr>
						<td>{{$page->id}}</td>
						<td>{{$page->title}} <span>{{$page->created_at->isoFormat('D, MMMM YYYY')}}</span>
						</td>
						<td>@if($page->status == '1')
							<div class="published">Published</div>
						@elseif($page->status == '2')
							<div class="removed">Removed</div>
						@elseif($page->status == '3')
							<div class="draft">Draft</div>
						@endif</td>
						<td>{{$page->updated_at->isoFormat('D, MMMM YYYY')}}</td>
						
						<td><a href="{{route('pages.edit',$page->id)}}" class="db-list-edit">Edit</a>
						</td>
						<td><a href="{{route('pages.remove',$page->id)}}" class="db-list-edit" <?php echo ($page->status == 2) ? "disabled" : "";?>>Remove <a/></td>
						<td><a href="{{route('pages.destroy',$page->id)}}" class="db-list-edit">Delete Parmanent</a></td>
					</tr>
					@endforeach
					
				</tbody>
			</table>
			{{ $pages->links('pagination::bootstrap-4') }}
		</div>
	</div>
@endsection