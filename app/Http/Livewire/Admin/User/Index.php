<?php

namespace App\Http\Livewire\Admin\User;

use Livewire\Component;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Hash;

class Index extends Component
{
    public $user, $name, $email, $password, $role, $user_id;
    public $updateMode = false;

    public function render()
    {
        $roles = Role::pluck('name','name')->all();
        $users = User::orderBy('id','DESC')->paginate(5);

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

        session()->flash('message', 'Users Created Successfully.');

        $this->resetInputFields();

        $this->dispatchBrowserEvent('toast-message', ['message' => 'Users Created Successfully.']);

        $this->emit('userStore');
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
            $record = User::find($this->user_id);
            $record->update([
                'name' => $this->name,
                'email' => $this->email
            ]);
            $this->dispatchBrowserEvent('toast-message', ['message' => 'Users Updated Successfully.']);

            $this->resetInputFields();

            $this->updateMode = false;
        }
    }


    public function destroy($id)
    {
        if ($id) {
            $record = User::where('id', $id);
            $record->delete();
            // session()->flash('message', 'Users Deleted Successfully.');
            $this->dispatchBrowserEvent('toast-error-message', ['message' => 'Users Deleted Successfully.', 'type' => 'error']);
        }
    }
}
