<?php

namespace App\Http\Livewire\Admin\User;

use Hash;
use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;
use Spatie\Permission\Models\Role;

class Index extends Component
{
    use WithPagination;

    public $user, $name, $email, $password, $role, $user_id;
    public $updateMode = false;

    public function render()
    {
        $roles = Role::pluck('name','name')->all();
        $users = User::orderBy('id','DESC')->paginate(20);

        return view('livewire.admin.user.index', compact('users', 'roles'));
    }

    private function resetInputFields()
    {
        $this->name = null;
        $this->email = null;
        $this->password = null;
        $this->role = null;
        $this->user = null;
    }

    public function store()
    {
        $this->validate([
            'name' => 'required|min:5',
            'email' => 'required|email',
        ]);

        $user = User::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => Hash::make($this->password),
        ]);
        $user->assignRole($this->role);

        $this->resetInputFields();
        $this->dispatchBrowserEvent('toast-message', ['message' => 'Users Created Successfully.']);
        $this->emit('closeModal');
    }

    public function edit($id)
    {
        $record = User::findOrFail($id);
        $this->user_id = $id;
        $this->name = $record->name;
        $this->email = $record->email;
        $this->updateMode = true;
    }

    public function view($id)
    {
        $record = User::findOrFail($id);
        $this->user_id = $id;
        $this->user = $record;
    }

    public function cancel()
    {
        $this->updateMode = false;
        $this->resetInputFields();
    }

    public function update()
    {
        $this->validate([
            'user_id' => 'required|numeric',
            'name' => 'required|min:5',
            'email' => 'required|email:rfc,dns'
        ]);

        if ($this->user_id) {
            $record = User::findOrFail($this->user_id);
            $record->update([
                'name' => $this->name,
                'email' => $this->email,
            ]);

            $this->dispatchBrowserEvent('toast-message', ['message' => 'Users Updated Successfully.']);
            $this->resetInputFields();
            $this->updateMode = false;
            $this->emit('closeModal');
        }
    }

    public function destroy($id)
    {
        if ($id) {
            $record = User::where('id', $id);
            $record->delete();
            $this->dispatchBrowserEvent('toast-message', ['message' => 'Users Deleted Successfully.', 'type' => 'error']);
        }
    }
}
