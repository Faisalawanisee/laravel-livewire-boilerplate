<div wire:ignore.self class="modal fade" id="updateUserModel" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
       <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Update User</h5>
            </div>
            <div class="modal-body">
                @if($name)
                    <form>
                        <div class="form-group">
                            <input type="hidden" wire:model="user_id">
                            <label for="exampleFormControlInput1">Name</label>
                            <input required type="text" class="form-control" wire:model="name" id="exampleFormControlInput1" placeholder="Enter Name">
                            @error('name') <span class="text-danger">{{ $message }}</span>@enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlInput2">Email address</label>
                            <input required type="email" class="form-control" wire:model="email" id="exampleFormControlInput2" placeholder="Enter Email">
                            @error('email') <span class="text-danger">{{ $message }}</span>@enderror
                        </div>
                    </form>
                @else
                    <div class="spinner-grow" role="status">
                        <span class="visually-hidden">Loading...</span>
                    </div>
                @endif

            </div>
            <div class="modal-footer">
                <button type="button" wire:click.prevent="cancel()" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" wire:click.prevent="update()" class="btn btn-primary" data-bs-dismiss="modal">Save changes</button>
            </div>
       </div>
    </div>
</div>
