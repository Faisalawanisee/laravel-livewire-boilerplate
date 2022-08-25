<div wire:ignore.self class="modal fade" id="updateRoleModel" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
       <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Update Role</h5>
            </div>
            <div class="modal-body">
                @if($name)
                    <form wire:submit.prevent="update">
                        <div class="form-group">
                            <input type="hidden" wire:model="role_id">
                            <label for="exampleFormControlInput1">Name</label>
                            <input required type="text" class="form-control" wire:model="name" id="exampleFormControlInput1" placeholder="Enter Name">
                            @error('name') <span class="text-danger">{{ $message }}</span>@enderror
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
