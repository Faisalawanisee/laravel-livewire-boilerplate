<?php

namespace App\Http\Livewire\Users;

use App\Models\User;
use Livewire\Component;

class Index extends Component
{
    public $users;

    public function render()
    {
        $this->users = User::all();
        return view('livewire.users.index');
    }

    public function delete($id)
    {
        User::where('id', $id)->delete();
        session()->flash('message', 'User Deleted Successfully.');
    }

    
}
