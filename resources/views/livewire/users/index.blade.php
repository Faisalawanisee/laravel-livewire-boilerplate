@section('title', 'Users')
<div>
	<div>

		@if (session()->has('message'))
			<div class="alert alert-warning alert-dismissible fade show mb-4" role="alert">
					{{ session('message') }}
				<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
			</div>
		@endif

		<a href="{{ route('user_create') }}" class="btn btn-primary rounded mb-3">
			Create New User
		</a>
	</div>
	<div class="table-responsive table-shadow">
		<table class="table table-custom table-fixed-header mb-0">
			<thead>
				<tr>
					<th>ID</th>
					<th>Name</th>
					<th>Email</th>
					<th>Role</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
				@foreach ($users as $user)
					<tr>
						<td>{{$user->id}}</td>
						<td>{{$user->name}}</td>
						<td>{{$user->email}}</td>
						<td>N/A</td>
						<td>
							<a
								href="user/{{$user->id}}"
								class="btn btn-primary btn-sm rounded-circle text-white"
								data-bs-toggle="tooltip"
								data-bs-placement="top"
								title="View"
							>
								<span><i class="fa fa-eye"></i></span>
						</a>
							<a
								href="user/{{$user->id}}/edit"
								class="btn btn-primary btn-sm rounded-circle text-white"
								data-bs-toggle="tooltip"
								data-bs-placement="top"
								title="Edit"
							>
								<span><i class="fa fa-pencil-alt"></i></span>
							</a>
							<a
								wire:click="delete({{$user->id}})"
								class="btn btn-primary btn-sm rounded-circle text-white"
								data-bs-toggle="tooltip"
								data-bs-placement="top"
								title="Delete"
							>
								<span><i class="fa fa-trash"></i></span>
							</a>
						</td>
					</tr>
				@endforeach
			</tbody>
		</table>
	</div>
</div>
