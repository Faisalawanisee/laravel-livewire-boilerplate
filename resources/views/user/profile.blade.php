@section('page.title', 'Page Title')

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Your Profile') }}
        </h2>
    </x-slot>

    <div class="py-12">
        Your Profile
    </div>
    <div class="row">
    {{-- @foreach ($profile as $profile) --}}
     <form action="{{route('createProfile')}}" method="POST"  enctype="multipart/form-data">
        {{ csrf_field() }}
        <h5 class="mt-4">Personal Information</h5>

        <input type="hidden" name="id" value="{{$profile->id??null}}">
        <input type="hidden" name='user_id' value="{{auth()->user()->id}}">
        @if (session('error') === '')
            <div class="mt-2 alert alert-success">
               <i class="linl-icon" data-feather="check-circle"></i>successfully save data
            </div>
        @elseif (session('error') === '1')
        <div class="mt-2 alert alert-danger">
            <i class="linl-icon" data-feather="check-circle"></i>failed when trying to save data, please try again
         </div>
        @endif
        @php
        $imguser = "no-img.png";
        if(!empty($profile)) {
             $imguser = $profile->image??null;
        }
         @endphp
        <div class="mb-3 mt-1 d-flex align-items-center">
            <img width="80px" src="{{asset('storage/upload/img/')."/".$imguser}}" alt="User Img" class="img-fluid" >
             <div class="ms-2">
                 <input type="file" class="form-control" name="image" id="image">
             </div>
        </div>

        <div class="mb-3 mt-1">
            <label for="phone" class="form-label text-muted ">Phone Number <span class="text-danger">:</span></label>
            <input type="text" class="form-control" name="phone" id="phone" placeholder="Enter your Phone Number" value="{{$profile->phone??null}}">
        </div>

        <div class="mb-3 mt-1">
            <label for="company" class="form-label text-muted ">Company <span class="text-danger">:</span></label>
            <input type="text" class="form-control" name="company" id="company" placeholder="Enter your company Name" value="{{$profile->company??null}}">
        </div>

        <div class="mb-3 mt-1">
            <label for="country" class="form-label text-muted ">Country  <span class="text-danger">:</span></label>
            <input type="text" class="form-control" name="country" id="country" placeholder="Enter your country Name" value="{{$profile->country??null}}">
        </div>

        <div class="mb-3 mt-1">
            <label for="city" class="form-label text-muted ">City <span class="text-danger">:</span></label>
            <input type="text" class="form-control" name="city" id="city" placeholder="Enter your city Name" value="{{$profile->city??null}}">
        </div>
        <div class="mb-3 mt-1">
            <label for="address" class="form-label text-muted ">Complete Address <span class="text-danger">:</span></label>
            <textarea class="form-control"  name="address" cols="12" rows="2" id="address" placeholder="Enter Your Address" value="{{$profile->address??null}}"></textarea>
        </div>

        <div class="mt-1">
            <button type="submit" class="btn btn-sm btn-info me-2 mb-2">
                <i class="btn-icon-prepend" data-feather="link"></i>
                Save Profile
            </button>
        </div>
     </form>
     {{-- @endforeach --}}
    </div>
</x-app-layout>
