<?php

namespace App\Http\Livewire\Admin\Role;

use Livewire\Component;
use Livewire\WithPagination;
use Spatie\Permission\Models\Role;

class Index extends Component
{
    use WithPagination;
    
    public $name, $role, $role_id;
    public $updateMode = false;

    public function render()
    {
        $roles = Role::orderBy('id','DESC')->paginate(20);
        return view('livewire.admin.role.index', compact('roles'));
    }

    private function resetInputFields()
    {
        $this->name = null;
    }

    public function store()
    {
        $this->validate([
            'name' => 'required',
        ]);

        $role = Role::create([
            'name' => $this->name,
        ]);

        $this->resetInputFields();
        $this->dispatchBrowserEvent('toast-message', ['message' => 'Role Created Successfully.']);
        $this->emit('closeModal');
    }

    public function edit($id)
    {
        $record = Role::findOrFail($id);
        $this->role_id = $id;
        $this->name = $record->name;
        $this->updateMode = true;
    }

    public function view($id)
    {
        $record = Role::findOrFail($id);
        $this->role_id = $id;
        $this->role = $record;
    }

    public function cancel()
    {
        $this->updateMode = false;
        $this->resetInputFields();
    }

    public function update()
    {
        $this->validate([
            'role_id' => 'required|numeric',
            'name' => 'required',
        ]);
        if ($this->role_id) {

            $record = Role::find($this->role_id);
            $s = $record->update([
                'name' => $this->name,
            ]);

            $this->dispatchBrowserEvent('toast-message', ['message' => 'Role Updated Successfully.']);
            $this->resetInputFields();
            $this->updateMode = false;
            $this->emit('closeModal');
        }
    }

    public function destroy($id)
    {
        if ($id) {
            $record = Role::where('id', $id);
            $record->delete();
            $this->dispatchBrowserEvent('toast-message', ['message' => 'Roles Deleted Successfully.', 'type' => 'error']);
        }
    }
}
