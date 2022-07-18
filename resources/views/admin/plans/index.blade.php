@extends("layouts.master")

@section("content")
	<div class="ud-cen">
		@if(session()->get('success'))
			<div class="alert alert-success">
				{{ session()->get('success') }}  
			</div><br />
		@endif
		<div class="log-bor">&nbsp;</div>
		<span class="udb-inst">Pricing details</span>
		<div class="ud-cen-s2">
			<h2>Pricing Plans</h2>
			<table class="responsive-table bordered" id="pg-resu">
					<thead>
						<tr>
							<th>No</th>
							<th>Plan name</th>
							<th>Price</th>
							<th>Status</th>
							<th>Edit</th>

						</tr>
					</thead>
					<tbody>
					<?php
					$si = 1;
					foreach ($plans as $plan_type_row) {
						?>
						<tr>
							<td><?php echo $si; ?></td>
							<td><?php echo $plan_type_row->plan_type_name; ?></td>
							<td><span class="db-list-rat"><?php if($plan_type_row->plan_type_price == 0){
										echo "Free";
									}else{
										echo $plan_type_row->plan_type_price;
									}  ?></span></td>
							<td><span class="db-list-appro">Active</span></td>
							<td><a href="{{route('plans.edit', [$plan_type_row->id])}}" class="db-list-edit">Edit</a></td>

						</tr>
						<?php
						$si++;
					}
					?>
					</tbody>
				</table>
				{{ $plans->links('pagination::bootstrap-4') }}
		</div>
	</div>
@endsection