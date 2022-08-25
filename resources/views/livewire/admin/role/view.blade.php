<div wire:ignore.self class="modal fade" id="viewRoleModel" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
       <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Role Detail</h5>
            </div>
            <div class="modal-body">
                @if($role)
                    <table class="table table-sm table-bordered border-primary">
                        <tbody>
                            <tr>
                                <td>Name</td>
                                <td>{{ $role->name }}</td>
                            </tr>
                        </tbody>
                    </table>
                @else
                    <div class="spinner-grow" role="status">
                        <span class="visually-hidden">Loading...</span>
                    </div>
                @endif

            </div>
            <div class="modal-footer">
                <button type="button" wire:click.prevent="cancel()" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
       </div>
    </div>
</div>
