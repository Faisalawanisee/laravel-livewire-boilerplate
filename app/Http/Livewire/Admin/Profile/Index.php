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
    public $phone, $company, $country, $address, $profile_id , $newimage , $image;
    public  $updateMode = false;

    public function render()
    {
        $user_id = Auth::user()->id;
        $userProfile = Profile::where('user_id',$user_id)->first();
        if(!$userProfile){

            $profile = new Profile();
            $profile->user_id = Auth::user()->id;
            $profile->save();

        }
        $user = User::find(Auth::user()->id);
        return view('livewire.admin.profile.index',['user'=>$user]);
    }
    
    private function resetInputFields()
    {
        $this->name = null;
        $this->email = null;
        $this->phone = null;
        $this->image = null;
        $this->city = null;
        $this->country = null;
        $this->address = null;
    }


    public function mount()
    {
        $user = User::find(Auth::user()->id);
        $this->name = $user->name;
        $this->email = $user->email;
        $this->phone = $user->profile->phone;
        $this->image = $user->profile->image;
        $this->city = $user->profile->city;
        $this->country = $user->profile->country;
        $this->address = $user->profile->address;
        
        $this->emit('profileStore');
    }

   

    public function updateProfile()
    {
        $user = User::find(Auth::user()->id);
        $user->name = $this->name;
        $user->email = $this->email;
        $user->save();
        $user->profile->phone = $this->phone;
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
        $this->resetInputFields();
        $this->emit('profileStore');
        
       
    }
}