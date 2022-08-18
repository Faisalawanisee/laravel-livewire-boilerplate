<?php

namespace App\Http\Livewire\Users;

use App\Models\User;
use Livewire\Component;

class Single extends Component
{

    public $user;

    public function mount($id)
    {
        $this->user = User::find($id);
    }

    public function render()
    {
        return view('livewire.users.single');
    }
}
