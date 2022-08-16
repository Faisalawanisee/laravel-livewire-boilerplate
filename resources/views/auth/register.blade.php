<x-guest-layout>
    <x-auth-card>
        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('register') }}">
            @csrf
            <!-- Name -->
            <div class="mb-3">
                <x-label for="name" class="form-label" :value="__('Name')" />
                <x-input id="name" class="form-control" type="text" name="name" :value="old('name')" required autofocus />
            </div>
            <!-- Email Address -->
            <div class="mb-3">
                <x-label for="email" class="form-label" :value="__('Email')" />
                <x-input id="email" class="form-control" type="email" name="email" :value="old('email')" required />
            </div>
            <!-- Password -->
            <div class="mb-3">
                <x-label for="password" class="form-label" :value="__('Password')" />
                <x-input id="password" class="form-control"
                type="password"
                name="password"
                required autocomplete="new-password" />
            </div>
            <!-- Confirm Password -->
            <div class="mb-3">
                <x-label for="password_confirmation" class="form-label" :value="__('Confirm Password')" />
                <x-input id="password_confirmation" class="form-control"
                type="password"
                name="password_confirmation" required />
            </div>

            <div class="text-center mt-4">
                <x-button class="mb-3">
                    {{ __('Register') }}
                </x-button>
                <a href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>
