<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Profile;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function index()
    {

            $user_id = Auth::user()->id;
            $profile = Profile::where('user_id',$user_id)->first();

        return view('user/profile' , ['profile' => $profile])->with('error' ,0);
    }

    public function createProfile(Request $request)
    {
        $request->validate([
            'user_id' => 'required',
            // 'phone' => 'required',
        ]);

        try {

            if($request->id > 0) {
                // update data
                $method = 'update';
                $profile = Profile::find($request->id);
            } else {
                // insert data
                $method = 'insert';
                $profile = new Profile;
            }

            // upload img
            $imgname = "";
            if($request->hasFile('image')){
                $request->validate([
                    'image' => 'mimes:jpeg,bmp,png,jpg'
                ]);

                $request->image->store('upload/img','public');
                $imgname = $request->image->hashName();
            }

            $profile->user_id = $request->user_id;
            $profile->phone = $request->phone;
            $profile->company = $request->company;
            $profile->country = $request->country;
            $profile->city = $request->city;
            $profile->address = $request->address;

            if($method == 'update') {
                if(!empty($imgname)) {
                    $profile->image = $imgname;
                }
            } else{
                $profile->image = $imgname;
            }

            $profile->save();


            return redirect(route('profile'))->with('error', '');

        } catch (QueryException $e){
            return redirect(route('profile'))->with('error', 1);
        }

    }
}
