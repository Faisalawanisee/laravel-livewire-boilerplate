
<div>
    @include('livewire.admin.profile.update')
        <div class="container-fluid py-2 h-100 ">
          <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-sm-12">
              <div class="card ">
                <div class="rounded-top text-white d-flex flex-row" style="background-color: #000; height:200px;">
                  <div class="ms-4 mt-5 d-flex flex-column" style="width: 150px;">
                    @if($user->profile->image)
                    <img src="{{asset('storage/upload/img/')}}/{{$user->profile->image}}"
                      alt="Generic placeholder image" class="img-fluid img-thumbnail mt-4 mb-2"
                      style="width: 150px; z-index: 1">
                      @else
                      <img src="{{asset('storage/upload/img/9z7H6UzKSs4KhTBmvKecZUccE3VQy3hE6bMOhAFv.jpg')}}"
                      alt="Generic placeholder image" class="img-fluid img-thumbnail mt-4 mb-2"
                      style="width: 150px; z-index: 1">
                      @endif
                    <button type="button" class="btn btn-outline-dark"  style="z-index: 1;"  data-mdb-ripple-color="dark" data-bs-toggle="modal" data-bs-target="#addProfileModal" data-bs-whatever="@mdo">Edit profile</button>
                  </div>
                  <div class="ms-3" style="margin-top: 130px;">
                    <h5>{{$user->name}}</h5>
                    <p>{{$user->email}}</p>
                  </div>
                </div>
                <div class="p-4 text-black" style="background-color: #f8f9fa;">
                  <div class="d-flex justify-content-end text-center py-1">
                    <div>
                      <p class="mb-1 h5">253</p>
                      <p class="small text-muted mb-0">Photos</p>
                    </div>
                    <div class="px-3">
                      <p class="mb-1 h5">1026</p>
                      <p class="small text-muted mb-0">Followers</p>
                    </div>
                    <div>
                      <p class="mb-1 h5">478</p>
                      <p class="small text-muted mb-0">Following</p>
                    </div>
                  </div>
                </div>
                <div class="card-body p-4 text-black">
                  <div class="mb-5">
                    <p class="lead fw-normal mb-1 fw-bold fs-5">About</p>
                    <div class="p-4" style="background-color: #f8f9fa;">
                    <h5 class="fw-bold">Phone :</h5>
                      <p class="font-italic mb-1 ms-3">{{$user->profile->phone}}</p>
                    <h5 class="fw-bold">Company :</h5>
                      <p class="font-italic mb-1 ms-3">{{$user->profile->company}}</p>
                      <h5 class="fw-bold">City :</h5>
                      <p class="font-italic mb-1 ms-3">{{$user->profile->city}}</p>
                      <h5 class="fw-bold">Country :</h5>
                      <p class="font-italic mb-0 ms-3">{{$user->profile->country}}</p>
                      <h5 class="fw-bold mt-2">Address :</h5>
                      <p class="font-italic mb-0 ms-3">{{$user->profile->address}}</p>
                    </div>
                  </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
    
</div>
