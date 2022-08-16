<x-guest-layout>
    <x-auth-card>
        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('password.update') }}">
            @csrf
            <!-- Password Reset Token -->
            <input type="hidden" name="token" value="{{ $request->route('token') }}">
            <!-- Email Address -->
            <div class="mb-3">
                <x-label for="email" class="form-label" :value="__('Email')" />
                <x-input id="email" class="form-check-label" type="email" name="email" :value="old('email', $request->email)" required autofocus />
            </div>
            <!-- Password -->
            <div class="mb-3">
                <x-label for="password" class="form-label" :value="__('Password')" />
                <x-input id="password" class="form-check-label" type="password" name="password" required />
            </div>
            <!-- Confirm Password -->
            <div class="mb-3">
                <x-label for="password_confirmation" class="form-label" :value="__('Confirm Password')" />
                <x-input id="password_confirmation" class="form-check-label"
                type="password"
                name="password_confirmation" required />
            </div>

            <div class="mt-4">
                <x-button>
                    {{ __('Reset Password') }}
                </x-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>
