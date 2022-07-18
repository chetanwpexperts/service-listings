@extends("layouts.master")

@section("content")
	<div class="ud-cen">
		@if(session()->get('success'))
			<div class="alert alert-success">
				{{ session()->get('success') }}  
			</div><br />
		@endif
		<div class="log-bor">&nbsp;</div> <span class="udb-inst">All Sections</span>
		<div class="ud-cen-s2">
			<h2>Search By Name </h2> 
			<div class="ad-int-sear">
				<input type="text" id="pg-sear">
			</div> <a href="{{route('section.create')}}" class="db-tit-btn">Add new section</a>
			<table class="responsive-table bordered" id="pg-resu">
				<thead>
					<tr>
						<th>ID</th>
						<th>Heading</th>
						<th>Name</th>
						<th>Edit</th>
						<th>Delete</th>
					</tr>
				</thead>
				<tbody>
					 @foreach($sections as $section)
					<tr>
						<td>{{$section->id}}</td>
						<td>{{$section->section_heading}} <span>{{$section->created_at->isoFormat('D, MMMM YYYY')}}</span>
						</td>
						<td>{{$section->section_name}}</td>
						
						<td><a href="{{route('section.edit',$section->id)}}" class="db-list-edit">Edit</a>
						</td>
						<td><a href="{{route('section.destroy',$section->id)}}" class="db-list-edit">Delete</a></td>
					</tr>
					@endforeach
					
				</tbody>
			</table>
			{{ $sections->links('pagination::bootstrap-4') }}
		</div>
	</div>
@endsection