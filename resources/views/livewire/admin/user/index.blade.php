<div>
    @section('action-buttons')
        <div class="float-end">
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addUserModel">
                Add New User
            </button>
        </div>
    @stop


    @include('livewire.admin.user.create')
    @include('livewire.admin.user.update')
    @include('livewire.admin.user.view')

    <pre>
        {{ print_r($roles) }}
    </pre>

    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <ul style="list-style-type:none;">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <table class="table table-sm">
        <thead class="table-light">
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Role</th>
                <th class="action-column">&nbsp;</th>
            </tr>
        </thead>
        <tbody>
        @foreach($users as $user)
            <tr>
                <td>
                    {{ $user->id }}
                </td>
                <td>
                    {{ $user->name }}
                </td>
                <td>
                    {{ $user->email }}
                </td>
                <td>
                    @if(!empty($user->getRoleNames()))
                        @foreach($user->getRoleNames() as $v)
                            <label >{{ $v }}</label>
                        @endforeach
                    @endif
                </td>
                <td class="text-center">
                    <div class="btn-group">
                        <button type="button" class="btn dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown" aria-expanded="false">
                            <span class="visually-hidden">Toggle Dropdown</span>
                        </button>
                        <ul class="dropdown-menu">
                            <li>
                                <a href="javascript:void(0)" class="dropdown-item" wire:click="view({{$user->id}})" data-bs-toggle="modal" data-bs-target="#viewUserModel">View</a>
                            </li>
                            <li>
                                <a href="javascript:void(0)" class="dropdown-item" wire:click="edit({{$user->id}})" data-bs-toggle="modal" data-bs-target="#updateUserModel">Edit</a>
                            </li>
                            <li><hr class="dropdown-divider"></li>
                            <li>
                                <a href="javascript:void(0)" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#deleteUserModel{{ $user->id }}">Delete</a>
                            </li>
                        </ul>
                    </div>
                    <div wire:ignore.self class="modal fade" id="deleteUserModel{{ $user->id }}" data-bs-keyboard="false" tabindex="-1" role="dialog" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Delete Confirm</h5>
                                </div>
                                <div class="modal-body">
                                    <p>Are you sure want to delete?</p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary close-btn" data-bs-dismiss="modal">Close</button>
                                    <button type="button" wire:click="destroy({{$user->id}})" class="btn btn-danger close-modal" data-bs-dismiss="modal">Yes, Delete</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
