@php
    if ($image) {
      $imgUrl = asset('storage/upload/img/').'/'.$image;
    } else {
      $imgUrl = asset('storage/upload/img/9z7H6UzKSs4KhTBmvKecZUccE3VQy3hE6bMOhAFv.jpg');
    }
@endphp

<div  wire:ignore.self class="modal fade" id="addProfileModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Update Profile</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="ms-4 mt-5 d-flex flex-column" style="width: 150px;">
          <img src="{{$imgUrl}}"
              alt="Generic placeholder image" class="img-fluid img-thumbnail mt-4 mb-2"
              style="width: 150px; z-index: 1">
            {{-- @if($newimage)
            <img src="{{$newimage->temporaryUrl()}}"
              alt="Generic placeholder image" class="img-fluid img-thumbnail mt-4 mb-2"
              style="width: 150px; z-index: 1">
              @elseif($image)
            <img src="{{asset('storage/upload/img/')}}/{{$user->profile->image}}"
              alt="Generic placeholder image" class="img-fluid img-thumbnail mt-4 mb-2"
              style="width: 150px; z-index: 1">
              @else
              <img src="{{asset('storage/upload/img/9z7H6UzKSs4KhTBmvKecZUccE3VQy3hE6bMOhAFv.jpg')}}"
              alt="Generic placeholder image" class="img-fluid img-thumbnail mt-4 mb-2"
              style="width: 150px; z-index: 1">
              @endif --}}
          </div>
        <div class="ms-2">
            <input type="file" class="form-control" wire:model="image" id="image">
        </div>
        <form>
          <div class="mb-3">
            <label for="name" class="col-form-label">Name :</label>
            <input type="text" class="form-control" wire:model="name" id="name">
          </div>
          <div class="mb-3">
            <label for="name" class="col-form-label">Email :</label>
            <input type="email" class="form-control" wire:model="email" id="email">
          </div>
          <div class="mb-3">
            <label for="phone" class="col-form-label">Phone :</label>
            <input type="phone" class="form-control" wire:model="phone" id="phone">
          </div>
          <div class="mb-3">
            <label for="company" class="col-form-label">Company :</label>
            <input type="company" class="form-control" wire:model="company" id="company">
          </div>
          <div class="mb-3">
            <label for="city" class="col-form-label">City :</label>
            <input type="text" class="form-control" wire:model="city" id="city">
          </div>
          <div class="mb-3">
            <label for="country" class="col-form-label">Country :</label>
            <input type="country" class="form-control" wire:model="country" id="country">
          </div>
          <div class="mb-3">
            <label for="address" class="col-form-label">Address :</label>
            <textarea class="form-control" wire:model="address" id="address"></textarea>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" wire:click.prevent="updateProfile()">Update Profile</button>
      </div>
    </div>
  </div>
</div>