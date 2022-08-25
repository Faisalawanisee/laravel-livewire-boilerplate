<?php

namespace App\Http\Livewire\Admin\Profile;

use Livewire\Component;
use Carbon\Carbon;
use App\Models\Profile;
use App\Models\User;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Auth;

class Index extends Component
{   
    use WithFileUploads;
    public $phone, $company, $country, $address, $newimage , $image;
    public  $updateMode = false;

    
    public function mount()
    {
        $user = auth()->user();
        $this->name = $user->name;
        $this->email = $user->email;
        $this->phone = $user->profile->phone;
        $this->company = $user->profile->company;
        $this->image = $user->profile->image;
        $this->city = $user->profile->city;
        $this->country = $user->profile->country;
        $this->address = $user->profile->address;
        
        
    }

    public function render()
    {
        
        $user = auth()->user();
        return view('livewire.admin.profile.index',['user'=>$user]);
    }
    
    public function updateProfile()
    {
        $user = auth()->user();
        $user->name = $this->name;
        $user->email = $this->email;
        $user->save();
        $user->profile->phone = $this->phone;
        $user->profile->company = $this->company;
        if ($this->newimage) {
            if ($this->image) {
                unlink('storage/upload/img/'.$this->image);
            }
            $imageName = Carbon::now()->timestamp . '.' . $this->newimage->extension();
            $this->newimage->storeAs('img',$imageName);
            $user->profile->image =  $imageName;

        }
        $user->profile->city = $this->city;
        $user->profile->country = $this->country;
        $user->profile->address = $this->address;
        $user->profile->save();

        $this->updateMode = false;
        $this->dispatchBrowserEvent('toast-message', ['message' => 'Users Updated Successfully.']);
        $this->emit('closeModal');
        
       
    }
}