<div wire:ignore.self class="modal fade" id="addUserModel" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="addUserModelLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addUserModelLabel">Add User</h5>
            </div>
           <div class="modal-body">
                <form wire:submit.prevent="store()">
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Name</label>
                        <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Enter Name" wire:model.defer="name">
                        @error('name') <span class="text-danger error">{{ $message }}</span>@enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput2">Email</label>
                        <input type="email" class="form-control" id="exampleFormControlInput2" wire:model.defer="email" placeholder="Enter Email">
                        @error('email') <span class="text-danger error">{{ $message }}</span>@enderror
                    </div>
                    <div class="form-group">
                        <label for="newUserPassword">Password</label>
                        <input type="password" class="form-control" id="newUserPassword" placeholder="Password" wire:model.defer="password">
                        @error('name') <span class="text-danger error">{{ $message }}</span>@enderror
                    </div>
                    <div class="form-group">
                        <label for="newUserPassword">Role</label>
                        <select class="form-select" wire:model.defer="role" aria-label="Role">
                        @foreach($roles as $role)
                            <option value="{{$role}}">{{$role}}</option>
                        @endforeach
                        </select>
                        @error('name') <span class="text-danger error">{{ $message }}</span>@enderror
                    </div>

                </form>
            </div>
            <div class="modal-footer">
                <button type="button" wire:click.prevent="cancel()" class="btn btn-secondary close-btn" data-bs-dismiss="modal">Close</button>
                <button type="button" wire:click.prevent="store()" class="btn btn-primary close-modal">Save changes</button>
            </div>
        </div>
    </div>
</div>
