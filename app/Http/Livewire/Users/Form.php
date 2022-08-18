<?php

namespace App\Http\Livewire\Users;

use App\Models\User;
use Livewire\Component;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Hash;

class Form extends Component
{

    public $name, $email, $password, $user_id;
    public $is_update = false;

    public function mount($id = null)
    {
        if($id && User::find($id)) {
            $this->edit($id);
        } else {
            session()->flash('message', 'User Not Exists');
            return redirect('/');
        }
    }

    public function render()
    {
        return view('livewire.users.form');
    }

    private function clearForm()
    {
        $this->name = '';
        $this->email = '';
        $this->password = '';
    }

    public function edit($id)
    {
        $user = User::where('id', $id)->first();
        
        $this->is_update = true;
        $this->user_id = $id;
        $this->name = $user->name;
        $this->email = $user->email;
    }

    public function store()
    {
        $valid_fields = $this->validate([
            'name' => 'required',
            'email' => ['required', 'email', Rule::unique('users', 'email')],
            'password' => ['required', 'min:8'],
        ]);
        $valid_fields['password'] = Hash::make($valid_fields['password']);

        User::create($valid_fields);

        session()->flash('message', 'User Created Successfully.');

        $this->clearForm();
    }

    public function update()
    {
        $valid_fields = $this->validate([
            'name' => 'required',
            'email' => ['required', 'email'],
        ]);

        $user = User::find($this->user_id);
        
        $user->update($valid_fields);
        
        session()->flash('message', 'User Updated Successfully.');
    }    
}
