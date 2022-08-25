<div>
    @section('action-buttons')
        <div class="float-end">
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addRoleModel">
                Add New Role
            </button>
        </div>
    @stop


    @include('livewire.admin.role.create')
    @include('livewire.admin.role.update')
    @include('livewire.admin.role.view')

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
                <th class="action-column">&nbsp;</th>
            </tr>
        </thead>
        <tbody>
        @foreach($roles as $role)
            <tr>
                <td>
                    {{ $role->id }}
                </td>
                <td>
                    {{ $role->name }}
                </td>
                <td class="text-center">
                    <div class="btn-group">
                        <button type="button" class="btn dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown" aria-expanded="false">
                            <span class="visually-hidden">Toggle Dropdown</span>
                        </button>
                        <ul class="dropdown-menu">
                            <li>
                                <a href="javascript:void(0)" class="dropdown-item" wire:click="view({{$role->id}})" data-bs-toggle="modal" data-bs-target="#viewRoleModel">View</a>
                            </li>
                            <li>
                                <a href="javascript:void(0)" class="dropdown-item" wire:click="edit({{$role->id}})" data-bs-toggle="modal" data-bs-target="#updateRoleModel">Edit</a>
                            </li>
                            <li><hr class="dropdown-divider"></li>
                            <li>
                                <a href="javascript:void(0)" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#deleteRoleModel{{ $role->id }}">Delete</a>
                            </li>
                        </ul>
                    </div>
                    <div wire:ignore.self class="modal fade" id="deleteRoleModel{{ $role->id }}" data-bs-keyboard="false" tabindex="-1" role="dialog" aria-hidden="true">
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
                                    <button type="button" wire:click="destroy({{$role->id}})" class="btn btn-danger close-modal" data-bs-dismiss="modal">Yes, Delete</button>
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