@section('title', 'Create New User')
<div>
    <!-- Validation Errors -->
    <x-auth-validation-errors class="mb-4" :errors="$errors" />

    @if (session()->has('message'))
        <div class="alert alert-warning alert-dismissible fade show mb-4" role="alert">
                {{ session('message') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <form wire:submit.prevent="{{$is_update ? 'update()' : 'store()' }}">
        @csrf
        <!-- Name -->
        <div class="mb-3">
            <x-label for="name" class="form-label" :value="__('Name')" />
            <x-input id="name" wire:model="name" class="form-control" type="text" name="name" :value="old('name')" required autofocus />
        </div>
        <!-- Email Address -->
        <div class="mb-3">
            <x-label for="email" class="form-label" :value="__('Email')" />
            <x-input id="email" wire:model="email" class="form-control" type="email" name="email" :value="old('email')" required />
        </div>
        @if (!$is_update)
            <!-- Password -->
            <div class="mb-3">
                <x-label for="password" class="form-label" :value="__('Password')" />
                <x-input id="password" wire:model="password" class="form-control"
                type="password"
                name="password"
                required autocomplete="new-password" />
            </div>
        @endif

        <div class="text-center mt-4">
            <x-button class="mb-3">
                {{ $is_update ? 'Update' : 'Create' }}
            </x-button>
        </div>
    </form>
</div>
