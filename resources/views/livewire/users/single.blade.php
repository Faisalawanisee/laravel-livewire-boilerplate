@section('title', 'User Profile')
<div>
	<div class="row">
		<div class="col-lg-12 mb-4 mb-sm-5">
			<div class="card border-0">
				<div class="card-body p-1-9 p-sm-2-3 p-md-6 p-lg-7">
					<div class="row align-items-center">
						<div class="col-lg-6 mb-4 mb-lg-0">
							<img src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="...">
						</div>
						<div class="col-lg-6 px-xl-10">
							<div class="bg-secondary d-lg-inline-block py-1-9 px-1-9 px-sm-6 mb-1-9 rounded">
								<h3 class="h2 text-white mb-0">{{$user->name}}</h3>
								<span class="text-primary">Role</span>
							</div>
							<ul class="list-unstyled mb-1-9">
								<li class="mb-2 mb-xl-3 display-28"><span class="display-26 text-secondary me-2 font-weight-600">Position:</span> Coach</li>
								<li class="mb-2 mb-xl-3 display-28"><span class="display-26 text-secondary me-2 font-weight-600">Experience:</span> 10 Years</li>
								<li class="mb-2 mb-xl-3 display-28"><span class="display-26 text-secondary me-2 font-weight-600">Email:</span> {{$user->email}} </li>
								<li class="mb-2 mb-xl-3 display-28"><span class="display-26 text-secondary me-2 font-weight-600">Website:</span> www.example.com</li>
								<li class="display-28"><span class="display-26 text-secondary me-2 font-weight-600">Phone:</span> 507 - 541 - 4567</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-lg-12 mb-4 mb-sm-5">
			<div>
				<h4 class="text-primary mb-3 mb-sm-4">About Me</h4>
				<p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Laborum atque at illo voluptatem neque, architecto autem nemo dolore, ab esse quidem sed quas officiis enim quae fugit consequuntur quo? Expedita?</p>
			</div>
		</div>
	</div>
</div>
